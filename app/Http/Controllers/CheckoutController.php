<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use session;
use Cart;
use Illuminate\Support\Facades\Redirect;
session_start();


class CheckoutController extends Controller
{
    public function login_checkout(){
        $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
        return view('pages.checkout.login_checkout')->with('cate_product', $cate_product);
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
    //     $customer_id = DB::table('tbl_customer')->insertGetId([
    //         'customer_name' => $data['customer_name'],
    //         'customer_email' => $data['customer_email'],
    //         'customer_password' => $data['customer_password'],
    //         'customer_phone' => $data['customer_phone']
    //     ]);

    //     $request->session()->put('customer_id', $customer_id);
    //     $request->session()->put('customer_name', $request->customer_name);
        
    //     return redirect('/checkout');
    // }
    public function checkout(){
        $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
        return view('pages.checkout.show_checkout')->with('cate_product', $cate_product);
    }
    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_note'] = $request->shipping_note;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        session()->put('shipping_id', $shipping_id);
        return redirect('/payment');
        
    }
    public function payment(){
        $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
        return view('pages.checkout.payment')->with('cate_product', $cate_product);;

    }

    public function order_place(Request $request){
        //insert payment method
        $data_payment = array();
        $data_payment['payment_method'] = $request->payment_option;
        $data_payment['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data_payment);

        //insert order
        $data_order = array();
        $data_order['customer_id'] = session()->get('customer_id');
        $data_order['shipping_id'] = session()->get('shipping_id');
        $data_order['payment_id'] = $payment_id;
        $data_order['order_total'] = Cart::total(0);
        $data_order['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_order')->insertGetId($data_order);

        //insert order_details
        $content = Cart::content();
        $data_order_details = array();
        foreach($content as $v_content){
            $data_order_details['order_id'] = $order_id;
            $data_order_details['product_id'] = $v_content->id;
            $data_order_details['product_name'] = $v_content->name;
            $data_order_details['product_price'] = $v_content->price;
            $data_order_details['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($data_order_details);
        }
        if($data_payment['payment_method']==1){
            Cart::destroy();
            $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
            return view('pages.checkout.handcash')->with('cate_product', $cate_product);;
        }else{
            echo 'Chuyển khoản';
        }
       
    }
}
