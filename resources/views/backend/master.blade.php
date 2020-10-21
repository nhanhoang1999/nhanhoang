<!DOCTYPE html>
<head>
<title>@yield('title') | Shop </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<base href="{{asset('layout/backend')}}/">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.css" >
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script type="text/javascript" src="{{asset('public/editor/ckeditor/ckeditor.js')}}"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{asset('admin/home')}}" class="logo">
        ADMIN PAGE
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/2.png">
                <span class="username">{{Auth::guard('UserAdmin')->user()->name}}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{asset('logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="{{asset('admin/home')}}">
                                <i class="fa fa-dashboard"></i>
                                <span>Trang chủ</span>
                            </a>
                        </li>
                        
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Quản lý danh mục</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{asset('admin/category/add')}}">Thêm danh mục</a></li>
                              <li><a href="{{asset('admin/category')}}">Hiển thị danh mục</a></li>
                          </ul>
                      </li>
                      <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-tasks"></i>
                            <span>Quản lý sản phẩm</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{asset('admin/product/add')}}">Thêm sản phẩm</a></li>
                            <li><a href="{{asset('admin/product')}}">Danh sách sản phẩm</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-first-order" aria-hidden="true"></i>
                            <span>Quản lý đơn hàng </span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{asset('admin/order')}}">Đơn hàng</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class=" fa fa-pencil-square"></i>
                            <span>Quản lý bài viết</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{asset('admin/posts/add')}}">Thêm bài viết mới</a></li>
                            <li><a href="{{asset('admin/posts')}}">Danh sách bài viết</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class=" fa fa-bar-chart-o"></i>
                            <span>Thống kê doanh thu</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{asset('admin/thongke')}}">Theo tháng</a></li>
                            <li><a href="vector_map.html">Xuất file</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-glass"></i>
                            <span>Extra</span>
                        </a>
                        <ul class="sub">
                            <li><a href="gallery.html">Gallery</a></li>
                            <li><a href="404.html">404 Error</a></li>
                            <li><a href="registration.html">Registration</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class=" fa fa-user"></i>
                            <span>Thành viên</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{asset('admin/users')}}">Danh sách thành viên</a></li>
                        </ul>
                    </li>                    
                    <li>
                        <a href="{{asset('logout')}}">
                            <i class="fa fa-user"></i>
                            <span>Đăng xuất</span>
                        </a>
                    </li>
                </ul>            </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
<section id="main-content">
    <section class="wrapper">
        @yield('main')
<div class="agil-info-calendar">    
</section>
</section>
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->  
<script>
    $(document).ready(function() {
        //BOX BUTTON SHOW AND CLOSE
       jQuery('.small-graph-box').hover(function() {
          jQuery(this).find('.box-button').fadeIn('fast');
       }, function() {
          jQuery(this).find('.box-button').fadeOut('fast');
       });
       jQuery('.small-graph-box .box-close').click(function() {
          jQuery(this).closest('.small-graph-box').fadeOut(200);
          return false;
       });  
    });
  // Chang Image add product
  function changeImg(input){
      //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
      if(input.files && input.files[0]){
          var reader = new FileReader();
          //Sự kiện file đã được load vào website
          reader.onload = function(e){
              //Thay đổi đường dẫn ảnh
              $('#avatar').attr('src',e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }
  $(document).ready(function() {
      $('#avatar').click(function(){
          $('#img').click();
      });
  });
    </script>
</body>
</html>
