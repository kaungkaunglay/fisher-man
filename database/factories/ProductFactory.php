<?php

namespace Database\Factories;

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
        $images = [
            "storage/products/fish1.png",
            "storage/products/fish2.png"
        ];
        return [
            'name' => $this->faker->name,
            'product_price' => $this->faker->randomNumber(3),
            'product_image' => $this->faker->randomElement($images),
            'stock' => $this->faker->randomNumber(2),
            'weight' => $this->faker->randomFloat(2, 1, 10),
            'size' => $this->faker->randomFloat(2, 1, 10),
            'day_of_caught' => $this->faker->date(),
            'expiration_date' => $this->faker->date(),
            'delivery_fee' => $this->faker->randomFloat(2, 1, 10),
            'sub_category_id' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->text
        ];
    }

    // $table->string('name');
    //         $table->integer('product_price');
    //         $table->string('product_image')->nullable();
    //         $table->integer('stock')->default(0);
    //         $table->decimal('weight', 8, 2)->nullable();
    //         $table->decimal('size', 8, 2)->nullable();
    //         $table->date('day_of_caught')->nullable();
    //         $table->date('expiration_date')->nullable();
    //         $table->decimal('delivery_fee', 8, 2)->default(0);
    //         $table->foreignId('sub_category_id')->constrained('sub_categories')->onDelete('cascade');
    //         $table->text('description')->nullable();
}
