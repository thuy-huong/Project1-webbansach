<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function index(){
        return view('adminLogin');
    }
    public function show_dashboard(){
        return view('admin.dashboard');
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
        session()->put('admin_name',null);
        session()->put('admin_id',null);
        return redirect::to('/admin');
    }
}