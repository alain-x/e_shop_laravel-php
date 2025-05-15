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

Route::get('/home_page',[MainController::class, 'home_page'])->middleware('auth')->name('home_page');

Route::get('/logout',[MainController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/product_form',[ProductController::class, 'product_form'])->middleware('auth')->name('product_form');
Route::post('/store_product',[ProductController::class, 'store_product'])->middleware('auth')->name('store_product');

Route::get('/edit_prduct/{product_id}',[ProductController::class, 'edit_product'])->middleware('auth')->name('edit_product');

Route::get('/delete_product/{product_id}',[ProductController::class, 'delete_product'])->middleware('auth')->name('delete_product');

Route::post('/update_product/{product_id}',[ProductController::class, 'update_product'])->middleware('auth')->name('update_product');


