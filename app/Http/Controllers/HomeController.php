<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    //
    public function index(){
    	$cate_pro = DB::table('tbl_category_product')->where('tbl_category_product.category_status','0')->orderby('category_id','desc')->get();
    	$brand_pro = DB::table('tbl_brand')->where('tbl_brand.brand_status','0')->orderby('brand_id','desc')->get();
    	// $all_product = DB::table('tbl_product')
    	// ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    	// ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
    	// ->orderby('tbl_product.product_id','desc')->get(); 
    	$all_product = DB::table('tbl_product')->where('tbl_product.product_status','0')->orderby('product_id','desc')->limit(6)->get();
    	return view('pages.home')->with('cate_pro',$cate_pro)->with('brand_pro',$brand_pro)->with('all_pro',$all_product);
    }
}
