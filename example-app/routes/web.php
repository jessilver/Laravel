<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;
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

// Page \\
Route::get('/',[HomeController::class, 'home'])->name('home.page');

// Auth \\
Route::get('/login',[AuthController::class, 'login'])->name('auth.login'); // view = auth/login
Route::get('/register',[AuthController::class, 'register'])->name('auth.register'); // view = auth/login


// Task \\
Route::get('/task', [TasksController::class, 'index'])->name('task.page'); // view = tasks/show
Route::get('/task/new', [TasksController::class, 'new'])->name('task.new.page'); // view = tasks/new
Route::post('/task/new', [TasksController::class, 'create'])->name('task.crate');
Route::post('/task/edit/{id}', [TasksController::class, 'edit'])->name('task.edit');
Route::post('/task/delete/{id}', [TasksController::class, 'delete'])->name('task.delete');

