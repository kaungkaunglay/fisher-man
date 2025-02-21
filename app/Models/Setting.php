<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['key', 'value'];

    // Cast the value to an array for easy JSON handling
    protected $casts = [
        'value' => 'array',
    ];

    // // Helper method to get setting value by key
    // public static function getValue($key)
    // {
    //     return self::where('key', $key)->value('value') ?? 'Not Set';
    // }

    // Helper function to retrieve a setting by key
    public static function getValue($key, $default = [])
    {
        return self::where('key', $key)->value('value') ?? $default;
    }
}
