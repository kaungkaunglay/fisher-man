<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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
Route::get('/login', [UsersController::class, 'login'])->name('login');
Route::post('/login', [UsersController::class, 'login_store'])->name('login_store');
// Route::post('/login_s', [SellersController::class, 'login_store'])->name('login_store_seller');

// Registration for Customer and Seller
Route::get('/register', [UsersController::class, 'register'])->name('register');
Route::post('/register', [UsersController::class, 'register_store'])->name('register_store');


// Forgot_password for customer and seller
Route::get('/forgot_password',[UsersController::class,'forgot_password'])->name('forgotpassword');
// Handle Reset Link
Route::post('/forgot-password', [UsersController::class, 'sendResetLinkEmail'])->name('password.email');
// Password Reset Form
Route::get('/reset-password',[UsersController::class,'showResetForm'])->name('password.reset');
// Route::get('/reset-password/{token}', [UsersController::class, 'showResetForm'])->name('password.reset');
// Handle Password Reset
Route::post('/reset-password', [UsersController::class, 'reset'])->name('password.update');

Route::get('/profile/user', action: function () {
    return view('profile_user');
})->name('profile_user');


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

// Admin Controller
Route::get('/admin', [AdminController::class, 'home'])->name('admin');
Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('admin.categories');
Route::get('/admin/category', [CategoriesController::class, 'add_category'])->name('admin.category');
Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
Route::get('/admin/product', [AdminController::class, 'product'])->name('admin.product');
Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
Route::get('/admin/order', [AdminController::class, 'order'])->name('admin.order');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/user', [AdminController::class, 'user'])->name('admin.user');

Route::post('/admin/mail', [MailController::class,'sendmail'])->name('mail.reset');


