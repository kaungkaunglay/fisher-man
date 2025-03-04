<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Sub_category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\SubCategoryComposer;
use Illuminate\Pagination\Paginator;

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
            // Cache categories and subcategories for a specified duration (e.g., 60 minutes)
        $categories = Cache::remember('categories', 60 * 60, function () {
            return Category::all();
        });

        $subcategories = Cache::remember('subcategories', 60 * 60, function () {
            return Sub_category::all();
        });

        // Share cached data with all views
        View::composer('*', function ($view) use ($categories, $subcategories) {
            $view->with('categories', $categories);
            $view->with('subcategories', $subcategories);
        });

        View::composer('includes.aside', SubCategoryComposer::class);

        // $this->preloadProductsToCache();

        Paginator::useBootstrap();
    }

   
}
