<?php

namespace Database\Seeders;

use App\Models\Sub_category;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [Category::where('name','鮮魚')->first()->id,Category::where('name','貝類')->first()->id];
    
        $categories = [
            ['スルメ','水イカ','アマダイ','レンコ','ブリ','ワラサ','ヤズ','ヒラス','平子','タイ','マグロ（30kg以上）','ヨコワ（30kg以上）','ハガツオ','スジカツオ','ビンナガ','丸トビ','角トビ','アジ','サバ','クエ','イサキ','アカムツ','ナメル','チカメキントキ','ヒラメ','メンボ','イシダイ','イシガキダイ','タチウオ','サワラ','沖メバル','ダルマ','カマス','活きアナゴ'],
            ['サザエ','アワビ']
        ];

        foreach ($categories as $index => $category) {
            foreach($category as $subcategory){
                Sub_category::create([
                    'category_id'=> $categories[$index],
                    'name' => $subcategory
                ]);
            }
        }
    }
}
