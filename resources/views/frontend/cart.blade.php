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
						<li class="category3"><span>Giỏ hàng</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumbs area end -->
<!-- Shopping Table Container -->
<div class="cart-area-start">
	<div class="container">
		<!-- Shopping Cart Table -->
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="cart-table table-responsive">
						<thead>
							<tr>
								<th width="5%">STT</th>
								<th>Sản phẩm</th>
								<th>Tên sản phẩm</th>
								<th>Giá</th>
								<th>Số lượng</th>
								<th>Tổng giá sản phẩm</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1 ?>
							@foreach($cartlist as $item)
							<tr>
								<td>#{{$i}}</td>
								<td>
									<a href="{{asset('view/detail/'.$item->id.'/'.$item->options->slug.'.html')}}"><img src="{{asset('lib/storage/app/public/'.$item->options->img)}}" class="img-responsive" alt=""/></a>
								</td>
								<td>
									<h6><a href="{{asset('view/detail/'.$item->id.'/'.$item->options->slug.'.html')}}">{{$item->name}}</a></h6>
								</td>
								<td>
									<div class="cart-price">{{number_format($item->price,0,',','.')}} VND</div>
								</td>
								<td>
									<form action="{{asset('shopping/update-qty')}}" method="POST">
										{{csrf_field()}}
										<div>
											<input type="hidden" name="cart_id" value="{{$item->rowId}}">
											<input type="number" name="qty1" class="qty form-control" value="{{$item->qty}}" >
										</div>
									</form>
								</td>
								<td>
									<div class="cart-subtotal">{{number_format($item->price*$item->qty,0,',','.')}} VND</div>
								</td>
								<td><a href="{{asset('shopping/delete/'.$item->rowId)}}"><i class="fa fa-times"></i></a></td>
							</tr>
							<?php $i++ ?>
							@endforeach
							<tr>
								<td class="actions-crt" colspan="8">
									<div class="">
										<div><h5 class="align-right" style="color: black;">
											Tổng tiền : {{Cart::total()}} VND
										</h5></div><br>
										<div class="align-center"><a class="btn btn-success" href="{{asset('gio-hang/thanhtoan')}}">Thanh toán</a></div>
									</div>
								</td>
							</tr>
							<tr>
								<td class="actions-crt" colspan="8">
									<div class="">
										<div class="col-md-4 col-sm-4 col-xs-4 align-left"><a class="cbtn" href="{{asset('view')}}">Tiếp tục mua sắm</a></div>
										<div class="col-md-4 col-sm-4 col-xs-4 align-center"><a class="cbtn" href="#">Thêm sản phẩm</a></div>
										<div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="cbtn" href="{{asset('shopping/clean')}}">Dọn sạch giỏ hàng</a></div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- Shopping Cart Table -->
	</div>	
</div>
<!-- Shopping Table Container -->
@stop