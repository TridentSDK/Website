<div class="panel panel-info plugin-sidebar">
    <div class="panel-heading">
        <h3 class="panel-title">Latest Posts</h3>
    </div>
    <div class="panel-body">
        @forelse($latestPosts as $post)
            <div class="media">
                <a class="pull-left" href="/u/{{ $post->getUser()->id }}/">
                    <img class="media-object" src="{{ $post->getUser()->getAvatar(45) }}" alt="Avatar of {{ $post->getUser()->username }}">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a class="limited" href="/f/t/{{ $post->getTopic()->id }}/" title="{{ $post->getTopic()->name }}">{{ $post->getTopic()->name }}</a></h4>
                    <div class="clearfix"></div>
                    <a href="/f/t/{{ $post->getTopic()->id }}/{{ $post->getPage() }}/#post-{{ $post->id }}">{{ \Carbon\Carbon::createFromTimeStamp($post->date)->diffForHumans() }}</a>
                </div>
            </div>
        @empty
            @include("utils.info", ["message" => "No Posts Found!", "close" => false, "spacedown" => false])
        @endforelse
    </div>
</div>