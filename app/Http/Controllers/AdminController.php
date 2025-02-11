<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function home(){
        return view('admin.index');
    }
    public function categoreis(){
        return view('admin.categories');
    }
    public function category() {
        return view('admin.category');
    }
    public function orders(){
        return view('admin.orders');
    }
    public function order(){
        return view('admin.order');
    }
    public function products(){
        return view('admin.products');
    }
    public function product(){
        return view('admin.product');
    }
    public function users(){
        return view('admin.users');
    }
    public function user(){
        return view('admin.user');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function login_store(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }else{
            $user = Users::where('email', $request->email)->first();

            if($user && Hash::check($request->password, $user->password)){
                session()->put('admin_user_id', $user->id);
                return response()->json(['status' => true, 'message' => 'Login success', 'errors'=> '']);
            }

            return response()->json(['status' => false, 'message' => 'email or Password is Incorrect']);
        }
    }


}
