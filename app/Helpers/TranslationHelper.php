<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


if (!function_exists('trans')) {
    function trans($key)
    {
        // Get locale from session
        $locale = Session::get('locale', 'en');

        // Fetch translation from database
        $translation = DB::table('translations')->where('key', $key)->value($locale);

        // Return translation or fallback to key
        return $translation ?? $key;
    }
}


