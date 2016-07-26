<div class="col-md-2">
    <div class="thumbnail member-page-logo">
        <a href="/user/{{ $member->id }}/"><img src="{{ $member->getAvatar() }}?s=155" alt="Avatar of {{ $member->username }}"></a>
        <div class="caption">
            <a href="/user/{{ $member->id }}/">{{ $member->username }}</a>, {{ $member->rank()->getName() }}
        </div>
    </div>
</div>