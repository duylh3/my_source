@extends('inside::layouts.master')
@section('content')
    <?php $title = "Thêm chuyên mục" ?>
    <div id="page-title">
        <h1 class="page-header text-overflow">{!!$title!!}</h1>
    </div>

    <ol class="breadcrumb">
        <li>
            <a href="{!! "/{$controllerName}/show-all" !!}">
                {!! $title !!}
            </a>
        </li>
        <li class="active">Thêm mới</li>
    </ol>

    <div id="page-content">
        <form role="form" class="form-horizontal" method="post">
            <div class="panel">

                <div class="panel panel-primary">

                    <!--Panel heading-->
                    <div class="panel-heading">
                        <h3 class="panel-title">Thêm chuyên mục</h3>
                    </div>
                    <!--Panel body-->
                    <div class="panel-body">

                        <!--Tabs content-->
                        <div class="tab-content">
                            <div id="company" class="tab-pane fade active in">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="form-field-1">
                                        Chuyên mục
                                    </label><div class="col-sm-7">
                                        {!! Form::text("category_name", null, ['class' => 'form-control']) !!}
                                        <span class="help-block has-error">{!! $errors->first("category_name") !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer text-right">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <button class="btn btn-primary btn-labeled fa fa-save">Lưu</button>
                        <button type="reset" class="btn btn-default btn-labeled fa fa-refresh">Hủy</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection