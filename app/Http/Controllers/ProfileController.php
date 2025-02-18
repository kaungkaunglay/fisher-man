<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function seller_profile()
    {
        $user = AuthHelper::auth();
        return view('profile_seller',compact('user'));
    }

    public function user_profile()
    {
        $user = AuthHelper::auth();
        return view('profile_user',compact('user'));
    }
}
