<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\productController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;

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
Route::post('/tim-kiem', [HomeController::class, 'search']);

Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class, 'show_cate_home']);
Route::get('/chi-tiet-san-pham/{category_id}', [productController::class, 'details_product']);
// Route::get('/login', [IntroController::class, 'login']);

//backend admin
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
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);
Route::post('/update-cart-qty', [CartController::class, 'update_cart_qty']);


///checkout
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']);
Route::post('/update-checkout-customer/{shipping_id}', [CheckoutController::class, 'update_checkout_customer']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::post('/order-place', [CheckoutController::class, 'order_place']);

///customer 
///customer admin
Route::get('/list-customer', [CustomerController::class, 'list']);
Route::get('/delete-customer/{customer_id}', [CustomerController::class, 'delete']);
Route::get('/search-customer', [CustomerController::class, 'search']);

Route::get('/lock-open-customer/{customer_id}', [CustomerController::class, 'lock_open']);
Route::get('/lock-customer/{customer_id}', [CustomerController::class, 'lock']);

///customer home
Route::get('/login-customer', [CustomerController::class, 'login']);
Route::post('/add-customer', [CustomerController::class, 'add_customer']);
Route::post('/check-login', [CustomerController::class, 'check']);
Route::get('/logout-customer', [CustomerController::class, 'logout_customer']);
Route::get('/thong-tin-khachhang/{customer_id}', [CustomerController::class, 'customer_infor']);
Route::post('/update-customer/{customer_id}', [CustomerController::class, 'update_customer']);
Route::post('/update-password/{customer_id}', [CustomerController::class, 'update_password']);

///order 
Route::get('/manage-order', [CheckoutController::class, 'manage_order']);
Route::get('/view-order/{order_id}', [CheckoutController::class, 'view_order']);
Route::get('/accept-order/{order_id}', [CheckoutController::class, 'accept_order']);
Route::get('/delivery-order/{order_id}', [CheckoutController::class, 'delivery_order']);