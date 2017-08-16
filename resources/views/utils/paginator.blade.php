<nav>
    <ul class="pagination justify-content-center">
        @if($paginator->currentPage() > 1)
            <li class="page-item"><a class="page-link" href="/home/{{ $paginator->currentPage() - 1 }}/">&laquo;</a></li>
        @else
            <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
        @endif

        @for($i = max($paginator->currentPage() - 3, 1); $i <= min($paginator->currentPage() + 3, $paginator->lastPage()); $i++)
            @if($i == $paginator->currentPage())
                <li class="page-item active"><a class="page-link" href="#">{{ $i }}</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
            @endif
        @endfor

        @if($paginator->currentPage() < $paginator->lastPage())
            <li class="page-item"><a class="page-link" href="/home/{{ $paginator->currentPage() + 1 }}/">&raquo;</a></li>
        @else
            <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
        @endif
    </ul>
</nav>