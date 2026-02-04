<?php

namespace Database\Seeders;

use App\Models\CartItem;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@ecommerce.com'],
            [
                'name' => 'Admin User',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'password' => Hash::make('password123'),
            ]
        );

        Product::factory(50)->create();
        CartItem::factory(10)->create();
    }
}
