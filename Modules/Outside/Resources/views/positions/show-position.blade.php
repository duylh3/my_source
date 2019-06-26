@extends('outside::layouts.sub-master')
@section('content')

<div class="col-md-12">
    <div class="col-md-12">
        <div class="title-news">
            <h5>Ban Thưởng Vụ</h5>
        </div>
        <ol>
            @foreach($arrBanThV as $row)
            <li>{{ $row['name'] }} - {{$row['description_1']}}</li>
            @endforeach
        </ol>
    </div>
    <div class="col-md-12">
        <div class="title-news">
            <h5>Hội Đồng Khen Thưởng Kỷ Luật</h5>
        </div>
        <ol>
            @foreach($arrKhenThuong as $row)
            <li>{{ $row['name'] }} - {{$row['description_2']}}</li>
            @endforeach
        </ol>
    </div>
    <div class="col-md-12">
        <div class="title-news">
            <h5>Ban Kiểm Tra</h5>
        </div>
        <ol>
            @foreach($arrTest as $row)
            <li>{{ $row['name'] }} - {{$row['description_3']}}</li>
            @endforeach
        </ol>
    </div>
        <div class="col-md-12">
        <div class="title-news">
            <h5>Bộ Phận Văn Phòng (Tiểu Ban Thư Ký)</h5>
        </div>
        <ol>
            @foreach($arrVanPhong as $row)
            <li>{{ $row['name'] }} - {{$row['description_4']}}</li>
            @endforeach
        </ol>
    </div>
</div>
@stop