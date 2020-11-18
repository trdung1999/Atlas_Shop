<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// fontend
Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@index');

//Danh mục sản phẩm
Route::get('/danh_muc/{category_id}', 'CategoryProduct@show_category_home');
Route::get('/thuong_hieu/{brand_id}', 'BrandProduct@show_brand_home');
Route::get('/detail/{producy_id}', 'ProductController@detail');


// backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::get('/logout', 'AdminController@logout');
Route::post('/admin-dashboard', 'AdminController@dashboard');

//Category 
Route::get('/add_category_product', 'CategoryProduct@add');
Route::get('/all_category_product', 'CategoryProduct@all');

Route::get('/active_category_product/{catogory_product_id}', 'CategoryProduct@active');
Route::get('/unactive_category_product/{catogory_product_id}', 'CategoryProduct@unactive');

Route::post('/save_category_product', 'CategoryProduct@save');
Route::post('/update_category_product/{catogory_product_id}', 'CategoryProduct@update');

Route::get('/edit_category_product/{catogory_product_id}', 'CategoryProduct@edit');
Route::get('/delete_category_product/{catogory_product_id}', 'CategoryProduct@delete');

//Brand 
Route::get('/add_brand_product', 'BrandProduct@add');
Route::get('/all_brand_product', 'BrandProduct@all');

Route::get('/active_brand_product/{brand_product_id}', 'BrandProduct@active');
Route::get('/unactive_brand_product/{brand_product_id}', 'BrandProduct@unactive');

Route::post('/save_brand_product', 'BrandProduct@save');
Route::post('/update_brand_product/{brand_product_id}', 'BrandProduct@update');

Route::get('/edit_brand_product/{brand_product_id}', 'BrandProduct@edit');
Route::get('/delete_brand_product/{brand_product_id}', 'BrandProduct@delete');

//Product 
Route::get('/add_product', 'ProductController@add');
Route::get('/all_product', 'ProductController@all');

Route::get('/active_product/{product_id}', 'ProductController@active');
Route::get('/unactive_product/{product_id}', 'ProductController@unactive');

Route::post('/save_product', 'ProductController@save');
Route::post('/update_product/{product_id}', 'ProductController@update');

Route::get('/edit_product/{product_id}', 'ProductController@edit');
Route::get('/delete_product/{product_id}', 'ProductController@delete');

//cart
Route::post('/add_cart', 'CartController@add');
Route::get('/show_cart', 'CartController@show');
Route::get('/delete_cart/{rowId}', 'CartController@delete');
Route::post('/update', 'CartController@update');

//Checkout
Route::get('/login_checkout', 'CheckoutController@login');