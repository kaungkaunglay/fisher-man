<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        // dd($categories);
        return view('admin.categories',compact('categories'));
    }

    public function show($id)
    {
        $category = Category::with(['subCategories' => function ($query) {
            $query->with(['products' => function($productQuery){
                $productQuery->where('stock','>',0);
            }]);
        }])->findOrFail($id);

        $menu_category_id = $category->id;

        return view('category', compact('category','menu_category_id' ));
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
        ],[
            'category_name.required' => 'カテゴリ名は必須です。',
            'category_name.string' => 'カテゴリ名は文字列でなければなりません。',
            'category_name.max' => 'カテゴリ名は255文字以内で入力してください。',
            'image.required' => '画像は必須です。',
            'image.image' => '画像ファイルを指定してください。',
            'image.mimes' => '画像はjpeg、png、jpg、gif、svg形式である必要があります。',
            'image.max' => '画像のサイズは2048キロバイト以下である必要があります。',
        ]);

        $folderPath = public_path('assets/images/categories');
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move($folderPath, $imageName);

        Category::create([
            'category_name' => $request->category_name,
            'image' =>  $imageName,
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ],[
            'category_name.required' => 'カテゴリ名は必須です。',
            'category_name.string' => 'カテゴリ名は文字列でなければなりません。',
            'category_name.max' => 'カテゴリ名は255文字以内で入力してください。',
            'image.required' => '画像は必須です。',
            'image.image' => '画像ファイルを指定してください。',
            'image.mimes' => '画像はjpeg、png、jpg、gif、svg形式である必要があります。',
            'image.max' => '画像のサイズは2048キロバイト以下である必要があります。',
        ]);

        $category->category_name = $request->category_name;

        if ($request->hasFile('image')) {
            $folderPath = public_path('assets/categories');

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            $image->move($folderPath, $imageName);

            $category->image = 'assets/categories/' . $imageName;
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
