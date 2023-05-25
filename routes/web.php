<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VarianCustomerController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/filter', [IndexController::class, 'index']);
