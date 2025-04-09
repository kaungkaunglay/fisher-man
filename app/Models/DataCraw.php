<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCraw extends Model
{
    use HasFactory;
    protected $fillable = [
        'category', 'market', 'market_code', 'date', 'fish_type', 'quantity', 'unit',
        'composition_large', 'composition_medium', 'composition_small', 'composition_vary_small',
        'large_high', 'large_medium', 'large_low',
        'medium_high', 'medium_middle', 'medium_low',
        'small_high', 'small_middle', 'small_low',
        'additional_high', 'additional_middle', 'additional_low',
    ];
}
