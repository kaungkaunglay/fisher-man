<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('P@$$w0rd'),
            ],
            [
                'username' => 'seller',
                'email' => 'seller@gmail.com',
                'address' => 'Cambodia',
                'password' => bcrypt('P@$$w0rd'),
            ],
        [
                'username' => 'buyer',
                'email' => 'buyer@gmail.com',
                'address' => 'Cambodia',
                'password' => bcrypt('P@$$w0rd'),
            ]
        ];

        foreach ($users as $idx => $user) {
            $user = Users::create($user);
            $user->roles()->attach($idx + 1);
        }
    }
}
