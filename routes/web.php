<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// home page route
Route::get('/', function () {
    return Inertia::render('Home/Home');
});

// shop page route
Route::get('/shop',function(){
    return Inertia::render('Shop/Shop');
});

// login
Route::get('/login',function(){
    return Inertia::render('Auth/Login');
});


// Register
Route::get('/register',function(){
   return Inertia::render('Auth/Register');
});

// Reset Password
Route::get('/reset-password',function(){
   return Inertia::render('Auth/ResetPassword');
});

// Forgot password
Route::get('/forgot-password',function(){
    return Inertia::render('Auth/ForgotPassword');
});

// Verify email
Route::get('/verify',function(){
   return Inertia::render('Auth/VerifyEmail');
});

//Profile route
Route::get('/profile/{id}',function(){
    return Inertia::render('Profile/partials/Profile');
});

// add id to route
Route::get('/product',function(){
    return Inertia::render('Product/Product');
});

//Cart page route
Route::get('/cart',function(){
    return Inertia::render('Cart/Cart');
});

// Checkout page route
Route::get('/checkout',function(){
    return Inertia::render('CheckOut/CheckOut');
});

// Admin panel
Route::get('/admin',function(){
    return Inertia::render('Admin/Admin');
});

//Admin Products
Route::get('/admin/products',function(){
    return Inertia::render('Admin/Products/Products');
});


// Orders
Route::get('/admin/orders',function(){
    return Inertia::render('Admin/Orders/Orders');
});

// Delieveries
Route::get('/admin/delieveries',function(){
    return Inertia::render('Admin/Delieveries/Delieveries');
});

// payments
Route::get('/admin/payments',function(){
    return Inertia::render('Admin/Payments/Payments');
});