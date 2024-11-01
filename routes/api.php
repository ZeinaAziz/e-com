<?php

use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;


//ORDER
Route::resource('orders',OrderController::class)->middleware('auth:sanctum');
Route::resource('categories',CategoryController::class);



// PRODUCT
// Route::resource('products',ProductController::class);
Route::get('products/show/{id}',[ProductController::class,'show']);
Route::get('products',[ProductController::class,'index']);
Route::get('products/search/{name}',[ProductController::class,'search']);


// Route::post('orders',[OrderController::class,'store']);
// Route::get('orders',[OrderController::class,'show']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
Route::post('/login',[AuthController::class,'login']);

