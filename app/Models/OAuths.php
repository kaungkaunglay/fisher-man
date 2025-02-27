<?php

namespace App\Models;

use App\Models\Users;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OAuths extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider',
        'token',
        'refresh_token',
        'expires_in',
        'user_id',
        'token',
        'status'
    ];

    public function user(){
        return $this->belongsTo(Users::class);
    }
}
