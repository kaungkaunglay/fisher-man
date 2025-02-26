<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use App\Helpers\AuthHelper;
use App\Models\Sub_category;
use Illuminate\Http\Request;
use App\Rules\ValidExpireDate;
use App\Rules\ValidDayOfCaught;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', Auth::id())->paginate(10);
        return view('admin.products', compact('products'));
    }

    public function showallproducts(Request $request)
    {
        $sortBy = $request->get('sort_by', 'latest');
        $query = Product::query();

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

        $products = $query->get();

        $popular_shops = Shop::inRandomOrder()->take(4)->get();

        $random_products  = Product::inRandomOrder()->take(6)->get(); // Fetch 6 random products

        return view('home', compact('products','popular_shops', 'random_products'));
    }

    public function create()
    {
        $subCategories = Sub_category::all();
        return view('admin.product', compact('subCategories'));
    }

    public function store(Request $request)
    {

        $messages = [
            'sub_category_id.required' => 'Sub category field is required',
            'sub_category_id.exists' => 'Sub category does not exist',
            'name.required' => 'Name field is required',
            'name.string' => 'Name must be string',
            'name.max' => 'The username may not be greater than 255 characters.',
            'product_price.required' => 'Price field is required',
            'product_price.numeric' => 'Price must be numeric',
            'product_image.required' => 'Product image field is required',
            'product_image.image' => 'Product image must be image',
            'product_image.mimes' => 'Product image must be type of jpg,png',
            'product_image.max' => 'Product image must be less than 1024KB',
            'stock.required' => 'Stock field is required',
            'stock.integer' => 'Stock must be integer',
            'weight.required' => 'Weight field is required',
            'weight.numeric' => 'Weight must be numeric',
            'size.string' => 'Size must be string',
            'size.max' => 'Size must be less than 255 characters',
            'day_of_caught.date' => 'Day of caught must be date',
            'day_of_caught' => 'Day of caught must be valid date',
            'expiration_date.date' => 'Expiration date must be date',
            'expiration_date' => 'Expiration date must be valid date',
            'discount.numeric' => 'Discount must be numeric',
            'description.string' => 'Description must be string'
        ];


        $request->validate([
            'sub_category_id' => 'required|exists:sub_categories,id',
            'name' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'product_image' => 'required|nullable|image|mimes:png,jpg,jpeg|max:1024',
            'stock' => 'required|integer',
            'weight' => 'required|numeric',
            'size' => 'nullable|string|max:255',
            'day_of_caught' => ['nullable','date',new ValidDayOfCaught()],
            'expiration_date' => ['nullable','date',new ValidExpireDate()],
            'discount' => 'nullable|numeric',
            'description' => 'nullable|string',
        ],$messages);

        $folderPath = public_path('assets/products');
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        $imagePath = null;
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($folderPath, $imageName);
            $imagePath = $imageName;
        }

        Product::create([
            'user_id' => AuthHelper::id(), // Add the logged-in user ID
            'sub_category_id' => $request->sub_category_id,
            'name' => $request->name,
            'product_price' => $request->product_price,
            'product_image' => $imagePath,
            'stock' => $request->stock,
            'weight' => $request->weight,
            'size' => $request->size,
            'day_of_caught' => $request->day_of_caught,
            'expiration_date' => $request->expiration_date,
            'discount' => $request->discount,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.products')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::with('subCategory')->findOrFail($id);
        return view('product_detail', compact('product'));
    }

    public function adminshow($id)
    {
        $product = Product::with('subCategory')->findOrFail($id);
        return view('admin.product-detail', compact('product'));
    }

    public function discountProducts(Request $request)
    {
        $sortBy = $request->get('sort_by', 'latest');
        $query = Product::where('discount', '>', 0.00);

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

        $products = $query->get();
        return view('special-offer', compact('products'));
    }

    public function edit(Product $product)
    {
        $subCategories = Sub_category::all();
        return view('admin.product', compact('product', 'subCategories'));
    }

    public function update(Request $request, Product $product)
    {

        $messages = [
            'sub_category_id.exists' => 'Sub category does not exist',
            'name.string' => 'Name must be string',
            'name.max' => 'The username may not be greater than 255 characters.',
            'product_price.numeric' => 'Price must be numeric',
            'product_image.image' => 'Product image must be image',
            'product_image.mimes' => 'Product image must be type of jpeg,jpg,png',
            'product_image.max' => 'Product image must be less than 1024KB',
            'stock.integer' => 'Stock must be integer',
            'weight.numeric' => 'Weight must be numeric',
            'size.string' => 'Size must be string',
            'size.max' => 'Size must be less than 255 characters',
            'day_of_caught.date' => 'Day of caught must be date',
            'day_of_caught' => 'Day of caught must be valid date',
            'expiration_date.date' => 'Expiration date must be date',
            'expiration_date' => 'Expiration date must be valid date',
            'discount.numeric' => 'Discount must be numeric',
            'description.string' => 'Description must be string'
        ];

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'product_price' => 'sometimes|numeric',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'stock' => 'sometimes|integer',
            'weight' => 'sometimes|numeric',
            'size' => 'sometimes|string|max:255',
            'day_of_caught' => ['sometimes','date',new ValidDayOfCaught()],
            'expiration_date' => ['sometimes','date',new ValidExpireDate()],
            'discount' => 'nullable|numeric',
            'sub_category_id' => 'sometimes|integer|exists:sub_categories,id',
            'description' => 'sometimes|string',
        ]);

        if ($request->hasFile('product_image')) {
            $folderPath = public_path('assets/products');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $image = $request->file('product_image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            if ($product->product_image && file_exists(public_path($product->product_image))) {
                unlink(public_path($product->product_image));
            }

            $image->move($folderPath, $imageName);
            $product->product_image = $imageName;
        }

        $product->update($request->except('product_image'));

        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->product_image) {
            Storage::disk('public')->delete($product->product_image);
        }
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
    }

    public function ajaxSearch(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "{$query}%")->orderBy('name', 'asc')->get();

        return response()->json($products);
    }

    public function search(Request $request)
    {
        $query = $request->search_key;
        $products = Product::where('name', 'LIKE', "{$query}%")->orderBy('name', 'asc')->get();

        return view('product-search-results', compact('products', 'query'));
    }
}
