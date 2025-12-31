<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Bill;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
public function add(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'qty' => 'required|integer|min:1',
        'product_variant_id' => 'nullable|exists:product_variants,id',
    ]);

    $cartId = session('cart_id');
    $cart = Cart::findOrFail($cartId);

    $product = Product::findOrFail($request->product_id);

    if ($product->stock < $request->qty) {
        return back()->with('error', 'Stock tidak cukup');
    }

    $variant = ProductVariant::find($request->product_variant_id);

    // hitung harga dasar
    $price = $product->price + ($variant->extra_price ?? 0);

    // jika meja premium, tambahkan 0 di belakang (misal kalikan 10)
    if ($cart->table->type === 'premium') {
        $price = $price * 10; // ini bikin harga premium lebih mahal
    }

    $cartItem = CartItem::where('cart_id', $cart->id)
        ->where('product_id', $product->id)
        ->where('product_variant_id', $variant?->id)
        ->first();

    if ($cartItem) {
        $cartItem->increment('qty', $request->qty);
        // update price kalau premium
        if ($cart->table->type === 'premium') {
            $cartItem->update(['price' => $price]);
        }
    } else {
        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'product_variant_id' => $variant?->id,
            'qty' => $request->qty,
            'price' => $price,
        ]);
    }

    $product->decrement('stock', $request->qty);

    return back()->with('success', 'Item berhasil ditambahkan');
}

public function updateQty(Request $request)
{
    $request->validate([
        'cart_item_id' => 'required|exists:cart_items,id',
        'action' => 'required|in:increase,decrease,remove',
    ]);

    $item = CartItem::with('product')->findOrFail($request->cart_item_id);
    $product = $item->product;

    if ($request->action === 'increase') {
        if ($product->stock < 1) {
            return back()->with('error', 'Stock habis');
        }
        $item->increment('qty');
        $product->decrement('stock');
    }

    if ($request->action === 'decrease') {
        $item->decrement('qty');
        $product->increment('stock');
        if ($item->qty <= 0) {
            $item->delete();
        }
    }

    if ($request->action === 'remove') {
        $product->increment('stock', $item->qty);
        $item->delete();
    }

    return back();
}

public function ajaxAction(Request $request)
{
    $request->validate([
        'cart_item_id' => 'required|exists:cart_items,id',
        'action' => 'required|in:increase,decrease,remove',
    ]);

    $item = CartItem::with('product')->findOrFail($request->cart_item_id);
    $product = $item->product;

    if ($request->action === 'increase') {
        if ($product->stock < 1) {
            return response()->json(['error' => 'Stock habis'], 422);
        }
        $item->increment('qty');
        $product->decrement('stock');
    }

    if ($request->action === 'decrease') {
        $item->decrement('qty');
        $product->increment('stock');
        if ($item->qty <= 0) {
            $item->delete();
        }
    }

    if ($request->action === 'remove') {
        $product->increment('stock', $item->qty);
        $item->delete();
    }

    return response()->json(['success' => true]);
}
public function order(Request $request)
{
    $request->validate([
        'note' => 'nullable|string'
    ]);

    $cart = Cart::with(['items', 'table'])
        ->where('id', session('cart_id'))
        ->where('status', 'draft')
        ->firstOrFail();

    $bill = Bill::create([
        'cart_id' => $cart->id,
        'table_id' => $cart->table_id,
        'total' => $cart->items->sum(fn ($i) => $i->price * $i->qty),
        'status' => 'unpaid',
    ]);

    $cart->update([
        'status' => 'locked',
        'note' => $request->note
    ]);

    $cart->table->update([
        'status' => 'occupied'
    ]);

    session()->forget('cart_id');

    return redirect()->route('choose.table')
        ->with('success', 'Order berhasil dikirim ke kasir');
}

}
