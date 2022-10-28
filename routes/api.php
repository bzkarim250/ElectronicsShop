<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


Route::resource("products",ProductController::class);
Route::resource("supllier",SupplierController::class);
Route::resource("cart",CartController::class);
Route::resource("order",OrderController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
