@extends('frontend.master-mini')
@section('view1')
<div class="col-sm-12 col-lg-9 col-md-9">
	<div class="form-title">
		<h1>Tất cả đơn hàng</h1>
	</div>
	<div class="table-responsive">
		<table class="cart-table">
			<thead>
				<tr>
					<th colspan="2">Thông tin sản phẩm</th>
					<th>Giá</th>
					<th>Giảm giá</th>
					<th>Tổng tiền</th>
					<th>Số lượng</th>
					<th>Trạng thái</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $order)
				@if($order->tr_status == 1 || $order->tr_status == 4)
				<tr>
					<td><span class="text-ellipsis">
						<img src="{{asset('lib/storage/app/public/'.$order->p_img)}}" class="thumbnail" width="100px"></span></td>
						<td><a href="{{asset('view/detail/'.$order->p_id.'/'.$order->p_slug.'.html')}}">{{$order->p_name}}</a></td>
						<td class="text-center">
							{{number_format($order->o_price),0,',','.'}} VND
						</td>
						<td>{{$order->o_sale}}%</td>
						<td>{{number_format(($order->o_price*(100 - $order->o_sale)/100)*$order->o_qty),0,',','.'}} VND</td>
						<td>{{$order->o_qty}}</td>
					</td>
					<td>
						@if($order->tr_status == 1)
						<i class="label label-success">Đang vận chuyển</i>
						@elseif($order->tr_status == 4)
						<i class="label label-primary">Đã thanh toán,đang vận chuyển</i>
						@else
						<i class="label label-default">Chờ xử lý</i>
						@endif
					</td>
					<td><!--<a href="#" class="remove"><i class="fa fa-eye" title="Xem chi tiết"></i></a>--></td>
					<td><button class="btn-block btn"><a href="{{asset('history/active/'.$order->o_transactions_id)}}">Đã nhận hàng</a></button>
						<button class="btn-block btn"><a href="{{asset('history/delete/'.$order->o_transactions_id)}}" title="Hủy bỏ" class="active" ui-toggle-class="" onclick="return confirm('Bạn có chắc chắn muốn hủy bỏ?')">Hủy đơn</a></button>
					</td>
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="back-button">
		<a href="{{asset('view')}}"><small>« </small> Back</a>
	</div>
</div>
</div>
</div>
</div>
<!-- wishlist-area-end -->
@stop
