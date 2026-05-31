@if ($paginator->hasPages())
    <div class="flex items-center justify-between mt-4">

        <p class="text-sm text-base-content/50">
            Страница {{ $paginator->currentPage() }} из {{ $paginator->lastPage() }} · Всего элементов: {{ $paginator->total() }}
        </p>

        <div class="flex items-center gap-1">

            @if ($paginator->onFirstPage())
                <span class="btn btn-sm btn-disabled font-normal">‹</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-sm font-normal">‹</a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="btn btn-sm btn-disabled font-normal">{{ $element }}</span>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="btn btn-sm btn-primary font-normal">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="btn btn-sm font-normal">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-sm font-normal">›</a>
            @else
                <span class="btn btn-sm btn-disabled font-normal">›</span>
            @endif

        </div>
    </div>
@endif
