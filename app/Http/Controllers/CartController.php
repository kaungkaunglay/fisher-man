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
        return view('cart');
    }

    public function store(Request $request)
    {
        $product_ids = array_unique($request->input('product_ids'));

        if(!Auth::check()){
            $cart = session('cart',[]);
            $new_product_ids = array_diff($product_ids, $cart);

            if (!empty($new_product_ids)) {
                session()->push('cart', $new_product_ids);
            }

            return response()->json(['status' => true, 'message' => 'Product added to cart']);
        }

        $user = Auth::user();

        DB::transaction(function () use ($user, $product_ids) {
            $existingProductIds = $user->carts()->pluck('product_id')->toArray();

            $newProductIds = array_diff($product_ids, $existingProductIds);

            if (!empty($newProductIds)) {
                $carts = [];
                foreach ($newProductIds as $product_id) {
                    $carts[] = [
                        'user_id' => $user->id,
                        'product_id' => $product_id,
                        'quantity' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                Cart::insert($carts);
            }
        });


        return response()->json([
            'status' => true,
            'message' => !empty($newProductIds) ? 'Products added to cart' : 'All products are already in the cart'
        ]);
    }

    public function delete($product_id)
    {

        if(!Product::where('id',$product_id)->exists()){
            session()->flash('status','error');
            session()->flash('message','Product not found');
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
            return response()->json(['status' => false, 'message' => 'Product not found']);
        }
    }
}
