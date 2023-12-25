<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){
        $new_product = DB::table('tbl_product')->where('product_status','=','1')->limit(10)
        ->orderby('tbl_product.product_id','desc')->get();
        $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
        return view('pages.home')->with('new_product', $new_product)->with('cate_product',$cate_product );
    }
    public function intro(){
        $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
        return view('pages.Intro')->with('cate_product',$cate_product );
    }
    public function  product(){
        $list_product = DB::table('tbl_product')
        ->join('tbl_category','tbl_category.category_id','=','tbl_product.product_cate')->get();
        $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
        return view('pages.product')->with('cate_product', $cate_product)->with('list_product', $list_product);
    }

    public function search(Request $request){
        $keywords = $request->keyword_submit;
        $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();

        $search_product = DB::table('tbl_product')
        ->where('product_name','like','%'.$keywords.'%')->get();
        return view('pages.product.search')->with('cate_product', $cate_product)
        ->with('search_product', $search_product);

    }

    
}
