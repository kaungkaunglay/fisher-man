<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::create(['name' => 'Cash on delivery','status' => true]);
        Payment::create(['name' => 'Bank transfer','status' => true]);
    }
}
