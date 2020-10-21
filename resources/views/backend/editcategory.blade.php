@extends('backend.master')
@section('title','Cập nhật danh mục')
@section('main')
<div class="form-w3layouts">
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <ol class="breadcrumb">
          <li><a href="{{asset('admin/home')}}">Trang chủ</a></li>
          <li><a href="{{asset('admin/category')}}">Danh mục</a></li>
          <li class="active">Chỉnh sửa danh mục</li>
        </ol>
        <header class="panel-heading">
          Cập nhật danh mục
        </header>
        <div class="panel-body">
          <div class="position-center">
            @include('errors.note')
            <form role="form"  method="post">
              <div class="form-group">
                <label >Tên danh mục:</label>
                <input required type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục..." value="{{$cate->c_name}}">
              </div>
              <div class="form-group" >
                <label>Miêu tả</label>
                <textarea class="ckeditor" required name="description">{{$cate->c_description_seo}}</textarea>
                <script type="text/javascript">
                  var editor = CKEDITOR.replace('description',{
                   language:'vi',
                   filebrowserImageBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Images',
                   filebrowserFlashBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Flash',
                   filebrowserImageUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                   filebrowserFlashUploadUrl: '../../public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                 });
               </script>
             </div>
             <div class="form-group">
              <label >Active:</label>
              <select required name="active" class="form-control">
                <option value="0" @if($cate->c_active==0) selected @endif>Ẩn</option>
                <option value="1" @if($cate->c_active==1) selected @endif>Hiện</option>
              </select>
            </div>
            <div class="form-group">
              <label >Icon:</label>
              <input required type="text" name="icon" class="form-control"  placeholder="fa fa-home..." value="{{$cate->c_icon}}">
            </div>
            <div class="form-group">
              <label >Title:</label>
              <input required type="text" name="c_title_seo" class="form-control"  placeholder="Title..." value="{{$cate->c_title_seo}}">
            </div>
            <div class="form-group">
             <input type="submit" name="submit" class="btn btn-info" placeholder="Tên danh mục..."      value="Cập nhật">
           </div>
           <div class="form-group">
             <a href="{{asset('admin/category')}}" class="btn btn-info" >Hủy bỏ</a>
           </div>
           {{csrf_field()}}
         </form>
       </div>

     </div>
   </section>

 </div>
</div>
</div>
@stop