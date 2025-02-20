<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;

if (!function_exists('translate')) {
    function translate($key)
    {
        $lang = app()->getLocale();
        $translation = DB::table('translations')->where('key', $key)->first();
        return $translation ? $translation->$lang : $key;
    }
}


