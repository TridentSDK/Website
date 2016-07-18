<li class='dropdown'>
    <a href='#' class='dropdown-toggle' data-toggle='dropdown'>{{ $name }}<span class='caret'></span></a>
    <ul class='dropdown-menu' role='menu'>
        @foreach($dropdown as $k => $v)
            @if(is_array($v))
                @include("sections.navigation-dropdown", ["name" => $k, "dropdown" => $v])
            @else
                @if(Request::segment(1) == str_replace("/", "", $val)))
                    <li class="active"><a href="{{ $v }}">{{ $k }}</a></li>
                @else
                    <li><a href="{{ $v }}">{{ $k }}</a></li>
                @endif
            @endif
        @endforeach
    </ul>
</li>