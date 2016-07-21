<div class="panel panel-info plugin-sidebar">
    <div class="panel-heading">
        <h3 class="panel-title">Latest Posts</h3>
    </div>
    <div class="panel-body">
        @forelse($latestPosts as $post)
            <div class="media">
                <a class="pull-left" href="/user/{{ $post->user()->id }}/">
                    <img class="media-object" src="{{ $post->user()->getAvatar(45) }}" alt="Avatar of {{ $post->user()->username }}">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a class="limited" href="/forum/topic/{{ $post->topic()->id }}/" title="{{ $post->topic()->name }}">{{ $post->topic()->name }}</a></h4>
                    <div class="clearfix"></div>
                    <a href="/forum/topic/{{ $post->topic()->id }}/?page={{ $post->getPage() }}#post-{{ $post->id }}">{{ $post->created_at->diffForHumans() }}</a>
                </div>
            </div>
        @empty
            @include("utils.info", ["message" => "No Posts Found!", "close" => false, "spacedown" => false])
        @endforelse
    </div>
</div>