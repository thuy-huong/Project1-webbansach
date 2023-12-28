<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use session;
use Carbon\Carbon;
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
        if($result == true&&$result->customer_status==1){
            session()->put('customer_name', $result->customer_name);
            session()->put('customer_id', $result->customer_id);
            return redirect('/trang-chu');
        }elseif($result == true&&$result->customer_status==0){
            session()->put('message', 'Tài khoản đã bị khóa');
            return redirect('/login-customer');
        }
        else{
            session()->put('message', 'Mật khẩu hoặc tài khoản sai!!');
            return redirect()->back();
        }
    }

    public function add_customer(Request $request){
        Carbon::setLocale('vi');
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = $request->customer_password;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_status'] = $request->customer_status;
        $data['created_at'] =  Carbon::now(); 
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // // var_dump ($data);
        $customer_email_tbl = DB::table('tbl_customer')->where('customer_email','like',$data['customer_email'])->get();
        if($customer_email_tbl==null){
            $customer_id = DB::table('tbl_customer')->insert( $data); 
            session()->put('message', 'Đăng ký thành công, đăng nhập để tiếp tục ');   
        }else{
            session()->put('message', 'Email đã được đăng ký'); 
        }

        return redirect('/login-checkout');
    }
    public function logout_customer(){
        session()->put('customer_name',null);
        session()->put('customer_id',null);
        session()->put('shipping_id',null);
        $new_product = DB::table('tbl_product')->where('product_status','=','1')->limit(10)
        ->orderby('tbl_product.product_id','desc')->get();
        $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
        return redirect()->back();
    }

    public function customer_infor(Request $request, $customer_id){
        $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
        $customer_infor = DB::table('tbl_customer')->where('customer_id','=',$customer_id)->get();

        $list_order = DB::table('tbl_order')
        ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_order.order_id')
        ->where('tbl_order.customer_id','=',$customer_id)
        ->get();

        return view('pages.customer.customer_infor')
        ->with('cate_product', $cate_product)
        ->with('customer_infor', $customer_infor)->with('list_order', $list_order);
    }

    public function update_customer(Request $request, $customer_id){
        $data =array();
        $data['customer_name'] = $request->customer_name_new;
        $data['customer_phone'] = $request->customer_phone_new;

        DB::table('tbl_customer')->where('customer_id','=',$customer_id)->update([
            'customer_name' => $data['customer_name'],
            'customer_phone' => $data['customer_phone']
        ]);
        session()->put('message', 'Cập nhật thông tin thành công'); 
        return redirect()->back();
    }
    public function update_password(Request $request, $customer_id){
        $password = $request->password;
        $password_new = $request->password_new;
        $customer = DB::table('tbl_customer')->where('customer_id','=',$customer_id)->get();
        foreach($customer as $key =>$customer_password ){
            if($customer_password->customer_password== $password){
                DB::table('tbl_customer')->where('customer_id','=',$customer_id)->update([
                    'customer_password' =>  $password_new
                ]);
                session()->put('customer_name',null);
                session()->put('shipping_id',null);
                session()->put('message', 'Thay đổi mật khẩu thành công, hãy đăng nhập lại'); 
                return redirect('/login-customer');
            }else{
                session()->put('message', 'Mật khẩu không đúng'); 
                return redirect()->back();
            }
        }
        
    }
       
}
