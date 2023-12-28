<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use session;
use Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
session_start();


class CheckoutController extends Controller
{
    public function login_checkout(){
        $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
        return view('pages.checkout.login_checkout')->with('cate_product', $cate_product);
    }
    public function checkout(){
        $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
        return view('pages.checkout.show_checkout')->with('cate_product', $cate_product);
    }
    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['customer_id'] = session()->get('customer_id');
        $data['shipping_email'] = $request->shipping_email;
       
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_note'] = $request->shipping_note;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        session()->put('shipping_id', $shipping_id);
        return redirect('/payment');
        
    }
    public function update_checkout_customer(Request $request, $shipping_id){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_note'] = $request->shipping_note;
        session()->put('shipping_id', $shipping_id);
        DB::table('tbl_shipping')->where('shipping_id',$shipping_id)->update($data);
        return redirect('/payment');

    }
    public function payment(){
        $customer_id_ss = session()->get('customer_id');
        $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
        $shipping_customer = DB::table('tbl_shipping')
        ->join('tbl_customer','tbl_shipping.customer_id','=','tbl_shipping.customer_id')
        ->where('tbl_shipping.customer_id','=', $customer_id_ss)
        ->limit(1)
        ->orderby('shipping_id','desc')->get();
        return view('pages.checkout.payment')->with('cate_product', $cate_product)
        ->with('shipping_customer', $shipping_customer);
    }

    public function order_place(Request $request){
        //insert payment method
        $data_payment = array();
        $data_payment['payment_method'] = $request->payment_option;
        $data_payment['payment_status'] = 'Đang chờ xử lý';
        $data_payment['created_at'] =  Carbon::now();
        $payment_id = DB::table('tbl_payment')->insertGetId($data_payment);

        //insert order
        $data_order = array();
        $data_order['customer_id'] = session()->get('customer_id');
        $data_order['shipping_id'] = session()->get('shipping_id');
        $data_order['payment_id'] = $payment_id;
        $data_order['order_total'] = Cart::total(0);
        $data_order['order_status'] = 'Đang chờ xử lý';
        $data_order['created_at'] =  Carbon::now(); 
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
            $data_order_details['created_at'] =  Carbon::now(); 
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


    ///order
    public function manage_order(){
        $list_order = DB::table('tbl_order')
        ->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')
        ->select('tbl_order.*', 'tbl_customer.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        return view('admin.manage_order')->with('list_order', $list_order);
    }
    public function view_order($order_id){
        $orderById = DB::table('tbl_order')
        ->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')
        ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
        ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_order.order_id')
        ->select('tbl_order.*', 'tbl_customer.*', 'tbl_shipping.*','tbl_order_details.*')
        ->first();
        $product = DB::table('tbl_order_details')
        ->join('tbl_order','tbl_order_details.order_id','=','tbl_order.order_id')
        ->where('tbl_order_details.order_id','=',$order_id)->get();
        return view('admin.view_order')
        ->with('orderById', $orderById)
        ->with('product', $product);
    }

    public function accept_order($order_id){
        
        DB::table('tbl_order')->where('order_id',$order_id)->update(['order_status' => 'Chờ giao hàng']);
        return redirect('/manage-order');
    }
    public function delivery_order($order_id){
        
        DB::table('tbl_order')->where('order_id',$order_id)->update(['order_status' => 'Giao hàng thành công']);
        return redirect('/manage-order');
    }

}
