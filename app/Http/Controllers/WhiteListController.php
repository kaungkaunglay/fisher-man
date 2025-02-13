<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhiteListController extends Controller
{
    public function index()
    {

        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user = Auth::user();

        $whitelist_products = $user->whitelists;
        $total = 0;
        $total = $whitelist_products->sum('product_price');

        return view('whitelist',compact('whitelist_products','total'));
    }

    public function store($product_id)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user = Auth::user();

        $product = Product::find($product_id);
        if(!$product){
            return response()->json(['status' => false, 'message' => 'Product not found']);
        }

        if($user->whitelists->where('product_id',$product_id)->exists()){
            return response()->json(['status' => false, 'message' => 'Product is already in your whitelist']);
        }

        $user->whitelists->attach($product_id);

        return response()->json(['status' => true, 'message' => 'Product added to whitelist']);
    }

    public function delete($product_id)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $user = Auth::user();

        $product = Product::find($product_id);
        if(!$product){
            return response()->json(['status' => false, 'message' => 'Product not found']);
        }

        if($user->whitelists->where('product_id',$product_id)->exists()){
            return response()->json(['status' => false, 'message' => 'Product is not in your whitelist']);
        }

        $user->whitelists->detach($product_id);

        return response()->json(['status' => true, 'message' => 'Product removed from whitelist']);
    }
}
