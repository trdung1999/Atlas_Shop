@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Kết quả tìm kiếm</h2>
                        @foreach($search_product as $key => $pro)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ URL::to('public/upload/product/'.$pro->product_image)}}" alt="" />
                                        <h2>{{ number_format($pro->product_price).'Đ' }}</h2>
                                        <p>{{ number_format($pro->product_price).'Đ' }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>{{ number_format($pro->product_price).'Đ' }}</h2>
                                            <p>{{ $pro->product_name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                        <li><a href="{{ URL::to('detail/'.$pro->product_id)}}"><i class="fa fa-plus-square"></i>Chi tiết sản phẩm</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>  
                        @endforeach                      
                    </div>
@endsection