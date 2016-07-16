<ul class="pagination">
    @if($paginator->currentPage() > 1)
        <li><a href="/home/{{ $paginator->currentPage() - 1 }}/">&laquo;</a></li>
    @else
        <li class="disabled"><a href="#">&laquo;</a></li>
    @endif

    @for($i = max($paginator->currentPage() - 3, 1); $i <= min($paginator->currentPage() + 3, $paginator->lastPage()); $i++)
        @if($i == $paginator->currentPage())
            <li class="active"><a href="#">{{ $i }}</a></li>
        @else
            <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
        @endif
    @endfor

    @if($paginator->currentPage() < $paginator->lastPage())
        <li><a href="/home/{{ $paginator->currentPage() + 1 }}/">&raquo;</a></li>
    @else
        <li class="disabled"><a href="#">&raquo;</a></li>
    @endif
</ul>