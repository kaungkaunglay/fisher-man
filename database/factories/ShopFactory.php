<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $images = [
            "assets/products/product1.png",
            "assets/products/product2.png"
        ];
        return [
            'user_id' => "2", // Creates a user if not provided
            'shop_name' => $this->faker->company,
            'trans_management' => $this->faker->randomElement(['Cash', 'PayPal', 'Bank Transfer']),
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'avatar' => $this->faker->randomElement($images),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
