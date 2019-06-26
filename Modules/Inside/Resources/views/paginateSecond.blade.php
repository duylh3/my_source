<?php

$paginate = $paginateSecond;
$links = PAGE_LIST_RANGE;
$start = ( ( $paginate->currentPage() - $links ) > 0 ) ? $paginate->currentPage() - $links: 1;
$end = ( ( $paginate->currentPage() + $links ) < $paginate->lastPage() ) ? $paginate->currentPage() + $links : $paginate->lastPage();
if ($paginate->currentPage() <= $links) {
    $end = 2 * $links + 1;
}

if ($paginate->currentPage() > $paginate->lastPage() - $links - 1 ) {
    $start = $paginate->lastPage() - $links * 2;
}
if($end > $paginate->lastPage()){
    $end = $paginate->lastPage();
}
if($start <= 0) {
    $start = 1;
}
?>

@if ($paginate->lastPage() > 1)
        <ul class="pagination pagination-sm" style="float: right;">
            @if($paginate->currentPage() != 1)
                <li>
                    <a href="{{ $paginate->url(1) }}" class="item{{ ($paginate->currentPage() == 1) ? ' uk-disabled' : '' }}">
                        <i class="icon left arrow"></i> ← Đầu trang
                    </a>
                </li>
            @endif
            
            @if($start > 1)
                <li class="disabled"><span>...</span></li>
            @endif
            
            @for ($i = $start; $i <= $end; $i++)
                <li>
                    <a href="{{ $paginate->url($i) }}" class="item{{ ($paginate->currentPage() == $i) ? ' uk-active' : '' }}">{{ $i }}</a>
                </li>
            @endfor
            @if($paginate->currentPage() < $paginate->lastPage() - $links)
                <li class="disabled"><span>...</span></li>
            @endif
            @if($paginate->currentPage() != $paginate->lastPage())
                <li>
                    <a href="{{ $paginate->url($paginate->lastPage()) }}" class="item{{ ($paginate->currentPage() == $paginate->lastPage()) ? ' uk-disabled' : '' }}">
                        Cuối cùng → <i class="icon right arrow"></i>
                    </a>
                </li>
            @endif
        </ul>
    
@endif