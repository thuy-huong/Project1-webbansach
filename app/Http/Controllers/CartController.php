<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use session;
use Cart;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    public function save(request $_request){
        $productId = $_request->product_id_hidden;
        $productQty = $_request->product_qty;

        $product_infor =  DB::table('tbl_product')->where('product_id', $productId)->first();
        $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        $data['id'] = $productId;
        $data['qty'] =   $productQty;
        $data['name'] = $product_infor->product_name;
        $data['price'] = $product_infor->product_price;
        $data['weight'] =  '123';
        $data['options']['image'] =  $product_infor->product_image;
        Cart::add($data);
        Cart::setGlobalTax(5);
        return redirect('/show-cart');
    }
        public function show_cart(){
            $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
            return view('pages.cart.show_cart')->with('cate_product',$cate_product );
        }
        public function delete_to_cart($rowId){
            cart::update($rowId,0);
            return redirect('/show-cart');
        }
        public function update_cart_qty(request $_request){
            $rowId = $_request->rowId_cart;
            $qty = $_request->cart_quantity;
            cart::update( $rowId,  $qty);
            return redirect('/show-cart');
        }
        
} 
