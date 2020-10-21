@extends('frontend.master')
@section('view')
<div class="customer-login-area">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-xs-12">
				<div class="customer-login my-account">
					<form method="post" class="Login">
						<div class="form-fields">
							<h2>Đăng ký</h2>
							<p class="form-row form-row-wide">
								<label for="username">Họ & Tên <span class="required">*</span></label>
								<input required="" type="text" class="input-text" name="name" id="username" value="" placeholder="Họ & Tên">
							</p>
							<p class="form-row form-row-wide" requerid>
								<label>Email <span class="required">*</span></label>
								<input required="" class="input-text" type="Email" name="email" id="password" placeholder="Email">
							</p>
							<p class="form-row form-row-wide" requerid >
								<label>Số điện thoại <span class="required">*</span></label>
								<input required="" class="input-text" type="number" name="phone" id="password" placeholder="Điện thoại">
							</p>
							<p class="form-row form-row-wide" requerid>
								<label for="password">Mật khẩu <span class="required">*</span></label>
								<input required="" class="input-text" type="password" name="password" id="password" placeholder="**************">
							</p>
						</div>
						<div class="form-action">
							<div class="actions-log">
								<input type="submit" class="button" name="register" value="Đăng ký">
							</div>
							<br>
							<center><label style="color: red;">Bằng việc đăng kí, bạn đã đồng ý với chúng tôi về điều khoản dịch vụ & chính sách</label></center>
						</div>
						<center><label>Bạn đã có tài khoản? <a href="{{asset('customers/login')}}">Đăng nhập ngay</a></label></center>
						{{csrf_field()}}
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop