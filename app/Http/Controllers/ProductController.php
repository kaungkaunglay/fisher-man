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
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function showallproducts()
    {
        $products = Product::all();
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
            'size' => 'nullable|string|max:255',
            'day_of_caught' => 'nullable|date',
            'expiration_date' => 'nullable|date',
            'delivery_fee' => 'required|numeric',
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
            'delivery_fee' => $request->delivery_fee,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.products')->with('success', 'Product created successfully.');
    }


    public function show($id)
    {
        $product = Product::with('subCategory')->findOrFail($id);
        return view('admin.products.show', compact('product'));
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
            'delivery_fee' => 'sometimes|numeric',
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

}
