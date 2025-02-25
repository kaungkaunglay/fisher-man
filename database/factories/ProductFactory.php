<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Product::class;
    public function definition(): array
    {
        $user = Users::inRandomOrder()->first();

        $images = [
            "assets/products/product1.png",
            "assets/products/product2.png"
        ];
        return [
            'name' => $this->faker->name,
            'product_price' => $this->faker->randomNumber(4),
            'product_image' => $this->faker->randomElement($images),
            'stock' => $this->faker->randomNumber(2),
            'weight' => $this->faker->randomFloat(2, 1, 10),
            'size' => $this->faker->randomFloat(2, 1, 10),
            'day_of_caught' => $this->faker->date(),
            'discount' => $this->faker->randomFloat(2,1,10),
            'expiration_date' => $this->faker->date(),
            'sub_category_id' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->text,
            'user_id' => "2"
        ];
    }

}
