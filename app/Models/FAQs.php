<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQs extends Model
{
    use HasFactory;
    protected $fillable = ['question', 'answer'];
}
