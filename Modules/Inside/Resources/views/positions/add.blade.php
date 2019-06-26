@extends('inside::layouts.master')
@section('content')
<?php $title = "Thêm thành viên" ?>
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
                    <h3 class="panel-title">Thêm thành viên</h3>
                </div>
                <!--Panel body-->
                <div class="panel-body">
                    <!--Tabs content-->
                    <div class="tab-content">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                Tên
                            </label><div class="col-sm-7">
                                {!! Form::text("name", null, ['class' => 'form-control','id' => "editor1"]) !!}
                                <span class="help-block has-error">{!! $errors->first("name") !!}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                Vị trí
                            </label>
                            <div class="col-sm-7">
                                {!! Form::text("position_name", null, ['class' => 'form-control']) !!}
                                <span class="help-block has-error">{!! $errors->first("position_name") !!}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                Chức vụ
                            </label><div class="col-sm-7">
                                {!! Form::text("description", null, ['class' => 'form-control','id' => "editor1"]) !!}
                                <span class="help-block has-error">{!! $errors->first("description") !!}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                <strong>Hình đại diện</strong>
                            </label>
                            <div class="col-sm-7 btn-file">
                                <div class="fileupload-new thumbnail" style="width: 320px; height: 205px; margin-bottom: 3px;">
                                    <?php
                                    if (strlen(old('image_name'))) :
                                        $path = old('image_name');
                                    else :
                                        $path = '/assets/inside/img/640x390.jpg';
                                    endif;
                                    ?>
                                    <img class="preview-file-upload" style="width: 320px; height: 195px;" src="{!! $path !!}">
                                </div>
                                <div class="p-l-file">
                                    <a href="#" data-target="image_name" class="iframe-btn browse-image" type="button">
                                        <i class="fa fa-paperclip"></i>&nbsp;&nbsp;Chọn hình
                                    </a>
                                </div>
                                {!! Form::hidden("image_name", null, ['id' => 'image_name']) !!}
                                {!! Form::hidden("is_new_image", 1) !!}
                                <span class="help-block has-error">{!! $errors->first("image_name") !!}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                Năm sinh
                            </label><div class="col-sm-7">
                                {!! Form::text("birthday", null, ['class' => 'form-control','id' => "editor1"]) !!}
                                <span class="help-block has-error">{!! $errors->first("birthday") !!}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                Giới tính
                            </label><div class="col-sm-7">
                                <select name='gender' class='form-control'>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>

                                <span class="help-block has-error">{!! $errors->first("gender") !!}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                Dân tộc
                            </label><div class="col-sm-7">
                                {!! Form::text("nation", null, ['class' => 'form-control','id' => "editor1"]) !!}
                                <span class="help-block has-error">{!! $errors->first("nation") !!}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                Tôn giáo
                            </label><div class="col-sm-7">
                                {!! Form::text("religion", null, ['class' => 'form-control','id' => "editor1"]) !!}
                                <span class="help-block has-error">{!! $errors->first("regilion") !!}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                Trình độ
                            </label><div class="col-sm-7">
                                {!! Form::text("level", null, ['class' => 'form-control','id' => "editor1"]) !!}
                                <span class="help-block has-error">{!! $errors->first("level") !!}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                Ngày vào Đảng
                            </label><div class="col-sm-7">
                                {!! Form::text("date_in", null, ['class' => 'form-control','id' => "editor1"]) !!}
                                <span class="help-block has-error">{!! $errors->first("date_in") !!}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                Công việc
                            </label><div class="col-sm-7">
                                {!! Form::text("job", null, ['class' => 'form-control','id' => "editor1"]) !!}
                                <span class="help-block has-error">{!! $errors->first("job") !!}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                Nơi làm việc
                            </label><div class="col-sm-7">
                                {!! Form::text("workplace", null, ['class' => 'form-control','id' => "editor1"]) !!}
                                <span class="help-block has-error">{!! $errors->first("workplace") !!}</span>
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
<script src="/assets/inside/plugins/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
//    $(function () {
//        CKEDITOR.config.enterMode = CKEDITOR.ENTER_P;
//        CKEDITOR.config.shiftEnterMode = CKEDITOR.ENTER_BR;
//        CKEDITOR.config.filebrowserBrowseUrl = '/inside/static/ck';
//        CKEDITOR.config.filebrowserUploadUrl = '/inside/static/ck';
//        CKEDITOR.config.toolbar = 'basic';
//        var editor = CKEDITOR.replace('content', CKEDITOR.config);
//        CKFinder.setupCKEditor(editor, {
//            rememberLastFolder: false,
//            basePath: '/inside/static/ck?CKEditor=upload_multi_file&CKEditorFuncNum=1&langCode=en',
//            startupPath: 'Images:/positions/',
//        });
//    });
    function BrowseServer(name) {
        var config = {};
        config.startupPath = 'Images:/banners/';
        var finder = new CKFinder(config);
        finder.selectActionFunction = SetFileField;
        finder.selectActionData = name;
        finder.callback = function (api) {
            api.disableFolderContextMenuOption('Batch', true);
        };
        finder.popup();
    }
    function SetFileField(fileUrl, data) {
        var file = fileUrl.replace(/\/\//g, '/');
        $('#' + data["selectActionData"]).val(file);
        $('#' + data["selectActionData"]).parent().find('.preview-file-upload').attr('src', file);
    }

    $(function () {
        var browseImage = function () {
            $('.browse-image').click(function () {
                var name = $(this).attr('data-target');
                BrowseServer(name);
            });
        };
        browseImage();
    });
</script>

@endsection