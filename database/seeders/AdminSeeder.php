<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\hash;
use App\Models\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * how to run seeder
     * php artisan db:seed --class=AdminSeeder

     */
    public function run(): void
    {
        // Create or update the admin user
        $user = User::updateOrCreate(
            ['email' => 'admin@gmail.com'], // Check if this email exists
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
                'user_type' => 'admin',
                'is_admin' => true,
            ]
        );

        // Create corresponding 'admin' entry if missing
        Admin::updateOrCreate(
            ['user_id' => $user->id],
            [
                'contact' => '1234567890', // Add a default phone number
                'photo' => 'default.jpg', // Add a default photo if needed
            ]
        );
    }
}
