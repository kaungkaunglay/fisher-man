<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sub_category>
 */
class Sub_categoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category_ids = Category::pluck('id')->toArray();
        return [
            'name' => $this->faker->name,
            'image' => $this->faker->imageUrl(640, 480, 'animals', true),
            'category_id' => $this->faker->randomElement($category_ids)
        ];
    }
}
