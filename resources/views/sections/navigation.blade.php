<div class="navbar navbar-inverse navbar-fixed-top navbar-info" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">TridentSDK</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                @foreach($navigation_menu_items as $key => $val)
                    @if(is_array($val))
                        @include("sections.navigation-dropdown", ["name" => $key, "dropdown" => $val])
                    @else
                        @if(Request::segment(1) == str_replace("/", "", $val))
                            <li class="active"><a href="{{ url($val) }}" {{ (substr($val, 0, 1) == "/" ? "" : ' target="_blank"') }}>{{ $key }}</a></li>
                        @else
                            <li><a href="{{ url($val) }}" {{ (substr($val, 0, 1) == "/" ? "" : ' target="_blank"') }}>{{ $key }}</a></li>
                        @endif
                    @endif
                @endforeach
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @include("sections.login-box")
            </ul>

            <form class="navbar-form navbar-right" role="search" method="get" action="/search/">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="search">
                </div>
            </form>
        </div>
    </div>
</div>
@include("sections.login-modal")