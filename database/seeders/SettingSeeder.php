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
        Setting::updateOrCreate(['key' => 'contact_email', 'value' => 'r-mekiki@gmail.com']);
        Setting::updateOrCreate(['key' => 'contact_phone', 'value' => '+959796593367']);
        Setting::updateOrCreate(['key' => 'contact_address', 'value' => 'Cambodia']);
        Setting::updateOrCreate(['key' => 'logo', 'value' => 'logo.png']);
        Setting::updateOrCreate(['key' => 'cache_time_out', 'value' => '3600']);
    }
}
