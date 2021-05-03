<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;


Route::get('products', [ProductsController::class, 'index']);
Route::get('products/about', [ProductsController::class, 'about']);

// Route::get('products/', 'App\Http\Controllers\ProductsController@index');

// Route::get('products/', 'ProductsController@index');