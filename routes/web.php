<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('index');
});

Route::get("/signup", [ProductController::class, 'signup'])->name('signup');
Route::get("/login", [ProductController::class, 'login'])->name('login');
Route::get("/profile", [ProductController::class, 'profile'])->name('profile');
Route::get("/landing", [ProductController::class, 'landing'])->name('landing');


Route::get("/test", [ProductController::class, 'index']);
Route::get("/dashboard", [ProductController::class, 'index'])->name('index.index');
Route::delete('/produk/delete/{id}', [ProductController::class, 'destroy'])->name('index.destroy');
Route::get('/produk/create', [ProductController::class, 'createForm'])->name('index.create');
Route::post('/produk/store', [ProductController::class, 'sendData'])->name('index.post');
Route::get('/produk/edit/{id}', [ProductController::class, 'edit'])->name('index.edit');
Route::put('/produk/update/{id}', [ProductController::class, 'update'])->name('index.update');