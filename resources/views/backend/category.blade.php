@extends('backend.master')
@section('title','Danh sách danh mục')
@section('main')
<div class="table-agile-info">
  <div class="panel panel-default">
    <ol class="breadcrumb">
      <li><a href="{{asset('admin/home')}}">Trang chủ</a></li>
      <li><a href="{{asset('admin/category')}}">Danh mục</a></li>
      <li class="active">Hiển thị danh mục</li>
    </ol>
    <div class="panel-heading">
      Danh mục sản phẩm
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">             
              ID</label>
            </th>
            <th>Tên danh mục</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            <th style="width:30px;">Tùy chọn</th>
          </tr>
        </thead>
        <tbody>
          @foreach($catelist as $cate)
          <tr>
            <td><label class="i-checks m-b-none">
            </label>{{$cate->id}}</td>
            <td>{{$cate->c_name}}</td>
            <td><span class="text-ellipsis">{!!$cate->c_description_seo!!}</span></td>
            <td><span class="text-ellipsis">
              @if($cate->c_active == 0)
              Ẩn
              @endif
              @if($cate->c_active == 1)
              Hiển thị
              @endif
            </span>
          </td>
          <td>
            <a href="{{asset('admin/category/edit/'.$cate->id)}}" title="Chỉnh sửa" class="active" ui-toggle-class="">
             <i class="fa fa-check text-success text-active"></i></a>
             <a href="{{asset('admin/category/delete/'.$cate->id)}}" title="Xóa" class="active" ui-toggle-class="" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
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