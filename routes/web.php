<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
Route::get('/', [MainController::class, 'login'] 
)->name('login');

Route::get('/register', [MainController::class, 'register']
)->name('registration');





Route::post('/store_user', [MainController::class, 'store_user']
)->name('store_user');

Route::post('/login_user',[MainController::class, 'login_user'])->name('login_user');

Route::get('/home_page',[MainController::class, 'home_page'])->name('home_page');

Route::get('/logout',[MainController::class, 'logout'])->name('logout');

Route::get('/product_form',[ProductController::class, 'product_form'])->name('product_form');
Route::post('/store_product',[ProductController::class, 'store_product'])->name('store_product');
