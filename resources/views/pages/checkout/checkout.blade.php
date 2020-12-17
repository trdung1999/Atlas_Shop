@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
				  <li class="active">Thanh toán</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="register-req">
				<p>Vui lòng đăng ký hoặc đăng nhập để thanh toán</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Thông tin về bạn</p>
							<div class="form-one">
								<form action="{{ URL::to('/save_checkout') }}" method="POST">
									{{ csrf_field() }}
									<input type="text" name="shipping_email" placeholder="Địa chỉ email">
									<input type="text" name="shipping_name" placeholder="Họ và tên">
									<input type="text" name="shipping_phone" placeholder="Số điện thoại">
									<input type="text" name="shipping_address" placeholder="Địa chỉ">
									<textarea name="shipping_note"  placeholder="Yêu cầu thêm về đơn hàng của bạn" rows="5"></textarea>
									<input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm up">
								</form>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<!-- <div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div> -->

			<!-- <div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div> -->
	</section> <!--/#cart_items-->

@endsection