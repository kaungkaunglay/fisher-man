<?php

namespace Database\Seeders;

use App\Models\Sub_category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id' => 11, 'name' => '鮮魚', 'image' => 'storage/sub_categories/鮮魚.jpg', 'category_id' => 9, 'created_at' => '2025-02-23 01:02:16', 'updated_at' => '2025-02-23 01:02:16'],
            ['id' => 12, 'name' => 'マグロ', 'image' => 'storage/sub_categories/マグロ.jpg', 'category_id' => 9, 'created_at' => '2025-02-23 01:03:05', 'updated_at' => '2025-02-23 01:03:05'],
            ['id' => 13, 'name' => 'イカ・タコ', 'image' => 'storage/sub_categories/イカ・タコ.jpg', 'category_id' => 10, 'created_at' => '2025-02-23 01:03:54', 'updated_at' => '2025-02-23 01:03:54'],
            ['id' => 14, 'name' => '貝類', 'image' => 'storage/sub_categories/貝類.jpg', 'category_id' => 12, 'created_at' => '2025-02-23 01:05:32', 'updated_at' => '2025-02-23 01:05:32'],
            ['id' => 15, 'name' => 'ウニ・イクラ・白子・魚卵', 'image' => 'storage/sub_categories/ウニ・イクラ・白子・魚卵.jpg', 'category_id' => 12, 'created_at' => '2025-02-23 01:06:41', 'updated_at' => '2025-02-23 01:06:41'],
            ['id' => 16, 'name' => '海藻・干物・漬魚・ちりめん・練物類', 'image' => 'storage/sub_categories/海藻・干物・漬魚・ちりめん・練物類.jpg', 'category_id' => 12, 'created_at' => '2025-02-23 01:09:57', 'updated_at' => '2025-02-23 01:09:57'],
            ['id' => 17, 'name' => '珍味・惣菜・漬物', 'image' => 'storage/sub_categories/珍味・惣菜・漬物.jpg', 'category_id' => 15, 'created_at' => '2025-02-23 01:13:39', 'updated_at' => '2025-02-23 01:13:39'],
            ['id' => 18, 'name' => '調味料・わさび・飾り物', 'image' => 'storage/sub_categories/調味料・わさび・飾り物.jpg', 'category_id' => 15, 'created_at' => '2025-02-23 01:16:49', 'updated_at' => '2025-02-23 01:16:49'],
        ];

        foreach ($categories as $category) {
            Sub_category::create($category);
        }
    }
}
