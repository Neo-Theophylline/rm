<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductBackendController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('pages.backend.product.create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'name' => 'required|unique:products,name',
            'product_stock' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        // Upload image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/products'), $imageName);

        Product::create([
            'image' => $imageName,
            'name' => $request->name,
            'product_stock' => $request->product_stock,
            'price' => $request->price,
        ]);

        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }

    /**
     * Show the form for editing the specified product.
     */
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

        // Jika upload gambar baru
        if ($request->hasFile('image')) {

            // Hapus gambar lama jika ada
            $oldPath = public_path('uploads/products/' . $product->image);
            if (file_exists($oldPath) && is_file($oldPath)) {
                unlink($oldPath);
            }

            // Upload gambar baru
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);

            $data['image'] = $imageName;
        }

        $product->update($data);

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }



    public function destroy(Product $product)
    {
        // Hapus file gambar jika ada
        $oldPath = public_path('uploads/products/' . $product->image);
        if (file_exists($oldPath) && is_file($oldPath)) {
            unlink($oldPath);
        }

        // Hapus record dari database
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
