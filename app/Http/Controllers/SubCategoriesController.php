<?php

namespace App\Http\Controllers;

use App\Models\Sub_category;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubCategoriesController extends Controller
{
    public function index()
    {
        $sub_categories = Sub_category::paginate(10);
        
        return view('admin.sub-categories', compact('sub_categories'));
    }

    public function showsubcategory(){
        $sub_categories = Sub_category::all();
        return view('includes.aside', compact('sub_categories'));
    }

    public function show($id, Request $request)
    {
        $sortBy = $request->get('sort_by', 'latest');
        $minPrice = $request->get('min_price', 1);
        $maxPrice = $request->get('max_price', 10000);

        $query = Product::where('sub_category_id', $id)->whereBetween('product_price', [$minPrice, $maxPrice])->where('status','approved');

        if ($sortBy === 'price_asc') {
            $query->orderBy('product_price', 'asc');
        } elseif ($sortBy === 'price_desc') {
            $query->orderBy('product_price', 'desc');
        } elseif ($sortBy === 'name_asc') {
            $query->orderBy('name', 'asc');
        } elseif ($sortBy === 'name_desc') {
            $query->orderBy('name', 'desc');
        } else {
            $query->latest();
        }

        $products = $query->paginate(2);

        $subCategory = Sub_category::findOrFail($id);

        $settings = Setting::pluck('value', 'key')->toArray();
        $bannerImages = isset($settings['site_banner_images']) ? json_decode($settings['site_banner_images']) : [];

        $menu_category_id = $subCategory->category_id;

        $category_id = Category::select('id')->where('id', $menu_category_id)->first();
       
        $subCategories = Sub_category::where('category_id', $category_id->id)->get();

        return view('sub_category', compact('subCategory', 'products','bannerImages','menu_category_id','subCategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.sub-category', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:sub_categories,name',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'category_id.required' => 'カテゴリ名は必須です。',
            'category_id.exists' => 'カテゴリIDが存在しません。',
            'name.required' => 'サブカテゴリ名は必須です。',
            'name.string' => 'サブカテゴリ名は文字列でなければなりません。',
            'name.max' => 'サブカテゴリ名は255文字以内で入力してください。',
            'name.unique' => 'サブカテゴリ名は一意である必要があります。',
            'image.required' => '画像は必須です。',
            'image.image' => '画像ファイルを指定してください。',
            'image.mimes' => '画像はjpeg、png、jpg、gif、svg形式である必要があります。',
            'image.max' => '画像のサイズは2048キロバイト以下である必要があります。',
        ]);

        $folderPath = public_path('assets/images/sub_categories');
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move($folderPath, $imageName);

        Sub_category::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.sub_categories')->with('success', 'Sub-category created successfully.');
    }

    public function edit(Sub_category $sub_category)
    {
        $categories = Category::all();
        return view('admin.sub-category', [
            'subcategory' => $sub_category,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Sub_category $sub_category)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:sub_categories,name',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ],[
            'category_id.required' => 'カテゴリIDは必須です。',
            'category_id.exists' => 'カテゴリIDが存在しません。',
            'name.required' => 'サブカテゴリ名は必須です。',
            'name.string' => 'サブカテゴリ名は文字列でなければなりません。',
            'name.max' => 'サブカテゴリ名は255文字以内で入力してください。',
            'name.unique' => 'サブカテゴリ名は一意である必要があります。',
            'image.required' => '画像ファイルを指定してください。',
            'image.image' => '画像ファイルを指定してください。',
            'image.mimes' => '画像はjpeg、png、jpg、gif、svg形式である必要があります。',
            'image.max' => '画像のサイズは2048キロバイト以下である必要があります。',
        ]);

        $sub_category->category_id = $request->category_id;
        $sub_category->name = $request->name;

        if ($request->hasFile('image')) {
            $folderPath = public_path('assets/images/sub_categories');

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            if ($sub_category->image && file_exists(public_path($sub_category->image))) {
                unlink(public_path($sub_category->image));
            }

            $image->move($folderPath, $imageName);
            $sub_category->image = $imageName;
        }

        $sub_category->save();

        return redirect()->route('admin.sub_categories')->with('success', 'Sub-category updated successfully.');
    }

    public function destroy(Sub_category $sub_category)
    {
        Storage::delete('public/' . $sub_category->image);
        $sub_category->delete();

        return redirect()->route('admin.sub_categories')->with('success', 'Sub-category deleted successfully.');
    }
}
