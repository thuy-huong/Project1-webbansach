<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryProduct extends Controller
{
   public function list(){
      return view('admin.list_category');
   }
   public function add(){
      return view('admin.add_category');
   }
}
