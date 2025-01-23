<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function register() { 
        return view('register');
    }
    public function login(){
        return view('login');
    }
    public function register_store(Request $request){
        logger($request->all());
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:4|max:12',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:6',
                'max:16',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,16}$/'
            ],
            'confirm_password' => 'required|same:password',
            'first_phone' => ['required', 'regex:/^\+95[6-9]\d{6,9}$|^\+81[789]0\d{4}\d{4}$/'],
            'second_phone' => ['nullable', 'regex:/^\+95[6-9]\d{6,9}$|^\+81[789]0\d{4}\d{4}$/'],
            'line_id' => 'required|min:4|max:20'
        ]);
        $messages = [
            'username.required' => 'The username field is required.',
            'username.min' => 'The username must be at least 4 characters.',
            'username.max' => 'The username may not be greater than 12 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters.',
            'password.max' => 'The password may not be greater than 16 characters.',
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
            'confirm_password.required' => 'The confirm password field is required.',
            'confirm_password.same' => 'The confirm password and password must match.',
            'first_phone.required' => 'The first phone field is required.',
            'first_phone.regex' => 'The first phone format is invalid.',
            'second_phone.regex' => 'The second phone format is invalid.',
            'line_id.required' => 'The line ID field is required.',
            'line_id.min' => 'The line ID must be at least 4 characters.',
            'line_id.max' => 'The line ID may not be greater than 20 characters.',
        ];

        $validator = Validator::make($request->all(), [
            'username' => 'required|min:4|max:12',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'min:6',
                'max:16',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?#&]{6,16}$/'
            ],
            'confirm_password' => 'required|same:password',
            'first_phone' => ['required', 'regex:/^\+95[6-9]\d{6,9}$|^\+81[789]0\d{4}\d{4}$/'],
            'second_phone' => ['nullable', 'regex:/^\+95[6-9]\d{6,9}$|^\+81[789]0\d{4}\d{4}$/'],
            'line_id' => 'required|min:4|max:20'
        ], $messages);
        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }else{
            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->first_phone = $request->first_phone;
            $user->second_phone = $request->second_phone;
            $user->line_id = $request->line_id;
            $user->remember_token = Str::random(60);
            $user->save(); 
            return response()->json(['status' => true, 'message' => 'Register Success']);
        }
    }
    public function login_store(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }else{
            $user = User::where('email', $request->username)->first();
            if($user){
                if(Hash::check($request->password, $user->password)){
                    return response()->json(['status' => true, 'message' => 'Login Success']);
                }
            }
            return response()->json(['status' => false, 'message' => 'Login Failed']);
        }
    }
}
