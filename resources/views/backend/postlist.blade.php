@extends('backend.master')
@section('title','Danh sách ')
@section('main')
<div class="table-agile-info">
  <div class="panel panel-default">
    <ol class="breadcrumb">
      <li><a href="{{asset('admin/home')}}">Trang chủ</a></li>
      <li><a href="{{asset('admin/product')}}">Tin tức</a></li>
      <li class="active">Danh sách tin tức</li>
    </ol>
    <div class="panel-heading">
      Danh sách tin tức
    </div>
    @include('errors.note')
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>STT</th>
            <th width="30%">Tên bài viết</th>
            <th width="20%">Ảnh sản phẩm</th>
            <th>Ngày đăng</th>
            <th>Trạng thái</th>
            <th style="width:30px;">Tùy chọn</th>
          </tr>
        </thead>
        <tbody>
         <?php $i=1 ?>
         @foreach($posts as $post)
         <tr>
          <td>#{{$post->post_id}}</td>
          <td>{{$post->post_title}}</td>
          <td><span class="text-ellipsis">
            <img src="{{asset('lib/storage/app/public/'.$post->post_img)}}" class="thumbnail" width="100px" height="100px"></span></td>
            <td><span class="text-ellipsis">{{$post->created_at}}</span></td>
            <td><span class="text-ellipsis">
              @if($post->post_status == 0)
              Ẩn
              @endif
              @if($post->post_status == 1)
              Hiển thị
              @endif
            </span>
          </td>
          <td>
            <a href="" class="active" ui-toggle-class="">
             <i class="fa fa-check text-success text-active" title="Chỉnh sửa"></i></a>
             <a href="{{asset('admin/posts/delete/'.$post->post_id)}}" title="Xóa" class="active" ui-toggle-class="" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
               <i class="fa fa-times text-danger text"></i>
             </a>
           </td>
         </tr>
         <?php $i++ ?>
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