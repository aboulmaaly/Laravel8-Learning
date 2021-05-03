<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;


Route::get('products', [ProductsController::class, 'index']);
// Route::get('products/{id}', [ProductsController::class, 'show'])->where('id', '[0-9]+');
Route::get(
    'products/{name}/{id}', 
    [ProductsController::class, 'show']
)->where([
    'name' => '[a-zA-Z]+',
    'id' => '[0-9]+'
]);
Route::get('products/about', [ProductsController::class, 'about']);