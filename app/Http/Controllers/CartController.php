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

        return view('cart_process',compact('carts'));


    }

    public function addToCart(Request $request)
    {
        $product_ids = array_unique($request->input('product_ids'));

        if(!Auth::check()){
            $cart = session('cart',[]);

            // // logger(is_array($product_ids));
            // // logger(is_array($cart));
            // logger($product_ids);
            // logger($cart);
            // $cart = array_values($cart);
            // logger($cart);
            // // $new_product_ids = array_diff($product_ids,$cart);

            // if (!empty($new_product_ids)) {
            //     foreach ($new_product_ids as $product_id) {
            //         session()->push('cart', $product_id);
            //     }
            // }

            foreach($product_ids as $product_id)
            {
                session()->push('cart',$product_id);
            }




            return response()->json([
                'status' => true,
                'message' => !empty($new_product_ids) ? 'Products added to cart' : 'All products are already in the cart'
            ]);
        }

        $user = Auth::user();
        $existing_product_ids = $user->carts->pluck('product_id')->toArray();

        if(!is_array($product_ids) || !is_array($existing_product_ids)){
            return response()->json(['status' => true, 'message' => 'Something was wrong']);
        }

        logger(array_diff($product_ids, $existing_product_ids));

        if(empty($new_product_ids)){
            return response()->json(['status' => false, 'message' => 'Product already added to cart']);
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
            return response()->json(['message' => 'Product removed from cart']);
        }

        $user = Auth::user();

        if(!$user->carts->where('product_id',$product_id)->exists()){
            return response()->json(['status' => false, 'message' => 'Product not found in cart']);
        }

        $user->carts()->where('product_id',$product_id)->delete();
        session()->flash('status','error');
        session()->flash('message','Product removed from cart');
        return response()->json(['message' => 'Product removed from cart']);

    }
}
