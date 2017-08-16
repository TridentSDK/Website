<li class='nav-item dropdown'>
    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $name }}</a>
    <div class='dropdown-menu' role='menu'>
        @foreach($dropdown as $k => $v)
            @if(Request::segment(1) == str_replace("/", "", $v))
                <a class="dropdown-item active" href="{{ $v }}">{{ $k }}</a>
            @else
                <a class="dropdown-item" href="{{ $v }}">{{ $k }}</a>
            @endif
        @endforeach
    </div>
</li>