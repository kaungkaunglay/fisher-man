<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable implements CanResetPassword
{
    use HasFactory,Notifiable;
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
        'trans_management',
        'avatar',
        'location',
        'address'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }



}
