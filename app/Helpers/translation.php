<?php

use App\Models\Translations;

if(!function_exists('trans_lang')){
    function trans_lang($key)
    {
        $lang = app()->getLocale() ?? 'jp';
    $translation = Translations::where('key', $key)->first();
        logger($lang);
        return $translation ? $translation->$lang : $key;
    }
}

