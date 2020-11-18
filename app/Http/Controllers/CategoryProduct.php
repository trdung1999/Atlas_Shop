<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
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
    	return view('admin.add_category_product');
    }
    public function all(){
        $this->AuthLogin();
    	$all_category_product = DB::table('tbl_category_product')->get();
    	$manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
    	return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }
    public function save(Request $request){
        $this->AuthLogin();
    	$data = array();
    	$data['category_name'] = $request->category_product_name;
    	$data['category_desc'] = $request->category_product_desc;
    	$data['category_status'] = $request->category_product_status;
    	//thêm dữ liệu
    	DB::table('tbl_category_product')->insert($data);
    	Session::put('message', 'Thêm danh mục sản phẩm thành công !');
    	return Redirect::to('/add_category_product');
    }
    public function active($category_product_id){
        $this->AuthLogin();
    	DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
    	Session::put('message', 'Kích hoạt danh mục sản phẩm thành công !');
    	return Redirect::to('all_category_product');
    }
    public function unactive($category_product_id){
        $this->AuthLogin();
    	DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
    	Session::put('message', 'Hủy kích hoạt danh mục sản phẩm thành công !');
    	return Redirect::to('all_category_product');
    }
    public function edit($category_product_id){
        $this->AuthLogin();
    	$edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
    	$manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
    	return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }
    public function update(Request $request,$category_product_id){
        $this->AuthLogin();
    	$data = array();
    	$data['category_name'] = $request->category_product_name;
    	$data['category_desc'] = $request->category_product_desc;
    	//cập nhật dữ liệu
    	DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
    	Session::put('message', 'Cập nhật danh mục sản phẩm thành công !');
    	return Redirect::to('all_category_product');
    }
    public function delete($category_product_id){
        $this->AuthLogin();
    	DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
    	Session::put('message', 'Xóa danh mục sản phẩm thành công !');
    	return Redirect::to('all_category_product');
    }
    //end funtion admin page
    public function show_category_home($category_id){
        $cate_pro = DB::table('tbl_category_product')->where('tbl_category_product.category_status','0')->orderby('category_id','desc')->get();
        $brand_pro = DB::table('tbl_brand')->where('tbl_brand.brand_status','0')->orderby('brand_id','desc')->get();
        $cate_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->where('tbl_product.category_id',$category_id)->get();
        $category = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();

        return view('pages.category.show_category')->with('cate_pro',$cate_pro)->with('brand_pro',$brand_pro)->with('cate_by_id',$cate_by_id)->with('category',$category);
    }
        
}
