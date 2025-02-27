<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['key', 'value'];

    // Cast the value to an array for easy JSON handling
    // protected $casts = [
    //     'value' => 'array',
    // ];

    // // Helper method to get setting value by key
    // public static function getValue($key)
    // {
    //     return self::where('key', $key)->value('value') ?? 'Not Set';
    // }

    // Accessor: Decode JSON when retrieving value
    // public function getValueAttribute($value)
    // {
    //     return json_decode($value, true) ?? [];
    // }

    // Mutator: Encode value as JSON when saving
    // public function setValueAttribute($value)
    // {
    //     $this->attributes['value'] = json_encode($value);
    // }

    // Helper function to retrieve a setting by key
    public static function getValue($key, $default = [])
    {
        return self::where('key', $key)->value('value') ?? $default;
    }
}
