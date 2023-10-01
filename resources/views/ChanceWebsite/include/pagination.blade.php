<div class="ml-2">
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item {{ $materials->currentPage() == 1 ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $materials->previousPageUrl() }}">Previous</a>
            </li>
            @for ($i = 1; $i <= $materials->lastPage(); $i++)
                <li class="page-item {{ $materials->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $materials->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item {{ $materials->currentPage() == $materials->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $materials->nextPageUrl() }}">Next</a>
            </li>
        </ul>
    </nav>

    <!-- Display current page and total pages -->
    <div class="pagination-info ml-2">
        Page {{ $materials->currentPage() }} of {{ $materials->lastPage() }}
    </div>
</div>
</div>
