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
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:4|max:12',
            'email' => 'required|email',
            'password' => 'required|min:6|max:16',
            'confirm_password' => 'required',
            'first_phone' => 'required',
            'second_phone' => 'required',
            'line_id' => 'required'
        ]);
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
