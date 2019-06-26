@extends('outside::layouts.master')

@section('content')

<div class="col-md-12">
    <div class="col-md-6 content">
        <div class="thumb">
             <a href="{!! url("outside/articles/detail/{$firstNew['article_id']}"); !!}">
                <img class="img-responsive img-height" src="/upload/images/{{$firstNew['image_name']}}" alt="">
            </a>
            <a class="item-home-title" href="{!! url("outside/articles/detail/{$firstNew['article_id']}"); !!}">
                {!! $firstNew['title'] !!}
            </a>
            <div class="info italic">
                {!! $firstNew['description'] !!}
            </div>
        </div>
    </div>
    <div class="col-md-5 content-right">
        <p class="lead">Tin Mới</p>
        @foreach($news as $key => $value)
        @if($key >= 1)
        <div class="col-md-12 right-item">
            <div class="col-md-5">
                <a href="{!! url("outside/articles/detail/{$value['article_id']}"); !!}">
                    <img class="img-responsive img-hover" src="/upload/images/{{$value['image_name']}}" alt="">
                </a>
            </div>
            <div class="col-md-7 fix-padding">
                <a href="{!! url("outside/articles/detail/{$value['article_id']}"); !!}" class="link">{!! $value['title'] !!}</a>
                <div class="info">
                    <!--{!! $value['description'] !!}-->
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <div class="col-md-12 fix-padding">
        <p class="col-md-12 fix-padding title-header">Các Tổ Chức Công Chứng</p>
        @foreach($articles as $row)
        <div class="col-md-12 list-articles fix-padding">
            <div class="col-md-3 fix-padding">
                <a href="{!! url("outside/articles/detail/{$row['article_id']}"); !!}">
                    <img class="img-responsive image-artiles img-hover" src="/upload/images/{{$row['image_name']}}" alt="">
                </a>
            </div>
            <div class="col-md-7">
                <a href="{!! url("outside/articles/detail/{$row['article_id']}"); !!}" class="title-intro">{{ $row['title'] }}</a>
                <div class="info">
                    {!! $row['description'] !!}            
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop
