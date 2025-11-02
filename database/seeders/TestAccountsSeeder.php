<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
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

        // 🔹 Test Customer Account
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
