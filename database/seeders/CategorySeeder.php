<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => '鮮魚'],
            ['category_name' => '貝類'],
            ['category_name' => '加工品']
        ];

        foreach ($categories as $category) {
            Category::create( $category);
        }
    }
}
