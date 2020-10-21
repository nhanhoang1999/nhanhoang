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
        <form class="form-horizontal" method="post" action="" id="create_form">
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
                        <div class="form-group"><hr />
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <strong>Tổng tiền đơn hàng</strong>
                                <div class="pull-right"><span>{{Cart::total()}}</span><span>VND</span></div>
                            </div>
                        </div>
                        <div class="form-group"><hr />
                        </div>
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
                    <div class="panel-heading">Địa chỉ
                    </div>
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
                            <div class="col-md-12">
                                <strong>Email:</strong>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="email_address" class="form-control" value="{{Auth::guard('customers')->user()->email}}" placeholder="Email" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">Thanh toán</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <h4>Thông tin thanh toán</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>Loại dịch vụ:</strong>
                            </div>
                            <div class="col-md-12">
                                <select name="order_type" id="order_type" class="form-control">
                                    <option value="billpayment">Thanh toán hóa đơn</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>Mã đơn hàng:</strong>
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" id="order_id" name="order_id" type="text" value="<?php echo date("YmdHis") ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>Nội dung thanh toán:</strong>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Noi dung thanh toan</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <strong>Ngân hàng:</strong>
                            </div>
                            <div class="col-md-12">
                               <select name="bank_code" id="bank_code" class="form-control">
                                <option value="">Không chọn</option>
                                <option value="NCB"> Ngan hang NCB</option>
                                <option value="AGRIBANK"> Ngan hang Agribank</option>
                                <option value="SCB"> Ngan hang SCB</option>
                                <option value="SACOMBANK">Ngan hang SacomBank</option>
                                <option value="EXIMBANK"> Ngan hang EximBank</option>
                                <option value="MSBANK"> Ngan hang MSBANK</option>
                                <option value="NAMABANK"> Ngan hang NamABank</option>
                                <option value="VNMART"> Vi dien tu VnMart</option>
                                <option value="VIETINBANK">Ngan hang Vietinbank</option>
                                <option value="VIETCOMBANK"> Ngan hang VCB</option>
                                <option value="HDBANK">Ngan hang HDBank</option>
                                <option value="DONGABANK"> Ngan hang Dong A</option>
                                <option value="TPBANK"> Ngân hàng TPBank</option>
                                <option value="OJB"> Ngân hàng OceanBank</option>
                                <option value="BIDV"> Ngân hàng BIDV</option>
                                <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                <option value="VPBANK"> Ngan hang VPBank</option>
                                <option value="MBBANK"> Ngan hang MBBank</option>
                                <option value="ACB"> Ngan hang ACB</option>
                                <option value="OCB"> Ngan hang OCB</option>
                                <option value="IVB"> Ngan hang IVB</option>
                                <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <strong>Ngôn ngữ:</strong>
                        </div>
                        <div class="col-md-12">
                            <select name="language" id="language" class="form-control">
                                <option value="vn">Tiếng Việt</option>
                                <option value="en">English</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Thanh toán</button>
        </div>
        {{csrf_field()}}
    </form>
    <link href="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css" rel="stylesheet"/>
    <script src="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js"></script>
    <script type="text/javascript">
        $("#btnPopup").click(function () {
            var postData = $("#create_form").serialize();
            var submitUrl = $("#create_form").attr("action");
            $.ajax({
                type: "POST",
                url: submitUrl,
                data: postData,
                dataType: 'JSON',
                success: function (x) {
                    if (x.code === '00') {
                        if (window.vnpay) {
                            vnpay.open({width: 768, height: 600, url: x.data});
                        } else {
                            location.href = x.data;
                        }
                        return false;
                    } else {
                        alert(x.Message);
                    }
                }
            });
            return false;
        });
    </script>
</div>
</div>
<!-- END MAIN CONTAINER -->
@stop