<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
    public function register() { 
        return view('customers.register');
    }
    public function login(){
        return view('customers.login');
    }
    public function register_store(Request $request){
        logger($request->all());
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm_password' => 'required',
            'first_phone' => 'required',
            'second_phone' => 'required',
            'line_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }else{
            $customer = new Customers();
            $customer->username = $request->username;
            $customer->email = $request->email;
            $customer->password = Hash::make($request->password);
            $customer->first_phone = $request->first_phone;
            $customer->second_phone = $request->second_phone;
            $customer->line_id = $request->line_id;
            $customer->remember_token = Str::random(60); 
            $customer->save(); 
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
            $customer = Customers::where('email', $request->username)->first();
            if($customer){
                logger($request->all());
                if(Hash::check($request->password, $customer->password)){
                    return response()->json(['status' => true, 'message' => 'Login Success']);
                }
            }
            return response()->json(['status' => false, 'message' => 'Login Failed']);
        }
        
    }
}
