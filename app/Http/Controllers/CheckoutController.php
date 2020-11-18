<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function login(){
    	$cate_pro = DB::table('tbl_category_product')->where('tbl_category_product.category_status','0')->orderby('category_id','desc')->get();
    	$brand_pro = DB::table('tbl_brand')->where('tbl_brand.brand_status','0')->orderby('brand_id','desc')->get();

    	return view('pages.checkout.login_checkout')->with('cate_pro',$cate_pro)->with('brand_pro',$brand_pro);
    }
}
