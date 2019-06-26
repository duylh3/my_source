@extends('outside::layouts.master')
@section('content')

<div class="col-md-12">
    <div class="title-news">
        <h4>Ban Chấp Hành Hội</h4>
    </div>
    <div class="col-md-12 ct">
        <div class="col-md-6">
            <a href="#">
                <img class="img-responsive img-position" src="/assets/outside/images/avatar.png" alt="">
            </a>
            <div class="info-position">
                Họ tên : {{ $arrChuTich['name'] }}<br>
                Chức vụ : {{ $arrChuTich['position_name'] }}<br>
                Năm sinh: {{ $arrChuTich['birthday'] }}<br>
                Trình độ : {{ $arrChuTich['level'] }} <br>
                Nghề nghiệp: {{ $arrChuTich['job'] }}<br>
                Nơi làm việc : {{ $arrChuTich['workplace'] }}<br>                               
            </div>
        </div>

    </div>
    <div class="col-md-12 pct">
        <div class="col-md-6">
            <a href="#">
                <img class="img-responsive img-position" src="/assets/outside/images/user-2.png" alt="">
            </a>
            <div class="info-position">
                Họ tên : Phạm Văn Hùng<br>
                Chức vụ : Phó Chủ Tịch - Thường Trực<br>
                Năm sinh: 1966<br>
                Trình độ chuyên môn: CN Luật<br>
                Nghề nghiệp: Công chứng viên<br>
                Nơi làm việc : Văn phòng công chứng Thạnh Phú<br>                               
            </div>
        </div>
        <div class="col-md-6">
            <a href="#">
                <img class="img-responsive img-position" src="/assets/outside/images/user-4.png" alt="">
            </a>
            <div class="info-position">
                Họ tên : Nguyễn Văn Thông<br>
                Chức vụ : Phó Chủ Tịch<br>
                Năm sinh: 1955<br>
                Trình độ : CN Luật<br>
                Nghề nghiệp: Công chứng viên<br>
                Nơi làm việc : Văn phòng công chứng An Hòa<br>                               
            </div>
        </div>
    </div>
    <div class="col-md-12 hv">
        <div class="col-md-6">
            <a href="#">
                <img class="img-responsive img-position" src="/assets/outside/images/noimage.jpg" alt="">
            </a>
            <div class="info-position">
                Họ tên : Phan Thị Vân Anh<br>
                Chức vụ : Hội Viên<br>
                Năm sinh: 1976<br>
                Trình độ : CN Luật <br>
                Nghề nghiệp: Công chứng viên<br>
                Nơi làm việc : Văn Phòng Công Chứng Thống Nhất<br>                               
            </div>
        </div>
        <div class="col-md-6">
            <a href="#">
                <img class="img-responsive img-position" src="/assets/outside/images/noimage.jpg" alt="">
            </a>
            <div class="info-position">
                Họ tên : Bùi Ngọc Hiếu<br>
                Chức vụ : Hội Viên<br>
                Năm sinh: 1963<br>
                Trình độ : CN Luật <br>
                Nghề nghiệp: Công chứng viên<br>
                Nơi làm việc : Phòng Công Chứng Số 1<br>                               
            </div>
        </div>
        <div class="col-md-6">
            <a href="#">
                <img class="img-responsive img-position" src="/assets/outside/images/noimage.jpg" alt="">
            </a>
            <div class="info-position">
                Họ tên : Hoàng Thị Liên<br>
                Chức vụ : Hội Viên<br>
                Năm sinh: 1959<br>
                Trình độ : CN Luật <br>
                Nghề nghiệp: Công chứng viên<br>
                Nơi làm việc : Văn Phòng Công Chứng Hoàng Long<br>                               
            </div>
        </div>
        <div class="col-md-6">
            <a href="#">
                <img class="img-responsive img-position" src="/assets/outside/images/noimage.jpg" alt="">
            </a>
            <div class="info-position">
                Họ tên : Phạm Văn Phương<br>
                Chức vụ : Hội Viên<br>
                Năm sinh: 1976<br>
                Trình độ : CN Luật <br>
                Nghề nghiệp: Công chứng viên<br>
                Nơi làm việc : Văn Phòng Công Chứng Trấn Biên<br>                               
            </div>
        </div>
        <div class="col-md-6">
            <a href="#">
                <img class="img-responsive img-position" src="/assets/outside/images/noimage.jpg" alt="">
            </a>
            <div class="info-position">
                Họ tên : Nguyễn Ngọc Thắm<br>
                Chức vụ : Hội Viên<br>
                Năm sinh: 1979<br>
                Trình độ : Ths Luật <br>
                Nghề nghiệp: Công chứng viên<br>
                Nơi làm việc : Phòng Công Chứng Số 2<br>                               
            </div>
        </div>
        <div class="col-md-6">
            <a href="#">
                <img class="img-responsive img-position" src="/assets/outside/images/noimage.jpg" alt="">
            </a>
            <div class="info-position">
                Họ tên : Lê Thị Tâm<br>
                Chức vụ : Hội Viên<br>
                Năm sinh: 1965<br>
                Trình độ : CN Luật <br>
                Nghề nghiệp: Công chứng viên<br>
                Nơi làm việc : Văn Phòng Công Chứng Lê Tâm<br>                               
            </div>
        </div>
    </div>
</div>
@stop