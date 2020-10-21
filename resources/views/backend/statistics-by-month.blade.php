@extends('backend.master-mini')
@section('title','Thống kê')
@section('css')
<link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">
@endsection
@section('main1')
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row" style="margin-bottom: 15px;"> 
			<div class="col-sm-4">
				<figure class="highcharts-figure">
					<div id="containers1" data-json="{{$statusTransaction}}"></div>
				</figure>
			</div>
			<div class="col-sm-8">
				<figure class="highcharts-figure">
					<div id="containers2" data-list-day="{{$listDay}}" data-money="{{$arrData}}" data-default="{{$arrDataDefault}}"></div>
				</figure>
			</div>
		</div>
		<div class="table-agile-info">
			<div class="panel panel-default">
				<div class="panel-heading">
					Danh sách thành viên
				</div>
				<div class="table-responsive">
					<table class="table table-striped b-t b-light">
						<thead>
							<tr>
								<th>Họ Tên</th>
								<th>Gmail</th>
								<th>Số điện thoại</th>
								<th>Trạng thái</th>
								<th>Ngày đăng kí</th>
								<th style="width:30px;">Tùy chọn</th>
							</tr>
						</thead>
						<tbody>
							@foreach($customers as $customer)
							<tr>
								<td>{{$customer->name}}</td>
								<td>{{$customer->email}}</td>
								<td><span class="text-ellipsis">{{$customer->phone}}</span></td>
								<td><span class="text-ellipsis">
									@if($customer->active == 0)
									Ẩn
									@endif
									@if($customer->active == 1)
									Hiển thị
									@endif
								</span>
							</td>
							<td>{{$customer->created_at}}</td>
							<td>
								<a href="{{asset('admin/category/delete/'.$customer->id)}}" title="Xóa" class="active" ui-toggle-class="" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
									<i class="fa fa-times text-danger text"></i>
								</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<footer class="panel-footer">
				<div class="row">
				</div>
			</footer>
		</div>
	</div>
</section>
</section>
@endsection
@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<!--<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script> -->
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
	<script type="text/javascript">
		let dataTransaction = $("#containers1").attr('data-json');
		dataTransaction = JSON.parse(dataTransaction);

		let listDay = $("#containers2").attr('data-list-day');
		listDay = JSON.parse(listDay);

		let listMoney = $("#containers2").attr('data-money');
		listMoney = JSON.parse(listMoney);

		let listMoneyDefault = $("#containers2").attr('data-default');
		listMoneyDefault = JSON.parse(listMoneyDefault);
		Highcharts.chart('containers1', {

			chart: {
				styledMode: true
			},

			title: {
				text: 'Thống kê đơn hàng'
			},

			xAxis: {
				categories: ['Jan', 'Feb', 'Mar', 'Apr','Apr']
			},

			series: [{
				type: 'pie',
				allowPointSelect: true,
				keys: ['name', 'y', 'selected', 'sliced'],
				data: dataTransaction,
				showInLegend: true
			}]
		});

		Highcharts.chart('containers2', {
			chart: {
				type: 'spline'
			},
			title: {
				text: 'Biểu đồ doanh thu các ngày trong tháng'
			},
			xAxis: {
				categories: listDay
			},
			yAxis: {
				title: {
					text: 'Tổng tiền đã thanh toán'
				},
				labels: {
					formatter: function () {
						return (this.value).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,') + 'VND';
					}
				}
			},
			tooltip: {
				crosshairs: true,
				shared: true
			},
			plotOptions: {
				spline: {
					marker: {
						radius: 4,
						lineColor: '#666666',
						lineWidth: 1
					}
				}
			},
			series: [{
				name: 'Đã thanh toán',
				marker: {
					symbol: 'square'
				},
				data: listMoney

			},
			{
				name: 'Đã tiếp nhận',
				marker: {
					symbol: 'square'
				},
				data: listMoneyDefault

			}
			]
		});
	</script>
	@endsection