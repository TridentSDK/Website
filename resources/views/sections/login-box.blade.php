@if(Auth::check())
    <li class="dropdown"><a data-toggle="dropdown" href="#">{{ Auth::getUser()->username }} <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="/user/1/">Account</a></li>
            <li><a href="/logout/">Logout</a></li>
        </ul>
    </li>
@else
    <li class="has-form"><a href="#" data-toggle="modal" data-target="#loginModal" class="button">Login / Register</a></li>
@endif

