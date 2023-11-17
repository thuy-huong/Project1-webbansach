<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntroController;
use App\Http\Controllers\AdminController;

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
//frontend
Route::get('/', [HomeController::class,'index']);

Route::get('/trang-chu', [HomeController::class, 'index']);

Route::get('/gioi-thieu', [IntroController::class, 'index']);

//backend
Route::get('/admin', [AdminController::class, 'index']);

    