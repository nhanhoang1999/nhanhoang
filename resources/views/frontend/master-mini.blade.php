<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="vi">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Lavoro-Điện thoại, Laptop, Phụ kiện chính hãng</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
        <!-- Favicon
        	============================================ -->
        	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        	<base href="{{asset('public/layout/frontend')}}/">
		<!-- Fonts
			============================================ -->
			<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
			<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>      
			<link rel="stylesheet" href="css/bootstrap.min.css">    
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/owl.theme.css">     
			<link rel="stylesheet" href="css/owl.transitions.css">
			<link rel="stylesheet" href="css/font-awesome.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="fonts/font-icon.css">
			<link rel="stylesheet" href="css/jquery-ui.css">
			<link rel="stylesheet" href="css/meanmenu.min.css">
			<link rel="stylesheet" href="custom-slider/css/nivo-slider.css" type="text/css" />
			<link rel="stylesheet" href="custom-slider/css/preview.css" type="text/css" media="screen" />        
			<link rel="stylesheet" href="css/animate.css">       
			<link rel="stylesheet" href="css/normalize.css">        
			<link rel="stylesheet" href="css/main.css">         
			<link rel="stylesheet" href="style.css">        
			<link rel="stylesheet" href="css/responsive.css">
			<script src="js/ajax.js"></script>
			<script src="js/vendor/modernizr-2.8.3.min.js"></script>
			<script src="js/vendor/jquery-1.11.1.min.js"></script>
		</head>
		<body class="home-one">

			<header class="short-stor">
				<div class="container-fluid">
					<div class="row">
						<!-- logo start -->
						<div class="col-md-3 col-sm-12 text-center nopadding-right">
							<div class="top-logo">
								<a href="{{asset('view')}}"><img src="img/logo.gif" alt="" /></a>
							</div>
						</div>
						<!-- logo end -->
						<!-- mainmenu area start -->
						<div class="col-md-6 text-center">
							<div class="mainmenu">
								<nav>
									<ul>
										@if(Auth::guard('customers')->check())
										<li class="expand"><a href="{{asset('view')}}">Trang chủ</a></li>
										<li class="expand"><a href="shop-grid.html">Sản phẩm</a>
											<ul class="restrain sub-menu">
												
												@foreach($catelist as $cate)
												<li><a href="#">{{$cate->c_name}}</a></li>
												@endforeach	
												
											</ul>
										</li>
										<li class="expand"><a href="{{asset('view/new')}}">Tin Tức</a>

										</li>
										<li class="expand"><a href="{{asset('view/contact')}}">Liên Hệ</a></li>
										@else
										<li class="expand"><a href="{{asset('view')}}">Trang chủ</a></li>
										<li class="expand"><a href="shop-grid.html">Sản phẩm</a>
											<ul class="restrain sub-menu">
												
												@foreach($catelist as $cate)
												<li><a href="#">{{$cate->c_name}}</a></li>
												@endforeach	
												
											</ul>
										</li>
										<li class="expand"><a href="{{asset('view/new')}}">Tin Tức</a>		
										</li>
										<li class="expand"><a href="{{asset('view/contact')}}">Liên Hệ</a></li>
										<li class="expand"><a href="{{asset('customers/login')	}}">Đăng nhập</a></li>
										<li class="expand"><a href="{{asset('customers/register')}}">Đăng ký</a></li>
										@endif
									</ul>
								</nav>
							</div>
							<!-- mobile menu start -->
							<div class="row">
								<div class="col-sm-12 mobile-menu-area">
									<div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
										<span class="mobile-menu-title">Menu</span>
										<nav>
											<ul>
												@if(Auth::guard('customers')->check())
												<li><a href="{{asset('view')}}">Trang chủ</a>
												</li>
												<li><a href="shop-grid.html">Sản phẩm</a>
													<ul>
														@foreach($catelist as $cate)
														<li><a href="#">{{$cate->c_name}}</a></li>
														@endforeach	
													</ul>
												</li>
												<li><a href="{{asset('view/new')}}">Tin tức</a>													
												</li>
												<li><a href="{{asset('view/contact')}}">Liên hệ</a></li>
												@else
												<li><a href="{{asset('view')}}">Trang chủ</a>
												</li>
												<li><a href="shop-grid.html">Sản phẩm</a>
													<ul>
														@foreach($catelist as $cate)
														<li><a href="#">{{$cate->c_name}}</a></li>
														@endforeach	
													</ul>
												</li>
												<li><a href="{{asset('view/new')}}">Tin tức</a>													
												</li>
												<li><a href="{{asset('view/contact')}}">Liên hệ</a></li>
												<li><a href="{{asset('customers/login')	}}">Đăng nhập</a></li>
												<li><a href="{{asset('customers/register')}}">Đăng ký</a></li>
												@endif
											</ul>
										</nav>
									</div>						
								</div>
							</div>
							<!-- mobile menu end -->
						</div>
						<!-- mainmenu area end -->
						<!-- top details area start -->
						<div class="col-md-3 col-sm-12 nopadding-left">
							<div class="top-detail">
								<!-- addcart top start -->
								<div class="disflow">
									<div class="circle-shopping expand">
										<div class="shopping-carts text-right">
											<div class="cart-toggler">
												<a href="{{asset('shopping/cart')}}"><i class="icon-bag"></i></a>
												<span class="cart-quantity">{{Cart::count()}}</span>
											</div>										
											<div class="restrain small-cart-content">
												@foreach(Cart::content() as $cart)
												<ul class="cart-list">	
													<li>
														<a class="sm-cart-product" href="{{asset('view/detail/'.$cart->id.'/'.$cart->options->slug.'.html')}}">
															<img src="{{asset('lib/storage/app/public/'.$cart->options->img)}}" alt="">
														</a>
														<div class="small-cart-detail">
															<a class="remove" href="{{asset('shopping/delete/'.$cart->rowId)}}"><i class="fa fa-times-circle"></i></a>
															<a href="#" class="edit-btn"><img src="img/btn_edit.gif" alt="Edit Button" /></a>
															<a class="small-cart-name" href="{{asset('view/detail/'.$cart->id.'/'.$cart->options->slug.'.html')}}">{{$cart->name}}</a>
															<span class="quantitys"><strong>{{$cart->qty}}</strong>x<span>{{number_format($cart->price,0,',','.')}}</span></span>
														</div>
													</li>

												</ul>
												@endforeach
												<p class="total">Tổng tiền: <span class="amount">{{Cart::total()}} VND</span></p>
												<p class="buttons">
													<a href="{{asset('gio-hang/thanhtoan')}}" class="button">Thanh toán</a>
												</p>
											</div>										
										</div>
									</div>
								</div>
								<!-- addcart top start -->
								<!-- search divition start -->
								<div class="disflow">
									<div class="header-search expand">
										<div class="search-icon fa fa-search"></div>
										<div class="product-search restrain">
											<div class="container nopadding-right">
												<form action="index.html" id="searchform" method="get">
													<div class="input-group">
														<input type="text" class="form-control" maxlength="128" placeholder="Bạn muốn tìm gì...">
														<span class="input-group-btn">
															<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
														</span>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- search divition end -->
								<div class="disflow">
									<div class="expand dropps-menu">
										@if(Auth::guard('customers')->check())
										<a data-toggle="dropdown" class="dropdown-toggle" href="#">
											<span class="username" style="color: black;text-transform:none;">Xin chào,{{Auth::guard('customers')->user()->name}}</span>
											<b class="caret"></b>
										</a>
										<ul class="restrain language">
											<li><a href="{{asset('history/all/'.Auth::guard('customers')->user()->id)}}" style="text-transform:none;">Đơn mua</a></li>
											<li><a href="{{asset('shopping/cart')}}" style="text-transform:none;">Giỏ hàng</a></li>
											<li><a href="{{asset('customers/logout')}}" style="text-transform:none;">Đăng xuất</a></li>
											@else
											<a href="#"><i class="fa fa-align-right"></i></a>
											<ul class="restrain language">
												<li class="expand"><a href="{{asset('customers/login')	}}">Đăng nhập</a></li>
												<li class="expand"><a href="{{asset('customers/register')}}">Đăng ký</a></li>
											</ul>
											@endif
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- top details area end -->
					</div>
				</div>
			</header>
			<!---->
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
									<li class="category3"><span>Đơn mua</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- breadcrumbs area end -->
			<!-- wishlist-area-start -->
			<div class="wishlist-concept">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<aside class="widge-topbar">
								<div class="bar-title">
									<div class="bar-ping"><img src="img/bar-ping.png" alt=""></div>
									@if(Auth::guard('customers')->check())
									<h2>{{Auth::guard('customers')->user()->name}} <a href=""><h4><i class="fa fa-pencil">Sửa hồ sơ</i></h4></a></h2>
									@endif
								</div>
							</aside>
							<aside>
								<div class="wish-left-menu">
									<ul>
										<li><a href="{{asset('history/all/'.Auth::guard('customers')->user()->id)}}">Tất cả đơn hàng</a></li>
										<li><a href="{{asset('history/processing/'.Auth::guard('customers')->user()->id)}}">Chờ xử lý</a></li>
										<li><a href="{{asset('history/transporting/'.Auth::guard('customers')->user()->id)}}">Đang giao</a></li>
										<li><a href="{{asset('history/received/'.Auth::guard('customers')->user()->id)}}">Đã giao</a></li>
									</ul>
								</div>
							</aside>
						</div>
						<!-- header area end -->
						@include('errors.note')
						@yield('view1')

						<!-- FOOTER START -->
						<footer>
							<!-- info footer start -->
							<div class="info-footer">
								<div class="container">
									<div class="row">
										<div class="col-md-3 col-sm-4">
											<div class="info-fcontainer">
												<div class="infof-icon">
													<i class="fa fa-map-marker"></i>
												</div>
												<div class="infof-content">
													<h3>Địa chỉ</h3>
													<p>Main Street, Banasree, Dhaka</p>
												</div>
											</div>
										</div>
										<div class="col-md-3 col-sm-4">
											<div class="info-fcontainer">
												<div class="infof-icon">
													<i class="fa fa-phone"></i>
												</div>
												<div class="infof-content">
													<h3>Đường dây nóng</h3>
													<p>+88 0173 7803547</p>
												</div>
											</div>
										</div>
										<div class="col-md-3 col-sm-4">
											<div class="info-fcontainer">
												<div class="infof-icon">
													<i class="fa fa-envelope"></i>
												</div>
												<div class="infof-content">
													<h3>Email hỗ trợ</h3>
													<p>admin@bootexperts.com</p>
												</div>
											</div>
										</div>
										<div class="col-md-3 hidden-sm">
											<div class="info-fcontainer">
												<div class="infof-icon">
													<i class="fa fa-clock-o"></i>
												</div>
												<div class="infof-content">
													<h3>Giờ mở cửa</h3>
													<p>Sat - Thu : 9:00 am - 22:00 pm</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- info footer end -->
							<!-- footer address area start -->
							<div class="address-footer">
								<div class="container">
									<div class="row">
										<div class="col-md-6 col-xs-12">
											<address>Copyright © <a href="http://bootexperts.com/">BootExperts.</a> All Rights Reserved</address>
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="footer-payment pull-right">
												<a href="#"><img src="img/payment.png" alt="" /></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- footer address area end -->
						</footer>

						<!-- FOOTER END -->

						<!-- JS -->

 		<!-- jquery-1.11.3.min js
 			============================================ -->         
 			<script src="js/vendor/jquery-1.11.3.min.js"></script>
 			
 		<!-- bootstrap js
 			============================================ -->         
 			<script src="js/bootstrap.min.js"></script>
 			
		<!-- Nivo slider js
			============================================ --> 		
			<script src="custom-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
			<script src="custom-slider/home.js" type="text/javascript"></script>
			
   		<!-- owl.carousel.min js
   			============================================ -->       
   			<script src="js/owl.carousel.min.js"></script>
   			
		<!-- jquery scrollUp js 
			============================================ -->
			<script src="js/jquery.scrollUp.min.js"></script>
			
		<!-- price-slider js
			============================================ --> 
			<script src="js/price-slider.js"></script>
			
		<!-- elevateZoom js 
			============================================ -->
			<script src="js/jquery.elevateZoom-3.0.8.min.js"></script>
			
		<!-- jquery.bxslider.min.js
			============================================ -->       
			<script src="js/jquery.bxslider.min.js"></script>
			
		<!-- mobile menu js
			============================================ -->  
			<script src="js/jquery.meanmenu.js"></script>	
			
   		<!-- wow js
   			============================================ -->       
   			<script src="js/wow.js"></script>
   			
   		<!-- plugins js
   			============================================ -->         
   			<script src="js/plugins.js"></script>
   			
   		<!-- main js
   			============================================ -->           
   			<script src="js/main.js"></script>
   		</body>
   		</html>