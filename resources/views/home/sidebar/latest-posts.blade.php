<div class="card mb-3">
    <div class="card-header">
        Latest Posts
    </div>
    <div class="card-body">
        <ul class="list-unstyled mb-0">
            @forelse($latestPosts as $post)
                <li class="media">
                    <a class="d-flex mr-3" href="/user/{{ $post->user()->id }}/">
                        <img class="media-object" src="{{ $post->user()->getAvatar(45) }}" alt="Avatar of {{ $post->user()->username }}">
                    </a>
                    <div class="media-body">
                        <a class="limited" href="/forum/topic/{{ $post->topic()->id }}/" title="{{ $post->topic()->name }}"><h6 class="mt-0">{{ $post->topic()->name }}</h6></a>
                        <div class="clearfix"></div>
                        <a href="/forum/topic/{{ $post->topic()->id }}/?page={{ $post->getPage() }}#post-{{ $post->id }}">{{ $post->created_at->diffForHumans() }}</a>
                    </div>
                </li>
            @empty
                @include("utils.info", ["message" => "No Posts Found!", "close" => false, "spacedown" => false])
            @endforelse
        </ul>
    </div>
</div>