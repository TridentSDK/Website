<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark justify-content-between" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="/" style="padding: 0">TridentSDK</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                @foreach(\TridentSDK\Utils\Menu::$navigation_menu_items as $key => $val)
                    @if(is_array($val))
                        @include("sections.navigation-dropdown", ["name" => $key, "dropdown" => $val])
                    @else
                        @if(Request::segment(1) == str_replace("/", "", $val))
                            <li class="nav-item active"><a class="nav-link" href="{{ url($val) }}" {{ (substr($val, 0, 1) == "/" ? "" : ' target="_blank"') }}>{{ $key }}</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ url($val) }}" {{ (substr($val, 0, 1) == "/" ? "" : ' target="_blank"') }}>{{ $key }}</a></li>
                        @endif
                    @endif
                @endforeach
            </ul>

            <form class="form-inline mr-auto" role="search" method="get" action="/search/">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            <ul class="navbar-nav">
                @include("sections.login-box")
            </ul>
        </div>
    </div>
</nav>
@if(!Auth::check())
    @include("sections.login-modal")
@endif