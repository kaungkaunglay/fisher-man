<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OAuth extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider',
        'provider_user_id',
        'provider_user_name',
        'provider_user_email',
        'provider_user_avatar',
        'access_token',
        'refresh_token',
        'expires_in',
        'user_id',
    ];
}
