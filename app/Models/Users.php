<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'username',
        'email',
        'password',
        'first_phone',
        'second_phone',
        'line_id',
        'remember_token',
        'ship_name',
        'first_org_name',
        'trans_management'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

}
