<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntroController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;

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
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::post('/admin_dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);

//catelogy
Route::get('/list-category', [CategoryProduct::class, 'list']);
Route::get('/add-category', [CategoryProduct::class, 'add']);
Route::post('/save-category', [CategoryProduct::class, 'save']);

Route::get('/edit-category/{category_id}', [CategoryProduct::class, 'edit']);
Route::get('/delete-category/{category_id}', [CategoryProduct::class, 'delete']);
Route::post('/update-category/{category_id}', [CategoryProduct::class, 'update']);

///product
