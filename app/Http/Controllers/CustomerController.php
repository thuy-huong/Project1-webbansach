<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CustomerController extends Controller
{
    ///admin
    public function list(){
        $list_customer = DB::table('tbl_customer')
        ->orderby('tbl_customer.customer_id','desc')->get();
        return view('admin.list_customer')->with('list_customer', $list_customer);
    }
    public function delete($customer_id){
       
        DB::table('tbl_customer')->where('customer_id',$customer_id)->delete();
        session()->put('message', 'Xóa sản phẩm thành công');
        return redirect('/list-customer');
    }
    public function search(request $_request){
        $keyword = $_request->keyword;
        $list_customer = DB::table('tbl_customer')
        ->where('customer_name','like','%'.$keyword.'%')->get();
        return view('admin.list_customer')
        ->with('list_customer', $list_customer);
     }
     public function lock_open($customer_id){
        
        DB::table('tbl_customer')->where('customer_id',$customer_id)->update(['customer_status' => '1']);
        return redirect('/list-customer');
     }
     public function lock($customer_id){
        DB::table('tbl_customer')->where('customer_id',$customer_id)->update(['customer_status' => '0']);
        return redirect('/list-customer');
     }


    //home
    public function login(){
        $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
        return view('pages.checkout.login_checkout')->with('cate_product', $cate_product);
    }
    public function check(Request $request){
        $customer_email = $request->customer_email;
        $customer_password = $request->customer_password;
        $result = DB::table('tbl_customer')->where('customer_email',$customer_email)->where('customer_password',$customer_password)->first();
        if($result == true){
            session()->put('customer_name', $result->customer_name);
            session()->put('customer_id', $result->customer_id);

            return redirect('/trang-chu');
        }else{
            session()->put('message', 'Mật khẩu hoặc tài khoản sai!!');
            return redirect('/login-customer');
        }
    }

    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = $request->customer_password;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_status'] = $request->customer_status;
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // // var_dump ($data);
        $customer_id = DB::table('tbl_customer')->insert([
            'customer_name' => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'customer_password' => $data['customer_password'],
            'customer_phone' => $data['customer_phone'],
            'customer_status' => $data['customer_status']
        ]); 
        session()->put('message', 'Đăng ký thành công, đăng nhập để tiếp tục ');     
        return redirect('/login-checkout');
    }
    public function logout_customer(){
        session()->put('customer_name',null);
        session()->put('customer_id',null);
        $new_product = DB::table('tbl_product')->where('product_status','=','1')->limit(10)
        ->orderby('tbl_product.product_id','desc')->get();
        $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
        return view('pages.home')->with('new_product', $new_product)->with('cate_product',$cate_product );
    }
}
