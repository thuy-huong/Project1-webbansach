<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    public function save(request $_request){
        $productId = $_request->product_id_hidden;
        $productQty = $_request->product_qty;

        $product_infor =  DB::table('tbl_product')->where('product_id', $productId)->get();
        $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        return view('pages.cart.show_cart')->with('cate_product',$cate_product );
        
    }
} 
