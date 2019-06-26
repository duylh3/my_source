<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--jQuery [ REQUIRED ]-->
        <script src="/assets/inside/js/jquery-2.1.1.min.js"></script>

        <!--STYLESHEET-->
        <!--=================================================-->

        <!--Open Sans Font [ OPTIONAL ] -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">


        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link href="/assets/inside/css/bootstrap.min.css" rel="stylesheet">


        <!--Nifty Stylesheet [ REQUIRED ]-->
        <link href="/assets/inside/css/nifty.min.css" rel="stylesheet">


        <!--Font Awesome [ OPTIONAL ]-->
        <link href="/assets/inside/plugins/font-awesome/css/font-awesome.css" rel="stylesheet">


        <!--Animate.css [ OPTIONAL ]-->
        <link href="/assets/inside/plugins/animate-css/animate.min.css" rel="stylesheet">


        <!--Morris.js [ OPTIONAL ]-->
        <link href="/assets/inside/plugins/morris-js/morris.min.css" rel="stylesheet">


        <!--Switchery [ OPTIONAL ]-->
        <link href="/assets/inside/plugins/switchery/switchery.min.css" rel="stylesheet">


        <!--Bootstrap Select [ OPTIONAL ]-->
        <link href="/assets/inside/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">


        <!--Demo script [ DEMONSTRATION ]-->
        <link href="/assets/inside/css/demo/nifty-demo.min.css" rel="stylesheet">

        <!--Bootstrap Table [ OPTIONAL ]-->
        <link href="/assets/inside/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">

        <!--Chosen [ OPTIONAL ]-->
        <link href="/assets/inside/plugins/chosen/chosen.min.css" rel="stylesheet">

        <link href="/assets/inside/css/modify.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

        <!--SCRIPT-->
        <!--=================================================-->

        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <link href="/assets/inside/plugins/pace/pace.min.css" rel="stylesheet">
        <script src="/assets/inside/plugins/pace/pace.min.js"></script>

        <script type="text/javascript" src="/assets/inside/plugins/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="/assets/inside/plugins/ckeditor/adapters/jquery.js"></script>

        <script src="/assets/inside/plugins/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="/assets/inside/plugins/uploadify/uploadify.css">
    </head>

    <body>
        <div id="container" class="effect mainnav-lg">

            <!--NAVBAR-->
            <!--===================================================-->
            <header id="navbar">
                <div id="navbar-container" class="boxed">

                    <!--Brand logo & name-->
                    <!--================================-->
                    <div class="navbar-header">
                        <a href="#" class="navbar-brand">
                            <img src="/assets/inside/img/logo.png" alt="Inside" class="brand-icon">
                            <div class="brand-title">
                                <span class="brand-text">Inside</span>
                            </div>
                        </a>
                    </div>                <!--================================-->
                    <!--End brand logo & name-->



                    <!--Navbar Dropdown-->
                    <!--================================-->
                    <div class="navbar-content clearfix">
                        <ul class="nav navbar-top-links pull-left">
                            <!--Navigation toogle button-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li class="tgl-menu-btn">
                                <a class="mainnav-toggle" href="#">
                                    <i class="fa fa-navicon fa-lg"></i>
                                </a>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End Navigation toogle button-->
                        </ul>
                        <ul class="nav navbar-top-links pull-right">

                            <!--Language selector-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li class="dropdown">
                                <!--Language selector menu-->
                                <ul class="head-list dropdown-menu with-arrow">
                                    <li>
                                        <!--English-->
                                        <a href="#" class="active">
                                            <img class="lang-flag" src="/assets/inside/img/flags/united-kingdom.png" alt="English">
                                            <span class="lang-id">EN</span>
                                            <span class="lang-name">English</span>
                                        </a>
                                    </li>
                                    <li>
                                        <!--France-->
                                        <a href="#">
                                            <img class="lang-flag" src="/assets/inside/img/flags/france.png" alt="France">
                                            <span class="lang-id">FR</span>
                                            <span class="lang-name">Fran&ccedil;ais</span>
                                        </a>
                                    </li>
                                    <li>
                                        <!--Germany-->
                                        <a href="#">
                                            <img class="lang-flag" src="/assets/inside/img/flags/germany.png" alt="Germany">
                                            <span class="lang-id">DE</span>
                                            <span class="lang-name">Deutsch</span>
                                        </a>
                                    </li>
                                    <li>
                                        <!--Italy-->
                                        <a href="#">
                                            <img class="lang-flag" src="/assets/inside/img/flags/italy.png" alt="Italy">
                                            <span class="lang-id">IT</span>
                                            <span class="lang-name">Italiano</span>
                                        </a>
                                    </li>
                                    <li>
                                        <!--Spain-->
                                        <a href="#">
                                            <img class="lang-flag" src="/assets/inside/img/flags/spain.png" alt="Spain">
                                            <span class="lang-id">ES</span>
                                            <span class="lang-name">Espa&ntilde;ol</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End language selector-->

                        </ul>
                    </div>
                    <!--================================-->
                    <!--End Navbar Dropdown-->

                </div>
            </header>
            <!--===================================================-->
            <!--END NAVBAR-->

            <div class="boxed">

                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    @yield('content')
                </div>
                <!--===================================================-->
                <!--END CONTENT CONTAINER-->



                <!--MAIN NAVIGATION-->
                <!--===================================================-->
                <nav id="mainnav-container">
                    <div id="mainnav">
                        <!--Menu-->
                        <!--================================-->
                        <div id="mainnav-menu-wrap">
                            <div class="nano">
                                <div class="nano-content">
                                    <ul id="mainnav-menu" class="list-group">
                                        <li class="<?php // echo (in_array($controllerName, array('categoriess'))) ? 'active' : ''      ?>">
                                            <a href="{!! url('inside/categories/show-all') !!}">
                                                <i class="fa fa-th-list"></i> 
                                                <span class="menu-title"> 
                                                    <strong>Danh sách chuyên mục</strong>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="<?php // echo (in_array($controllerName, array('categoriess'))) ? 'active' : ''      ?>">
                                            <a href="{!! url('inside/articles/show-all') !!}">
                                                <i class="fa fa-th-list"></i> 
                                                <span class="menu-title"> 
                                                    <strong>Danh sách bài viết</strong>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="<?php // echo (in_array($controllerName, array('categoriess'))) ? 'active' : ''      ?>">
                                            <a href="{!! url('inside/organizations/show-all') !!}">
                                                <i class="fa fa-th-list"></i> 
                                                <span class="menu-title"> 
                                                    <strong>Tổ chức công chứng</strong>
                                                </span>
                                            </a>
                                        </li>  
                                        <li class="<?php // echo (in_array($controllerName, array('categoriess'))) ? 'active' : ''      ?>">
                                            <a href="{!! url('inside/positions/show-all') !!}">
                                                <i class="fa fa-th-list"></i> 
                                                <span class="menu-title"> 
                                                    <strong>Thành viên ban chấp hành</strong>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="<?php // echo (in_array($controllerName, array('categoriess'))) ? 'active' : ''      ?>">
                                            <a href="{!! url('inside/news/show-all') !!}">
                                                <i class="fa fa-th-list"></i> 
                                                <span class="menu-title"> 
                                                    <strong>Bản tin Hội</strong>
                                                </span>
                                            </a>
                                        </li>  
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--================================-->
                        <!--End menu-->

                    </div>
                </nav>
                <!--===================================================-->
                <!--END MAIN NAVIGATION-->
            </div>



            <!-- FOOTER -->
            <!--===================================================-->
            <footer id="footer">

                <!-- Visible when footer positions are fixed -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <div class="show-fixed pull-right">
                    <ul class="footer-list list-inline">
                        <li>
                            <p class="text-sm">SEO Proggres</p>
                            <div class="progress progress-sm progress-light-base">
                                <div style="width: 80%" class="progress-bar progress-bar-danger"></div>
                            </div>
                        </li>

                        <li>
                            <p class="text-sm">Online Tutorial</p>
                            <div class="progress progress-sm progress-light-base">
                                <div style="width: 80%" class="progress-bar progress-bar-primary"></div>
                            </div>
                        </li>
                        <li>
                            <button class="btn btn-sm btn-dark btn-active-success">Checkout</button>
                        </li>
                    </ul>
                </div>



                <!-- Visible when footer positions are static -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <!--<div class="hide-fixed pull-right pad-rgt">Currently v2.2</div>-->



                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

                <!--<p class="pad-lft">&#0169; 2015 Your Company</p>-->



            </footer>
            <!--===================================================-->
            <!-- END FOOTER -->


            <!-- SCROLL TOP BUTTON -->
            <!--===================================================-->
            <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
            <!--===================================================-->



        </div>

        <div class="modal fade" id="static" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p class="message">

                        </p>
                    </div>
                    <!--Modal footer-->
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="static-confirm" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p class="message">

                        </p>
                    </div>
                    <!--Modal footer-->
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">
                            Hủy
                        </button>
                        <button id="confirm-action" type="button" data-dismiss="modal" class="btn btn-primary">
                            Chấp nhận
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!--JAVASCRIPT-->
        <!--=================================================-->

        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="/assets/inside/js/bootstrap.min.js"></script>


        <!--Fast Click [ OPTIONAL ]-->
        <script src="/assets/inside/plugins/fast-click/fastclick.min.js"></script>


        <!--Nifty Admin [ RECOMMENDED ]-->
        <script src="/assets/inside/js/nifty.min.js"></script>


        <!--Morris.js [ OPTIONAL ]-->



        <!--Sparkline [ OPTIONAL ]-->
        <script src="/assets/inside/plugins/sparkline/jquery.sparkline.min.js"></script>

        <script src="/assets/inside/plugins/chosen/chosen.jquery.min.js"></script>


        <!--Skycons [ OPTIONAL ]-->
        <script src="/assets/inside/plugins/skycons/skycons.min.js"></script>


        <!--Switchery [ OPTIONAL ]-->
        <script src="/assets/inside/plugins/switchery/switchery.min.js"></script>


        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="/assets/inside/plugins/bootstrap-select/bootstrap-select.min.js"></script>


        <!--Demo script [ DEMONSTRATION ]-->
        <script src="/assets/inside/js/demo/nifty-demo.min.js"></script>


        <!--Specify page [ SAMPLE ]-->


        <script>
            $(document).ready(function () {
                $('.has-error').each(function () {
                    if ($(this).html().length == 0) {
                        $(this).remove();
                    }
                });
                if ($('.has-error').parent().parent().hasClass('form-group')) {
                    $('.has-error').parent().parent().addClass('has-error');
                } else {
                    $('.has-error').parent().addClass('has-error');
                }

                $('.remove').click(function () {
                    if ($('.item-id:checked').length == 0) {
                        $('#static .message').text('Cần chọn tin cần xóa!');
                        $('#static').modal();
                        return false;
                    }

                    var url = $(this).attr('url');

                    $('#static-confirm .message').text('Bạn có chắc chắn?');
                    $('#static-confirm #confirm-action').removeAttr('action-type');
                    $('#static-confirm #confirm-action').attr('action-type', 'remove-action');
                    $('#static-confirm #confirm-action').attr('url', url);
                    $('#static-confirm').modal();
                });



                $('.change-status-item').click(function () {

                    var url = $(this).attr('href');

                    $('#static-confirm .message').text('Bạn có chắc chắn?');
                    $('#static-confirm #confirm-action').removeAttr('action-type');
                    $('#static-confirm #confirm-action').attr('action-type', 'remove-action-item');
                    $('#static-confirm #confirm-action').attr('url', url);
                    $('#static-confirm').modal();
                    return false;
                });



                $(document).on('click', 'button[action-type="remove-action-item"]', function () {
                    var url = $(this).attr('url');

                    window.location.href = url;
                });

                $('.change-status').click(function () {

                    if ($('.item-id:checked').length == 0) {
                        $('#static .message').text('Cần chọn tin cần duyệt!');
                        $('#static').modal();
                        return false;
                    }

                    var url = $(this).attr('url');

                    $('#static-confirm .message').text('Bạn có chắc chắn?');
                    $('#static-confirm #confirm-action').removeAttr('action-type');
                    $('#static-confirm #confirm-action').attr('action-type', 'remove-action');
                    $('#static-confirm #confirm-action').attr('url', url);
                    $('#static-confirm').modal();
                    return false;
                });

                $(document).on('click', 'button[action-type="remove-action"]', function () {
                    var url = $(this).attr('url');
                    var itemId = new Array;
                    var i = 0;
                    $('.item-id:checked').each(function (index, object) {
                        itemId[i++] = $(this).val();
                    })

                    $.post(url, {ids: itemId, '_token': '{!! csrf_token() !!}'}, function (data) {
                        if (data == 'Completed') {
                            window.location.reload();
                        }
                    });
                    return false;
                });

                $('.item-id-all').click(function () {
                    if ($('.item-id-all:checked').length) {
                        $('input.item-id').prop('checked', true);
                        $('input.item-id').parent().addClass('active');
                    } else {
                        $('input.item-id').prop('checked', false);
                        $('input.item-id').parent().removeClass('active');
                    }
                });

                $('.restore').click(function () {

                    if ($('.item-id:checked').length == 0) {
                        $('#static .message').text('Cần chọn tin cần khôi phục!');
                        $('#static').modal();
                        return false;
                    }

                    var url = $(this).attr('url');

                    $('#static-confirm .message').text('Bạn có chắc chắn?');
                    $('#static-confirm #confirm-action').removeAttr('action-type');
                    $('#static-confirm #confirm-action').attr('action-type', 'restore-action');
                    $('#static-confirm #confirm-action').attr('url', url);
                    $('#static-confirm').modal();
                    return false;
                });

                $(document).on('click', 'button[action-type="restore-action"]', function () {
                    var url = $(this).attr('url');
                    var itemId = new Array;
                    var i = 0;
                    $('.item-id:checked').each(function (index, object) {
                        itemId[i++] = $(this).val();
                    })

                    $.post(url, {ids: itemId, '_token': '{!! csrf_token() !!}'}, function (data) {
                        if (data == 'Completed') {
                            window.location.reload();
                        }
                    });
                    return false;
                });

                $('.delete').click(function () {

                    if ($('.item-id:checked').length == 0) {
                        $('#static .message').text('Cần chọn tin cần xóa!');
                        $('#static').modal();
                        return false;
                    }

                    var url = $(this).attr('url');

                    $('#static-confirm .message').text('Bạn có chắc chắn?');
                    $('#static-confirm #confirm-action').removeAttr('action-type');
                    $('#static-confirm #confirm-action').attr('action-type', 'delete-action');
                    $('#static-confirm #confirm-action').attr('url', url);
                    $('#static-confirm').modal();
                    return false;
                });

                $(document).on('click', 'button[action-type="delete-action"]', function () {
                    var url = $(this).attr('url');
                    var itemId = new Array;
                    var i = 0;
                    $('.item-id:checked').each(function (index, object) {
                        itemId[i++] = $(this).val();
                    })

                    $.post(url, {ids: itemId, '_token': '{!! csrf_token() !!}'}, function (data) {
                        if (data == 'Completed') {
                            window.location.reload();
                        }
                    });
                    return false;
                });
            });

            function filterOption(value, field) {
                var href = window.location.href;
                href = href.replace(/(\/$)/, "") + "/";
                href = href.replace(new RegExp(field + '/[^/]*/', 'gi'), "");
                if (value == 'ALL') {
                    window.location = href.replace(/(\/$)/, "") + "/";
                } else {
                    window.location = href + field + '/' + value;
                }
            }

            function toAlias(str) {
                str = str.toLowerCase();
                str = str.replace(/Ã |Ã¡|áº¡|áº£|Ã£|Ã¢|áº§|áº¥|áº­|áº©|áº«|Äƒ|áº±|áº¯|áº·|áº³|áºµ/g, "a");
                str = str.replace(/Ã¨|Ã©|áº¹|áº»|áº½|Ãª|á»�|áº¿|á»‡|á»ƒ|á»…/g, "e");
                str = str.replace(/Ã¬|Ã­|á»‹|á»‰|Ä©/g, "i");
                str = str.replace(/Ã²|Ã³|á»�|á»�|Ãµ|Ã´|á»“|á»‘|á»™|á»•|á»—|Æ¡|á»�|á»›|á»£|á»Ÿ|á»¡/g, "o");
                str = str.replace(/Ã¹|Ãº|á»¥|á»§|Å©|Æ°|á»«|á»©|á»±|á»­|á»¯/g, "u");
                str = str.replace(/á»³|Ã½|á»µ|á»·|á»¹/g, "y");
                str = str.replace(/Ä‘/g, "d");
                str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, " ");

                str = str.trim();
                str = str.replace(/\s+/g, "-");
                str = str.replace(/-+-/g, "-");//thay tháº¿ 2- thÃ nh 1-
                str = str.replace(/^\-+|\-+$/g, "-");//cáº¯t bá»� kÃ½ tá»± - á»Ÿ Ä‘áº§u vÃ  cuá»‘i chuá»—i
                str = $.trim(str, "-");
                return str;
            }

            $(document).ready(function () {
                $('form.form-horizontal input[name="product_name"]').keyup(function () {
                    $('form.form-horizontal input[name="alias"]').val(toAlias($(this).val()));
                });

                $('form.form-horizontal input[name="title"]').keyup(function () {
                    $('form.form-horizontal input[name="alias"]').val(toAlias($(this).val()));
                });

                $('form.form-horizontal input[name="category_name"]').keyup(function () {
                    $('form.form-horizontal input[name="alias"]').val(toAlias($(this).val()));
                });

                $('form.form-horizontal input[name="city_name"]').keyup(function () {
                    $('form.form-horizontal input[name="alias"]').val(toAlias($(this).val()));
                });

                $('form.form-horizontal input[name="district_name"]').keyup(function () {
                    $('form.form-horizontal input[name="alias"]').val(toAlias($(this).val()));
                });
            });
            $('.isConfirmDeleted').click(function (event) {
                event.preventDefault();
                var r = confirm("Bạn chắc chắn xác nhận hành động này?");
                if (r == true) {
                    var eleClicked = $(this);
                    $.post(eleClicked.attr('href'))
                            .done(function (data) {
                                window.location.reload();
                            })
                            ;
                } else {
                    return false;
                }
            });
        </script>
    </body>
</html>