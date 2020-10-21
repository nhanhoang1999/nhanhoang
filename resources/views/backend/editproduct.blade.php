@extends('backend.master')
@section('title','Cập nhật sản phẩm')
@section('main')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            
            <div class="panel panel-primary">
                <ol class="breadcrumb">
                    <li><a href="{{asset('admin/home')}}">Trang chủ</a></li>
                    <li><a href="{{asset('admin/product')}}">Sản phẩm</a></li>
                    <li class="active">Cập nhật sản phẩm</li>
                </ol>
                <div class="panel-heading">Cập nhật sản phẩm</div>
                <div class="panel-body">
                    @include('errors.note')
                    <form method="post" enctype="multipart/form-data">
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group" >
                                    <label>Tên sản phẩm</label>
                                    <input required type="text" name="name" class="form-control" value="{{$product->p_name}}">
                                </div>
                                <div class="form-group" >
                                    <label>Giá sản phẩm</label>
                                    <input required type="number" name="price" class="form-control" value="{{$product->p_price}}">
                                </div>
                                <div class="form-group" >
                                    <label>Ảnh sản phẩm</label>
                                    <input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
                                    <img id="avatar" class="thumbnail" width="300px" src="{{asset('lib/storage/app/public/'.$product->p_img)}}">
                                </div>
                                <div class="form-group" >
                                    <label>Phụ kiện</label>
                                    <input required type="text" name="accessories" class="form-control" value="{{$product->p_accessories}}">
                                </div>
                                <div class="form-group" >
                                    <label>Bảo hành</label>
                                    <input required type="text" name="warranty" class="form-control" value="{{$product->p_warranty}}">
                                </div>
                                <div class="form-group" >
                                    <label>Khuyến mãi</label>
                                    <input required type="text" name="promotion" class="form-control" value="{{$product->p_promotion}}">
                                </div>
                                <div class="form-group" >
                                    <label>Tình trạng</label>
                                    <input required type="text" name="condition" class="form-control" value="{{$product->p_condition}}">
                                </div>
                                <div class="form-group" >
                                    <label>Trạng thái</label>
                                    <select required name="status" class="form-control">
                                        <option value="1" @if($product->p_status==1) selected @endif>Còn hàng</option>
                                        <option value="0" @if($product->p_status==0) selected @endif>Hết hàng</option>
                                    </select>
                                </div>
                                <div class="form-group" >
                                    <label>Miêu tả</label>
                                    <textarea class="ckeditor" required name="description">{{$product->p_description}}</textarea>
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
                             <div class="form-group" >
                                <label>Danh mục</label>
                                <select required name="cate" class="form-control">
                                    @foreach($listcate as $cate)
                                    <option value="{{$cate->id}}" @if($product->p_cate_id == $cate->id) selected @endif>{{$cate->c_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" >
                                <label>Active</label>
                                <select required name="active" class="form-control">
                                    <option value="1" @if($product->p_active==1) selected @endif>Hiện</option>
                                    <option value="0" @if($product->p_active==0) selected @endif>Ẩn</option>
                                </select>
                            </div>
                            <div class="form-group" >
                                <label>Sản phẩm nổi bật</label><br>
                                Có: <input type="radio" name="featured" value="1" @if($product->p_featured == 1) checked @endif>
                                Không: <input type="radio"  name="featured" value="0" @if($product->p_featured == 0) checked @endif>
                            </div>
                            <input type="submit" name="submit" value="Cập nhật" class="btn btn-primary">
                            <a href="{{asset('admin/product')}}" class="btn btn-danger">Hủy bỏ</a>
                        </div>
                    </div>
                    {{csrf_field()}}
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
</div>
@stop