@if ($paginator->hasPages())
    <div class="post-pagination ">
        <nav class="navigation pagination" aria-label="Products">
            <div>
                <p class="small text-muted">
                    {!! __('Affichage de') !!}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('à') !!}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {!! __('sur') !!}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {!! __('resultats') !!}
                </p>
            </div>
            <ul class="page-numbers">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li><span class="page-numbers">&lsaquo;</span></li>
                @else
                    <li><a class="page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev">&lsaquo;</a></li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li><span class="page-numbers">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li><span class="page-numbers current">{{ $page }}</span></li>
                            @else
                                <li><a class="page-numbers" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li><a class="page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next">&rsaquo;</a></li>
                @else
                    <li><span class="page-numbers">&rsaquo;</span></li>
                @endif
            </ul>
        </nav>
    </div>
@endif

