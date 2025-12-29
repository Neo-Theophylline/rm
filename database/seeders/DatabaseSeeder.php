<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            admin::class,
            TableSeeder::class,
            ProductSeeder::class,
            ProductVariantSeeder::class,
        ]);
    }
}
