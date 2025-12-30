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
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('pages.backend.product.index', compact('products'));
    }


    public function create()
    {
        return view('pages.backend.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'name' => 'required|unique:products,name',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:food,drink',
        ]);


        // === UPLOAD MENGGUNAKAN STORAGE LINK ===
        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'image' => $imagePath,
            'name' => $request->name,
            'stock' => $request->stock, // ⬅️ mapping ke stock
            'price' => $request->price,
            'type' => $request->type, // ⬅️ pastikan dikirim dari form
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
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'name' => 'required|unique:products,name,' . $product->id,
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:food,drink',
        ]);


        $data = [
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'type' => $request->type,
        ];


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
