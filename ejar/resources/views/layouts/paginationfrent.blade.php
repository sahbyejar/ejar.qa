

    <nav class="hp-pagination">
    <nav class="navigation pagination" role="navigation" aria-label="Posts">
    <h2 class="screen-reader-text">Posts navigation
</h2>
<div class="nav-links">
     @if ($paginator->onFirstPage())

        @else
          <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}">
    <i class="hp-icon fas fa-chevron-left">
</i>
</a>
          
        @endif
    {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
          
                 <span aria-current="page" class="page-numbers current">{{ $element }}
</span>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                              <span aria-current="page" class="page-numbers current">{{ $page }}
</span>
                    @else
                
                        <a class="page-numbers" href="{{ $url }}">{{ $page }}
</a>

                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
   

 @if ($paginator->hasMorePages())

            <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}">
    <i class="hp-icon fas fa-chevron-right">
        </i>
</a>
        @else
          @endif


</div>
</nav>
</nav>
