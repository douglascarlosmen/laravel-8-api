<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('product', ProductController::class);
Route::resource('client', ClientController::class);
Route::resource('order', OrderController::class);
