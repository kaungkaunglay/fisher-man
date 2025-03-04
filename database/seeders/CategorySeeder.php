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
            ['id' => 9, 'category_name' => '青物', 'image' => '青物.jpg', 'created_at' => '2025-02-23 00:49:25', 'updated_at' => '2025-02-23 00:49:25'],
            ['id' => 10, 'category_name' => 'イカ', 'image' => 'イカ.jpg', 'created_at' => '2025-02-23 00:50:33', 'updated_at' => '2025-02-23 00:50:33'],
            ['id' => 11, 'category_name' => '白身魚', 'image' => '白身魚.jpeg', 'created_at' => '2025-02-23 00:56:20', 'updated_at' => '2025-02-23 00:56:20'],
            ['id' => 12, 'category_name' => '魚介類', 'image' => '魚介類.jpg', 'created_at' => '2025-02-23 00:56:58', 'updated_at' => '2025-02-23 00:56:58'],
            ['id' => 13, 'category_name' => 'エビ', 'image' => 'エビ.jpg', 'created_at' => '2025-02-23 00:57:29', 'updated_at' => '2025-02-23 00:57:29'],
            ['id' => 14, 'category_name' => 'たこ', 'image' => 'たこ.jpg', 'created_at' => '2025-02-23 00:58:03', 'updated_at' => '2025-02-23 00:58:03'],
            ['id' => 15, 'category_name' => 'その他', 'image' => 'その他.jpg', 'created_at' => '2025-02-23 01:12:26', 'updated_at' => '2025-02-23 02:34:32'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
