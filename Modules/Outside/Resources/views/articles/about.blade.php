@extends('outside::layouts.sub-master')
@section('content')
@foreach($about as $row)
    <div class="content">
        <div class="title-news">
            <h4>{!! $row['title'] !!}</h4>
        </div>
        <div class="info-content">
            {!! $row['content'] !!}
        </div>
    </div>
@endforeach
@stop
