<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mime\Part\Multipart\RelatedPart;

class CartController extends Controller
{
    public function index()
    {
        if (AuthHelper::check()) {
            $carts = AuthHelper::user()->carts;
            $carts->load('product');
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

        $step = min(session('cart_step',1),5);
        
        $total = $carts->sum(function ($cart) {
            return $cart->product->getSellPrice() * $cart->quantity;
        }) ?? 0;

        return view('cart', compact('carts', 'step', 'total'));
    }

    public function hasProductCart()
    {
        if(AuthHelper::check()){
            $count = AuthHelper::user()->carts()->count();
        } else {
            $count = count(session('cart',[]));
        }

        return $count > 0;
    }

    public function checkout(){
        $step = 1;
        session(['cart_step' => $step]);
        return redirect()->route('cart');
    }

    public function login()
    {

        if(!$this->hasProductCart()){
            session()->flash('status',"error");
            session()->flash('message',"カートに商品がありません");

            return redirect()->back();
        }

        if(AuthHelper::check()){
            return redirect()->route('cart.address');
        }

        session(['cart_login' => true]);
        return redirect()->route('login');
    }

    public function finished_login()
    {


        $products = session('cart', []);

        if (empty($products)) {

            session()->flash('status',"error");
            session()->flash('message',"商品が選択されていません");

            return redirect()->back();
        }

        $user = AuthHelper::user();

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
            session()->forget('cart_login');

            return redirect()->route('cart.address');
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error($e);
            session()->flash('status',"error");
            session()->flash('message',"カートに製品を追加する際にエラーが発生しました");
        }

    }

    public function address()
    {
        if(!$this->hasProductCart()){
            session()->flash('status',"error");
            session()->flash('message',"カートに商品がありません");

            return redirect()->back();
        }

        if (!AuthHelper::check()) {
            session(['cart_login' => true]);
            return redirect()->route('login');
        }


        $step = 3;
        session(['cart_step' => $step]);
        return redirect()->route('cart');
    }

    public function finished_address(Request $request)
    {
        $messages = [
            'username.required' => 'ユーザー名は必須です。',
            'username.string' => 'ユーザー名は文字列である必要があります。',
            'phone.numeric' => '電話番号は数字である必要があります。',
            'phone.required' => '電話番号を入力してください。',
            'phone.regex' => '有効な電話番号を入力してください。（70, 80, 90 で始まる10桁の番号）',
            'phone.max' => '電話番号は10桁以内で入力してください。',
            'postal.required' => '郵便番号は必須です。',
            'postal.numeric' => '郵便番号は数字である必要があります。',
            'country.required' => '国は必須です。',
            'country.string' => '国は文字列である必要があります。',
            'address.required' => '住所は必須です。',
            'address.string' => '住所は文字列である必要があります。',
        ];
        $request->validate([
            'username' => 'required|string',
            'phone' => 'required|numeric|regex:/^[789]0\d{8}$/',
            'postal' => 'required|numeric',
            'country' => 'required|string',
            'address' => 'required|string',
        ],$messages);

        session(['address' => $request->all()]);

        // logger(session('address'));

        return redirect()->route('cart.payment');
    }
    
    public function payment()
    {
        if (!AuthHelper::check() || !$this->hasProductCart()) {
            return redirect()->back();
        }
        $step = 4;
        session(['cart_step' => $step]);
        return redirect()->route('cart');
    }

    public function finished_payment()
    {
        if (!$this->hasProductCart()) {
            return redirect()->route('cart.checkout');
        }

        session()->forget('cart');
        session()->forget('address');

        $step = 5;
        session(['cart_step' => $step]);
        return redirect()->route('cart');
    }

    public function complete()
    {
        if (!AuthHelper::check() || !$this->hasProductCart()) {
            return redirect()->route('cart.login');
        }

        session()->forget('address');
        
        $step = 5;
        session(['cart_step' => $step]);
        return redirect()->route('cart');
    }



    public function CartCount() {
        // カートの数を返す
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
            session()->flash('error',"商品が選択されていません");
            return response()->json(['status' => false, 'message' => "商品が選択されていません"]);
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
        return response()->json(['status' => true, 'message' => '商品がカートに追加されました']);
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
            return response()->json(['status' => false, 'message' => "商品が選択されていません"]);
        }

        $user = AuthHelper::user();

        if (!$user) {
            return response()->json(['status' => false, 'message' => "ログインする必要があります"]);
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
            return response()->json(['status' => false, 'message' => 'カートに商品を追加する際にエラーが発生しました']);
        }
    }

    public function addQty(Request $request)
    {
        $quantity = $request->input('quantity', 0);
        $product_id = $request->input('product_id');

        if (!is_numeric($quantity) || $quantity <= 0) {
            return response()->json([
                'status' => false,
                'message' => '無効な数量が提供されました'
            ]);
        }

        if (!AuthHelper::check()) {

            $cart = session('cart', []);

            if (empty($cart)) {
                return response()->json([
                    'status' => false,
                    'message' => "カートが空です"
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
                'message' => "数量が更新されました"
            ]);
        }

        $cart = Cart::where('user_id', AuthHelper::id())
            ->where('product_id', $product_id)
            ->first();

        if (!$cart) {
            return response()->json([
                'status' => false,
                'message' => "カートに商品が見つかりません"
            ]);
        }

        $cart->quantity = max(0, $quantity);
        $cart->save();

        return response()->json([
            'status' => true,
            'message' => "数量が更新されました",
            'quantity' => $cart->quantity
        ]);
    }

    public function delete($product_id)
    {
        if (!Product::where('id', $product_id)->exists()) {
            return response()->json(['status' => false, 'message' => '商品が見つかりません']);
        }

        if (!AuthHelper::check()) {
            $cart = session('cart', []);

            $cart = array_filter($cart, function ($item) use ($product_id) {
                return $item['id'] != $product_id;
            });

            session(['cart' => $cart]);

            return response()->json(['status' => true, 'product_id' => $product_id, 'message' => '商品がカートから削除されました']);
        }

        $user = AuthHelper::user();

        if (!$user->carts()->where('product_id', $product_id)->exists()) {
            return response()->json(['status' => false, 'message' => 'カートに商品が見つかりません']);
        }

        $user->carts()->where('product_id', $product_id)->delete();

        return response()->json(['status' => true, 'product_id' => $product_id, 'message' => '商品がカートから削除されました']);
    }
}
