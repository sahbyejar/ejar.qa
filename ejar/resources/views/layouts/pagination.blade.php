@if ($paginator->hasPages())
    <ul class="pager">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span> <{{ trans('general.Previous')}} </span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" style="    color: #777;" rel="prev">< {{ trans('general.Previous')}} </a></li>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" style="    color: #777;">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" style="    color: #777;">{{ trans('general.Next')}} ></a></li>
        @else
            <li class="disabled"><span>{{ trans('general.Next')}} ></span></li>
        @endif
    </ul>
@endif