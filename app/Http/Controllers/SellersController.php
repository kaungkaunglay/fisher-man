<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sellers; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SellersController extends Controller
{
    public function register(){
        return view('sellers.register');
    }
    public function login(){
        return view('sellers.login');
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
            'line_id' => 'required',
            'ship_name' => 'required',
            'first_org_name' => 'required',
            'trans_management' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }else{
            $seller = new Sellers();
            $seller->username = $request->username;
            $seller->email = $request->email;
            $seller->password = Hash::make($request->password);
            $seller->first_phone = $request->first_phone;
            $seller->second_phone = $request->second_phone;
            $seller->line_id = $request->line_id;
            $seller->ship_name = $request->ship_name; 
            $seller->firt_org = $request->first_org_name;
            $seller->trans_management = $request->trans_management; 
            $seller->remember_token = Str::random(60); 
            $seller->save(); 
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
            $seller = Sellers::where('email', $request->username)->first();
            if($seller){
                if(Hash::check($request->password, $seller->password)){
                    return response()->json(['status' => true, 'message' => 'Login Success']);
                }
            }
            return response()->json(['status' => false, 'message' => 'Login Failed']);
        }
        
    }
}
