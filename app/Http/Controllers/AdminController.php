<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id =  session()->get('admin_id');
        if( $admin_id){
            return redirect('/dashboard');
        }else{
            return redirect('/admin')->send();
        }
    }
    public function index(){
        return view('adminLogin');
    }
    public function show_dashboard(Request $request){
        $this->AuthLogin();
        $count_customer = DB::table('tbl_customer')->count();
        $count_product = DB::table('tbl_product')->count();
        $count_order = DB::table('tbl_order')->count();
        $request->session()->put('count_customer', $count_customer);
        $request->session()->put('count_product', $count_product);
        $request->session()->put('count_order', $count_order);

        $new_order = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->limit(10)
        ->orderby('tbl_order.customer_id','desc')->get();
        return view('admin.dashboard')->with('new_order',$new_order);
    }
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result == true){
            $request->session()->put('admin_name', $result->admin_name);
            $request->session()->put('admin_id', $result->admin_id);
     
            return redirect::to('/dashboard');
        }else{
            $request->session()->put('message', 'Mật khẩu hoặc tài khoản sai!!');
            return redirect::to('/admin');
        }
    }
    public function logout(){
        $this->AuthLogin();
        session()->put('admin_name',null);
        session()->put('admin_id',null);
        return redirect::to('/admin');
    }
}