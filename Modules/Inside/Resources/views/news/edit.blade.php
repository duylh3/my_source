@extends("inside::layouts.master")
@section('content')
<?php
$languages = json_decode(LANGUAGES);
?>
<div id="page-title">
    <h1 class="page-header text-overflow">{!! $title !!}</h1>
</div>

<ol class="breadcrumb">
    <li>
        <a href="{!! url("inside/{$controllerName}/show-all"); !!}">
           {!! $title !!}
    </a>
</li>
<li class="active">Chỉnh sửa</li>
</ol>

<div id="page-content">
    <form role="form" class="form-horizontal" method="post">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Chỉnh sửa</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-field-1">
                        Chuyên mục
                        <span class="symbol required"></span>
                    </label>
                    <div class="col-sm-7">
                        <select name='category_id' class='form-control'>
                            @foreach ($categories as $item)
                            @if ($item->category_id == $object['category_id'])
                            <option value="{{$item->category_id}}" selected>{{$item->category_name}}</option>
                            @else
                            <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-field-1">
                        Tiêu đề
                    </label><div class="col-sm-7">
                        {!! Form::text("title", $object['title'], ['class' => 'form-control']) !!}
                        <span class="help-block has-error">{!! $errors->first("title") !!}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-field-1">
                        Mô tả
                    </label><div class="col-sm-7">
                        {!! Form::textarea("description", $object['description'], ['class' => 'form-control']) !!}
                        <span class="help-block has-error">{!! $errors->first("description") !!}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-field-1">
                        Địa điểm
                    </label><div class="col-sm-7">
                        {!! Form::text("define", $object['define'], ['class' => 'form-control']) !!}
                        <span class="help-block has-error">{!! $errors->first("define") !!}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-field-1">
                        Thời gian
                    </label><div class="col-sm-7">
                        {!! Form::text("time", $object['time'], ['class' => 'form-control']) !!}
                        <span class="help-block has-error">{!! $errors->first("time") !!}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-field-1">
                        <strong>Hình đại diện</strong>
                        <span class="symbol required"></span>
                    </label>
                    <div class="col-sm-7 btn-file">
                        <div class="fileupload-new thumbnail" style="width: 320px; height: 205px; margin-bottom: 3px;">
                            <?php
                            if (strlen(old('image_name')) == 1) :
                                $path = old('image_name');
                            else :
                                $path = '/upload/images/' . $object['image_name'];
                            endif;
                            ?>
                            <img class="preview-file-upload" style="width: 320px; height: 195px;" src="{!! $path !!}">
                        </div>
                        <div class="p-l-file">
                            <a href="#" data-target="image_name" class="iframe-btn browse-image" type="button">
                                <i class="fa fa-paperclip"></i>&nbsp;&nbsp;Chọn hình
                            </a>
                        </div>
                        {!! Form::hidden("image_name", $object['image_name'], ['id' => 'image_name']) !!}
                        {!! Form::hidden("is_new_image") !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-field-1">
                        <strong>Nội dung</strong>
                        <span class="symbol required"></span>
                    </label>
                    <div class="col-sm-7">
                        {!! Form::textarea("content", $object['content'], ['class' => 'form-control' , 'id' => "content", 'style' => (old('article_type') == 'image' || old('article_type') == 'video') ? 'display: none;' : '']) !!}
                        <div id="article-image-box" style="<?php echo old('article_type') != 'image' ? 'display: none;' : '' ?>">
                            <div class="col-xs-12">
                                <label class="col-xs-12">Upload nhiều file</label>
                                <div class="col-xs-12">
                                    <button id="upload_multi_file"></button>

                                </div>
                            </div>
                            <div class="items">
                                <?php
                                $listContentImages = empty(old('content_image')) ? [0 => ['name' => '', 'description' => '']] : old('content');
                                ?>
                                @foreach ($listContentImages as $index => $value)
                                <div class="col-sm-12 items-box first" data-index="{{ $index }}" >
                                    <div class="col-sm-4">
                                        <div class="fileupload-new thumbnail" style="width: 140px; height: 150px; margin-bottom: 3px;">
                                            <?php
                                            if (isset($value['name']) && !empty($value['name'])) :
                                                $path = "/upload/images/{$value['name']}";
                                            else :
                                                $path = '/assets/inside/img/avatar.png';
                                            endif;
                                            ?>
                                            <img class="preview-file-upload" style="width: 140px; height: 140px;" src="{!! $path !!}">
                                        </div>
                                        <div class="p-l-file">
                                            <a href="javascript:;" data-target="content_image_name_{{ $index }}" class="iframe-btn browse-image" type="button">
                                                <i class="fa fa-paperclip"></i>&nbsp;&nbsp;Chọn hình
                                            </a>
                                        </div>
                                        <input id="content_image_name_{{ $index }}" value="{{ ($path == '/assets/inside/img/avatar.png') ? null : $path }}" name="content_image[{{ $index }}][name]" type="hidden">
                                    </div>
                                    <div class="col-sm-8">
                                        Mô tả: <br/>
                                        <textarea class="form-control" name="content_image[{{ $index }}][description]" style="resize: none; height: 150px;">{!! $value['description'] !!}</textarea>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button type="button" id="more-article-image" class="btn btn-primary">Thêm</button>
                        </div>
                        <span class="help-block has-error">{!! $errors->first("content") !!}</span>
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

<!-- CKFinder -->
<script src="/assets/inside/plugins/ckfinder/ckfinder.js"></script>

<script type="text/javascript">

$(function () {
CKEDITOR.config.enterMode = CKEDITOR.ENTER_P;
CKEDITOR.config.shiftEnterMode = CKEDITOR.ENTER_BR;
CKEDITOR.config.filebrowserBrowseUrl = '/inside/static/ck';
CKEDITOR.config.filebrowserUploadUrl = '/inside/static/ck';
CKEDITOR.config.toolbar = 'basic';
var editor = CKEDITOR.replace('content', CKEDITOR.config);
CKFinder.setupCKEditor(editor, {
    rememberLastFolder: false,
    basePath: '/inside/static/ck?CKEditor=upload_multi_file&CKEditorFuncNum=1&langCode=en',
    startupPath: 'Images:/articles/',
});
});

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