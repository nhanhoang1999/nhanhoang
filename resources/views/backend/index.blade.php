@extends('backend.master')
@section('title','Home')
@section('main')
<!--main content start-->
<!-- //market-->
<div class="market-updates">
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-2">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-eye"> </i>
			</div>
			<div class="col-md-8 market-update-left">
				<h4>Số sản phẩm</h4>
				<h3>{{$product_count}}</h3>
				<p>Other hand, we denounce</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-1">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-users" ></i>
			</div>
			<div class="col-md-8 market-update-left">
				<h4>Thành viên</h4>
				<h3>{{$cus_count}}</h3>
				<p>Other hand, we denounce</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-3">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-usd"></i>
			</div>
			<div class="col-md-8 market-update-left">
				<h4>Sales</h4>
				<h3>1,500</h3>
				<p>Other hand, we denounce</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-4">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i>
			</div>
			<div class="col-md-8 market-update-left">
				<h4>Tổng đơn hàng</h4>
				<h3>{{$order_count}}</h3>
				<p>Other hand, we denounce</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="clearfix"> </div>
</div>	
<!-- //market-->
@stop