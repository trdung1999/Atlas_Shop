@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div><!--/breadcrums-->


		<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div>
			<div class="table-responsive cart_info">
				<?php
					$content = Cart::content();
					?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $v_content)
						<tr>
							<td class="cart_product">
								<a href=""><img width="80" src="{{ URL::to('public/upload/product/'.$v_content->options->image) }}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{ $v_content->name }}</a></h4>
								<p>Mã sản phẩm: {{ $v_content->id }}</p>
							</td>
							<td class="cart_price">
								<p>{{ number_format($v_content->price).'Đ' }}</p>								
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">	
									<form action="{{ URL::to('/update') }}" method="POST">
										{{ csrf_field() }}
										<input class="cart_quantity_input" type="number" name="cart_quantity" value="{{ $v_content->qty }}">
										<input type="hidden" value="{{ $v_content->rowId }}" name="rowId_cart" class="form-control">
										<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm up">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php
										$total = $v_content->price * $v_content->qty;
										echo number_format($total).'Đ';
									?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ URL::to('/delete_cart/'.$v_content->rowId) }}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<h4 style="margin: 40px 0;font-size: 30px;">Hình thức thanh toán</h4>
			<form action="{{ URL::to('/order') }}" method="POST">
				{{ csrf_field() }}
				<div class="payment-options">
					<span>
						<label><input name="payment_option" value="1" type="checkbox">Thanh toán ATM</label>
					</span>
					<span>
						<label><input name="payment_option" value="2" type="checkbox">Thanh toán khi giao hàng</label>
					</span>
			<!-- 		<span>
						<label><input type="checkbox"> Paypal</label>
					</span> -->
					<input type="submit" name="send_order_place" value="Đặt Hàng" class="btn btn-primary btn-sm">
				</div>
			</form>
		</div>
	</section> <!--/#cart_items-->

@endsection