<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Folder tujuan di storage
        $targetFolder = 'seeds/menu';
        $fullTargetPath = storage_path('app/public/' . $targetFolder);

        // 2. Buat folder jika belum ada
        if (!File::exists($fullTargetPath)) {
            File::makeDirectory($fullTargetPath, 0755, true);
        }

        // 3. Data produk
        $products = [
            [
                'name'  => 'Sup kepunyaan Labu',
                'price' => 50000,
                'stock' => 1000,
                'type'  => 'food',
                'image' => 'labu.jfif',
            ],
            [
                'name'  => 'Es campur Ngawi',
                'price' => 25000,
                'stock' => 1000,
                'type'  => 'drink',
                'image' => 'es.jfif',
            ],
        ];

        foreach ($products as $product) {

            // 4. Source gambar (dari public)
            $sourceFile = public_path('frontend/images/menu/' . $product['image']);

            // 5. Copy gambar ke storage
            if (File::exists($sourceFile)) {
                File::copy(
                    $sourceFile,
                    $fullTargetPath . '/' . $product['image']
                );
            }

            // 6. Simpan ke database
            Product::create([
                'name'  => $product['name'],
                'price' => $product['price'],
                'stock' => $product['stock'],
                'type'  => $product['type'],
                'image' => 'seeds/menu/' . $product['image'],
            ]);
        }
    }
}
