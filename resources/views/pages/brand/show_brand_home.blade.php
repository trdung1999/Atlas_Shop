@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
                        @foreach($brand as $key => $brand)
                        <h2 class="title text-center">{{ $brand->brand_name }}</h2>
                        @endforeach
                        @foreach($brand_by_id as $key => $pro)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ URL::to('public/upload/product/'.$pro->product_image)}}" alt="" />
                                        <h2>{{ number_format($pro->product_price).'Đ' }}</h2>
                                        <p>{{ $pro->product_name }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>{{ $pro->product_price }}</h2>
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