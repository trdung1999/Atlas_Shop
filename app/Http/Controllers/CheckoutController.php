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
    	$cate_pro = DB::table('tbl_category_product')->where('tbl_category_product.category_status','0')->orderby('category_id','desc')->get();
        $brand_pro = DB::table('tbl_brand')->where('tbl_brand.brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.checkout.payment')->with('cate_pro',$cate_pro)->with('brand_pro',$brand_pro);
    }  
    public function order(Request $req){
        //get payment method
        $data = array();
        $data['payment_method'] = $req->payment_option;
        $data['payment_status'] ="Đang chờ xử lý";
        //insertGetId thêm dữ liệu và lấy luôn id
        $payment_id = DB::table('tbl_payment')->insertGetId($data);
        
        
        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] =Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] ="Đang chờ xử lý";
        //insertGetId thêm dữ liệu và lấy luôn id
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

          //insert order details
        $content = Cart::content();
        foreach ($content as $key) {
            $order_details_data = array();
            $order_details_data['order_id'] = $order_id;
            $order_details_data['product_id'] = $key->id;
            $order_details_data['product_name'] = $key->name;
            $order_details_data['product_price'] = $key->price;
            $order_details_data['product_sales_quantity'] =$key->qty;
            //insertGetId thêm dữ liệu và lấy luôn id   
            DB::table('tbl_order_details')->insert($order_details_data);
        }
        if($data['payment_method']==1){
            echo "Phương thức thanh toán này chúng tôi đang xử lý...";
        }else{
            Cart::destroy();
            $cate_pro = DB::table('tbl_category_product')->where('tbl_category_product.category_status','0')->orderby('category_id','desc')->get();
            $brand_pro = DB::table('tbl_brand')->where('tbl_brand.brand_status','0')->orderby('brand_id','desc')->get();
            return view('pages.checkout.handcash')->with('cate_pro',$cate_pro)->with('brand_pro',$brand_pro);
        }
        // return Redirect('payment');
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
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function manage_order(){
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->select('tbl_order.*','tbl_customer.customer_name','tbl_shipping.shipping_address')
        ->orderby('tbl_order.order_id','desc')->get();
        $manage_order = view('admin.manage_order')->with('all_order',$all_order);

        return view('admin_layout')->with('admin.manage_order',$manage_order);
    }
}
