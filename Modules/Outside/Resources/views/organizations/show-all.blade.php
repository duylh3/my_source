@extends('outside::layouts.sub-master')
@section('content')
<div class="col-md-12 fix-padding">
        <p class="col-md-12 fix-padding title-header">Các Tổ Chức Công Chứng</p>
        @foreach($intros as $row)
        <div class="col-md-12 list-articles fix-padding">
            <div class="col-md-3 fix-padding">
                <a href="{!! url("outside/organizations/detail/{$row['organization_id']}"); !!}">
                    <img class="img-responsive image-artiles img-hover" src="/upload/images/{{$row['image_name']}}" alt="">
                </a>
            </div>
            <div class="col-md-7">
                <a href="{!! url("outside/organizations/detail/{$row['organization_id']}"); !!}" class="title-intro">{{ $row['organization_name'] }}</a>
  
                <div class="info">
                    {!! $row['description'] !!}            
                </div>
            </div>
        </div>
        @endforeach
    </div>
@stop