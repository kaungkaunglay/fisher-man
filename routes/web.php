<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellersController;
use App\Http\Controllers\CustomersController;
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

// login for Customer and Seller
Route::get('/login_c', [CustomersController::class, 'login'])->name('login_customer');
Route::get('/login_s', [SellersController::class, 'login'])->name('login_seller');

Route::post('/login_c', [CustomersController::class, 'login_store'])->name('login_store_customer');
Route::post('/login_s', [SellersController::class, 'login_store'])->name('login_store_seller');

// Registration for Customer and Seller
Route::get('/register_c', [CustomersController::class, 'register'])->name('register_customer');
Route::get('/register_s', [SellersController::class, 'register'])->name('register_seller');

Route::post('/register_c', [CustomersController::class, 'register_store'])->name('register_store_customer');
Route::post('/register_s', [SellersController::class, 'register_store'])->name('register_store_seller');

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