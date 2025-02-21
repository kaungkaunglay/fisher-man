<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Setting::class;
    public function definition(): array
    {
        return [
            'key' => $this->faker->unique()->randomElement(['contact_email', 'contact_phone', 'contact_address', 'logo','policy']),
            'value' => $this->faker->word,
        ];
    }
}
