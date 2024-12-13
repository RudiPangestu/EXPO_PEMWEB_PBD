<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('index');
});

Route::get("/dashboard", [ProductController::class, 'index'])->name('product.index');
Route::delete('/product/delete/{id}', [ProductController::class, 'deleteData'])->name('api.destroy');
Route::get('/product/create', [ProductController::class, 'createForm'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'sendData'])->name('api.post');
Route::get('/product/edit/{id}', [ProductController::class, 'editForm'])->name('product.edit');
Route::put('/product/put/{id}', [ProductController::class, 'updateData'])->name('api.put');