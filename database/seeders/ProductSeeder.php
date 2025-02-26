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
        $products = [
            [
                'name' => 'Product 1',
                'description' => 'Description for product 1',
                'price' => 100,
            ],
            [
                'name' => 'Product 2',
                'description' => 'Description for product 2',
                'price' => 200,
            ],
            [
                'name' => 'Product 3',
                'description' => 'Description for product 3',
                'price' => 300,
            ],
            // Add more products as needed...
        ];

        foreach ($products as $product) {
            $product['user_id'] = $users->random()->id; // Assign a random user
            Product::create($product);
        }
    }
}
