<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'shop_name',
        'trans_management',
        'email',
        'phone_number',
        'description',
        'avatar',
        'status',
    ];

    public function user() {
        return $this->belongsTo(Users::class);
    }

}
