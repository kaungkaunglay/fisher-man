<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Category::class;
    public function definition(): array
    {
        $category_name = [
            'Fresh Fish',
            'Frozen Fish',
            'Shellfish',
            'Sushi',
            'Sashimi',
            'Canned Fish',
            'Seafood',
            'Aquarium Fish'
        ];
        return [
            'category_name' => $this->faker->unique()->randomElement($category_name),
            'image' => $this->faker->imageUrl(640, 480, 'animals', true)
        ];
    }
}
