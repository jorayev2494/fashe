@if ($paginator->hasPages())

    <!-- Pagination -->
    {{--  <div class="pagination flex-m flex-w p-t-26">
        <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
        <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
    </div>  --}}

    <ul class="pagination flex-m flex-w p-t-26" role="navigation">
        {{-- Previous Page Link --}}
        {{--  @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif  --}}

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="item-pagination flex-c-m trans-0-4" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="item-pagination flex-c-m trans-0-4 active-pagination" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}"  class="item-pagination flex-c-m trans-0-4" >{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        {{--  @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">&rsaquo;</span>
            </li>
        @endif  --}}
    </ul>
@endif
