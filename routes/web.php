<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/category', function () {
    return view('category');
})->name('category');

Route::get('/sub-category', function () {
    return view('sub_category');
})->name('sub_category');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/product', function () {
    return view('product_detail');
})->name('product_details');

Route::get('/profile', action: function () {
    return view('profile_seller');
})->name('profile');

Route::get('/support', function () {
    return view('support');
})->name('support');

Route::get('/policy', function () {
    return view('terms_condition');
})->name('policy');

Route::get('/white-list', function () {
    return view('whitelist');
})->name('whitelist');

Route::get('/special-offer', function () {
    return view('special-offer');
})->name('special-offer');