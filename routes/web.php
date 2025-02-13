<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\MailController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WhiteListController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubCategoriesController;

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

// login for Customer and Seller
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_store'])->name('login_store');
// Route::post('/login_s', [SellersController::class, 'login_store'])->name('login_store_seller');

// Registration for Customer and Seller
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register_s', [AuthController::class, 'register_seller'])->name('register_seller');
Route::post('/register', [AuthController::class, 'register_store'])->name('register_store');


// Forgot_password for customer and seller
Route::get('/forgot_password', [AuthController::class, 'forgot_password'])->name('forgotpassword');
// Handle Reset Link
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/email_success/{email}',[AuthController::class, 'showEmailSuccess'])->name('email_success');
// Resent reset password link
Route::post('/resend-email', [AuthController::class, 'resentResetLinkEmail'])->name('resend.email');
// Password Reset Form
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
// Route::get('/reset-password/{token}', [UsersController::class, 'showResetForm'])->name('password.reset');
// Handle Password Reset
Route::post('/reset-password', [AuthController::class, 'reset'])->name('reset');

Route::post('/update-password', [AuthController::class, 'update_password'])->name('password.update');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// guest
// Route::get('/', function () {
//     return view('home');
// })->name('home');

//for testing
Route::get('/',[HomeController::class,'index'])->name('home');


// auth
Route::middleware(['auth'])->group(function () {

    Route::middleware(['is_seller'])->group(function () {
        Route::get('/profile/seller', [ProfileController::class,'seller_profile'])->name('profile_seller');
    });

    Route::middleware(['is_buyer'])->group(function () {
        Route::get('/profile/user', [ProfileController::class,'user_profile'])->name('profile_user');
    });

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

Route::get('/support', function () {
    return view('support');
})->name('support');

Route::get('/policy', function () {
    return view('terms_condition');
})->name('policy');


Route::get('/special-offer', function () {
    return view('special-offer');
})->name('special-offer');



// Whitelist Routes
Route::get('/whitelists', [WhiteListController::class,'index'])->name('white_list.index');
Route::post('/whitelists/{product_id}',[WhiteListController::class,'store'])->name('white_list.store');
Route::delete('/whitelists/delete/{product_id}',[WhiteListController::class,'delete'])->name('white_list.delete');

//


// Admin Controller
Route::get('/admin', [AdminController::class, 'home'])->name('admin.index');
Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
Route::get('/admin/order', [AdminController::class, 'order'])->name('admin.order');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/user', [AdminController::class, 'user'])->name('admin.user');
Route::post('/admin/mail', [MailController::class, 'sendmail'])->name('mail.reset');

// Admin auth
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login_store'])->name('admin.login_store');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
// Categories Controller

Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('admin.categories');
Route::get('/admin/categories/create', [CategoriesController::class, 'create'])->name('create_category');
Route::post('/admin/categories', [CategoriesController::class, 'store'])->name('add_category');
Route::get('/admin/categories/{category}/edit', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
Route::put('/admin/categories/{category}', [CategoriesController::class, 'update'])->name('update_category');
Route::delete('/admin/categories/{category}', [CategoriesController::class, 'destroy'])->name('admin.categories.destroy');

// sub categories

Route::get('/admin/sub-categories', [SubCategoriesController::class, 'index'])->name('admin.sub_categories');
Route::get('/admin/sub-categories/create', [SubCategoriesController::class, 'create'])->name('create_sub_category');
Route::post('/admin/sub-categories', [SubCategoriesController::class, 'store'])->name('add_sub_category');
Route::get('/admin/sub-categories/{sub_category}/edit', [SubCategoriesController::class, 'edit'])->name('admin.sub_categories.edit');
Route::put('/admin/sub-categories/{sub_category}', [SubCategoriesController::class, 'update'])->name('update_sub_category');
Route::delete('/admin/sub-categories/{sub_category}', [SubCategoriesController::class, 'destroy'])->name('admin.sub_categories.destroy');

// Product Routes
Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('create_product');
Route::post('/admin/products', [ProductController::class, 'store'])->name('add_product');
Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('update_product');
Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

Route::get('/login/line', function () {
    return Socialite::driver('line')->redirect();
})->name('line.login');

Route::get('/login/line/callback', [LineController::class, 'handleLineCallback']);
