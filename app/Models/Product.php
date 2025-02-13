<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'product_price', 'product_image', 'stock', 'weight', 'size', 'day_of_caught', 'expiration_date', 'discount', 'sub_category_id','description'];

    public function subCategory() {
        return $this->belongsTo(Sub_category::class);
    }

    public function whitelists() {
        return $this->belongsToMany(Users::class, 'white_lists', 'product_id', 'user_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
