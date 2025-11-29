<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductBackendController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pages.backend.product.index', compact('products'));
    }

    public function create()
    {
        return view('pages.backend.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'name' => 'required|unique:products,name',
            'product_stock' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        // === UPLOAD MENGGUNAKAN STORAGE LINK ===
        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'image' => $imagePath, // contoh: products/1726389123.jpg
            'name' => $request->name,
            'product_stock' => $request->product_stock,
            'price' => $request->price,
        ]);

        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }

    public function show(Product $product)
    {
        return view('pages.backend.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('pages.backend.product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'name' => 'required|unique:products,name,' . $product->id,
            'product_stock' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $data = $request->only(['name', 'product_stock', 'price']);

        // === UPDATE GAMBAR BARU ===
        if ($request->hasFile('image')) {

            // HAPUS GAMBAR LAMA DARI STORAGE
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // UPLOAD BARU
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        // === DELETE FILE DULU ===
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
