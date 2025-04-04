<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id','order_date','payment_id','status'];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'order_products');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }


}
