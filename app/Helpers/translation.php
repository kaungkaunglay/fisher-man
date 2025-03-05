<?php

use App\Models\Translations;

if(!function_exists('trans_lang')){
    function trans_lang($key)
    {
        $lang = app()->getLocale() ?? 'jp';
        $translations = config('translations');

        return $translations[$key][$lang] ?? $key;
    }
}

