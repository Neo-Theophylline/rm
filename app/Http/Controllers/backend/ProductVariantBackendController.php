<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantBackendController extends Controller
{
    public function index(Product $product)
    {
        return view('pages.backend.variant.index', [
            'product' => $product,
            'variants' => $product->variants
        ]);
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'extra_price' => 'required|integer|min:0',
        ]);

        $product->variants()->create($request->all());

        return back()->with('success', 'Variant berhasil ditambahkan');
    }

   public function edit(Product $product, ProductVariant $variant)
    {
        abort_if($variant->product_id !== $product->id, 404);

        return view('pages.backend.variant.edit', compact('product', 'variant'));
    }

    public function update(Request $request, Product $product, ProductVariant $variant)
    {
        abort_if($variant->product_id !== $product->id, 404);

        $request->validate([
            'name' => 'required',
            'extra_price' => 'required|numeric|min:0',
        ]);

        $variant->update($request->only('name', 'extra_price'));

        return redirect()
            ->route('product.variants.index', $product)
            ->with('success', 'Variant berhasil diupdate');
    }

    public function destroy(Product $product, ProductVariant $variant)
    {
        abort_if($variant->product_id !== $product->id, 404);

        $variant->delete();

        return back()->with('success', 'Variant berhasil dihapus');
    }
}
