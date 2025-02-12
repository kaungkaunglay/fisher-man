<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineApis extends Model
{
    use HasFactory;
    protected $fillable = ['line_user_id', 'events'];
}
