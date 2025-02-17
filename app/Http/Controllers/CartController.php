<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $carts = auth()->user()->carts;

            $carts = $carts->transform(function ($cart) {
                $cart->product = Product::find($cart->product_id);
                return $cart;
            });
        } else {

            
            $productIds = session('cart', []);


            $products = Product::whereIn('id', $productIds)->get();


            $carts = $products->map(function($product) {
                $cart = new Cart();
                $cart->product = $product;
                $cart->quantity = 1;
                return $cart;
            });

        }

        return view('cart',compact('carts'));


    }

    public function addToCart(Request $request)
    {
        $product_ids = $request->input('product_ids') ? array_unique($request->input('product_ids')) : null;

        if($product_ids === null){
            return response()->json([
                'status' => false,
                'message' => "You doesn't choice any product"
            ]);
        }

        if(!Auth::check()){

            $cart = session('cart',[]);

            foreach($product_ids as $product_id){
                if(!in_array($product_id,$cart)){
                    session()->push('cart',$product_id);
                }
            }

            return response()->json([
                'status' => true,
                'message' => 'Products added to cart'
            ]);
        }

        $user = Auth::user();
        $existing_product_ids = $user->carts ? $user->carts()->pluck('id')->toArray() : [];

        $new_product_ids = array_diff($product_ids,$existing_product_ids);

        // dd($new_product_ids);

        if(empty($new_product_ids)){
            return response()->json([
                'status' => true,
                'message' => 'Products added to cart'
            ]);
        }


        foreach($new_product_ids as $product_id){
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->product_id = $product_id;
            $cart->quantity = 1;
            $cart->save();

        }


        return response()->json([
            'status' => true,
            'message' => !empty($newProductIds) ? 'Products added to cart' : 'All products are already in the cart'
        ]);
    }

    public function delete($product_id)
    {
        if(!Product::where('id',$product_id)->exists()){
            return response()->json(['status' => false, 'message' => 'Product not found']);
        }

        if(!Auth::check()){

            $cart = session('cart', []);
            $cart = array_diff($cart, [$product_id]);
            $cart = array_values($cart);
            session(['cart' => $cart]);

            session()->flash('status','error');
            session()->flash('message','Product removed from cart');
            return response()->json(['status'=> true,'product_id' => $product_id,'message' => 'Product removed from cart']);
        }

        $user = Auth::user();

        if(!$user->carts()->where('product_id',$product_id)->exists()){
            return response()->json(['status' => false, 'message' => 'Product not found in cart']);
        }

        $user->carts()->where('product_id',$product_id)->delete();

        session()->flash('status','error');
        session()->flash('message','Product removed from cart');
        return response()->json(['status' => true, 'product_id' => $product_id,'message' => 'Product removed from cart']);

    }
}
