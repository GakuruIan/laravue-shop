<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\productsController;
use App\Http\Controllers\CatergoryController;

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
Route::get('/shop',[ShopController::class,'Index']);

// login page
Route::get('/login',[UserController::class,'LoginForm'])->name('login');

//login function
Route::post('/login',[UserController::class,'Login']);

//Logout a user
Route::post('/logout',[UserController::class,'Logout']);

// Register form
Route::get('/register',[UserController::class, 'RegisterForm']);

//Register function
Route::post('/register',[UserController::class,'Register']);

//Profile route
Route::get('/profile',[UserController::class,'ShowProfile'])->middleware(['auth', 'verified']);

// Create  profile route
Route::post('/create/profile',[UserController::class,'CreateProfile']);

// Reset Password Page
Route::get('/reset-password/{token}',[ResetController::class,'ResetForm'])->middleware('guest')->name('password.reset');

//Reset password
Route::post('/reset-password',[ResetController::class,'HandleReset']);

// Forgot password page
Route::get('/forgot-password',[ResetController::class,'ForgotPassword']);

//Requesting Reset link 
Route::post('/forgot-password',[ResetController::class,'HandleResetEmail'])->middleware('guest')->name('password.email');

// Verify email
Route::get('/email/verify',[EmailController::class,'show'])->middleware('auth')->name('verification.notice');

// handling email verification
Route::get('/email/verify/{id}/{hash}',[EmailController::class,'HandleVerification'])->middleware(['auth', 'signed'])->name('verification.verify');

// resend the verification link
Route::post('/email/verification-notification',[EmailController::class,'ResendVerificationLink'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Fetch a single product
Route::get('/product/{id}',[ShopController::class,'FetchProduct']);


//Cart page route
Route::get('/cart',function(){
    return Inertia::render('Cart/Cart');
});

// Checkout page route
Route::get('/checkout',function(){
    return Inertia::render('CheckOut/CheckOut');
});

// Admin panel and admin role middleware
Route::get('/admin',function(){
    return Inertia::render('Admin/Admin');
})->middleware(['auth', 'verified']);

//Admin Products
Route::get('/admin/products',[productsController::class,'index']);

// create product
Route::post('/create/product',[productsController::class,'create']);

// Fetch single product
Route::get('/products/{id}',[productsController::class,'FetchProduct']);

// Updating a product
Route::put('/update/product/{id}',[productsController::class,'UpdateProduct']);

//Deleting a product 
Route::delete('/delete/product/{product}',[productsController::class,'DeleteProduct']);


// admin Catergories
Route::get('/admin/catergory',[CatergoryController::class,'show']);

// Fetching All catergories
Route::get('/catergory/all',[CatergoryController::class,'FetchCatergories']);

// create a catergory
Route::post('/create/catergory',[CatergoryController::class,'create']);

// updating a category
Route::put('/category/update/{id}',[CatergoryController::class,'update']);

// deleting catergory
Route::delete('/category/delete/{id}',[CatergoryController::class,'delete']);


// Orders
Route::get('/admin/orders',function(){
    return Inertia::render('Admin/Orders/Orders');
});

// create order
Route::post('/create/order',[OrderController::class,'create']);

// users order
Route::get('/myorders',[OrderController::class,'FetchUserOrders']);

// Delieveries
Route::get('/admin/delieveries',function(){
    return Inertia::render('Admin/Delieveries/Delieveries');
});

// payments
Route::get('/admin/payments',function(){
    return Inertia::render('Admin/Payments/Payments');
});

// successful payments
Route::get('/payment/success',function(){
    return Inertia::render('Success/success');
})->name('success');

// failed  payments
Route::get('/payment/failure',function(){
    return Inertia::render('Failure/Failure');
})->name('cancel');