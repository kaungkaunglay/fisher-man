<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sub_category;
use Illuminate\Http\Request;
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
        return view('home', compact('products'));
    }

    public function create()
    {
        $subCategories = Sub_category::all();
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
            'size' => 'nullable|string|max:255',
            'day_of_caught' => 'nullable|date',
            'expiration_date' => 'nullable|date',
            'discount' => 'nullable|numeric',
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
            'user_id' => Auth::id(), // Add the logged-in user ID
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
        $this->authorize('update', $product); // Ensure only owners can edit

        $subCategories = Sub_category::all();
        return view('admin.product', compact('product', 'subCategories'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product); // Ensure only owners can update

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'product_price' => 'sometimes|numeric',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'stock' => 'sometimes|integer',
            'weight' => 'sometimes|numeric',
            'size' => 'sometimes|string|max:255',
            'day_of_caught' => 'sometimes|date',
            'expiration_date' => 'sometimes|date',
            'discount' => 'nullable|numeric',
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

            if ($product->product_image && file_exists(public_path($product->product_image))) {
                unlink(public_path($product->product_image));
            }

            $image->move($folderPath, $imageName);
            $product->product_image = 'storage/products/' . $imageName;
        }

        $product->update($request->except('product_image'));

        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('delete', $product); // Ensure only owners can delete

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