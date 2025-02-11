<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'sub_category_id');
    }
}
