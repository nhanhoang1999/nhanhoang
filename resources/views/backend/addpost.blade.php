@extends('backend.master')
@section('title','Thêm bài viết')
@section('main')
<div class="form-w3layouts">
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="panel panel-primary">
				<ol class="breadcrumb">
					<li><a href="{{asset('admin/home')}}">Trang chủ</a></li>
					<li><a href="{{asset('admin/post')}}">Bài viết</a></li>
					<li class="active">Thêm bài viết mới</li>
				</ol>
				<div class="panel-heading">Thêm bài viết mới</div>
				<div class="panel-body">
					@include('errors.note')
					<form method="post" enctype="multipart/form-data">
						<div class="row" style="margin-bottom:40px">
							<div class="col-xs-8">
								<div class="form-group" >
									<label>Tên bài viết</label>
									<input required type="text" name="post_title" class="form-control">
								</div>
								<div class="form-group" >
									<label>Ảnh</label>
									<input required id="img" type="file" name="post_img" class="form-control hidden" onchange="changeImg(this)">
									<img id="avatar" class="thumbnail" width="300px" src="images/new_seo-10-512.png">
								</div>
								<div class="form-group" >
									<label>Tóm tắt bài viết</label>
									<textarea class="ckeditor" required name="post_desc"></textarea>
									<script type="text/javascript">
										var editor = CKEDITOR.replace('post_desc',{
											language:'vi',
											filebrowserImageBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Images',
											filebrowserFlashBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Flash',
											filebrowserImageUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
											filebrowserFlashUploadUrl: '../../public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
										});
									</script>

								</div>
								<div class="form-group" >
									<label>Nội dung bài viết</label>
									<textarea class="ckeditor" required name="post_content"></textarea>
									<script type="text/javascript">
										var editor = CKEDITOR.replace('post_content',{
											language:'vi',
											filebrowserImageBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Images',
											filebrowserFlashBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Flash',
											filebrowserImageUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
											filebrowserFlashUploadUrl: '../../public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
										});
									</script>
								</div>
								<div class="form-group" >
									<label>Từ khóa</label>
									<textarea style="resize: none;" rows="8" class="form-control" name="post_meta_keywords" placeholder=""></textarea>
								</div>
								<div class="form-group" >
									<label>Nội dung</label>
									<textarea style="resize: none;" rows="8" class="form-control" name="post_meta_desc" placeholder=""></textarea>
								</div>
								<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
								<a href="{{asset('admin/post')}}" class="btn btn-danger">Hủy bỏ</a>
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