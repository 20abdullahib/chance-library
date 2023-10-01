<div class="ml-2">
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item {{ $subjects->currentPage() == 1 ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $subjects->previousPageUrl() }}">Previous</a>
            </li>
            @for ($i = 1; $i <= $subjects->lastPage(); $i++)
                <li class="page-item {{ $subjects->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $subjects->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item {{ $subjects->currentPage() == $subjects->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $subjects->nextPageUrl() }}">Next</a>
            </li>
        </ul>
    </nav>

    <!-- Display current page and total pages -->
    <div class="pagination-info ml-2">
        Page {{ $subjects->currentPage() }} of {{ $subjects->lastPage() }}
    </div>
</div>
</div>
