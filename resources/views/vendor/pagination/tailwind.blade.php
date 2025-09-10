@if ($paginator->hasPages())
    <div class="gridjs-footer">
        <div class="gridjs-pagination d-flex justify-content-between">
            <div role="status" aria-live="polite" class="gridjs-summary" title="Page 2 of 2">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <b>{{ $paginator->firstItem() }}</b>
                        {!! __('to') !!}
                        <b>{{ $paginator->lastItem() }}</b>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <b>{{ $paginator->total() }}</b>
                    {!! __('results') !!}
            </div>
            <div class="gridjs-pages">
                @if ($paginator->onFirstPage())
                <button tabindex="0" role="button" title="Previous" aria-label="Previous" class="" disabled>Previous</button>
                @else
                <a href="{{ $paginator->previousPageUrl() }}" tabindex="0" role="button" title="Previous" aria-label="Previous" class="">Previous</a>
                @endif
                
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <a tabindex="0" role="button" class="" title="Page {{ $page }}" aria-label="Page {{ $page }}">{{ $element }}</a>
                    @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button tabindex="0" role="button" class="gridjs-currentPage" title="Page {{ $page }}" aria-label="Page {{ $page }}">{{ $page }}</button>
                        @else
                            <a href="{{ $url }}" tabindex="0" role="button" class="" title="Page {{ $page }}" aria-label="Page {{ $page }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
                @endforeach
                
                @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" tabindex="0" role="button" title="Next" aria-label="Next" class="">Next</a>
                @else
                <button tabindex="0" role="button" title="Next" aria-label="Next" class="" disabled="">Next</button>
                @endif
            </div>
        </div>
    </div>
@endif
