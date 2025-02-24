<?php

namespace App\Helpers;

use App\Models\Translations;


class TranslationHelper{

    public static function translate($key)
    {
        $lang = app()->getLocale() ?? 'en';
        $translation = Translations::where('key', $key)->first();
        
        return $translation ? $translation->$lang : $key;
    }
}


