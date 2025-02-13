<?php
namespace App\Http\ViewComposers;

use App\Models\Sub_category;
use Illuminate\View\View;

class SubCategoryComposer
{
    public function compose(View $view)
    {
        $view->with('subcategories', Sub_category::all());
    }
}
