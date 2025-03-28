<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable implements CanResetPassword,MustVerifyEmail
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
        'facebook_id',
        'google_id',
        'remember_token',
        'ship_name',
        'first_org_name',
        'trans_management',
        'avatar',
        'location',
        'address',
        'postal_code',
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function products() {
        return $this->hasMany(Product::class,'user_id','id');
    }

    public function whitelists()
    {
        return $this->belongsToMany(Product::class, 'white_lists', 'user_id', 'product_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id' , 'id');
    }

    public function email_verification()
    {
        return $this->hasOne(EmailVerification::class, 'user_id', 'id');
    }

    public function assignRole($role_id)
    {
        $this->roles()->sync([$role_id]);
    }

    public function shop() {
        return $this->hasOne(Shop::class,'user_id','id');
    }

    public function oAuths(){
        return $this->hasMany(OAuths::class,"user_id",'id');
    }

    public function checkProvider($provider_name){
        return $this->oAuths()
            ->where('provider',$provider_name)
            ->exists();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }


}
