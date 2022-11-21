<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

Route::get('/',function(){
    return view('home');
});




















Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});

// public routes

// product routes
Route::get('/',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);
Route::post('/products/create',[ProductController::class,'store']);
Route::resource("/products",ProductController::class);

// user routes
Route::post("/register",[UserController::class,'register']);
Route::post("/login",[UserController::class,'login']);
Route::get("/logout",[UserController::class,'logout']);

// protected routes
Route::group(['middleware'=>['auth:sanctum','can:delete product']], function () {
    Route::delete('/products/delete/{id}',[ProductController::class,'destroy']);
});

Route::group(['middleware'=>['auth:sanctum','can:create product']], function () {
    Route::post('/products',[ProductController::class,'store']);
});

Route::group(['middleware'=>['auth:sanctum','can:update product']], function () {
    Route::put('/products/update/{id}',[ProductController::class,'update']);
});


Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post("/logout",[UserController::class,'logout']);
});


// supplier

Route::get("/supplier/getAll",[SupplierController::class,'index']);
Route::post("/supplier/create",[SupplierController::class,'store']);
Route::get("/supplier/get/{id}",[SupplierController::class,'show']);
Route::delete("/supplier/delete/{id}",[SupplierController::class,'destroy']);
Route::put("/supplier/update/{id}",[SupplierController::class,'update']);

// Route::resource("supllier",SupplierController::class);
Route::group(['middleware'=>['auth:sanctum','can:delete order']], function () {
    Route::delete('/orders/delete/{id}',[OrderController::class,'destroy']);
});

