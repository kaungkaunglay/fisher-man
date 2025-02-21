<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // add en and jp translations example
        $translations = [
            [
                'key' => 'welcome',
                'en' => 'Welcome',
                'jp' => 'ようこそ',
            ],
            [
                'key' => 'hello',
                'en' => 'Hello',
                'jp' => 'こんにちは',
            ],
            [
                'key' => 'goodbye',
                'en' => 'Goodbye',
                'jp' => 'さようなら',
            ],
            [
                'key' => 'home',
                'en' => 'Home',
                'jp' => 'ホーム',
            ],
            [
                'key' => 'add_product', 
                'en' => 'Add Product',
                'jp' => '商品を追加',
            ]
        ];
        foreach($translations as $translation) {
            \App\Models\Translations::create($translation);
        }
    }
}
