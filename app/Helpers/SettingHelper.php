<?php

use App\Models\Setting;
use Illuminate\Support\Facades\DB; 

if (!function_exists('get_settings')) {
    function get_settings()
    {
        return DB::table('settings')->pluck('value', 'key')->toArray();
    }
}

if (!function_exists('setting')) {
    function setting($key, $default = [])
    {
        $setting = Setting::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }
}

if (!function_exists('set_setting')) {
    function set_setting($key, $value)
    {
        return Setting::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}