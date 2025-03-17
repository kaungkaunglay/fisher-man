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
        Setting::updateOrCreate(['key' => 'contact_phone', 'value' => '0920-86-4516']);
        Setting::updateOrCreate(['key' => 'contact_address', 'value' => '株式会社Acompany 〒817-0702 長崎県対馬市上対馬町古里13-3']);
        Setting::updateOrCreate(['key' => 'logo', 'value' => 'fish-logo.jpg']);
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
            ['value' => json_encode(['banner1.jpg','banner2.jpg'])]
        );
        
    }
}
