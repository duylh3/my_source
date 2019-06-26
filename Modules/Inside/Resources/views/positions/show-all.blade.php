@extends('inside::layouts.master')
@section('content')
<?php
$searchOptions = array(
    'position_name_search' => 'Chức vụ',
);
?>
<style>
    .table.table-hover thead tr th:nth-child(1)
    {
        width: 20%;
    }
    .table.table-hover thead tr th:nth-child(2),
    .table.table-hover thead tr th:nth-child(3)
    {
        width: 15%;
    }
    .table.table-hover thead tr th:nth-child(4),
    .table.table-hover thead tr th:nth-child(5),
    .table.table-hover thead tr th:nth-child(7)
    {
        width: 13%;
    }

    .table.table-hover thead tr th:nth-child(6)
    {
        width: 11%;
    }

</style>

<div id="page-title">
    <h1 class="page-header text-overflow"><?php echo $title ?></h1>
</div>

<div id="page-content">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?></h3>
        </div>
        <div class="panel-body">
            <div class="bootstrap-table">
                <div class="fixed-table-toolbar">
                    <div class="bars pull-left">
                        <a  href="{!! url("inside/{$controllerName}/add"); !!}" class="btn btn-primary btn-labeled fa fa-plus">Thêm mới</a>
                        <button style="display: none" type="button" class="btn btn-default btn-labeled fa fa-remove remove" url="{!! "/{$controllerName}/remove" !!}">
                                Xóa
                    </button>
                </div>
                <form class="form-search pull-right span6" method="get">
                    <div class="columns columns-right btn-group pull-right">
                        <button class="btn btn-default" type="submit" title="Tìm kiếm"><i class="fa fa-search"></i></button>
                        <button  onclick="window.location.href = '{!! "/{$controllerName}/show-all" !!}'" class="btn btn-default" type="button" name="refresh" title="Tìm lại"><i class="fa fa-refresh"></i></button>
                    </div>
                    <div class="columns columns-right btn-group pull-right">
                        <select name="search_type" class="form-control" style="height: 31px;">
                            <option value="ALL">All</option>
                            <?php
                            $searchKeyword = '';
                            if (isset($params['search_keyword'])) :
                                $searchKeyword = $params['search_keyword'];
                            endif;

                            $searchType = '';
                            if (isset($params['search_type'])) :
                                $searchType = $params['search_type'];
                            endif;

                            foreach ($searchOptions as $searchOptionKey => $searchOptionValue):
                                $selected = '';
                                if ($searchType == $searchOptionKey) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option <?php echo $selected ?> value="<?php echo $searchOptionKey ?>"><?php echo $searchOptionValue ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="pull-right search">
                        <input type="text" class="form-control" name="search_keyword" placeholder="Tìm kiếm" value="<?php // echo $searchKeyword     ?>">
                    </div>
                </form>
            </div>
            <div class="fixed-table-container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                <div class="th-inner">
                                    Tên
                                    {{ DisplayColumnSort::show('name') }}
                                </div>
                            </th>
                            <th>
                                <div class="th-inner">
                                    Vị trí
                                    {{ DisplayColumnSort::show('position_name') }}
                                </div>
                            </th>
                            <th>
                                <div class="th-inner">
                                    Chức vụ
                                    {{ DisplayColumnSort::show('description') }}
                                </div>
                            </th>
                            <th>
                                <div class="th-inner">
                                    Năm sinh
                                    {{ DisplayColumnSort::show('birthday') }}
                                </div>
                            </th>
                            <th>
                                <div class="th-inner">
                                    Giới tính
                                    {{ DisplayColumnSort::show('gender') }}
                                </div>
                            </th>
                            <th>
                                <div class="th-inner">
                                    Dân tộc
                                    {{ DisplayColumnSort::show('nation') }}
                                </div>
                            </th>
                            <th>
                                <div class="th-inner">Action</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paginate as $row)
                        <tr>
                            <td>
                                {{ $row->name }}
                            </td>
                            <td>
                                {{ $row->position_name }}
                            </td>
                            <td>
                                {{ $row->description }}
                            </td>
                            <td>
                                {{ $row->birthday }}
                            </td>
                            <td>
                                {{$row->gender}}
                            </td>
                            <td>
                                {{$row->nation}}
                            </td>
                            
                            <td align="center">
                                <a  href="{!! url("inside/{$controllerName}/edit/{$row->position_id}"); !!}"
                                    class="add-tooltip btn btn-primary btn-icon icon-lg btn-xs" data-placement="top"
                                    data-original-title="Chỉnh sửa"><i class="fa fa-pencil"></i>
                                </a>
                                <a href="{!! "/inside/{$controllerName}/delete/{$row->position_id}" !!}"
                                   class="isConfirmDeleted add-tooltip btn btn-danger btn-icon icon-lg btn-xs"
                                   data-placement="top" data-original-title="Xóa">
                                   <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-6">
                        @include("inside::pagination", [$paginate])
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>

<script>
    $('.note').click(function(){
    $.get($(this).attr('data-href'), {}, function (data) {
    $('#otherContents .modal-body').html(data);
    });
    })

            $('.number-applied').click(function(){
    $.get($(this).attr('data-href'), {}, function (data) {
    $('#listApplicants .modal-body').html(data);
    });
    })
</script>
@endsection