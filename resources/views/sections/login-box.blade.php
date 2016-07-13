@if(false) {{-- TODO Check if user is logged in --}}
    <li class="dropdown"><a data-toggle="dropdown" href="#">Username <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li class="btn-success"><a href="/u/1/"><strong>Account</strong></a></li>
            <li class="btn-danger"><a href="/logout/"><strong>Logout</strong></a></li>
        </ul>
    </li>
@else
    <li class="has-form"><a href="#" data-toggle="modal" data-target="#loginModal" class="button">Login / Register</a></li> {{-- TODO Load Login Modal --}}
@endif

