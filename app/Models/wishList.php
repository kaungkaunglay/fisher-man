<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishList extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'line_id', 'phone', 'email', 'description'];
}
