@if(Auth::check())
    @php($notifications = Auth::user()->getLatestNotifications())
    @php($unread = Auth::user()->getUnreadNotificationCount())
    <li class="nav-item dropdown">

        <a data-toggle="dropdown" href="#" class="nav-link dropdown-toggle">
            <span class="oi oi-bell"></span>

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

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::getUser()->username }}</a>
        <div class="dropdown-menu" role="menu">
            <a class="dropdown-item" href="/user/{{ Auth::getUser()->id }}/">Profile</a>
            <a class="dropdown-item" href="/settings/{{ Auth::getUser()->id }}/">Settings</a>
            <a class="dropdown-item" href="/logout/">Logout</a>
        </div>
    </li>
@else
    <li class="nav-item">
        <a href="#" data-toggle="modal" data-target="#loginModal" class="nav-link">Login / Register</a>
    </li>
@endif

