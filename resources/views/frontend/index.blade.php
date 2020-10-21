@extends('frontend.master')
@section('view')
<!-- product section start -->
<div class="our-product-area">
	<div class="container">
		<!-- area title start -->
		<div class="area-title">
			<h2>Tất cả sản phẩm</h2>
		</div>
		<!-- area title end -->
		<!-- our-product area start -->
		<div class="row">
			<div class="col-md-12">
				<div class="features-tab">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs">
						<li role="presentation" class="active"><a href="#home" data-toggle="tab"><b>Gợi ý sản phẩm</b></a></li>
						<li role="presentation"><a href="#profile" data-toggle="tab"><b>Bán chạy nhất</b></a></li>
					</ul>
					<!-- Tab pans -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home">
							<div class="row">
								<div class="features-curosel">
									@foreach($product as $pro)
									<div class="col-lg-12 col-md-12">
										<!-- single-product start -->
										<div class="single-product first-sale">
											@if($pro->p_promotion !=0)
											<span class="sale-text">Giảm {{$pro->p_promotion}} %</span>
											@endif
											<div class="product-img">
												<a href="{{asset('view/detail/'.$pro->p_id.'/'.$pro->p_slug.'.html')}}">
													<img class="primary-image" src="{{asset('lib/storage/app/public/'.$pro->p_img)}}" style="width: 200px; height: 250px;" alt="" />
												</a>
												<div class="action-zoom">
													<div class="add-to-cart">
														<a href="{{asset('view/detail/'.$pro->p_id.'/'.$pro->p_slug.'.html')}}" title="Xem ngay">Xem ngay</a>
													</div>
												</div>
												<div class="actions">
													<div class="action-buttons">
														<div class="add-to-links">
															<form method="POST" action="{{asset('shopping/add')}}">
																{{csrf_field()}}
																<input type="hidden" name="productid_hidden" value="{{$pro->p_id}}">
																<div class="compare-button">
																	<button type="submit" class="icon-bag btn" title="Thêm vào giỏ hàng"></button>
																</div>
															</form>	
														</div>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h2 class="product-name"><a href="{{asset('view/detail/'.$pro->p_id.'/'.$pro->p_slug.'.html')}}">{{$pro->p_name}}</a></h2>
												<p class="product-name" style="color: red;">{{number_format($pro->p_price-(($pro->p_price/100)*$pro->p_promotion),0,',','.')}} VND</p>
												@if($pro->p_promotion != 0)
												<del>{{number_format($pro->p_price,0,',','.')}} VND</del>
												@endif
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="profile">
							<div class="row">
								<div class="features-curosel">
									@foreach($sellings as $selling)
									<div class="col-lg-12 col-md-12">
										<!-- single-product start -->
										<div class="single-product first-sale">
											@if($selling->p_promotion !=0)
											<span class="sale-text">Giảm {{$selling->p_promotion}} %</span>
											@endif
											<div class="product-img">
												<a href="{{asset('view/detail/'.$selling->p_id.'/'.$selling->p_slug.'.html')}}">
													<img class="primary-image" src="{{asset('lib/storage/app/public/'.$selling->p_img)}}" style="width: 200px; height: 250px;" alt="" />
												</a>
												<div class="action-zoom">
													<div class="add-to-cart">
														<a href="{{asset('view/detail/'.$selling->p_id.'/'.$selling->p_slug.'.html')}}" title="Xem ngay">Xem ngay</a>
													</div>
												</div>
												<div class="actions">
													<div class="action-buttons">
														<div class="add-to-links">
															<form method="POST" action="{{asset('shopping/add')}}">
																{{csrf_field()}}
																<input type="hidden" name="productid_hidden" value="{{$selling->p_id}}">
																<div class="compare-button">
																	<button type="submit" class="icon-bag btn" title="Thêm vào giỏ hàng"></button>
																</div>
															</form>	
														</div>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h2 class="product-name"><a href="{{asset('view/detail/'.$selling->p_id.'/'.$selling->p_slug.'.html')}}">{{$pro->p_name}}</a></h2>
												<p class="product-name" style="color: red;">{{number_format($pro->p_price-(($selling->p_price/100)*$selling->p_promotion),0,',','.')}} VND</p>
												@if($selling->p_promotion != 0)
												<del>{{number_format($selling->p_price,0,',','.')}} VND</del>
												@endif
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>				
				</div>
			</div>
			<!-- our-product area end -->	
		</div>
	</div>
	<!-- product section end -->
	<!-- product section start -->
	<div class="our-product-area new-product">
		<div class="container">
			<div class="area-title">
				<h2>Sản phẩm mới</h2>
			</div>
			<!-- our-product area start -->
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="features-curosel">
							<!-- single-product start -->
							@foreach($new as $news)
							<div class="col-lg-12 col-md-12">
								<!-- single-product start -->
								<div class="single-product first-sale">
									@if($news->p_promotion !=0)
									<span class="sale-text">Giảm {{$news->p_promotion}}%</span>
									@endif
									<div class="product-img">
										<a href="{{asset('view/detail/'.$news->p_id.'/'.$news->p_slug.'.html')}}">
											<img class="primary-image" src="{{asset('lib/storage/app/public/'.$news->p_img)}}" style="width: 200px; height: 250px;" alt="" />
										</a>
										<div class="action-zoom">
											<div class="add-to-cart">
												<a href="{{asset('view/detail/'.$news->p_id.'/'.$news->p_slug.'.html')}}" title="Xem nhanh">Xem nhanh</a>
											</div>
										</div>
										<div class="actions">
											<div class="action-buttons">
												<div class="add-to-links">
													<form method="POST" action="{{asset('shopping/add')}}">
														{{csrf_field()}}
														<input type="hidden" name="productid_hidden" value="{{$news->p_id}}">
														<div class="compare-button">
															<button type="submit" class="icon-bag btn" title="Thêm vào giỏ hàng"></button>
														</div>
													</form>									
												</div>
											</div>
										</div>
									</div>
									<div class="product-content">
										<h2 class="product-name"><a href="{{asset('view/detail/'.$pro->p_id.'/'.$news->p_slug.'.html')}}">{{$news->p_name}}</a></h2>
										<p class="product-name" style="color: red;">{{number_format($news->p_price-(($news->p_price/100)*10),0,',','.')}} VND</p>
										@if($news->p_promotion != 0)
										<del>{{number_format($news->p_price,0,',','.')}} VND</del>
										@endif
									</div>
								</div>
							</div>
							@endforeach
							<!-- single-product end -->
						</div>
					</div>	
				</div>
			</div>
			<!-- our-product area end -->	
		</div>
	</div>
	<!-- product section end -->
	<!-- latestpost area start -->
	<div class="our-product-area new-product">
		<div class="container">
			<div class="area-title">
				<h2>Tin tức mới</h2>
			</div>
			<div class="row">
				<div class="all-singlepost">
					@foreach($posts as $post)
					<!-- single latestpost start -->
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="single-post">
							<div class="post-thumb">
								<a href="#">
									<img width="250px" src="{{asset('lib/storage/app/public/'.$post->post_img)}}" alt=""/>
								</a>
							</div>
							<div class="post-thumb-info">
								<div class="post-time">
									<a href="{{asset('view/detail-post/'.$post->post_id)}}">{{$post->post_title}}</a>
								</div>
								<div class="postexcerpt">
									<p style="font-size: small;"></p>
									<a href="{{asset('view/detail-post/'.$post->post_id)}}" class="read-more">Chi tiết bài viết</a>
								</div>
							</div>
						</div>
					</div>
					<!-- single latestpost end -->
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<!-- latestpost area end -->
	<!-- block category area start -->
	{{--
	<div class="block-category">
		<div class="container">
			<div class="row">
				<!-- featured block start -->
				<div class="col-md-4">
					<!-- block title start -->
					<div class="block-title">
						<h2>Nổi bật</h2>
					</div>
					<!-- block title end -->
					<!-- block carousel start -->
					<div class="block-carousel">
						<div class="block-content">
							<!-- single block start -->
							<div class="single-block">
								<div class="block-image pull-left">
									<a href="product-details.html"><img src="img/block-cat/block-1.jpg" alt="" /></a>
								</div>
								<div class="category-info">
									<h3><a href="product-details.html">Donec ac tempus</a></h3>
									<p>Nunc facilisis sagittis ullamcorper...</p>
									<div class="cat-price">$235.00 <span class="old-price">$333.00</span></div>
									<div class="cat-rating">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
									</div>								
								</div>
							</div>
							<!-- single block end -->
						</div>
					</div>
					<!-- block carousel end -->
				</div>
				<!-- featured block end -->
				<!-- featured block start -->
				<div class="col-md-4">
					<!-- block title start -->
					<div class="block-title">
						<h2>Giảm giá</h2>
					</div>
					<!-- block title end -->
					<!-- block carousel start -->
					<div class="block-carousel">
						<div class="block-content">
							<!-- single block start -->
							@foreach($bestsales as $bestsale)
							<div class="single-block">
								<div class="block-image pull-left">
									<img src="{{asset('lib/storage/app/public/'.$bestsale->p_img)}}" alt="" height="150px" width="180px" />
								</div>
								<div class="category-info">
									<h3><a href="{{asset('view/detail/'.$pro->p_id.'/'.$bestsale->p_slug.'.html')}}">{{$bestsale->p_name}}</a></h3>
									<div class="cat-price"><p class="product-name" style="color: red;">{{number_format($news->p_price-(($news->p_price/100)*10),0,',','.')}} VND</p>@if($news->p_promotion != 0)
										<del>{{number_format($news->p_price,0,',','.')}} VND</del>
										@endif</div>
									<div class="cat-rating">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
									</div>								
								</div>
							</div>
							@endforeach
							<!-- single block end -->
						</div>
					</div>
					<!-- block carousel end -->
				</div>
				<!-- featured block end -->
				<!-- featured block start -->
				<div class="col-md-4">
					<!-- block title start -->
					<div class="block-title">
						<h2>Phổ biến</h2>
					</div>
					<!-- block title end -->
					<!-- block carousel start -->
					<div class="block-carousel">
						<div class="block-content">
							<!-- single block start -->
							<div class="single-block">
								<div class="block-image pull-left">
									<a href="product-details.html"><img src="img/block-cat/block-13.jpg" alt="" /></a>
								</div>
								<div class="category-info">
									<h3><a href="product-details.html">Voluptas nulla</a></h3>
									<p>Nunc facilisis sagittis ullamcorper...</p>
									<div class="cat-price">$99.00 <span class="old-price">$111.00</span></div>
									<div class="cat-rating">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
									</div>								
								</div>
							</div>
							<!-- single block end -->
							<!-- single block start -->
						</div>
					</div>
					<!-- block carousel end -->
				</div>
				<!-- featured block end -->
			</div>
		</div>
	</div>
	--}}
	<!-- block category area end -->
	@stop
