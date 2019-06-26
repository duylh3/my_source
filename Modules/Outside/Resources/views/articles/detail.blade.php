@extends('outside::layouts.sub-master')

@section('content')
<div class="col-md-11">
    <div class="content">
        <div class="title-news">
            <h4>{!! $object['title'] !!}</h4>
        </div>
        <div class="info-content">
            {!! $object['content'] !!}
        </div>
    </div>
</div>
@stop
