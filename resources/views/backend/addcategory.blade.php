@extends('backend.master')
@section('title','Thêm danh mục')
@section('main')
<div class="form-w3layouts">
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <ol class="breadcrumb">
          <li><a href="{{asset('admin/home')}}">Trang chủ</a></li>
          <li><a href="{{asset('admin/category')}}">Danh mục</a></li>
          <li class="active">Thêm danh mục</li>
        </ol>
        <header class="panel-heading">
          Thêm danh mục
        </header>
        <div class="panel-body">
          <div class="position-center">
            @include('errors.note')
            <form role="form"  method="post">
              <div class="form-group">
                <label for="name">Tên danh mục:</label>
                <input required type="text" name="name" class="form-control"    placeholder="Tên danh mục">
              </div>
              <div class="form-group" >
                <label>Miêu tả</label>
                <textarea class="ckeditor" required name="description" class="form-control"></textarea>
                <script type="text/javascript">
                  var editor = CKEDITOR.replace('description',{
                   language:'vi',
                   filebrowserImageBrowseUrl: '../public/editor/ckfinder/ckfinder.html?Type=Images',
                   filebrowserFlashBrowseUrl: '../public/editor/ckfinder/ckfinder.html?Type=Flash',
                   filebrowserImageUploadUrl: '../public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                   filebrowserFlashUploadUrl: '../../public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                 });
               </script>

             </div>
             <div class="form-group">
              <label >Icon:</label>
              <input required type="text" name="icon" class="form-control"  placeholder="fa fa-home...">
            </div>
            <div class="form-group">
              <label >Title:</label>
              <input required type="text" name="c_title_seo" class="form-control"  placeholder="Title..." value="{{old('c_title_seo')}}">
            </div>
            <div class="form-group">
              <input type="submit" name="submit" class="btn btn-info" value="Thêm mới">
            </div>
            <div class="form-group">
             <a href="{{asset('admin/category')}}" class="btn btn-info">Hủy bỏ</a>
           </div>
           {{csrf_field()}}
         </form>
       </div>
</div></section>
     </div>
   </div>
 </div>
 @stop