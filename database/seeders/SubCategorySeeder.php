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
        Sub_category::factory()->count(10)->create();
    }
}
