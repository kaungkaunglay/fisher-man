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
        Setting::updateOrCreate(['key' => 'contact_email', 'value' => 'support@r-mekiki.com']);
        Setting::updateOrCreate(['key' => 'contact_phone', 'value' => '+819012345678']);
        Setting::updateOrCreate(['key' => 'contact_address', 'value' => 'Cambodia']);
        Setting::updateOrCreate(['key' => 'logo', 'value' => 'logo.png']);
        Setting::updateOrCreate(['key' => 'slogan', 'value' => '私たちについて: 信頼出来る新鮮な海産物を提供します']);
        Setting::updateOrCreate(['key' => 'policy', 'value' => 'This is our policy.']);
        Setting::updateOrCreate(['key' => 'cache_time_out', 'value' => '3600']);
        Setting::updateOrCreate(
            ['key' => 'social_links'],
            ['value' => json_encode([
                ['platform' => 'Facebook', 'url' => 'https://facebook.com', 'icon' => 'fa-facebook'],
                ['platform' => 'Twitter', 'url' => 'https://twitter.com', 'icon' => 'fa-twitter'],
                ['platform' => 'Instagram', 'url' => 'https://instagram.com', 'icon' => 'fa-instagram'],
            ])]
        );
        // Add default banner image
        Setting::updateOrCreate(
            ['key' => 'site_banner_images'],
            ['value' => json_encode(['Rectangle_90.jpg','Rectangle_90.jpg','Rectangle_90.jpg'])]
        );
        
    }
}
