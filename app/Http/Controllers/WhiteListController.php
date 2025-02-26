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
        // $auth = AuthHelper::check();
        // $whitelist_products = $auth ? AuthHelper::user()->whitelists : Product::whereIn('id', session('white_lists', []))->get();
        // $total = $whitelist_products->sum('product_price');

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

        // if (!AuthHelper::check()) {
        //     $white_lists = session('white_lists', []);

        //     if (in_array($product_id, $white_lists)) {
        //         // Remove from whitelist
        //         $white_lists = array_filter($white_lists, function ($item) use ($product_id) {
        //             return $item != $product_id;
        //         });
        //         session(['white_lists' => $white_lists]);
        //         return response()->json(['status' => true, 'message' => 'Product removed from whitelist']);
        //     }

        //     // Add to whitelist
        //     session()->push('white_lists', $product_id);
        //     return response()->json(['status' => true, 'message' => 'Product added to whitelist']);
        // }

        $user = AuthHelper::user();

        if ($user->whitelists()->where('product_id', $product_id)->exists()) {
            // Remove from user's whitelist
            // $user->whitelists()->detach($product_id);
            return response()->json(['status' => true, 'message' => 'Product already added to whitelist']);
        }

        // Add to user's whitelist
        $user->whitelists()->attach($product_id);
        return response()->json(['status' => true, 'message' => 'Product added to whitelist']);
    }


    public function delete($product_id)
    {
        // if (!AuthHelper::check()) {

        //     $white_lists = session('white_lists', []);
        //     $white_lists = array_diff($white_lists, [$product_id]);
        //     $white_lists = array_values($white_lists);
        //     session(['white_lists' => $white_lists]);

        //     return response()->json(['status' => true, 'message' => 'Product removed from whitelist']);
        // }

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
