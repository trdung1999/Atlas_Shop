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
    public function add(Request $req){
    	$data = array();
    	$data['customer_name'] = $req->customer_name;
    	$data['customer_email'] = $req->customer_email;
    	$data['customer_password'] = md5($req->customer_password);
    	$data['customer_phone'] = $req->customer_phone;

    	$customer_id = DB::table('tbl_customer')->insertGetId($data);
    	//insertGetId thêm dữ liệu và lấy luôn id
    	Session::put('customer_id',$customer_id);
    	Session::put('customer_name',$req->customer_name);
    	return Redirect::to('/checkout');
    }
    public function checkout(){
    	$cate_pro = DB::table('tbl_category_product')->where('tbl_category_product.category_status','0')->orderby('category_id','desc')->get();
    	$brand_pro = DB::table('tbl_brand')->where('tbl_brand.brand_status','0')->orderby('brand_id','desc')->get();

    	return view('pages.checkout.checkout')->with('cate_pro',$cate_pro)->with('brand_pro',$brand_pro);
    }

    public function save(Request $req){
    	$data = array();
    	$data['shipping_name'] = $req->shipping_name;
    	$data['shipping_email'] = $req->shipping_email;
    	$data['shipping_phone'] = $req->shipping_phone;
    	$data['shipping_address'] = $req->shipping_address;
    	$data['shipping_note'] = $req->shipping_note;

    	$shipping_id = DB::table('tbl_shipping')->insertGetId($data);
    	//insertGetId thêm dữ liệu và lấy luôn id
    	Session::put('shipping_id',$shipping_id);
    	// Session::put('customer_name',$req->customer_name);
    	return Redirect('payment');
    }
    public function payment(){
    		
    }
    public function logout(){
        Session::flush();
        return Redirect::to('/login_checkout');
    }
    public function login_customer(Request $req){
        $email = $req->c_email;
        $password = md5($req->c_password);

        $result = DB::table('tbl_customer')->where('customer_email',$email)->where('customer_password',$password)->first();

        
        if($result){
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');
        }else{
            return Redirect::to('/login_checkout');
        }     

    }
}
