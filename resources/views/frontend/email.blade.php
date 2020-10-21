@extends('frontend.master')
@section('view')
<style type="text/css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</style>
<script type="text/javascript">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</script>
<div class="form-gap" style="margin-bottom: 20px;"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="text-center">
            <h3><i class="fa fa-lock fa-4x"></i></h3>
            <h2 class="text-center">Quên mật khẩu?</h2>
            <p>Bạn có thể lấy lại mật khẩu của bạn tại đây.</p>
            <div class="panel-body">

              <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                    <input id="email" name="email" placeholder="Địa chỉ email" class="form-control"  type="email">
                  </div>
                </div>
                <div class="form-group">
                  <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Lấy lại mật khẩu" type="submit">
                </div>

                <input type="hidden" class="hide" name="token" id="token" value=""> 
                {{csrf_field()}}
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop