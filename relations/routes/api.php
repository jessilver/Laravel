<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AddressesController;
use App\Http\Controllers\PedidosController;

Route::get('/users', [UsersController::class, 'index']);
Route::get('/users/{id}', [UsersController::class, 'showOne']);
Route::get('/users/{id}/addreses', [UsersController::class, 'showAddresses']);
Route::post('/users', [UsersController::class, 'store']);
Route::put('/users/{id}', [UsersController::class, 'update']);

Route::get('/addresses', [AddressesController::class, 'index']);
Route::get('/addresses/{id}', [AddressesController::class, 'showOne']);
Route::post('/addresses', [AddressesController::class, 'store']);
Route::put('/addresses/{id}', [AddressesController::class, 'update']);

Route::get('pedidos',[PedidosController::class, 'index']);
Route::get('pedidos/{id}',[PedidosController::class, 'showOne']);
Route::get('/pedidos/{id}/addreses', [PedidosController::class, 'showAddresses']);
Route::get('/pedidos/{id}/users', [PedidosController::class, 'showUsers']);
Route::post('pedidos',[PedidosController::class, 'store']);
Route::put('pedidos/{id}',[PedidosController::class, 'update']);


