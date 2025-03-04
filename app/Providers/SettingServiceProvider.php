<?php 

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!Schema::hasTable('settings')) {
            return; 
        }
        $settings = get_settings();

        // Remove double quotes from keys and values
        $settings = array_map(function($value) {
            return trim($value, '"');
        }, $settings);

        $settings = array_combine(
            array_map(function($key) {
                return trim($key, '"');
            }, array_keys($settings)),
            $settings
        );
        config()->set('settings', $settings);
    }
}