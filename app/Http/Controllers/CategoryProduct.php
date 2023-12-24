<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
   public function list(){
      $list_category = DB::table('tbl_category')->get(); 
      return view('admin.list_category')->with('list_category', $list_category);
   }
   public function add(){
      return view('admin.add_category');
   }
   public function save(request $_request){
      $data = array();
      $data['category_id'] = $_request->category_id;
      $data['category_name'] = $_request->category_name;
      $data['category_status'] = $_request->category_status;

      DB::table('tbl_category')->insert([
         'category_id'     => $data['category_id'],
         'category_name' => $data['category_name'],
         'category_status' => $data['category_status']
     ]);
     session()->put('message', 'Thêm danh mục thành công');
      return redirect('/add-category');
   }
   public function edit($category_id){
      $edit_category = DB::table('tbl_category')->where('category_id', '=', $category_id)->get();
      return view('admin.edit_category')->with('edit_category', $edit_category);
   }

   public function update(request $_request,$category_id){
      $data = array();
      $data['category_id'] = $_request->category_id;
      $data['category_name'] = $_request->category_name;
      $data['category_status'] = $_request->category_status;
      DB::table('tbl_category')->where('category_id',$category_id)->update($data);
      session()->put('message', 'Cập nhật danh mục thành công');
      return redirect('/list-category');
   }
   public function delete($category_id){
     
      DB::table('tbl_category')->where('category_id',$category_id)->delete();
      session()->put('message', 'Xóa danh mục thành công');
      return redirect('/list-category');
   }


   ///home
   public function show_cate_home($category_id){
         $list_cate_home = DB::table('tbl_product')->join('tbl_category','tbl_category.category_id','=','tbl_product.product_cate')
      ->where('category_id', '=', $category_id)->get();
      $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
      return view('pages.show_product_cate')
         ->with('list_cate_home', $list_cate_home)
         ->with('cate_product',$cate_product);
   }
}
