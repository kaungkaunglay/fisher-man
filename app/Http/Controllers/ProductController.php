<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products', compact('products'));
    }

    public function showallproducts(Request $request)
    {
        // Retrieve the sort option from the query string
        $sortBy = $request->get('sort_by', 'latest'); // default to 'latest'

        // Build the query based on the sort option
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
            $query->latest(); // Default sorting by latest
        }

        // Get the sorted products with pagination (10 products per page)
        $products = $query->get();

        // Return view with data
        return view('home', compact('products'));
    }


    public function create()
    {
        $subCategories  = Sub_category::all();
        return view('admin.product', compact('subCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sub_category_id' => 'required|exists:sub_categories,id',
            'name' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|integer',
            'weight' => 'required|numeric',
            'size' => 'required|nullable|string|max:255',
            'day_of_caught' => 'required|nullable|date',
            'expiration_date' => 'required|nullable|date',
            'discount' => '',
            'description' => 'nullable|string',
        ]);

        $folderPath = public_path('storage/products');
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        $imagePath = null;
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($folderPath, $imageName);
            $imagePath = 'storage/products/' . $imageName;
        }

        Product::create([
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
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'product_price' => 'sometimes|numeric',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'stock' => 'sometimes|integer',
            'weight' => 'sometimes|numeric',
            'size' => 'sometimes|string|max:255',
            'day_of_caught' => 'sometimes|date',
            'expiration_date' => 'sometimes|date',
            'discount' => '',
            'sub_category_id' => 'sometimes|integer|exists:sub_categories,id',
            'description' => 'sometimes|string',
        ]);

        if ($request->hasFile('product_image')) {
            $folderPath = public_path('storage/products');

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $image = $request->file('product_image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Delete old image if exists
            if ($product->product_image && file_exists(public_path($product->product_image))) {
                unlink(public_path($product->product_image));
            }

            $image->move($folderPath, $imageName);
            $product->product_image = 'storage/products/' . $imageName;
        }

        // Update product details
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

    //product-search-ajax
    public function ajaxSearch(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'LIKE', "{$query}%")
        ->orderBy('name', 'asc')
        ->get();

        logger($products);

        return response()->json($products);
    }

    //product-search using button
    public function search(Request $request)
    {
        $query = $request->search_key;

        // Fetch products that match the query
        $products = Product::where('name', 'LIKE', "{$query}%")
        ->orderBy('name', 'asc')
        ->get();


        return view('product-search-results', compact('products', 'query'));
    }
}
