<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use session;
use Illuminate\Support\Facades\Redirect;
session_start();


class CheckoutController extends Controller
{
    public function login_checkout(){
        return view('pages.checkout.login_checkout');
    }

    // public function add_customer(Request $request){
    //     $data = array();
    //     $data['customer_name'] = $request->customer_name;
    //     $data['customer_email'] = $request->customer_email;
    //     $data['customer_password'] = $request->customer_password;
    //     $data['customer_phone'] = $request->customer_phone;
    //     // echo '<pre>';
    //     // print_r($data);
    //     // echo '</pre>';
    //     // // var_dump ($data);
    //     $customer_id = DB::table('tbl_customer')->insert([
    //         'customer_name' => $data['customer_name'],
    //         'customer_email' => $data['customer_email'],
    //         'customer_password' => $data['customer_password'],
    //         'customer_phone' => $data['customer_phone']
    //     ]); 
    //     session()->put('message', 'Đăng ký thành công, đăng nhập để tiếp tục ');     
    //     return redirect('/login-checkout');
    // }

    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = $request->customer_password;
        $data['customer_phone'] = $request->customer_phone;
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // // var_dump ($data);
        $customer_id = DB::table('tbl_customer')->insertGetId([
            'customer_name' => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'customer_password' => $data['customer_password'],
            'customer_phone' => $data['customer_phone']
        ]);

        $request->session()->put('customer_id', $customer_id);
        $request->session()->put('customer_name', $request->customer_name);
        
        return redirect('/checkout');
    }
    public function checkout(){
        return view('pages.checkout.show_checkout');
    }
    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_note'] = $request->shipping_note;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        $request->session()->put('shipping_id', $shipping_id);
        return redirect('/pay');
        
    }
}
