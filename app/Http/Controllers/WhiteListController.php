<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhiteListController extends Controller
{
    public function index()
    {
        $whitelist_products = Auth::check() ? Auth::user()->whitelists : Product::whereIn('id',session('white_lists',[]))->get();
        $total = 0;
        $total = $whitelist_products->sum('product_price');

        return view('whitelist',compact('whitelist_products','total'));
    }

    public function store($product_id)
    {

        if(!Product::where('id',$product_id)->exists()){
            session()->flash('error','Product not found');
            return response()->json(['status' => false, 'message' => 'Product not found']);
        }

        if(!Auth::check()){

            $white_lists = session('white_lists', []);
            if (in_array($product_id, $white_lists)) {
                return response()->json(['status' => false, 'message' => 'Product is already in your whitelist']);
            }

            session()->push('white_lists',$product_id);
            return response()->json(['status' => true, 'message' => 'Product added to whitelist']);
        }


        $user = Auth::user();



        if($user->whitelists()->where('product_id', $product_id)->exists()){
            session()->flash('error','Product is already in your whitelist');

            return response()->json(['status' => false, 'message' => 'Product is already in your whitelist']);
        }

        $user->whitelists()->attach($product_id);

        session()->flash('success','Product added to whitelist');
        return response()->json(['status' => true, 'message' => 'Product added to whitelist']);
    }

    public function delete($product_id)
    {
        if(!Auth::check()){

            $white_lists = session('white_lists', []);
            $white_lists = array_diff($white_lists, [$product_id]);
            $white_lists = array_values($white_lists);
            session(['white_lists' => $white_lists]);

            session()->flash('status','error');
            session()->flash('message','Product removed from whitelist');
            return response()->json(['message' => 'Product removed from whitelist']);
        }

        $user = Auth::user();


        if(!Product::where('id',$product_id)->exists()){
            session()->flash('status','error');
            session()->flash('message','Product not found');
            return response()->json(['status' => false, 'message' => 'Product not found']);
        }

        if(!$user->whitelists()->where('product_id',$product_id)->exists()){
            session()->flash('status','error');
            session()->flash('message','Product is not in your whitelist');
            return response()->json(['status' => false, 'message' => 'Product is not in your whitelist']);
        }

        $user->whitelists()->detach($product_id);

        session()->flash('status','error');
        session()->flash('message','Product removed from whitelist');
        return response()->json(['status' => true, 'message' => 'Product removed from whitelist']);
    }
}
