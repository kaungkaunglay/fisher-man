<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function  show($id) {
        $category = Category::findOrFail($id);

        $subcategories = $category->subcategories()->with(['products' => function ($query) {
            $query->limit(6);
        }])->get();

        return view('category', compact('category', 'subcategories'));
    }

    public function create()
    {
        return view('admin.category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $folderPath = public_path('storage/categories');

        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        $image = $request->file('image');

        $imageName = time() . '_' . $image->getClientOriginalName();

        $image->move($folderPath, $imageName);

        Category::create([
            'category_name' => $request->category_name,
            'image' => 'storage/categories/' . $imageName,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.category', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
    
        $category->category_name = $request->category_name;
    
        if ($request->hasFile('image')) {
            $folderPath = public_path('storage/categories');
    
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0755, true);
            }
    
            $image = $request->file('image');
    
            $imageName = time() . '_' . $image->getClientOriginalName();
    
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }
    
            $image->move($folderPath, $imageName);
    
            $category->image = 'storage/categories/' . $imageName;
        }
    
        $category->save();
    
        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
    }
    
    public function destroy(Category $category)
    {
        Storage::delete('public/' . $category->image);
        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
    }
}
