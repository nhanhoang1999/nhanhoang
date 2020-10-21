@extends('backend.master')
@section('title','Danh sách đơn hàng')
@section('main')
<div class="table-agile-info">
  <div class="panel panel-default">
    <ol class="breadcrumb">
      <li><a href="{{asset('admin/home')}}">Trang chủ</a></li>
      <li class="active">Hiển thị đơn hàng</li>
    </ol>
    <div class="panel-heading">
      Danh sách đơn hàng
    </div>
    @include('errors.note')
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Ngày đặt hàng</th>
            <th><i class="fa fa-th" aria-hidden="true"></i></th>
          </tr>
        </thead>
        <tbody>
          @foreach($transactions as $transaction)
          <tr>
            <td><label>#{{$transaction->id}}</label></td>
            <td>{{$transaction->name}}</td>
            <td>{{$transaction->tr_address}}</td>
            <td><span class="text-ellipsis">{{$transaction->tr_phone}}</span></td>
            <td><span class="text-ellipsis">{{number_format($transaction->tr_total,0,',','.')}} VND</span></td>
            <td>
              @if($transaction->tr_status == 1)
              <a href="{{asset('history/active/'.$transaction->id)}}" class="label label-success">Đã xử lý</a>
              @elseif($transaction->tr_status == 2)
              <i class="label label-info">Đã nhận hàng</i>
              @elseif($transaction->tr_status == 3)
              <i class="label label-warning">Chờ thanh toán</i>
              @elseif($transaction->tr_status == 4)
              <a href="{{asset('history/active/'.$transaction->id)}}" class="label label-primary">Đã thanh toán ,chờ nhận hàng</a>
              @elseif($transaction->tr_status == 0)
              <a href="{{asset('admin/order/active/'.$transaction->id)}}" class="label label-default">Chưa xử lý</a>
              @else
              <i class="label label-danger">Đã hủy bỏ</i>
              @endif
            </td>
            <td>{{$transaction->created_at}}</td>
            <td>
              <a href="{{asset('admin/order/view/'.$transaction->id)}}" title="Chi tiết" class="active" ui-toggle-class=""><i class="fa fa-eye text-success text-active"></i></a>
              @if($transaction->tr_status == 0 || $transaction->tr_status == 1)
              <a href="{{asset('history/delete/'.$transaction->id)}}" title="Hủy bỏ" class="active" ui-toggle-class="" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-times text-danger text"></i></a>
              @endif
              @if($transaction->tr_status == 2)
              <a href="{{asset('admin/order/print_pdf/'.$transaction->order_code)}}" title="Xuất PDF" class="active" ui-toggle-class="" target="_blank"><i class="fa fa-file-pdf-o text-success text-active"></i></a>
              @endif
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
@stop