<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Translations;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
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
        if(Schema::hasTable('categories') && Schema::hasTable('sub_categories')){
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
        }


           

      

       

        // $this->preloadProductsToCache();

        Paginator::useBootstrap();

        if (Schema::hasTable('translations')) {
            $translations = Translations::all()->mapWithKeys(function ($item) {
                return [$item->key => $item->toArray()];
            })->toArray();

            Config::set('translations', $translations);
        }
    }


}
