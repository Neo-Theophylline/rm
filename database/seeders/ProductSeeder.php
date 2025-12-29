<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Nasi Goreng',
            'price' => 20000,
            'stock' => 50,
            'type' => 'food',
        ]);

        Product::create([
            'name' => 'Es Teh',
            'price' => 5000,
            'stock' => 100,
            'type' => 'drink',
        ]);
    }
}
