@if(Auth::check())
    @php($notifications = Auth::user()->getLatestNotifications())
    @php($unread = Auth::user()->getUnreadNotificationCount())
    <li class="dropdown">
        <a data-toggle="dropdown" href="#" class="search-dropdown-button">
            <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
            @if($unread > 0)
                <span class="badge search-icon-badge">{{ $unread }}</span>
            @endif
        </a>
        <ul class="dropdown-menu notification-dropdown" role="menu" aria-labelledby="dLabel">
            @forelse($notifications as $notification)
                <li>{!! $notification->text !!}</li>
            @empty
                <li>You have no notifications</li>
            @endforelse
        </ul>
    </li>
    <li class="dropdown">
        <a data-toggle="dropdown" href="#">{{ Auth::getUser()->username }} <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="/user/1/">Account</a></li>
            <li><a href="/logout/">Logout</a></li>
        </ul>
    </li>
@else
    <li class="has-form"><a href="#" data-toggle="modal" data-target="#loginModal" class="button">Login / Register</a></li>
@endif

