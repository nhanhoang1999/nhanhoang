@extends('frontend.master')
@section('view')
<div class="container">
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="container-inner">
            <ul>
              <li class="home">
                <a href="{{asset('view')}}">Trang chủ</a>
                <span><i class="fa fa-angle-right"></i></span>
              </li>
              <li class="category3"><span>Tin tức</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
          @foreach($posts as $post)
  <div class="well">

    <div class="media">
      <a class="pull-left" href="#">
        <img class="media-object" src="{{asset('lib/storage/app/public/'.$post->post_img)}}" style="height: 150px; width: 150px;">
      </a>
      <div class="media-body">
        <a href="" class="pull-left"><h3 class="media-heading">{{$post->post_title}}</h3></a>
        <p class="text-right">By Francisco</p>
        <h6>{!!$post->post_desc!!}</h6><a href="" class="btn-dark"><h5>Read more</h5></a>
        <br>
        <ul class="list-inline list-unstyled">
         <li><span><i class="glyphicon glyphicon-calendar"></i> 2 days, 8 hours </span></li>
         <li>|</li>
         <li>
           <span class="glyphicon glyphicon-star"></span>
           <span class="glyphicon glyphicon-star"></span>
           <span class="glyphicon glyphicon-star"></span>
           <span class="glyphicon glyphicon-star"></span>
           <span class="glyphicon glyphicon-star-empty"></span>
         </li>
         <li>|</li>
         <li>
          <span><i class="fa fa-facebook-square"></i></span>
        </li>
      </ul>
    </div>
  </div>
</div>
      @endforeach
</div>
@stop