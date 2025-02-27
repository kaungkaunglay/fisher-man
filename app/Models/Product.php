<?php

namespace App\Models;

use App\Helpers\AuthHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'product_price', 'product_image', 'stock', 'weight', 'size', 'day_of_caught', 'expiration_date', 'discount', 'sub_category_id','description','user_id'];

    public function subCategory() {
        return $this->belongsTo(Sub_category::class,'sub_category_id');
    }

    public function whitelists() {
        return $this->belongsToMany(Users::class, 'white_lists', 'product_id', 'user_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function user(){
        return $this->belongsTo(Users::class,'id','user_id');
    }

    public function inWhiteLists()
    {
        // if(!AuthHelper::check()){
        //     $white_lists = session('white_lists', []);

        //     if (in_array($this->id, $white_lists)) {
        //         return true;
        //     }
        // }

        $user = AuthHelper::user();


        return $user && $user->whitelists()->where('product_id', $this->id)->exists();
    }

    public function inCart()
    {
        if(!AuthHelper::check()){
            $cart = session('cart', []);

            if (in_array($this->id, array_column($cart,'id'))) {
                return true;
            }
        }

        $user = AuthHelper::user();


        return $user && $user->carts()->where('product_id', $this->id)->exists();
    }

    public function getCart()
    {
        // if(!AuthHelper::check())
        // {
        //     $carts = session('cart', []);

        //     foreach ($carts as $product)
        //     {
        //         if($product['id'] == $this->id)
        //         {
        //             $cart = new Cart();
        //             $cart->product = Product::find($product['id']);
        //             $cart->quantity = $product['quantity'];
        //             return $cart;
        //         }
        //     }
        // }

        $user = AuthHelper::user();

        return $user && $user->carts()->where('product_id', $this->id)->first();
    }
}
