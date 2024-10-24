<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProducsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/post/create',[PostController::class,'create']);
Route::get('/post/read/all',[PostController::class,'all']);
Route::get('/post/read/only/{id}', [PostController::class,'only']);
Route::get('/post/update/{id}', [PostController::class,'update']);
Route::get('/post/delete/{id}', [PostController::class,'delete']);

Route::get('/products/create',[ProducsController::class,'create']);
Route::post('/prodcuts/store',[ProducsController::class,'store'])->name('store.product');

Route::get('/', function () {
    return view('welcome');
});
