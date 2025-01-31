<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view(view: 'admin.products'); 
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
}
