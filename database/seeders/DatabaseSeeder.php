<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\RolePermission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AdminUserSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            ProductSeeder::class,
            SettingSeeder::class,
            ShopSeeder::class,
            TranslationSeeder::class,
            PermissionSeeder::class,
            RolePermissionSeeder::class,
            ContactSeeder::class,
            PaymentSeeder::class
        ]);
    }
}
