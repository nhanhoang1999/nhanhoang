@extends('frontend.master')
@section('view')
<!-- breadcrumbs area start -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="container-inner">
					<ul>
						<li class="home">
							<a href="{{asset('view')}}">Trang chủ</a>
							<span><i class="fa fa-angle-right"></i></span>
						</li>
						<li class="category3"><span>Đăng nhập</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumbs area end -->
<!-- account-details Area Start -->
<div class="customer-login-area">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-xs-12">
				<div class="customer-login my-account">
					<form method="post" class="Login">
						<div class="form-fields">
							<h2>Đăng nhập</h2>
							<p class="form-row form-row-wide">
								<label for="username">Email <span class="required">*</span></label>
								<input required="" type="text" class="input-text" name="username" id="username" value="" placeholder="Email">
							</p>
							<p class="form-row form-row-wide">
								<label for="password">Mật khẩu <span class="required">*</span></label>
								<input required="" class="input-text" type="password" name="password" id="password" placeholder="**************">
							</p>
						</div>
						<div class="form-action">
							<p class="lost_password"> <a href="{{asset('customers/reset')}}" target="_blank">Quên mật khẩu?</a></p>
							<div class="actions-log">
								<input type="submit" class="button" name="login" value="Đăng nhập">
							</div>
							<label for="rememberme" class="inline"> 
								<input name="rememberme" type="checkbox" id="rememberme" value="forever"> Nhớ tôi </label>
							</div>
							<center><label>Bạn chưa có tài khoản? <a href="{{asset('customers/register')}}">Đăng kí ngay</a></label></center>
							<br>
							<div class="form-group row mb-0">
								
									<center><a href="{{ url('customers/login-facebook') }}" class="btn btn-primary"><i class="fa fa-facebook">  </i> Đăng nhập với  Facebook</a></center>							
							</div>
							{{csrf_field()}}
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- account-details Area end -->
	@stop