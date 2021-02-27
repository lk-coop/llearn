@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
        {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link"><</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}"><</a>
                </li>
            @endif

            {{-- Pagination elements --}}
            @foreach ($elements as $element)
                {{-- "Three dots" separator --}}


            @endforeach

        </ul>
    </nav>
@endif
