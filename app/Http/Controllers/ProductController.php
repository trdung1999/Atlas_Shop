<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add(){
        $this->AuthLogin();
    	$cate_pro = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    	$brand_pro = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
    	return view('admin.add_product')->with('cate_pro',$cate_pro)->with('brand_pro',$brand_pro);
    }
    public function all(){
        $this->AuthLogin();
    	$all_product = DB::table('tbl_product')
    	->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    	->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
    	->orderby('tbl_product.product_id','desc')->get();
    	$manager_product = view('admin.all_product')->with('all_product',$all_product);
    	return view('admin_layout')->with('admin.all_product',$manager_product);
    }
    public function save(Request $request){
        $this->AuthLogin();
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['product_price'] = $request->product_price;
    	// $data['product_image'] = $request->product_image;
    	$data['product_desc'] = $request->product_desc;
    	$data['product_content'] = $request->product_content;
    	$data['category_id'] = $request->product_cate;
    	$data['brand_id'] = $request->product_brand;
    	$data['product_status'] = $request->product_status;

    	$get_image = $request->file('product_image');

    	if($get_image){
    		$get_name_img = $get_image->getClientOriginalName();
    		$name_img = current(explode('.', $get_name_img));
    		$new_img = $name_img.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		$get_image->move('public/upload/product',$new_img);
    		$data['product_image'] = $new_img;
    		DB::table('tbl_product')->insert($data);
	    	Session::put('message', 'Thêm sản phẩm thành công !');
	    	return Redirect::to('add_product');
    	}
    	//không input -> null
    	$data['product_image'] = 'Không có hình ảnh cho sản phẩm này';
    	//add data
    	DB::table('tbl_product')->insert($data);
    	Session::put('message', 'Thêm sản phẩm thành công !');
    	return Redirect::to('add_product');
    }
    public function active($product_id){
        $this->AuthLogin();
    	DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
    	Session::put('message', 'Kích hoạt sản phẩm thành công !');
    	return Redirect::to('all_product');
    }
    public function unactive($product_id){
        $this->AuthLogin();
    	DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
    	Session::put('message', 'Hủy kích hoạt sản phẩm thành công !');
    	return Redirect::to('all_product');
    }
    public function edit($product_id){
        $this->AuthLogin();
    	$cate_pro = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    	$brand_pro = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

    	$edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
    	$manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_pro',$cate_pro)->with('brand_pro',$brand_pro);
    	return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    public function update(Request $request,$product_id){
        $this->AuthLogin();
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['product_price'] = $request->product_price;
    	// $data['product_image'] = $request->product_image;
    	$data['product_desc'] = $request->product_desc;
    	$data['product_content'] = $request->product_content;
    	$data['category_id'] = $request->product_cate;
    	$data['brand_id'] = $request->product_brand;
    	$data['product_status'] = $request->product_status;

    	$get_image = $request->file('product_image');
    	//$get_image = $request->product_image;
    	if($get_image){
    		$get_name_img = $get_image->getClientOriginalName();
    		$name_img = current(explode('.', $get_name_img));
    		$new_img = $name_img.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		$get_image->move('public/upload/product',$new_img);
    		$data['product_image'] = $new_img;
    		DB::table('tbl_product')->where('product_id',$product_id)->update($data);
	    	Session::put('message', 'Thêm sản phẩm thành công !');
	    	return Redirect::to('all_product');
    	}
    	//cập nhật dữ liệu
    	//$data['product_image'] = 'Không có hình ảnh cho sản phẩm này';
    	DB::table('tbl_product')->where('product_id',$product_id)->update($data);
    	Session::put('message', 'Cập nhật sản phẩm thành công !');
    	return Redirect::to('all_product');
    }
    public function delete($product_id){
        $this->AuthLogin();
    	DB::table('tbl_product')->where('product_id',$product_id)->delete();
    	Session::put('message', 'Xóa sản phẩm thành công !');
    	return Redirect::to('all_product');
    }
    //end admin page
    public function detail($product_id){
        $cate_pro = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_pro = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $detail_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

        foreach ($detail_product as $key => $value) {
            $category_id = $value->category_id;
        }

        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIN('tbl_product.product_id',[$product_id])->get();

        return view('pages.product.detail_product')->with('cate_pro',$cate_pro)->with('brand_pro',$brand_pro)->with('product_detail',$detail_product)->with('related',$related_product);
    }
}
