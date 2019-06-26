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
                            <li class="left-item"><a href="{!! url("outside/articles/news"); !!}">Văn Bản và Bản Tin Của Hội</a></li>
                            <li class="left-item"><a href="#">Giải Đáp Pháp Luật</a></li>
                            <li class="left-item"><a href="{!! url("outside/articles/position"); !!}">Tổ Chức Bộ Máy</a></li>
                            <li class="left-item"><a href="#">Ý Kiến Công Dân</a></li>
                            <li class="left-item"><a href="{!! url("outside/articles/contact"); !!}">Thông Tin Liên Hệ</a></li>
                            <li class="left-item"><a href="{!! url("outside/organizations/show-all"); !!}">Các Tổ Chức Công Chứng</a></li>
                            <li class="left-item"><a href="#">Thông Tin Nội Bộ</a></li>
                        </ul>
                    </nav>                   
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
