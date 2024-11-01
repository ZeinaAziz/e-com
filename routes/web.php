<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    $products=Product::get();
    return view('dashboard',compact('products'));
})->middleware(['auth', 'verified'])->name('dashboard')->middleware('checkAdmin');

Route::get('products/{id}/notAva',[ProductController::class,'notAva'])->middleware(['auth', 'verified','checkAdmin'])->name('products.notAva');
Route::get('products/{id}/ava',[ProductController::class,'ava'])->middleware(['auth', 'verified','checkAdmin'])->name('products.ava');
Route::get('products/showdelcategories',[ProductController::class,'showdelcategories'])->middleware(['auth', 'verified','checkAdmin'])->name('products.showdelcategories');
Route::get('products/{id}/restore',[ProductController::class,'restore'])->middleware(['auth', 'verified','checkAdmin'])->name('products.restore');
Route::delete('products/{id}/forceDelete',[ProductController::class,'forceDelete'])->middleware(['auth', 'verified','checkAdmin'])->name('products.forceDelete');
Route::resource('products',ProductController::class)->middleware(['auth', 'verified','checkAdmin']);

Route::get('/empty', function () {
    return view('empty');
})->name('empty');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('categories',CategoryController::class)->middleware('checkAdmin');
Route::get('categories/showproducts/{id}',[CategoryController::class,'showproducts'])->middleware('checkAdmin')->name('categories.showproducts');




Route::get('users/showproducts/{id}',[UserController::class,'showproducts'])->middleware('checkSuperAdmin')->name('users.showproducts');
Route::get('users/block/{id}',[UserController::class,'block'])->middleware(['auth', 'verified','checkSuperAdmin'])->name('users.block');
Route::get('users/unblock/{id}',[UserController::class,'unblock'])->middleware(['auth', 'verified','checkSuperAdmin'])->name('users.unblock');

Route::get('users/admin/{id}',[UserController::class,'admin'])->middleware(['auth', 'verified','checkSuperAdmin'])->name('users.admin');
Route::get('users/unadmin/{id}',[UserController::class,'unadmin'])->middleware(['auth', 'verified','checkSuperAdmin'])->name('users.unadmin');
Route::resource('users',UserController::class)->middleware(['auth', 'verified','checkSuperAdmin']);
Route::get('orders/{id}/pending',[OrderController::class,'pending'])->middleware(['auth', 'verified','checkAdmin'])->name('orders.pending');
Route::get('orders/{id}/delivered',[OrderController::class,'delivered'])->middleware(['auth', 'verified','checkAdmin'])->name('orders.delivered');
Route::get('orders/{id}/shipped',[OrderController::class,'shipped'])->middleware(['auth', 'verified','checkAdmin'])->name('orders.shipped');
Route::delete('orders/{id}/forceDelete',[OrderController::class,'forceDelete'])->middleware(['auth', 'verified','checkAdmin'])->name('orders.forceDelete');
Route::resource('orders',OrderController::class)->middleware(['auth', 'verified','checkAdmin']);

require __DIR__.'/auth.php';
