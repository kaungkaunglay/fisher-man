<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OAuths extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider',
        'token',
        'refresh_token',
        'expires_in',
        'user_id'
    ];
}
