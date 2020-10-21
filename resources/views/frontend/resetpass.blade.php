@extends('frontend.master')
@section('view')
<script type="text/javascript">
  $("input[type=password]").keyup(function(){
    var ucase = new RegExp("[A-Z]+");
    var lcase = new RegExp("[a-z]+");
    var num = new RegExp("[0-9]+");

    if($("#password1").val().length >= 8){
      $("#8char").removeClass("glyphicon-remove");
      $("#8char").addClass("glyphicon-ok");
      $("#8char").css("color","#00A41E");
    }else{
      $("#8char").removeClass("glyphicon-ok");
      $("#8char").addClass("glyphicon-remove");
      $("#8char").css("color","#FF0004");
    }

    if(ucase.test($("#password1").val())){
      $("#ucase").removeClass("glyphicon-remove");
      $("#ucase").addClass("glyphicon-ok");
      $("#ucase").css("color","#00A41E");
    }else{
      $("#ucase").removeClass("glyphicon-ok");
      $("#ucase").addClass("glyphicon-remove");
      $("#ucase").css("color","#FF0004");
    }

    if(lcase.test($("#password1").val())){
      $("#lcase").removeClass("glyphicon-remove");
      $("#lcase").addClass("glyphicon-ok");
      $("#lcase").css("color","#00A41E");
    }else{
      $("#lcase").removeClass("glyphicon-ok");
      $("#lcase").addClass("glyphicon-remove");
      $("#lcase").css("color","#FF0004");
    }

    if(num.test($("#password1").val())){
      $("#num").removeClass("glyphicon-remove");
      $("#num").addClass("glyphicon-ok");
      $("#num").css("color","#00A41E");
    }else{
      $("#num").removeClass("glyphicon-ok");
      $("#num").addClass("glyphicon-remove");
      $("#num").css("color","#FF0004");
    }

    if($("#password1").val() == $("#password2").val()){
      $("#pwmatch").removeClass("glyphicon-remove");
      $("#pwmatch").addClass("glyphicon-ok");
      $("#pwmatch").css("color","#00A41E");
    }else{
      $("#pwmatch").removeClass("glyphicon-ok");
      $("#pwmatch").addClass("glyphicon-remove");
      $("#pwmatch").css("color","#FF0004");
    }
  });
</script>
<div class="form-gap" style="margin-bottom: 20px;"></div>
<div class="container" >
  <div class="row">
    <div class="col-sm-12">
      <h1><center>Thay đổi mật khẩu</center></h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      <form method="post" id="passwordForm">
        <label><h4>Mật khẩu mới:</h4></label><input type="password" class="input-lg form-control" name="password" id="password1" placeholder="Mật khẩu mới" autocomplete="off">
        <div class="row">
          <div class="col-sm-12" style="margin-bottom: 20px;">
            <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span>Mật khẩu tối thiểu 6 kí tự,gồm chữ hoa,thường,số và kí tự đặc biệt.<br>
          </div>
          <br>
          <br>
        </div>
        <label><h4>Xác nhận mật khẩu:</h4></label><input type="password" class="input-lg form-control" name="password_comfirm" id="password2" placeholder="Nhập lại mật khẩu" autocomplete="off">
        <div class="row" style="margin-bottom: 20px;">
        </div>
        <input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Thay mật khẩu">
        {{csrf_field()}}
      </form>
    </div><!--/col-sm-6-->
  </div><!--/row-->
</div>
@stop