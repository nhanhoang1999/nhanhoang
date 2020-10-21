@extends('backend.master')
@section('title','Danh sách sản phẩm')
@section('main')
<div class="table-agile-info">
  <div class="panel panel-default">
    <ol class="breadcrumb">
      <li><a href="{{asset('admin/home')}}">Trang chủ</a></li>
      <li><a href="{{asset('admin/product')}}">Sản phẩm</a></li>
      <li class="active">Hiển thị sản phẩm</li>
    </ol>
    <div class="panel-heading">
      Danh sách sản phẩm
    </div>
    @include('errors.note')
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                
              </label>
            </th>
            <th>ID</th>
            <th width="30%">Tên Sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th width="20%">Ảnh sản phẩm</th>
            <th>Danh mục</th>
            <th>Số lượng</th>
            <th>Trạng thái</th>
            <th style="width:30px;">Tùy chọn</th>
          </tr>
        </thead>
        <tbody>
          @foreach($productlist as $product)
          <tr>
            <td><label class="i-checks m-b-none">
            </label></td>
            <td>{{$product->p_id}}</td>
            <td>{{$product->p_name}}</td>
            <td><span class="text-ellipsis">{{number_format($product->p_price,0,',','.')}}</span> VND</td>
            <td><span class="text-ellipsis">
              <img src="{{asset('lib/storage/app/public/'.$product->p_img)}}" class="thumbnail" width="100px" height="100px"></span></td>
              <td><span class="text-ellipsis">{{$product->c_name}}</span></td>
              <td><span class="text-ellipsis">{{$product->p_number}}</span></td>
              <td><span class="text-ellipsis">
                @if($product->p_active == 0)
                Ẩn
                @endif
                @if($product->p_active == 1)
                Hiển thị
                @endif
              </span>
            </td>
            <td>
              <a href="{{asset('admin/product/edit/'.$product->p_id)}}" title="Chỉnh sửa" class="active" ui-toggle-class="">
               <i class="fa fa-check text-success text-active"></i></a>
               <a href="{{asset('admin/product/delete/'.$product->p_id)}}" title="Xóa" class="active" ui-toggle-class="" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
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

@stop