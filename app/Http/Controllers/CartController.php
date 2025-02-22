<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if(AuthHelper::check()){

            $carts = AuthHelper::user()->carts;

            $carts = $carts->transform(function ($cart) {
                $cart->product = Product::find($cart->product_id);
                return $cart;
            });
        } else {

            $products = session('cart', []);

            $carts = array_map(function($product) {
                $cart = new Cart();
                $cart->product = Product::find($product['id']);
                $cart->quantity = $product['quantity'];
                return $cart;
            }, $products);

        }

        return view('cart',compact('carts'));


    }
    public function CartCount() {
        // return cart count
        if(AuthHelper::check()){
            $cart = new Cart();
            $count = $cart->where('user_id', AuthHelper::id())->count();
        } else {
            $count = count(session('cart',[]));
        }
        return response()->json(['cart_count' => $count]);
    }

    public function add(Request $request)
    {
        $products = $request->input('products');
        if (empty($products)) {
            return response()->json([
                'status' => false,
                'message' => "You doesn't choice any product"
            ]);
        }

        if (!AuthHelper::check()) {
            $this->addToSessionCart($products);

            return response()->json([
                'status' => true,
                'message' => 'Products added to cart'
            ]);
        }

        $user = AuthHelper::user();
        $existingProductIds = $user->carts()->pluck('product_id')->toArray();

        $newProducts = $this->getNewProducts($products, $existingProductIds);

        if (empty($newProducts)) {
            return response()->json([
                'status' => true,
                'message' => 'All products are already in the cart'
            ]);
        }

        // add new products to user cart
        $this->addToUserCart($newProducts, $user);

        // remove from user white lists
        // $this->removeFromUserWhiteLists($newProducts, $user);


        return response()->json([
            'status' => true,
            'message' => 'Products added to cart'
        ]);
    }

    private function addToSessionCart($products)
    {
        $cart = session('cart', []);
        foreach ($products as $product) {
            if (!in_array($product['id'], array_column($cart, 'id'))) {
                session()->push('cart', $product);
            }
        }
    }


    // private function removeFromSessionWhiteLists($products)
    // {
    //     $white_lists = session('white_lists', []);

    //     foreach ($products as $product) {
    //         if (in_array($product['id'], $white_lists)) {
    //             // Remove from whitelist
    //             $white_lists = array_filter($white_lists, function ($item) use ($product) {
    //                 return $item != $product['id'];
    //             });
    //             session(['white_lists' => $white_lists]);
    //         }
    //     }
    // }

    private function getNewProducts($products, $existingProductIds)
    {
        return array_filter($products, function ($product) use ($existingProductIds) {
            return !in_array($product['id'], $existingProductIds);
        });
    }

    private function addToUserCart($newProducts, $user)
    {
        foreach ($newProducts as $product) {
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->product_id = $product['id'];
            $cart->quantity = $product['quantity'];
            $cart->save();
        }
    }


    // private function removeFromUserWhiteLists($products, $user)
    // {
    //     foreach ($products as $product) {
    //         if ($user->whitelists && $user->whitelists()->where('product_id', $product['id'])->exists()) {
    //             // Remove from user's whitelist
    //             $user->whitelists()->detach($product['id']);
    //         }
    //     }
    // }

    public function addToCartWithLogin(Request $request)
    {
        $products = $request->input('products');
        if (empty($products)) {
            return response()->json([
                'status' => false,
                'message' => "You doesn't choice any product"
            ]);
        }

        $user = AuthHelper::user();
        if(!$user){
            return response()->json([
                'status' => false,
                'message' => "You need to login to process"
            ]);
        }

        // clean before user cart
        $user->carts()->delete();

        // add new products to user cart
        $this->addToUserCart($products, $user);

        session()->forget('cart');

        return response()->json([
            'status' => true,
            'message' => 'Products added to cart'
        ]);

    }

    public function delete($product_id)
    {

        if(!Product::where('id',$product_id)->exists()){
            return response()->json(['status' => false, 'message' => 'Product not found']);
        }

        if(!AuthHelper::check()){

            $cart = session('cart', []);

            $cart = array_filter($cart, function ($item) use ($product_id) {
                return $item['id'] != $product_id;
            });

            session(['cart' => $cart]);

            return response()->json(['status'=> true,'product_id' => $product_id,'message' => 'Product removed from cart']);
        }

        $user = AuthHelper::user();

        if(!$user->carts()->where('product_id',$product_id)->exists()){
            return response()->json(['status' => false, 'message' => 'Product not found in cart']);
        }

        $user->carts()->where('product_id',$product_id)->delete();

        return response()->json(['status' => true, 'product_id' => $product_id,'message' => 'Product removed from cart']);

    }
}
