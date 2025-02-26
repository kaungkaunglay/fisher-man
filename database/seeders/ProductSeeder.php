<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Users;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all users
        $users = Users::select('users.*')
                    ->join('user_roles', 'users.id', '=','user_roles.user_id')
                    ->where('user_roles.role_id', 2)
                    ->get();

        // Ensure there are users to assign
        if ($users->isEmpty()) {
            $this->command->info('No users found. Please create users before seeding products.');
            return;
        }

        // Create 50 products with a random user_id
        Product::factory()->count(50)->make()->each(function ($product) use ($users) {
            $product->user_id = $users->random()->id; // Assign a random user to each product
            $product->save(); // Save the product with the assigned user_id
        });
    }
}
