<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhiteListController extends Controller
{
    public function index()
    {

        $whitelist_products = AuthHelper::user()->whitelists ;
        $total = $whitelist_products->sum('product_price');

        return view('whitelist', compact('whitelist_products', 'total' ));
    }
    public function WhiteListCount()
    {
        $count = AuthHelper::check() ? AuthHelper::user()->whitelists()->count() : 0;
        return response()->json(['white_lists_count' => $count]);
    }
    public function store($product_id)
    {
        if (!Product::where('id', $product_id)->exists()) {
            return response()->json(['status' => false, 'message' => 'Product not found']);
        }

        $user = AuthHelper::user();

        if ($user->whitelists()->where('product_id', $product_id)->exists()) {
            return response()->json(['status' => false, 'message' => '"製品はすでにホワイトリストに追加されています。"']); // Or a more appropriate message
        }

        $user->whitelists()->attach($product_id);

        return response()->json(['status' => true, 'message' => '商品がタグ付けされました']);
    }

    public function delete($product_id)
    {
        $user = AuthHelper::user();

        if (!Product::where('id', $product_id)->exists()) {
            return response()->json(['status' => false, 'message' => 'Product not found']);
        }

        if (!$user->whitelists()->where('product_id', $product_id)->exists()) {
            return response()->json(['status' => false, 'message' => 'Product is not in your whitelist']);
        }

        $user->whitelists()->detach($product_id);

        return response()->json(['status' => true, 'message' => 'Product removed from whitelist']);
    }
}
