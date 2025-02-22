<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::updateOrCreate(['name' => 'user_management', 'description' => 'user_management can do']);
        Permission::updateOrCreate(['name' => 'product_management', 'description' => 'product_management can do']);
        Permission::updateOrCreate(['name' => 'shop_management', 'description' => 'shop_management can do']);
        Permission::updateOrCreate(['name' => 'faqs_management', 'description' => 'faqs_management can do']);
    }
}
