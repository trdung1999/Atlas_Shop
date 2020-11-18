<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    public function add(Request $request){
    	$productId = $request->productid_hidden;
    	$quatity = $request->qty;
    	$product_info = DB::table('tbl_product')->where('product_id',$productId)->first();

    	$data['id'] = $product_info->product_id;
    	$data['qty'] = $quatity;
    	$data['name'] = $product_info->product_name;
    	$data['price'] = $product_info->product_price;
    	$data['weight'] = $product_info->product_price;
    	$data['options']['image'] = $product_info->product_image;

    	Cart::add($data);
    	return Redirect::to('show_cart');
    	
    }    	
    public function show(){
    	$cate_pro = DB::table('tbl_category_product')->where('tbl_category_product.category_status','0')->orderby('category_id','desc')->get();
    	$brand_pro = DB::table('tbl_brand')->where('tbl_brand.brand_status','0')->orderby('brand_id','desc')->get();

    	return view('pages.cart.show_cart')->with('cate_pro',$cate_pro)->with('brand_pro',$brand_pro);
    }
    public function delete($rowId){
    	Cart::update($rowId,0);

    	return Redirect::to('show_cart');
    }
    public function update(Request $req){
    	$rowId = $req->rowId_cart;
    	$qty = $req->cart_quantity;

    	Cart::update($rowId,$qty);
    	return Redirect::to('show_cart');	
    }
}
