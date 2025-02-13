<?php

namespace Database\Factories;

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
        return [
            'name' => $this->faker->name,
            'image' => $this->faker->imageUrl(640, 480, 'animals', true),
            'category_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
