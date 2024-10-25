<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AddressesController;

Route::get('/users', [UsersController::class, 'index']);
Route::get('/addresses', [AddressesController::class, 'index']);
