<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    public function run(): void
    {
        $nasi = Product::where('name', 'Nasi Goreng')->first();

        ProductVariant::create([
            'product_id' => $nasi->id,
            'name' => 'Pedas Level 1',
            'extra_price' => 1000,
        ]);

        ProductVariant::create([
            'product_id' => $nasi->id,
            'name' => 'Pedas Level 2',
            'extra_price' => 2000,
        ]);

        $teh = Product::where('name', 'Es Teh')->first();

        ProductVariant::create([
            'product_id' => $teh->id,
            'name' => 'dingin Level 1',
            'extra_price' => 1000,
        ]);

        ProductVariant::create([
            'product_id' => $teh->id,
            'name' => 'dingin Level 2',
            'extra_price' => 2000,
        ]);
    }
}
