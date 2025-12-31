<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    public function run(): void
    {
        $labu = Product::where('name', 'Sup kepunyaan Labu')->first();

        ProductVariant::create([
            'product_id' => $labu->id,
            'name' => 'Normal',
            'extra_price' => 0,
        ]);
        ProductVariant::create([
            'product_id' => $labu->id,
            'name' => 'Pedas Level 1',
            'extra_price' => 1000,
        ]);

        ProductVariant::create([
            'product_id' => $labu->id,
            'name' => 'Pedas Level 2',
            'extra_price' => 2000,
        ]);

        $es = Product::where('name', 'Es campur Ngawi')->first();

        ProductVariant::create([
            'product_id' => $es->id,
            'name' => 'dingin Level 1',
            'extra_price' => 1000,
        ]);

        ProductVariant::create([
            'product_id' => $es->id,
            'name' => 'dingin Level 2',
            'extra_price' => 2000,
        ]);
    }
}
