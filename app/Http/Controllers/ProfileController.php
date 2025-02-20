<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function update_profile(Request $request)
    {
        $messages = [
            'username.required' => 'The username field is required.',
            'username.min' => 'The username must be at least 4 characters.',
            'username.max' => 'The username may not be greater than 12 characters.',
            'username.unique' => 'The username has already been taken.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
        ];

        $validator = Validator::make($request->all(), [
            'username' => 'required|min:4|max:12|unique:users,username',
            'email' => 'required|email|unique:users,email',
        ], $messages);
    }
}
