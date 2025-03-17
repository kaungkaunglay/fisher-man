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
        if (AuthHelper::check()) {
            $carts = AuthHelper::user()->carts;
            $carts->load('product');


            // $sessionCart = $carts->map(function ($cart) {
            //     return [
            //         'id' => $cart->product_id,
            //         'quantity' => $cart->quantity,
            //     ];
            // })->toArray();

            // session()->put('cart', $sessionCart);

        } else {
            $products = session('cart', []);

            if ($products != []) {

                $productIds = array_column($products, 'id');


                $carts = collect($products)->map(function ($product) {
                    $cart = new Cart();
                    $cart->product_id = $product['id'];
                    $cart->quantity = $product['quantity'];
                    return $cart;
                });

                $productsFromDb = Product::whereIn('id', $productIds)->get()->keyBy('id');
                $carts = $carts->map(function ($cart) use ($productsFromDb) {
                    $cart->product = $productsFromDb->get($cart->product_id);
                    return $cart;
                });
            } else {
                $carts = collect();
            }

        }

        return view('cart', compact('carts'));
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
            session()->flash('error',"You haven't chosen any product");
            return response()->json(['status' => false, 'message' => "You haven't chosen any product"]);
        }

        if (!AuthHelper::check()) {
            $isNotNew = $this->addToSessionCart($products);
            if(!$isNotNew){
                session()->flash('info',"商品はカートに追加されています。");
                return response()->json(['status' => false, 'message' => '商品はカートに追加されています。']);
            }
            session()->flash('success',"カートに商品が追加されました");
            return response()->json(['status' => true,'isNotNew' => $isNotNew , 'message' => 'カートに商品が追加されました。']);
        }

        $user = AuthHelper::user();

        $existingProductIds = $user->carts()->pluck('product_id')->toArray();

        $newProducts = $this->getNewProducts($products, $existingProductIds);

        if (empty($newProducts)) {
            session()->flash('info',"商品はカートに追加されています");
            return response()->json(['status' => false, 'message' => '商品はカートに追加されています。']);
        }

        $this->addToUserCart($newProducts, $user);

        session()->flash('success',"カートに商品が追加されました");
        return response()->json(['status' => true, 'message' => 'カートに商品が追加されました。']);
    }

    private function addToSessionCart($products)
    {
        $cart = session('cart', []);

        $allProductsAlreadyInCart = true;

        foreach ($products as $product) {
            $found = false;
            foreach ($cart as &$cartItem) {


                if ($cartItem['id'] === $product['id']) {
                    $found = true;
                    $allProductsAlreadyInCart = false;
                    break;
                }
            }
            if (!$found) {
                $cart[] = $product;
            }
        }

        session(['cart' => $cart]);

        return $allProductsAlreadyInCart && !empty($products);
    }

    private function getNewProducts($products, $existingProductIds)
    {
        return array_filter($products, function ($product) use ($existingProductIds) {
            return !in_array($product['id'], $existingProductIds);
        });
    }

    private function addToUserCart($newProducts, $user)
    {

        $dataToInsert = [];
        foreach ($newProducts as $product) {
            $dataToInsert[] = [
                'user_id' => $user->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'created_at' => now(),
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

            return response()->json(['status' => true, 'message' => 'カートに商品が追加されました。']);

        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error($e);
            return response()->json(['status' => false, 'message' => 'Error adding products to cart']); //Or a more specific error message.
        }
    }

    public function addQty(Request $request)
    {
        $quantity = $request->input('quantity', 0);
        $product_id = $request->input('product_id');

        if (!is_numeric($quantity) || $quantity <= 0) {

            return response()->json([
                'status' => false,
                'message' => 'Invalid quantity provided'
            ]);
        }

        if (!AuthHelper::check()) {

            $cart = session('cart', []);

            if (empty($cart)) {
                return response()->json([
                    'status' => false,
                    'message' => "Your cart is empty."
                ]);
            }

            $updatedCart = array_map(function ($item) use ($product_id, $quantity) {
                if ($item['id'] == $product_id) {
                    $item['quantity'] = $quantity;
                }
                return $item;
            }, $cart);

            session(['cart' => $updatedCart]);

            return response()->json([
                'status' => true,
                'message' => "Quantity updated."
            ]);
        }

        $cart = Cart::where('user_id', AuthHelper::id())
            ->where('product_id', $product_id)
            ->first();

        if (!$cart) {
            return response()->json([
                'status' => false,
                'message' => "Product not found in your cart."
            ]);
        }

        $cart->quantity = max(0, $quantity);
        $cart->save();

        return response()->json([
            'status' => true,
            'message' => "Quantity updated.",
            'quantity' => $cart->quantity
        ]);
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
