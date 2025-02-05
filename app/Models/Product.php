<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'product_price', 'product_image', 'stock', 'weight', 'size', 'day_of_caught', 'expiration_date', 'delivery_fee', 'description'];

    // public function subCategory() {
    //     return $this->belongsTo(SubCategory::class);
    // }
}
