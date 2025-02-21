<?php

use App\Helpers\AuthHelper;

if (!function_exists('auth_helper')) {
    function auth_helper() {
        return new AuthHelper();
    }
}

if(!function_exists('check_role')){
    function check_role($role_id){
        return auth_helper()->user()->roles()->where('role_id',$role_id)->exists();
    }
}
