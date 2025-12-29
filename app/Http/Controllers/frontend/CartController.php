<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{
   public function add(Request $request)
{
    $request->validate([
        'cart_id' => 'required|exists:carts,id',
        'product_id' => 'required|exists:products,id',
        'qty' => 'required|integer|min:1',
        'product_variant_id' => 'nullable|exists:product_variants,id',
    ]);

    $product = Product::findOrFail($request->product_id);

    if ($product->stock < $request->qty) {
        return back()->with('error', 'Stock tidak cukup');
    }

    $variant = ProductVariant::find($request->product_variant_id);

    $price = $product->price + ($variant->extra_price ?? 0);

    $cartItem = CartItem::where('cart_id', $request->cart_id)
        ->where('product_id', $product->id)
        ->where('product_variant_id', $variant?->id)
        ->first();

    if ($cartItem) {
        $cartItem->increment('qty', $request->qty);
    } else {
        CartItem::create([
            'cart_id' => $request->cart_id,
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
}
