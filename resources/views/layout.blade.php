<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Atlas - Standing Desk</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/all.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i>(+84) 977-418-869</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> standingdeskhp@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="https://www.facebook.com/StandingDeskAtlas/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/Atlas_SD"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{ url('/home') }}"><img width="150" src="{{ asset('public/frontend/img/logo.png')}}" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <?php 
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id == NULL){
                                 ?>
                                    <li><a href="{{ URL::to('/login_checkout') }}"><i class="fa fa-user"></i>Tài Khoản</a></li>
                                    <li><a href="#"><i class="fa fa-star"></i>Yêu thích</a></li>
                                    <li><a href="{{ URL::to('/login_checkout') }}"><i class="fa fa-crosshairs"></i>Thanh Toán</a></li>
                                <?php 
                                    } else{
                                ?>
                                    <li><a href="#"><i class="fa fa-star"></i>Yêu thích</a></li>
                                    <li><a href="{{ URL::to('/checkout') }}"><i class="fa fa-crosshairs"></i>Thanh Toán</a></li>
                                <?php } ?>
                                
                                
                                <li><a href="{{ URL::to('/show_cart') }}"><i class="fa fa-shopping-cart"></i> Giở Hàng</a></li>                             
                                <?php 
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id != NULL){
                                 ?>
                                    <li><a href="{{ URL::to('/logout_checkout') }}"><i class="fa fa-lock"></i> Đăng Xuất</a></li>
                                <?php 
                                    } else{ 
                                ?>
                                    <li><a href="{{ URL::to('/login_checkout') }}"><i class="fa fa-lock"></i> Đăng Nhập</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ url('/home') }}" class="active">Trang Chủ</a></li>
                                <li class="dropdown"><a href="#">Cửa Hàng<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Sản Phẩm</a></li>
                                        <li><a href="product-details.html">Chi Tiết Sản Phẩm</a></li> 
                                        <li><a href="checkout.html">Phương Thức Thanh Toán</a></li> 
                                        <li><a href="{{ URL::to('/show_cart') }}">Giỏ Hàng</a></li> 
                                        <li><a href="login.html">Đăng Nhập</a></li> 
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Tin Tức<i class="fa fa-angle-down"></i></a>                                    
                                </li> 
                                <li><a href="{{ URL::to('/show_cart') }}">Giỏ Hàng</a></li>
                                <li><a href="contact-us.html">Liên Lạc</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <form action="{{ url('/search') }}" method="POST">
                            {{ csrf_field()}}
                            <div class="search_box pull-right">
                            <input type="text" name="keywords" placeholder="Tìm kiếm sản phẩm"/>
                            <input type="submit" style="margin-top: 0;color:black;" class="btn btn-primary btn-sm" value="Tìm kiếm">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>ATLAS</span></h1>
                                    <h2>Thoải mái - Tiện nghi - Chất lượng</h2>
                                    <p>Cung cấp bàn đứng hàng đầu Việt Nam</p>
                                    <button type="button" class="btn btn-default get">Mua ngay</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('public/frontend/img/sd2.jpg')}}" class="girl img-responsive" alt="" />
                                    <img src="{{ asset('public/frontend/img/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>ATLAS</span></h1>
                                    <h2>Thoải mái - Tiện nghi - Chất lượng</h2>
                                    <p>Đưa ra những khái niệm mới</p>
                                    <button type="button" class="btn btn-default get">Mua ngay</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('public/frontend/img/sd1.jpg')}}" class="girl img-responsive" alt="" />
                                    <img src="{{ asset('public/frontend/img/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>ATLAS</span></h1>
                                    <h2>Thoải mái - Tiện nghi - Chất lượng</h2>
                                    <p>Nâng cao chất lượng cuộc sống</p>
                                    <button type="button" class="btn btn-default get">Mua ngay</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('public/frontend/img/sd3.jpg')}}" class="girl img-responsive" alt="" />
                                    <img src="{{ asset('public/frontend/img/pricing.png')}}" class="pricing" alt="" />
                                </div>
                            </div>
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian">  
                        @foreach($cate_pro as $key => $cate)                         
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{ URL::to('danh_muc/'.$cate->category_id) }}">{{ $cate->category_name }}</a></h4>
                                </div>
                            </div>
                        @endforeach
                        </div><!--/category-products-->
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>Thương hiệu sản phẩm</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach($brand_pro as $key => $brand)
                                    <li><a href="{{ URL::to('thuong_hieu/'.$brand->brand_id) }}"> <span class="pull-right"></span>{{ $brand->brand_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                        
                       {{--  <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range--> --}}
                        {{-- 
                        <div class="shipping text-center"><!--shipping-->
                            <img src="{{('public/frontend/img/shipping.jpg')}}" alt="" />
                        </div><!--/shipping--> --}}
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    
                    @yield('content') 
                    
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>Atlas</span></h2>
                            <p>Bàn đứng - cung cấp sản phẩm hàng đầu Việt Nam</p>
                            <b><p>Tự hào kết hợp với các đối tác</p></b>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{ asset('public/frontend/img/dmx.jpg')}}" alt="" />
                                    </div>
                                    
                                </a>
                                <!-- <p>Điện máy xanh</p> -->
                                <h2>Điện máy xanh</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{ asset('public/frontend/img/mega.jpg')}}" alt="" />
                                    </div>
                                    
                                <!-- <p>Thế giới di động</p> -->
                                <h2>Mega Market</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{ asset('public/frontend/img/StarHome.png')}}" alt="" />
                                    </div>
                                    
                                </a>
                                <!-- <p>StarHome</p> -->
                                <h2>StarHome</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{ asset('public/frontend/img/casara.jpg')}}" alt="" />
                                    </div>
                                    
                                </a>
                                <!-- <p>CARASA</p> -->
                                <h2>CARASA</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="{{ asset('public/frontend/img/map.jpg')}}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Dịch Vụ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Trợ giúp</a></li>
                                <li><a href="#">Liên lạc với chúng tôi</a></li>
                                <li><a href="#">Đặt hàng</a></li>
                                <li><a href="#">Thay đổi địa điểm</a></li>
                                <li><a href="#">câu hỏi FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Thành Viên</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Phạm Quang Anh</a></li>
                                <li><a href="#">Nguyễn Trung Dũng</a></li>
                                <li><a href="#">Phạm Hải Dương</a></li>
                                <li><a href="#">Nguyễn Ngọc Bách</a></li>
                                <!-- <li><a href="#">Shoes</a></    li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Chính sách</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Điều khoản sử dụng</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                                <li><a href="#">Chính sách hoàn lại</a></li>
                                <li><a href="#">Hệ thống thanh toán</a></li>
                                <!-- <li><a href="#">Hệ thống vé</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Thông tin về Atlas</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Thông tin công ty</a></li>
                                <li><a href="#">Nghề nghiệp</a></li>
                                <li><a href="#">Địa điểm</a></li>
                                <li><a href="#">Liên kết doanh nghiệp</a></li>
                                <li><a href="#">Bản quyền</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>Thông tin về chúng tôi</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Địa chỉ email của bạn" />
                                <button style="margin-left: 1px;" type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i>Gửi</button>
                                <p>Cảm ơn bạn vì đã ghé thăm Atlas <br> Chúc bạn mua hàng vui vẻ !</p>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2020 ATLAS Inc. All rights reserved.</p>
                    <!-- <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p> -->
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    

    <script src="{{asset('public/frontend/js/all.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.j')}}s"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
</body>
</html>