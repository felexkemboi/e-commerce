<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;

class CartItemFactory extends Factory
{
    protected $model = CartItem::class;

    public function definition()
    {
        $productIds = Product::pluck('id')->toArray();

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'product_id' => $this->faker->randomElement($productIds),
            'quantity' => $this->faker->numberBetween(1, 5),
        ];
    }
}
