@extends('frontend.master')
@section('view')
		<div class="col-md-12">
			<div class="single-product-tab">
				<!-- Nav tabs -->
				<ul class="details-tab">
					<li class="active" ><a style="color: green;" href="{{'#home'}}" data-toggle="tab"><h5>Đặc điểm nổi bật</h5></a></li>
					<li class=""><a href="{{'#messages'}}" data-toggle="tab"><h5>Bình luận</h5></a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						<div class="product-tab-content">
							@foreach($details as $detail)
								{{$detail->p_content}}
							@endforeach
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="messages">
						<div class="single-post-comments col-md-6 col-md-offset-3">
							<div class="comments-area">
								<h3 class="comment-reply-title">ĐÁNH GIÁ VÀ NHẬN XÉT</h3>

							</div>
					
						</div>
					</div>
				</div>					
			</div>
		</div>
@stop