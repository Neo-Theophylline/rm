<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class admin extends Seeder
{
    public function run(): void
    {
         // 1. Definisikan path folder tujuan di storage
        $targetFolder = 'seeds/profile';
        $fullTargetPass = storage_path('app/public/' . $targetFolder);

        // 2. Buat folder di storage jika belum ada
        if (!File::exists($fullTargetPass)) {
            File::makeDirectory($fullTargetPass, 0755, true);
        }

        // 3. Sumber file foto
        $sourceFile = public_path('frontend/images/profile/waiter.jpeg');
        $fileName = 'waiter.jpeg';

        // 4. Salin file dari folder public ke folder storage (agar sinkron)
        if (File::exists($sourceFile)) {
            File::copy($sourceFile, $fullTargetPass . '/' . $fileName);
        }

        // Data Admin
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1'),
            'image' => 'seeds/profile/waiter.jpeg',
            'role' => 'admin',
            'status' => 'active',
        ]);

        // Data Waiter
        User::create([
            'name' => 'waiter',
            'email' => 'waiter@gmail.com',
            'password' => Hash::make('1'),
            'image' => 'seeds/profile/waiter.jpeg',
            'role' => 'waiter',
            'status' => 'active',
        ]);
    }
}
