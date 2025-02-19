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
            $carts = AuthHelper::auth()->carts;

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

    public function addToCart(Request $request)
    {

        $product_ids = $request->input('product_ids') ?? null;

        if($product_ids === null){
            return response()->json([
                'status' => false,
                'message' => "You doesn't choice any product"
            ]);
        }


        if(!AuthHelper::check()){

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

        $user = AuthHelper::user();
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

    public function add(Request $request)
    {
        $products = $request->input('products');
        if (empty($products)) {
            return response()->json([
                'status' => false,
                'message' => "You didn't choose any products"
            ]);
        }

        if (!AuthHelper::check()) {
            $this->addToSessionCart($products);

            $this->removeFromSessionWhiteLists($products);
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

        $this->addToUserCart($newProducts, $user);
        $this->removeFromUserWhiteLists($newProducts, $user);

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

    private function removeFromSessionWhiteLists($products)
    {
        $white_lists = session('white_lists', []);

        foreach ($products as $product) {
            if (in_array($product['id'], $white_lists)) {
                // Remove from whitelist
                $white_lists = array_filter($white_lists, function ($item) use ($product) {
                    return $item != $product['id'];
                });
                session(['white_lists' => $white_lists]);
            }
        }
    }

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

    private function removeFromUserWhiteLists($products, $user)
    {
        foreach ($products as $product) {
            if ($user->whitelists && $user->whitelists()->where('product_id', $product['id'])->exists()) {
                // Remove from user's whitelist
                $user->whitelists()->detach($product['id']);
            }
        }
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
