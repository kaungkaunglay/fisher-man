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
        if(!AuthHelper::check()){
            return redirect()->route('login');
        }

        $carts = AuthHelper::auth()->carts;

        $carts = $carts->transform(function ($cart) {
            $cart->product = Product::find($cart->product_id);
            return $cart;
        });

        return view('cart',compact('carts'));


    }
    public function CartCount() {
        // return cart count'
        $count = AuthHelper::check() ? Cart::where('user_id', AuthHelper::id())->count() : 0;

        return response()->json(['cart_count' => $count]);
    }

    public function add(Request $request)
    {
        if(!AuthHelper::check())
        {
            return response()->json(['status' => false, 'isLogin' => false]);
        }

        $products = $request->input('products');
        if (empty($products)) {
            return response()->json([
                'status' => false,
                'message' => "You didn't choose any products"
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
        $this->removeFromSessionWhiteLists($newProducts);

        return response()->json([
            'status' => true,
            'message' => 'Products added to cart'
        ]);
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
        if(!AuthHelper::check())
        {
            return response()->json(['status' => false, 'isLogin' => false]);
        }
        if(!Product::where('id',$product_id)->exists()){
            return response()->json(['status' => false, 'message' => 'Product not found']);
        }

        $user = AuthHelper::user();

        if(!$user->carts()->where('product_id',$product_id)->exists()){
            return response()->json(['status' => false, 'message' => 'Product not found in cart']);
        }

        $user->carts()->where('product_id',$product_id)->delete();

        return response()->json(['status' => true, 'product_id' => $product_id,'message' => 'Product removed from cart']);

    }
}
