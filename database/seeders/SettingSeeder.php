<?php

namespace Database\Seeders;

use App\Models\Setting;
use Database\Factories\SettingFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::factory()->create(['key' => 'contact_email', 'value' => 'r-mekiki@gmail.com']);
        Setting::factory()->create(['key' => 'contact_phone', 'value' => '+959796593367']);
        Setting::factory()->create(['key' => 'contact_address', 'value' => 'Cambodia']);
        Setting::factory()->create(['key' => 'logo', 'value' => 'logo.png']);
        Setting::factory()->create(['key' => 'cache_time_out', 'value' => 3600]);
    }
}
