<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = ['order_id','product_id'];

    public function orders() {
        return $this->hasMany(Order::class,'order_id');
    }

    public function products() {
        return $this->hasMany(Product::class, 'product_id');
    }

}
