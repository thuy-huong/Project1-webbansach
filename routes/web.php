<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntroController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\productController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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
Route::get('/gioi-thieu', [HomeController::class, 'intro']);
Route::get('/san-pham', [HomeController::class, 'product']);

Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class, 'show_cate_home']);
Route::get('/chi-tiet-san-pham/{category_id}', [productController::class, 'details_product']);
// Route::get('/login', [IntroController::class, 'login']);

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
Route::get('/list-product', [productController::class, 'list']);
Route::get('/add-product', [productController::class, 'add']);
Route::post('/save-product', [productController::class, 'save']);
Route::get('/search-product', [productController::class, 'search']);

Route::get('/edit-product/{product_id}', [productController::class, 'edit']);
Route::get('/delete-product/{product_id}', [productController::class, 'delete']);
Route::post('/update-product/{product_id}', [productController::class, 'update']);


//cart
Route::post('/save-cart', [CartController::class, 'save']);


///checkout
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']);