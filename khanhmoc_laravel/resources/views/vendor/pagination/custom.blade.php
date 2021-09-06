@if ($paginator->hasPages())
<ul class="clearfix">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li><a href="#"><i class="mdi mdi-menu-left"></i></a></li>
    @else
    <li><a href="{{ $paginator->previousPageUrl() }}"><i class="mdi mdi-menu-left"></i></a></li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <li><a href="">{{ $element }}</a></li>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li><a style="color: rgb(255, 102, 0)" href="">{{ $page }}</a></li>
    @else
    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li class="page-item">
        <a href="{{ $paginator->nextPageUrl() }}"><i class="mdi mdi-menu-right"></i></a>
    </li>
    @else
    <li><a href=""><i class="mdi mdi-menu-right"></i></a>
    </li>
    @endif

</ul>
@endif