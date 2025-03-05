<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * how to run seeder
     * php artisan db:seed --class=AdminSeeder

     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'], // Check if this email exists
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
                'user_type' => 'admin', // Optional if you're using user_type
                'is_admin' => true, // Mark as admin
            ]
        );
    }
}
