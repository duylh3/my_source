@extends('outside::layouts.sub-master')

@section('content')
<div class="col-md-11">
    <div class="content">
        <div class="title-news">
            <h4>{!! $object['organization_name'] !!}</h4>
            <a href="show-all.blade.php"></a>
        </div>
        <div class="info-content">
            {!! $object['content'] !!}
        </div>
    </div>
</div>
@stop
