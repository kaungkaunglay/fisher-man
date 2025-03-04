<?php

namespace Database\Seeders;

use App\Models\wishList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WishListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        wishList::factory()->count(30)->create();
    }
}
