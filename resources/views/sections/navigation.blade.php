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

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="padding:12px; width: 275px;">
                        <form class="form-inline" role="search" method="get" action="/search/">
                            <input type="text" class="form-control pull-left" placeholder="Search" name="search" style="margin-bottom: 0;">
                            <button type="submit" class="btn btn-info btn-raised pull-right" style="margin: 0;"><i class="glyphicon glyphicon-search"></i></button>
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
@if(!Auth::check())
    @include("sections.login-modal")
@endif