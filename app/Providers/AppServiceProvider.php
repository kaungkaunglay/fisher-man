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
        try {
            DB::connection()->getPdo();

            if (Schema::hasTable('categories') && Schema::hasTable('sub_categories')) {
                $categories = Category::all();
                $subcategories = Sub_category::all();

                View::composer('*', function ($view) use ($categories, $subcategories) {
                    $view->with('categories', $categories);
                    $view->with('subcategories', $subcategories);
                });

                View::composer('includes.aside', SubCategoryComposer::class);
            }

            if (Schema::hasTable('translations')) {
                $translations = Translations::all()->mapWithKeys(function ($item) {
                    return [$item->key => $item->toArray()];
                })->toArray();

                Config::set('translations', $translations);
            }
        } catch (\Exception $e) {
            \Log::error('Database connection error: ' . $e->getMessage());
        }

        Paginator::useBootstrap();
    }


}
