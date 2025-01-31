<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $data = Categories::all();
        return view('admin.categories', compact('data'));
    }

    public function add_category(Request $request) {
        $category = new Categories;
    
        $category->category_name = $request->category;
    
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('categories'), $imageName);
            $category->image = $imageName;
        }
    
        $category->save();
        toastr()->closeButton()->addSuccess('Your category is successfully added');
    
        return redirect()->back();
    }
    
}
