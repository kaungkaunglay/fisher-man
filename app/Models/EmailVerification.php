<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'verified_at',
        'token',
        'token_expire_at'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class,'user_id','id');
    }

    public function checkValidToken($token)
    {
        return $this->token == $token && $this->token_expire_at > now();
    }


}
