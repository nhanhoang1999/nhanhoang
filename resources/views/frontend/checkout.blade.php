@extends('frontend.master')
@section('view')
<!-- breadcrumbs area start -->
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
               <li class="home">
                   <a href="{{asset('shopping/cart')}}">Giỏ hàng</a>
                   <span><i class="fa fa-angle-right"></i></span>
               </li>
               <li class="category3"><span>Thanh toán</span></li>
           </ul>
       </div>
   </div>
</div>
</div>
</div>
<!-- breadcrumbs area end -->
<!-- START MAIN CONTAINER -->
<div class="container wrapper">
    <div class="row cart-head">
        <div class="container">
            <div class="row">
                <p></p>
            </div>

            <div class="row">
                <p></p>
            </div>
        </div>
    </div>    
    <div class="row cart-body">
        <form class="form-horizontal" method="post" action="">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                <!--REVIEW ORDER-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Xem lại đơn hàng <div class="pull-right"><small><a class="afix-1" href="{{asset('shopping/cart')}}">Chỉnh sửa giỏ hàng</a></small></div>
                    </div>                      
                    <div class="panel-body">
                       @foreach($cartlist as $cart)
                       <div class="form-group">
                        <div class="col-sm-3 col-xs-3">
                            <a href="{{asset('view/detail/'.$cart->id.'/'.$cart->options->slug.'.html')}}"><img class="img-responsive" src="{{asset('lib/storage/app/public/'.$cart->options->img)}}" /></a>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <div class="col-xs-12"><a href="{{asset('view/detail/'.$cart->id.'/'.$cart->options->slug.'.html')}}">{{$cart->name}}</a></div>
                            <div class="col-xs-12"><small>Số lượng:<span>{{$cart->qty}}</span></small></div>
                        </div>
                        <div class="col-sm-3 col-xs-3 text-right">
                            <h6><span>{{number_format($cart->price,0,',','.')}}</span>VND</h6>
                        </div>
                    </div>
                    @endforeach
                    <div class="form-group"><hr /></div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <strong>Tổng tiền đơn hàng</strong>
                            <div class="pull-right"><span>{{Cart::total()}}</span><span>VND</span></div>
                        </div>
                    </div>
                    <div class="form-group"><hr /></div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <strong>Tổng tiền thanh toán</strong>
                            <div class="pull-right"><span>{{Cart::total()}}</span><span>VND</span></div>
                        </div>
                        <div class="col-xs-12">
                            <small>+ Phí giao hàng </small>
                            <div class="pull-right"><span>-</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--REVIEW ORDER END-->
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
            <!--SHIPPING METHOD-->
            <div class="panel panel-info">
                <div class="panel-heading">Địa chỉ</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <h4>Địa chỉ giao hàng</h4>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Họ & Tên:</strong></div>
                        <div class="col-md-12">
                            <input type="text" name="username" class="form-control" value="{{Auth::guard('customers')->user()->name}}" placeholder="Họ & Tên" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Địa chỉ:</strong></div>
                        <div class="col-md-12">
                            <input type="text" name="address" class="form-control" value="" placeholder="Địa chỉ" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Điện thoại:</strong></div>
                        <div class="col-md-12"><input type="text" name="phone_number" class="form-control" value="{{Auth::guard('customers')->user()->phone}}" placeholder="Điện thoại" /></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Email:</strong></div>
                        <div class="col-md-12"><input type="text" name="email_address" class="form-control" value="{{Auth::guard('customers')->user()->email}}" placeholder="Email" /></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Ghi chú:</strong></div>
                        <div class="col-md-12">
                            <textarea name="note" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <button type="submit" class="btn btn-primary btn-submit-fix">Thanh toán khi nhận hàng</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="{{asset('gio-hang/online')}}" class="btn btn-primary btn-submit-fix">Thanh toán online</a>
                </div>
            </div>
                </div>
                {{csrf_field()}}
            </form>
        </div>
        <div class="row cart-footer">
            
        </div>
    </div>
    <!-- END MAIN CONTAINER -->
    @stop