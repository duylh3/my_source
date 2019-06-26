@extends('outside::layouts.sub-master')

@section('content')
<style>
    .text-header{
        text-align: center;
        font-weight: bolder;
    }
    hr{
        width: 30%;
    }
</style>
<div class="col-md-12">
    <div class="col-md-6 text-header">
        HỘI CÔNG CHỨNG VIÊN <br>
        TỈNH ĐỒNG NAI <br>
        <hr>
    </div>
    <div class="col-md-6 text-header">
        CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM <br>
        Độc lập - Tự do - Hạnh phúc
        <hr>
    </div>
    <div class="col-md-6 text-header">
        {!! $object['define'] !!}
    </div>
    <div class="col-md-6 text-header">
        {!! $object['time'] !!}
    </div>
</div>
<div class="col-md-11">
    <div class="content">
        <div class="info-content">
            {!! $object['content'] !!}
        </div>
    </div>
</div>
@stop
