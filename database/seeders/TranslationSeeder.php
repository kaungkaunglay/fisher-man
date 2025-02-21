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
                'key' => 'special_offer',
                'en' => 'Special Offer',
                'jp' => 'セール',
            ],
            [
                'key' => 'support',
                'en' => 'Support',
                'jp' => 'サポート',
            ],
            [
                'key' => 'see_more_product',
                'en' => 'See More Product',
                'jp' => 'もっと商品を見る',
            ],
            [
                'key' => 'recomended_product',
                'en' => 'Recomended Product',
                'jp' => 'おすすめ商品',
            ],
            [
                'key' => 'popular_shop',
                'en' => 'Popular & Top Rating Shop',
                'jp' => '人気 & 高評価のショップ',
            ],
            [
                'key' => 'all_products',
                'en' => 'All Products',
                'jp' => 'すべての商品',
            ],
            [
                'key' => 'seemore',
                'en' => 'See More',
                'jp' => 'さらに見る',
            ],
            [
                'key' => 'sortby',
                'en' => 'Sort by',
                'jp' => '並び替え',
            ],
            [
                'key' => 'price_l_h',
                'en' => 'Price : Low to Height',
                'jp' => '価格: 安い順',
            ],
            [
                'key' => 'price_h_l',
                'en' => 'Price : Height to Low',
                'jp' => '価格: 高い順',
            ],
            [
                'key' => 'name_a_z',
                'en' => 'Name : A to Z',
                'jp' => '名前: A → Z',
            ],
            [
                'key' => 'name_z_a',
                'en' => 'Name : Z to A',
                'jp' => '名前: Z → A',
            ],
            [
                'key' => 'latest',
                'en' => 'Latest',
                'jp' => '最新順',
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
