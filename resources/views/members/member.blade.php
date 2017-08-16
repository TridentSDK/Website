<div class="card">
    <a href="/user/{{ $member->id }}/" class="card-img-top">
        <img src="{{ $member->getAvatar() }}?s=155" alt="Avatar of {{ $member->username }}">
    </a>
    <div class="card-body">
        <a href="/user/{{ $member->id }}/">{{ $member->username }}</a>, {{ $member->rank()->getName() }}
    </div>
</div>