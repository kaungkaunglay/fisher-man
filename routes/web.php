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
Route::get('/login', [CustomersController::class, 'login'])->name('login');
Route::post('/login', [CustomersController::class, 'login_store'])->name('login_store');
// Route::post('/login_s', [SellersController::class, 'login_store'])->name('login_store_seller');

// Registration for Customer and Seller
Route::get('/register', [CustomersController::class, 'register'])->name('register');
Route::post('/register', [CustomersController::class, 'register_store'])->name('register_store');

// Forgot_password for customer and seller
Route::get('/forgot_password',[CustomersController::class,'forgot_password'])->name('forgotpassword');

Route::get('/check-auth', function () {
    return Auth::guard('user')->check() ? 'Authenticated' : 'Not Authenticated';
});
Route::middleware(['auth.user'])->group(function(){
    Route::get('/profile/user', action: function () {
        return view('profile_user');
    })->name('profile_user');
});

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
