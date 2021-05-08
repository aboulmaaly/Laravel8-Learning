<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CarsController;

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);

Route::get('/posts', [PostsController::class, 'index']);

Route::resource('/cars', CarsController::class);
