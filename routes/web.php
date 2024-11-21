<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AuthMiddleware;

Route::get('/dashboard', [ProductController::class, 'index'])->name('products.index')->middleware(AuthMiddleware::class);
Route::get('/add', [ProductController::class, 'create']);
Route::post('/product/store', [ProductController::class, 'store']);
// Route::Delete('/delete/{id}',[ProductController::class,])
Route::get('/edit/{id}', [ProductController::class, 'edit']);
Route::put('/product/{id}/update', [ProductController::class, 'update'])->name("product.update");
Route::get('/delete/{id}', [ProductController::class, 'delete']);  
Route::view('/', 'login');
Route::post('/login', [LoginController::class, 'login'])->name("user.login");
