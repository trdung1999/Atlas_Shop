@extends('layout')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập tài khoản</h2>
						<form action="#">
							<input type="text" name="user_email" placeholder="Tên tài khoản" />
							<input type="password" name="user_password" placeholder="Mật khẩu" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Nhớ mật khẩu
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Tạo tài khoản mới</h2>
						<form action="#">
							<input type="text" placeholder="Tên tài khoản"/>
							<input type="email" placeholder="Địa chỉ email"/>
							<input type="password" placeholder="Mật khẩu"/>
							<button type="submit" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection