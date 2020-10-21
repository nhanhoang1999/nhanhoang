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
						<li class="category3"><span>Chi tiết sản phẩm</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumbs area end -->
<!-- product-details Area Start -->
<div class="product-details-area">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-5 col-xs-12">
				<div class="zoomWrapper">
					<div id="img-1" class="zoomWrapper single-zoom">
						<a href="#">
							<img id="zoom1" src="{{asset('lib/storage/app/public/'.$product->p_img)}}" data-imagezoom="{{asset('lib/storage/app/public/'.$product->p_img)}}" alt="big-1">
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-7 col-sm-7 col-xs-12">
				<div class="product-list-wrapper">
					<div class="single-product">
						<div class="product-content">
							<h3 class="product-name">{{$product->p_name}}</h3>
							
							<div class="rating-price">	
								<div class="pro-rating">
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
								</div>
								<div class="price-boxes">
									<span class="new-price" style="color: red;">{{number_format($product->p_price-(($product->p_price/100)*$product->p_promotion),0,',','.')}} VND </span>
									<br>
									@if($product->p_promotion != 0)
									<span>Ưu đãi:</span>
									<i style="color: #bf081f;">{{$product->p_promotion}} %</i>
									<br>
									<span class="new-price" >Giá niêm yết:</span>
									<del>{{number_format($product->p_price,0,',','.')}} VND</del>
									@endif
								</div>
							</div>
							<div class="product-desc">
								<p>{{$product->p_accessories}}</p>
							</div>
							<div class="product-desc">
								<p>{{$product->p_condition}}</p>
							</div>
							<h4><p class="availability in-stock">Bảo hành: <span>{{$product->p_warranty}}</span></p></h4>
							<div class="actions-e">
								<div class="action-buttons-single">
									<form method="POST" action="{{asset('shopping/add')}}">
										{{csrf_field()}}
									<div class="inputx-content">
										<label for="qty">Số lượng:</label>
										<input type="number" name="qty" id="qty" maxlength="12" value="1" title="Số lượng" class="input-text qty">
										<input type="hidden" name="productid_hidden" value="{{$product->p_id}}">
									</div>
									<div class="add-to-cart">
										<button type="submit" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart" style="color: black;"></i>
											Thêm vào giỏ hàng
										</button>
									</div>
									</form>

								</div>
							</div>
							<div class="singl-share">
								<a href="#"><img src="img/single-share.png" alt=""></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="single-product-tab">
				<!-- Nav tabs -->
				<ul class="details-tab">
					<li class="active" ><a style="color: green;" href="{{'#home'}}" data-toggle="tab"><h5>Đặc điểm nổi bật</h5></a></li>
					<li class=""><a href="{{'#messages'}}" data-toggle="tab"><h5>Bình luận</h5></a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						<div class="product-tab-content">
							{!!$product->p_description!!}	
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="messages">
						<div class="single-post-comments col-md-6 col-md-offset-3">
							<div class="comments-area">
								<h3 class="comment-reply-title">ĐÁNH GIÁ VÀ NHẬN XÉT</h3>
								<div class="comments-list">
									<ul>
										<li>
											<div class="comments-details">

												@foreach($comments as $comment)
												<div class="comments-content-wrap">
													<span>
														<b>{{$comment->com_name}} - </b>
														<span class="post-time">{{date('d/m/Y H:i',strtotime($comment->created_at))}}</span>
													</span>
													<p>{{$comment->com_content}}.</p>
												</div>
												@endforeach
											</div>
										</li>									
									</ul>
								</div>
							</div>
							<div class="comment-respond">
								<h3 class="comment-reply-title">Thêm bình luận</h3>
							@if(Auth::guard('customers')->check())
								<form method="post">
									<div class="row">
										<div class="col-md-12" hidden="">
											<p>Tên *</p>
											<input required type="text" name="name" value="{{Auth::guard('customers')->user()->name}}">
										</div>
										<div class="col-md-12" hidden="">
											<p>Email *</p>
											<input required type="email" name="email" value="{{Auth::guard('customers')->user()->email}}">
										</div>
										<div class="col-md-12 comment-form-comment">
											<p>Đánh giá của bạn</p>
											<textarea name="content" required id="message" cols="30" rows="10"></textarea>
											<input type="submit" value="Gửi">
										</div>
									</div>
									{{csrf_field()}}
								</form>
							@else
								<span class="email-notes" style="color: red;">Địa chỉ email của bạn sẽ không được công bố. Các trường bắt buộc được đánh dấu *</span>
								<form method="post">
									<div class="row">
										<div class="col-md-12">
											<p>Tên *</p>
											<input required type="text" name="name">
										</div>
										<div class="col-md-12">
											<p>Email *</p>
											<input required type="email" name="email">
										</div>
										<div class="col-md-12 comment-form-comment">
											<p>Đánh giá của bạn</p>
											<textarea name="content" required id="message" cols="30" rows="10"></textarea>
											<input type="submit" value="Gửi">
										</div>
									</div>
									{{csrf_field()}}
								</form>
							@endif
							</div>						
						</div>
					</div>
				</div>					
			</div>
		</div>
	</div>
</div>
<!-- product-details Area end -->
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
								<span class="sale-text">Giảm {{$news->p_promotion}}</span>
								@endif
								<div class="product-img">
									<a href="#">
										<img class="primary-image" src="{{asset('lib/storage/app/public/'.$news->p_img)}}" style="width: 100px; height: 150px;" alt="" />
									</a>
									<div class="action-zoom">
										<div class="add-to-cart">
											<a href="{{asset('view/detail/'.$news->p_id.'/'.$news->p_slug.'.html')}}" title="Quick View">Quick View</a>
										</div>
									</div>
									<div class="actions">
										<div class="action-buttons">
											<div class="add-to-links">
												<div class="add-to-wishlist">
													<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
												</div>
												<div class="compare-button">
													<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
												</div>									
											</div>
											<div class="quickviewbtn">
												<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
											</div>
										</div>
									</div>
								</div>
								<div class="product-content">
									<h2 class="product-name"><a href="#">{{$news->p_name}}</a></h2>
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
@stop
