<?php 

use Illuminate\Support\Facades\DB; 

if (!function_exists('get_settings')) {
    function get_settings()
    {
        return DB::table('settings')->pluck('value', 'key')->toArray();
    }
}