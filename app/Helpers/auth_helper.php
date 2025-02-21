<?php

use App\Helpers\AuthHelper;

if (!function_exists('auth_helper')) {
    function auth_helper() {
        return new AuthHelper();
    }
}
