<!DOCTYPE html>
<html>
    <head>
        <title>Hội Công Chứng Viên Tỉnh Đồng Nai</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="/assets/outside/images/icon.jpg">
        <link rel="stylesheet" href="/assets/outside/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="/assets/outside/css/style.css">
    </head>
    <body style="background-color: #f0f2f4;">
        <header class="container" style="background-color: #fff">

            <div class="jumbotron">
                <div class="container text-center">
                    <h2 style="color: #ffcc00" class="banner-text">Hội Công Chứng Viên <br> Đồng Nai</h2>
                </div>
            </div>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid bg-top">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Hội Công Chứng Viên Tỉnh Đồng Nai</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <!--                <ul class="nav navbar-nav">
                                                                        <li class="active"><a href="#">Home</a></li>
                                                                        <li><a href="#">Products</a></li>
                                                                        <li><a href="#">Deals</a></li>
                                                                        <li><a href="#">Stores</a></li>
                                                                        <li><a href="#">Contact</a></li>
                                        </ul>-->
                        <a href="master.blade.php"></a>
                        <!--                        <ul class="nav navbar-nav navbar-right">
                                                    <li><a href="#"><span class="glyphicon glyphicon-user"></span>Đăng nhập</a></li>
                                                </ul>-->
                    </div>
                </div>
            </nav>
        </header>
        <div class="container" style="background-color: #fff">
            <div class="row">
                <div class="col-md-3 menu-left">
                    <nav class="nav-sidebar">
                        <ul class="nav">
                            <li class="left-item"><a href="{!! url("outside/articles/about"); !!}">Giới Thiệu</a></li>
                            <li class="left-item"><a href="{!! url("outside/articles/show-news-images"); !!}"> Thư Viện Hình Ảnh</a></li>
                            <li class="left-item"><a href="{!! url("outside/articles/news"); !!}"">Văn Bản và Bản Tin Của Hội</a></li>
                            <li class="left-item"><a href="#">Giải Đáp Pháp Luật</a></li>
                            <li class="left-item"><a href="{!! url("outside/articles/position"); !!}">Tổ Chức Bộ Máy</a></li>
                            <li class="left-item"><a href="#">Ý Kiến Công Dân</a></li>
                            <li class="left-item"><a href="{!! url("outside/articles/contact"); !!}">Thông Tin Liên Hệ</a></li>
                            <li class="left-item"><a href="{!! url("outside/organizations/show-all"); !!}">Các Tổ Chức Công Chứng</a></li>
                            <li class="left-item"><a href="#">Thông Tin Nội Bộ</a></li>
                        </ul>
                    </nav>
                    <div class="col-md-12">
                        <a class="col-md-12 menu-left-title fix-padding" href="#">Ban Thường Vụ</a>
                        <ul class="widget-content user-widget">
                            <li class="item-user-widget col-md-12 fix-padding">
                                <div class="col-xs-4 fix-padding wrap-item-image">
                                    <a href="#"><img class="img-layout" src="/assets/outside/images/avatar.png"></a>
                                </div>
                                <div class="col-md-8 fix-padding wrap-item-text">
                                    <p class="item-text-title text-uppercase">Nguyễn Thị Hồng Vân</p>
                                    <p class="item-user-info">
                                    <h5 class="user-info">Chức vụ: Chủ Tịch Hội </h5>  
                                    <h5 class="user-info">Năm Sinh : 1969</h5>

                                </div>
                                <div class="col-md-12">
                                    <h5 class="user-info">Phòng Công Chứng Số 4</h5>
                                    <h5 class="user-info">Trình độ: Cử Nhân Luật - Cử Nhân Triết Học.</h5>
                                </div>
                            </li>
                            <li class="item-user-widget col-md-12 fix-padding">
                                <div class="col-md-4 fix-padding wrap-item-image">
                                    <a href="#"><img class="img-layout" src="/assets/outside/images/user-2.png"></a>
                                </div>
                                <div class="col-md-8 fix-padding wrap-item-text">
                                    <p class="item-text-title text-uppercase">Phạm Văn Hùng</p>
                                    <p class="item-user-info">
                                    <h5 class="user-info">Chức vụ: Phó Chủ Tịch Thường Trực </h5>  
                                    <h5 class="user-info">Năm Sinh : 1966</h5>

                                </div>
                                <div class="col-md-12">
                                    <h5 class="user-info">Văn Phòng Công Chứng Thạnh Phú</h5>
                                    <h5 class="user-info">Trình độ: Cử Nhân Luật.</h5>
                                </div>
                            </li>
                            <li class="item-user-widget col-md-12 fix-padding">
                                <div class="col-xs-4 fix-padding wrap-item-image">
                                    <a href="#"><img class="img-layout" src="/assets/outside/images/user-4.png"></a>
                                </div>
                                <div class="col-md-8 fix-padding wrap-item-text">
                                    <p class="item-text-title text-uppercase">Nguyễn Văn Thông</p>
                                    <p class="item-user-info">
                                    <h5 class="user-info">Chức vụ: Phó Chủ Tịch </h5> 
                                    <h5 class="user-info">Năm Sinh : 1955</h5>
                                </div>
                                <div class="col-md-12">
                                    <h5 class="user-info">Văn Phòng Công Chứng An Hòa</h5>
                                    <h5 class="user-info">Trình độ: Cử Nhân Luật</h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>
            <footer class="container-fluid">
                <div class="title-news">
                    <h5>Văn Phòng Hội Công Chứng Viên Đồng Nai</h5>
                </div>
                <div class="info">
                    Địa Chỉ: 179 Lê Duẩn, Khu Phước Hải,TT Long Thành huyện Long Thành, tỉnh Đồng Nai. <br>
                    Điện thoại: 0613 844 250 <br>
                </div>
            </footer>
        </div>
    </body>
</html>
