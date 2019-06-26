@extends('outside::layouts.sub-master')
@section('content')
<div class="col-md-12 fix-padding">
    @foreach($news as $row)
    <div class="col-md-12 list-articles fix-padding">
        <div class="col-md-9">
            <a href="{!! url("outside/articles/news-detail/{$row['article_id']}"); !!}" class="title-intro">{{ $row['title'] }}</a>
            <div class="info">
                {!! $row['description'] !!}            
            </div>
        </div>
    </div>
    @endforeach
</div>


@stop
