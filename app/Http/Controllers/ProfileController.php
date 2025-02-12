<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function seller_profile()
    {
        $user = Auth::user();
        return view('profile_seller',compact('user'));
    }

    public function user_profile()
    {
        $user = Auth::user();
        return view('profile_user',compact('user'));
    }
}
