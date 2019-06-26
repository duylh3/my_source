@extends('outside::layouts.sub-master')
@section('content')
<div class="col-md-12">
    <div class="title-news">
        <h4>Ban Thường Vụ</h4>
    </div>
    @foreach($btv as $row)
    <div class="col-md-4">
        <img class="img-responsive img-position" src="/upload/images/{{ $row['image_name'] }}" alt="">
        <div class="info-position" style="line-height: 23px">
            Họ tên: {{ $row['name'] }}<br>
            Chức vụ: {{ $row['description'] }}<br>
            Trình độ: {{ $row['level'] }}<br>
            Nơi làm việc: {{ $row['workplace'] }}<br>                               
        </div>
    </div>
    @endforeach

</div>
<div class="col-md-12">
    <div class="title-news">
        <h4>Ban Chấp Hành</h4>
    </div>
    @foreach($bch as $row)
    <div class="col-md-4">
        <img class="img-responsive img-position" src="/upload/images/{{ $row['image_name'] }}" alt="">
        <div class="info-position" style="line-height: 23px">
            Họ tên: {{ $row['name'] }}<br>
            Chức vụ: {{ $row['description'] }}<br>
            Trình độ: {{ $row['level'] }}<br>
            Nơi làm việc: {{ $row['workplace'] }}<br> 
        </div>
    </div>
    @endforeach
</div>
@foreach($position as $row)
<div class="col-md-12" style="margin-top: 30px">
    <div class="info-content">
        {!! $row['content'] !!}
    </div>
</div>
@endforeach
@stop
