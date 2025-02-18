<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Sub_category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\SubCategoryComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $view->with('categories', Category::all());
            $view->with('subcategories', Sub_category::all());

        });

        view()->composer('includes.aside', SubCategoryComposer::class);

        $this->preloadProductsToCache();
    }

    // preload cache for recomended products
    private function preloadProductsToCache()
    {
        // Fetch all products
        $products = Product::all();

        foreach ($products as $product) {
            // Save each product’s tracking data with a TTL of 1 day
            Cache::put("product:{$product->id}:data", [
                'visits' => 0,
                'ips'    => []  // Will hold IP addresses that have visited
            ], );

            //log
            // logger(Cache::get("product:{$product->id}:data"));
        }
    }
}
