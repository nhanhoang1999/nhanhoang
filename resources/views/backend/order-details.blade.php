@extends('backend.master')
@section('title','Chi tiết đơn hàng')
@section('main')
<div class="table-agile-info">
  <div class="panel panel-default">
    <ol class="breadcrumb">
      <li><a href="{{asset('admin/home')}}">Trang chủ</a></li>
      <li class="active">Chi tiết đơn hàng</li>
    </ol>
    @if($orders)
    <div class="panel-heading">
      @foreach($orders as $order)
      Chi tiết mã đơn hàng #{{$order->order_code}}
      @endforeach
    </div>
    @include('errors.note')
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>STT</th>
            <th width="25%">Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Giảm giá</th>
            <th>Thành tiền</th>
            <th style="width:30px;">Tùy chọn</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1 ?>
          @foreach($orders as $order)
          <tr>
            <td>#{{$i}}</td>
            <td><a href="{{asset('view/detail/'.$order->p_id.'/'.$order->p_slug.'.html')}}">{{$order->p_name}}</a></td>
            <td><span class="text-ellipsis">
              <img src="{{asset('lib/storage/app/public/'.$order->p_img)}}" class="thumbnail" width="50px"></span></td>
              <td>{{number_format($order->o_price),0,',','.'}} VND</td>
              <td>{{$order->o_qty}}</td>
              <td>{{$order->o_sale}}%</td>
              <td>{{number_format(($order->o_price*(100 - $order->o_sale)/100)*$order->o_qty),0,',','.'}} VND</td>
              <td>
                <a href="{{asset('admin/order')}}" title="Quay lại" class="active" ui-toggle-class=""><i class="fa fa-undo text-success text-active"></i></a>
              </td>
            </tr>
            <?php $i++ ?>
            @endforeach
          </tbody>
        </table>
      </div>
      @endif
    </div>
  </div>
  @stop