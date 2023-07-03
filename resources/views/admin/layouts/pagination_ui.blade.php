@if ($paginator->hasPages())
    <ul class="pagination pagination m-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled page-item"><a href="#" class="page-link">Previous</a></li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" url='<?php echo(Request::segment(2))?>'>Previous</a></li>
        @endif

        @if($paginator->currentPage() > 3)
            <li class="hidden-xs page-item"><a class="page-link" href="{{ $paginator->url(1) }}" url='<?php echo(Request::segment(2))?>'>1</a></li>
        @endif
        @if($paginator->currentPage() > 4)
            <li class="page-item"><a class="page-link" href="#">...</a></li>
        @endif
        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                @if ($i == $paginator->currentPage())
                    <li class="active page-item"><a href="#" class="page-link">{{ $i }}</a></li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->url($i) }}" url='<?php echo(Request::segment(2))?>'>{{ $i }}</a>
                    </li>
                @endif
            @endif
        @endforeach
        @if($paginator->currentPage() < $paginator->lastPage() - 3)
            <li class="page-item"><a href="#" class="page-link">...</a></li>
        @endif
        @if($paginator->currentPage() < $paginator->lastPage() - 2)
            <li class="hidden-xs page-item">
                <a href="{{ $paginator->url($paginator->lastPage()) }}" class="page-link" url='<?php echo(Request::segment(2))?>'>{{ $paginator->lastPage() }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link" url='<?php echo(Request::segment(2))?>'>Next</a></li>
        @else
            <li class="disabled page-item"><a href="#" class="page-link">Last</a></li>
        @endif
    </ul>
@endif

