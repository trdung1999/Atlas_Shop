<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
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
    	return view('admin.add_brand_product');
    }
    public function all(){
        $this->AuthLogin();
    	$all_brand_product = DB::table('tbl_brand')->get();
    	$manager_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
    	return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }
    public function save(Request $request){
        $this->AuthLogin();
    	$data = array();
    	$data['brand_name'] = $request->brand_product_name;
    	$data['brand_desc'] = $request->brand_product_desc;
    	$data['brand_status'] = $request->brand_product_status;
    	//thêm dữ liệu
    	DB::table('tbl_brand')->insert($data);
    	Session::put('message', 'Thêm thương hiệu sản phẩm thành công !');
    	return Redirect::to('/add_brand_product');
    }
    public function active($brand_product_id){
        $this->AuthLogin();
    	DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
    	Session::put('message', 'Kích hoạt thương hiệu sản phẩm thành công !');
    	return Redirect::to('all_brand_product');
    }
    public function unactive($brand_product_id){
        $this->AuthLogin();
    	DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
    	Session::put('message', 'Hủy kích hoạt thương hiệu sản phẩm thành công !');
    	return Redirect::to('all_brand_product');
    }
    public function edit($brand_product_id){
        $this->AuthLogin();
    	$edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();
    	$manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
    	return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
    }
    public function update(Request $request,$brand_product_id){
        $this->AuthLogin();
    	$data = array();
    	$data['brand_name'] = $request->brand_product_name;
    	$data['brand_desc'] = $request->brand_product_desc;
    	//cập nhật dữ liệu
    	DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update($data);
    	Session::put('message', 'Cập nhật thương hiệu sản phẩm thành công !');
    	return Redirect::to('all_brand_product');
    }
    public function delete($brand_product_id){
        $this->AuthLogin();
    	DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();
    	Session::put('message', 'Xóa thương hiệu sản phẩm thành công !');
    	return Redirect::to('all_brand_product');
    }
    public function show_brand_home($brand_id){
        $cate_pro = DB::table('tbl_category_product')->where('tbl_category_product.category_status','0')->orderby('category_id','desc')->get();
        $brand_pro = DB::table('tbl_brand')->where('tbl_brand.brand_status','0')->orderby('brand_id','desc')->get();
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->where('tbl_product.brand_id',$brand_id)->get();
        $brand = DB::table('tbl_brand')->where('tbl_brand.brand_id',$brand_id)->limit(1)->get();

        Session::put('message', 'Sản phẩm của thương hiệu này chưa có !');

        return view('pages.brand.show_brand_home')->with('cate_pro',$cate_pro)->with('brand_pro',$brand_pro)->with('brand_by_id',$brand_by_id)->with('brand',$brand);
    }
}
