<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('/index', function () {
    return view('index');
});

Route::get('/landing', function () {
    return view('landing');
});

Route::get("/signup", [UserController::class, 'signupForm'])->name('signup');
Route::post("/signup", [UserController::class, 'signupData'])->name('signup.post');

Route::get("/login", [UserController::class, 'loginForm'])->name('login');
Route::post("/login", [UserController::class, 'loginData'])->name('login.post');

Route::get("/profile", [UserController::class, 'profile'])->name('user.profile')->middleware('auth');
Route::get("/landing", [UserController::class, 'landing'])->name('landing');

Route::get("/dashboard", [ProductController::class, 'index'])->name('product.index');
Route::delete('/product/delete/{id}', [ProductController::class, 'deleteData'])->name('api.destroy');
Route::get('/product/create', [ProductController::class, 'createForm'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'sendData'])->name('api.post');
Route::get('/product/edit/{id}', [ProductController::class, 'editForm'])->name('product.edit');
Route::put('/product/put/{id}', [ProductController::class, 'updateData'])->name('api.put');

