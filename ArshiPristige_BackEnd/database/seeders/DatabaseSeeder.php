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
        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
        ]);

        // Create default admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@arshipristige.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'is_active' => true,
            'is_verified' => true,
        ]);
    }
}
