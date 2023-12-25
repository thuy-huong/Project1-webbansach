<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use session;
use Illuminate\Support\Facades\Redirect;
session_start();

class productController extends Controller
{
    public function add(){
         $cate =  DB::table('tbl_category')->orderby('category_id','desc')->get(); 
         return view('admin.add_product')->with('cate', $cate);
     }
    public function list(){
         $list_product = DB::table('tbl_product')->join('tbl_category','tbl_category.category_id','=','tbl_product.product_cate')
         ->orderby('tbl_product.product_id','desc')->get();
         return view('admin.list_product')->with('list_product', $list_product);
     }
    public function save(request $_request){
        $data = array();
        $data['product_id'] = $_request->product_id;
        $data['product_name'] = $_request->product_name;
        $data['product_cate'] = $_request->product_cate;
        $data['product_author'] = $_request->product_author;
        $data['product_desc'] = $_request->product_desc;
        $data['product_price'] = $_request->product_price;
        $data['product_status'] = $_request->product_status;

        $get_image = $_request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image)); //phân tách chuỗi
            $new_image =  $name_image.rand(0,99) . '.' . $get_image->getClientOriginalExtension();
            // $new_image = rand(0,99).'.'.$get_image->getClientOriginalExtension(); //lấy đuôi của ảnh
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] =  $new_image;
            DB::table('tbl_product')->insert($data);
            session()->put('message', 'Thêm sản phẩm thành công');
             return redirect('/add-product');
        }
         $data['product_image'] = '' ;
         DB::table('tbl_product')->insert($data);
         session()->put('message', 'Thêm sản phẩm thành công');
         return redirect('/add-product');
    }
     public function edit($product_id){
         $product_cate =  DB::table('tbl_category')->orderby('category_id','desc')->get(); 
         $edit_product = DB::table('tbl_product')->where('product_id', '=', $product_id)->get();
         return view('admin.edit_product')->with('edit_product', $edit_product)->with('product_cate',$product_cate);
     }
  
     public function update(request $_request,$product_id){
         $data = array();
         $data['product_id'] = $_request->product_id;
         $data['product_name'] = $_request->product_name;
         $data['product_cate'] = $_request->product_cate;
         $data['product_author'] = $_request->product_author;
         $data['product_desc'] = $_request->product_desc;
         $data['product_price'] = $_request->product_price;
         $data['product_status'] = $_request->product_status;
         
         $get_image = $_request->file('product_image');
         if($get_image){
               $get_name_image = $get_image->getClientOriginalName();
               $name_image = current(explode('.',$get_name_image)); //phân tách chuỗi
               $new_image =  $name_image.rand(0,99) . '.' . $get_image->getClientOriginalExtension();
               // $new_image = rand(0,99).'.'.$get_image->getClientOriginalExtension(); //lấy đuôi của ảnh
               $get_image->move('public/uploads/product', $new_image);
               $data['product_image'] =  $new_image;
               DB::table('tbl_product')->where('product_id',$product_id)->update($data);
               session()->put('message', 'Cập nhật sản phẩm  thành công');
               return redirect('/list-product');
         }
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            session()->put('message', 'cập nhật sản phẩm thành công');
            return redirect('/list-product');
      }
      public function delete($product_id){
       
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        session()->put('message', 'Xóa sản phẩm thành công');
        return redirect('/list-product');
     }
     public function search(request $_request){
        $keyword = $_request->keyword;
        $list_product = DB::table('tbl_product')->join('tbl_category','tbl_category.category_id','=','tbl_product.product_cate')
        ->where('product_name','like','%'.$keyword.'%')->get();
        return view('admin.list_product')->with('list_product', $list_product);
     }


     
     //
     public function details_product($product_id){
        $details_product = DB::table('tbl_product')->join('tbl_category','tbl_category.category_id','=','tbl_product.product_cate')
        ->where('tbl_product.product_id','=',$product_id)->get();
        $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
        return view('pages.product.show_details_product')->with('details_product',$details_product)->with('cate_product',$cate_product );
     }

}
