<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Table;

class TableSeeder extends Seeder
{
    public function run(): void
    {
        Table::insert([
            [
                'table_name' => 'Meja 01',
                'floor' => 'Lantai 1',
                'status' => 'available',
                'type' => 'premium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'table_name' => 'Meja 02',
                'floor' => 'Lantai 1',
                'status' => 'available',
                'type' => 'regular',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'table_name' => 'Meja 03',
                'floor' => 'Lantai 2',
                'status' => 'available',
                'type' => 'regular',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
