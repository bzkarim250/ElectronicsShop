<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;


Route::resource("products",ProductController::class);
Route::resource("supllier",SupplierController::class);

// public routes

// product routes
Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);

// user routes
Route::post("/register",[UserController::class,'register']);
Route::post("/login",[UserController::class,'login']);
Route::post("/logout",[UserController::class,'logout']);

// protected routes
Route::group(['middleware'=>['auth:sanctum']], function () {
    // product routes
    Route::post('/products',[ProductController::class,'store']);
    Route::put('/products/update/{id}',[ProductController::class,'update']);
    Route::delete('/products/delete/{id}',[ProductController::class,'destroy']);

    // user routes
    Route::post("/logout",[UserController::class,'logout']);
});
