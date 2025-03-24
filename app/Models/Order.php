<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id','order_date','payment_type','status'];

    public function customer()
    {
        return $this->belongsTo(Users::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}
