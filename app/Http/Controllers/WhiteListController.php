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
            return response()->json(['status' => false, 'message' => '商品が見つかりません']);
        }

        $user = AuthHelper::user();

        if ($user->whitelists()->where('product_id', $product_id)->exists()) {
<<<<<<< HEAD
            return response()->json(['status' => false, 'message' => '商品はすでにホワイトリストに追加されています']); // Or a more appropriate message
=======
            return response()->json(['status' => false, 'message' => '"製品はすでにホワイトリストに追加されています。"']); // Or a more appropriate message
>>>>>>> 73103bb5a8c56a3780638bebaff72470d514a208
        }

        $user->whitelists()->attach($product_id);

<<<<<<< HEAD
        return response()->json(['status' => true, 'message' => '商品がホワイトリストに追加されました']);
=======
        return response()->json(['status' => true, 'message' => '商品がタグ付けされました']);
>>>>>>> 73103bb5a8c56a3780638bebaff72470d514a208
    }

    public function delete($product_id)
    {
        $user = AuthHelper::user();

        if (!Product::where('id', $product_id)->exists()) {
            return response()->json(['status' => false, 'message' => '商品が見つかりません']);
        }

        if (!$user->whitelists()->where('product_id', $product_id)->exists()) {
            return response()->json(['status' => false, 'message' => '商品はあなたのホワイトリストにありません']);
        }

        $user->whitelists()->detach($product_id);

        return response()->json(['status' => true, 'message' => '商品がホワイトリストから削除されました']);
    }
}
