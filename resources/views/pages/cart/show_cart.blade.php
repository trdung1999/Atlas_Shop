@extends('layout')
@section('content')

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">				
				<ol class="breadcrumb">
				  <li><a href="{{ URL::to('/home') }}">Trang chủ</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
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
		</div>
	</section> <!--/#cart_items-->
	
<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Phương thức thanh toán</h3>
			</div>
			<div class="row">
				<!-- <div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Sử dụng mã giảm giá</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Sử dụng phiếu quà tặng</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Thuế và Phí vận chuyển</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Khu vực:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Khu vực:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Mã giảm giá:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div> -->
				<div class="col-sm-10">
					<div class="total_area">
						<ul>
							<li>Tổng <span>{{ Cart::total().'Đ' }}</span></li>
							<li>Thuế <span>{{ Cart::tax().'Đ' }}</span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Thành tiền <span>{{ Cart::total().'Đ' }}</span></li>
						</ul>
							<!-- <a class="btn btn-default update" href="">Mua hàng</a> -->
							<a class="btn btn-default check_out" href="{{ URL::to('/login_checkout')}}">Thanh toán</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection