<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use App\Helpers\AuthHelper;
use App\Models\Setting;
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
        $products = AuthHelper::user()->products()->paginate(10);
        return view('admin.products', compact('products'));
    }

    public function sortByProduct(Request $request)
    {
        $sortBy = $request->get('sort');
        $query = Product::query();
 
        if ($sortBy === 'price_l_h') {
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

        return response()->json($products);
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

        $popular_shops = Shop::where('status','approved')->inRandomOrder()->take(4)->get();

        $random_products  = Product::inRandomOrder()->take(6)->get(); // Fetch 6 random products

        $settings = Setting::pluck('value', 'key')->toArray();
        $bannerImages = isset($settings['site_banner_images']) ? json_decode($settings['site_banner_images']) : [];

        return view('home', compact('products','popular_shops', 'random_products','bannerImages'));
    }

    public function updateStatus(Request $request)
    {
        $product = Product::find($request->id);
        if ($product) {
            $product->status = $request->status;
            $product->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }


    public function create()
    {
        $subCategories = Sub_category::all();
        return view('admin.product', compact('subCategories'));
    }

    public function pendingProducts()
    {
        $products = Product::where('status', 'pending')->paginate(10);
        return view('admin.pending-products', compact('products'));
    }

    public function store(Request $request)
    {

        $messages = [
            'sub_category_id.required' => 'サブカテゴリーフィールドは必須です',
            'sub_category_id.exists' => 'サブカテゴリーは存在しません',
            'name.required' => '名前フィールドは必須です',
            'name.string' => '名前は文字列でなければなりません',
            'name.max' => '名前は255文字以内でなければなりません',
            'product_price.required' => '価格フィールドは必須です',
            'product_price.numeric' => '価格は数値でなければなりません',
            'product_price.min' => '価格は1以上でなければなりません',
            'product_image.required' => '商品画像フィールドは必須です',
            'product_image.image' => '商品画像は画像でなければなりません',
            'product_image.mimes' => '商品画像はjpgまたはpngタイプでなければなりません',
            'product_image.max' => '商品画像は1024KB以下でなければなりません',
            'stock.required' => '在庫フィールドは必須です',
            'stock.integer' => '在庫は整数でなければなりません',
            'weight.required' => '重量フィールドは必須です',
            'weight.numeric' => '重量は数値でなければなりません',
            'weight.min' => '重量は1以上でなければなりません',
            'size.string' => 'サイズは文字列でなければなりません',
            'size.max' => '小数点以下は入力できません',
            'size.min' => 'サイズは1文字以上でなければなりません',
            'day_of_caught.date' => '捕獲日付は日付形式でなければなりません',
            'day_of_caught' => '捕獲日は有効な日付でなければなりません',
            'expiration_date.date' => '賞味期限は日付形式でなければなりません',
            'expiration_date' => '賞味期限は有効な日付でなければなりません',
            'discount.numeric' => '割引は数値でなければなりません',
            'discount.min' => '割引は 0 以上である必要があります',
            'discount.max' => '割引フィールドは商品価格より大きくすることはできません。',
            'status.string' => 'ステータスは必須です',
        ];
        $request->validate([
            'sub_category_id' => 'required|exists:sub_categories,id',
            'name' => 'required|string|max:255',
            'product_price' => 'required|numeric|min:1', // Ensure price is greater than 0
            'product_image' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'stock' => 'required|integer',
            'weight' => 'required|numeric|min:1', // Ensure weight is greater than 0
            'size' => 'nullable|numeric|min:1|max:255',
            'day_of_caught' => ['nullable','date',new ValidDayOfCaught()],
            'expiration_date' => ['nullable','date',new ValidExpireDate()],
            'discount' => 'nullable|numeric|min:0|max:' . $request->product_price, // Ensure discount is not greater than price
            'description' => 'nullable|string',
            'status' => 'nullable|string',
        ], $messages);


        // $request->validate([
        //     'sub_category_id' => 'required|exists:sub_categories,id',
        //     'name' => 'required|string|max:255',
        //     'product_price' => 'required|numeric|min:0',
        //     'product_image' => 'required|image|mimes:png,jpg,jpeg|max:1024',
        //     'stock' => 'required|integer',
        //     'weight' => 'required|numeric',
        //     'size' => 'nullable|string|max:255',
        //     'day_of_caught' => ['nullable','date',new ValidDayOfCaught()],
        //     'expiration_date' => ['nullable','date',new ValidExpireDate()],
        //     'discount' => 'nullable|numeric|min:0',
        //     'description' => 'nullable|string',
        //     'status' => 'nullable|string',
        // ], $messages);

          // Sanitize input to remove script injections
    $productName = strip_tags($request->name); // Removes HTML tags

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
            'name' => $productName,
            'product_price' => $request->product_price,
            'product_image' => $imagePath,
            'stock' => $request->stock,
            'weight' => $request->weight,
            'size' => $request->size,
            'day_of_caught' => $request->day_of_caught,
            'expiration_date' => $request->expiration_date,
            'discount' => $request->discount ?? 0,
            'description' => $request->description, // Sanitize description
            'status' => $request->status,
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
            'sub_category_id.exists' => 'サブカテゴリーは存在しません',
            'name.string' => '名前は文字列でなければなりません',
            'name.max' => '名前は255文字以内でなければなりません',
            'product_price.numeric' => '価格は数値でなければなりません',
            'product_image.image' => '商品画像は画像でなければなりません',
            'product_image.mimes' => '商品画像はjpeg、jpg、pngタイプでなければなりません',
            'product_image.max' => '商品画像は1024KB以下でなければなりません',
            'stock.integer' => '在庫は整数でなければなりません',
            'weight.numeric' => '重量は数値でなければなりません',
            'size.string' => 'サイズは文字列でなければなりません',
            'size.max' => '小数点以下は入力できません',
            'day_of_caught.date' => '捕獲日付は日付形式でなければなりません',
            'day_of_caught' => 'day of caught must be less than or equal to today',
            'day_of_caught.after_or_equal' => '捕獲日は今日以降でなければなりません',
            'expiration_date.date' => '賞味期限は日付形式でなければなりません',
            'expiration_date' => 'expiration_date must be greater than or equal to today',
            'expiration_date.after_or_equal' => '賞味期限は今日以降でなければなりません',
            'discount.numeric' => '割引は数値でなければなりません',
            'description.string' => '説明は文字列でなければなりません',
            'discount.max' => '割引フィールドは商品価格より大きくすることはできません。',
            'status.string' => 'ステータスは文字列でなければなりません',
        ];

    $request->validate([
        'name' => 'sometimes|string|max:255',
        'product_price' => 'sometimes|numeric|min:1',
        'product_image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        'stock' => 'sometimes|integer',
        'weight' => 'sometimes|numeric|min:1',
        'size' => 'sometimes|numeric|min:1|max:255',
        'day_of_caught' => ['sometimes', 'date', new ValidDayOfCaught()],
        'expiration_date' => ['sometimes', 'date', new ValidExpireDate()],
        'discount' => 'nullable|numeric|min:0|max:' . $request->product_price, // Ensure discount is not greater than price',
        'sub_category_id' => 'sometimes|integer|exists:sub_categories,id',
        'description' => 'nullable|sometimes|string',
    ], $messages);


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

        logger($product);

        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->product_image) {
            Storage::disk('public')->delete($product->product_image);
        }
        $product->delete();

        return back()->with('success', 'Product deleted successfully.');
    }

    public function ajaxSearch(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "{$query}%")->where('status', 'approved')->orderBy('name', 'asc')->get();

        return response()->json($products);
    }

    public function search(Request $request)
    {
        $query = $request->search_key;
        $products = Product::where('name', 'LIKE', "{$query}%")->where('status', 'approved')->orderBy('name', 'asc')->get();

        return view('product-search-results', compact('products', 'query'));
    }

    //product-sorting
    public function sortBy(Request $request)
    {
        $sort = $request->get('sort', 'latest'); // Default sorting
        $products = Product::select('*')
                ->selectRaw('(product_price - discount) as discounted_price');

        // Sorting logic
        if ($sort == 'low_to_high') {
            $products->orderBy('discounted_price', 'asc');
        } elseif ($sort == 'high_to_low') {
            $products->orderBy('discounted_price', 'desc');
        } elseif ($sort == 'latest') {
            $products->orderBy('created_at', 'desc');
        } elseif ($sort == 'name_asc') {
            $products->orderBy('name', 'asc');
        } elseif ($sort == 'name_desc') {
            $products->orderBy('name', 'desc');
        }

        $products = $products->get();

        // return response()->json($products);
        return response()->json($products);

    }
}
