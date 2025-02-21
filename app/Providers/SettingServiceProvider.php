<?php 

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        logger($settings);  
        config()->set('settings', $settings);
    }
}