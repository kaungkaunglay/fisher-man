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

            $carts->load('product');
        } else {

            $products = session('cart', []);

            $carts = collect($products)->map(function ($product) {
                $cart = new Cart();
                $cart->product_id = $product['id'];
                $cart->quantity = $product['quantity'];
                return $cart;
            });

            $carts = $carts->load('product');


        }

        return view('cart',compact('carts'));


    }
    public function CartCount() {
        // return cart count
        if(AuthHelper::check()){
            $count = AuthHelper::user()->carts()->count();
        } else {
            $count = count(session('cart',[]));
        }
        return response()->json(['cart_count' => $count]);
    }

    public function add(Request $request)
    {
        $products = $request->input('products');

        if (empty($products)) {
            return response()->json(['status' => false, 'message' => "You haven't chosen any product"]);
        }

        if (!AuthHelper::check()) {
            $this->addToSessionCart($products);
            return response()->json(['status' => true, 'message' => 'Products added to cart']);
        }

        $user = AuthHelper::user();

        $existingProductIds = $user->carts()->pluck('product_id')->toArray();

        $newProducts = $this->getNewProducts($products, $existingProductIds);

        if (empty($newProducts)) {
            return response()->json(['status' => true, 'message' => 'All products are already in the cart']);
        }

        $this->addToUserCart($newProducts, $user);

        return response()->json(['status' => true, 'message' => 'Products added to cart']);
    }

    private function addToSessionCart($products)
    {
        $cart = session('cart', []);

        foreach ($products as $product) {
            $found = false;
            foreach ($cart as &$cartItem) {
                if ($cartItem['id'] === $product['id']) {
                    $cartItem['quantity'] += $product['quantity'];
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $cart[] = $product;
            }
        }

        session(['cart' => $cart]);
    }

    private function getNewProducts($products, $existingProductIds)
    {
        return array_filter($products, function ($product) use ($existingProductIds) {
            return !in_array($product['id'], $existingProductIds);
        });
    }

    private function addToUserCart($newProducts, $user)
    {
        // Use insert for bulk insert (significantly faster)
        $dataToInsert = [];
        foreach ($newProducts as $product) {
            $dataToInsert[] = [
                'user_id' => $user->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'created_at' => now(), // Add timestamps if needed
                'updated_at' => now(),
            ];
        }
        Cart::insert($dataToInsert);
    }


    public function addToCartWithLogin(Request $request)
    {
        $products = $request->input('products');

        if (empty($products)) {
            return response()->json(['status' => false, 'message' => "You haven't chosen any product"]);
        }

        $user = AuthHelper::user();

        if (!$user) {
            return response()->json(['status' => false, 'message' => "You need to login to process"]);
        }

        DB::beginTransaction();

        try {
            $user->carts()->delete();

            $dataToInsert = [];
            foreach ($products as $product) {
                $dataToInsert[] = [
                    'user_id' => $user->id,
                    'product_id' => $product['id'],
                    'quantity' => $product['quantity'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            Cart::insert($dataToInsert);

            DB::commit();

            session()->forget('cart');

            return response()->json(['status' => true, 'message' => 'Products added to cart']);

        } catch (\Exception $e) {
            DB::rollBack();  // Rollback on error
            logger()->error($e); // Log the error
            return response()->json(['status' => false, 'message' => 'Error adding products to cart']); //Or a more specific error message.
        }
    }

    public function delete($product_id)
    {
        if (!Product::where('id', $product_id)->exists()) {
            return response()->json(['status' => false, 'message' => 'Product not found']);
        }

        if (!AuthHelper::check()) {
            $cart = session('cart', []);

            $cart = array_filter($cart, function ($item) use ($product_id) {
                return $item['id'] != $product_id;
            });

            session(['cart' => $cart]);

            return response()->json(['status' => true, 'product_id' => $product_id, 'message' => 'Product removed from cart']);
        }

        $user = AuthHelper::user();

        if (!$user->carts()->where('product_id', $product_id)->exists()) {
            return response()->json(['status' => false, 'message' => 'Product not found in cart']);
        }

        $user->carts()->where('product_id', $product_id)->delete();

        return response()->json(['status' => true, 'product_id' => $product_id, 'message' => 'Product removed from cart']);
    }
}
