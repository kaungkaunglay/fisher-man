<?php

namespace App\Providers;

use App\Http\ViewComposers\SubCategoryComposer;
use App\Models\Category;
use App\Models\Sub_category;
use Illuminate\Support\ServiceProvider;

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
    }
}
