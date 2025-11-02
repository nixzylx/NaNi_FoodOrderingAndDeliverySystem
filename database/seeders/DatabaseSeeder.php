<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 🔹 Admin Account
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'System Admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        // 🔹 Driver Account
        User::updateOrCreate(
            ['email' => 'driver@example.com'],
            [
                'name' => 'Delivery Driver',
                'password' => Hash::make('driver123'),
                'role' => 'driver',
            ]
        );

        // 🔹 Customer Account
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('user123'),
                'role' => 'customer',
            ]
        );
    }
}
