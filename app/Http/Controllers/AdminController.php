<?php

namespace App\Http\Controllers;

use App\Models\FAQs;
use App\Models\Shop;
use App\Models\Users;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Setting;
use App\Models\wishList;
use App\Helpers\AuthHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function home(Request $request)
    {
        $top_products = Product::select('products.*', 'users.username')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->inRandomOrder()->take(5)->get();
        $all_products = Product::select('products.*', 'users.username')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->paginate(10);

        $total_products = Product::get();
        return view('admin.index', compact('top_products', 'all_products', 'total_products'));
    }
    public function categoreis()
    {
        return view('admin.categories');
    }
    public function category()
    {
        return view('admin.category');
    }
    public function orders()
    {
        return view('admin.orders');
    }
    public function order()
    {
        return view('admin.order');
    }
    public function products()
    {
        return view('admin.products');
    }
    public function product()
    {
        return view('admin.product');
    }
    public function users()
    {
        return view('admin.users');
    }
    public function user()
    {
        return view('admin.user');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function login_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {
            $user = Users::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password) && $user->roles()->first()->id == 1) {
                Auth::login($user);
                return response()->json(['status' => true, 'message' => 'Login success', 'errors' => '']);
            }

            return response()->json(['status' => false, 'message' => 'email or Password is Incorrect']);
        }
    }

    //user request
    public function contact()
    {
        $contacts = Contact::paginate(10);
        return view('admin.contact-request', compact('contacts'));
    }

    public function wishList()
    {
        $wishLists = wishList::paginate(10);
        return view('admin.wishList-request', compact('wishLists'));
    }

   

    public function logout()
    {
        AuthHelper::logout();

        return to_route('admin.login');
    }
}
