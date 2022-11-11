<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;



// public routes

// product routes
Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);

// user routes
Route::post("/register",[UserController::class,'register']);
Route::post("/login",[UserController::class,'login']);
Route::post("/logout",[UserController::class,'logout']);

// protected routes
Route::group(['middleware'=>['auth:sanctum' AND 'can:delete product']], function () {
    Route::delete('/products/delete/{id}',[ProductController::class,'destroy']);
});

Route::group(['middleware'=>['auth:sanctum','can:create product']], function () {
    Route::post('/products',[ProductController::class,'store']);
});

Route::group(['middleware'=>['auth:sanctum' AND 'can:update product']], function () {
    Route::put('/products/update/{id}',[ProductController::class,'update']);
});


Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post("/logout",[UserController::class,'logout']);
});


Route::resource("products",ProductController::class);
Route::resource("supllier",SupplierController::class);
Route::resource("cart",CartController::class);
Route::resource("order",OrderController::class);
