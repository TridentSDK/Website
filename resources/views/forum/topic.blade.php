@extends("sections.wrap-layout")

@section("title", $topic->name)

@section('content')

    @include("forum.breadcrumbs")

    @if (session('post-deleted'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Post Deleted
        </div>
    @endif

    @if (session('topic-moved'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Topic Moved
        </div>
    @endif

    @if (session('category-not-exist'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Category doesn't exist
        </div>
    @endif

    <div class="posts">
        @php($first = $posts->currentPage() == 1)
        @php($lastPostDate = null)
        @foreach($posts as $post)
            @if($post->post_type == "NORMAL")
                @if($lastPostDate == null)
                    @php($lastPostDate = $post->created_at)
                @else
                    @if($lastPostDate->diffInYears($post->created_at) >= 1)
                        <div class="alert alert-info alert-no-margin straight-corner" role="alert">
                            <span href="#" class="alert-link">{{ $lastPostDate->diffInYears($post->created_at) }} year{{ $lastPostDate->diffInYears($post->created_at) > 1 ? "s" : "" }} later</span>
                        </div>
                    @elseif($lastPostDate->diffInMonths($post->created_at) >= 1)
                        <div class="alert alert-info alert-no-margin straight-corner" role="alert">
                            <span href="#" class="alert-link">{{ $lastPostDate->diffInMonths($post->created_at) }} month{{ $lastPostDate->diffInMonths($post->created_at) > 1 ? "s" : "" }} later</span>
                        </div>
                    @elseif($lastPostDate->diffInWeeks($post->created_at) >= 1)
                        <div class="alert alert-info alert-no-margin straight-corner" role="alert">
                            <span href="#" class="alert-link">{{ $lastPostDate->diffInWeeks($post->created_at) }} week{{ $lastPostDate->diffInWeeks($post->created_at) > 1 ? "s" : "" }} later</span>
                        </div>
                    @endif

                    @php($lastPostDate = $post->created_at)
                @endif
                <div class="card {{ !$first ? "straight-corner" : "straight-bottom-corners" }}">
                    <div class="card-header clearfix">
                        <span class="title-linker" id="post-{{ $post->id }}"></span>
                        <span class="pull-left">{{ $topic->name }}
                            <small>
                                <a href="/forum/topic/{{ $topic->id }}/?page={{ $posts->currentPage() }}#post-{{ $post->id }}" title="#{{ $post->id }}">#{{ $enum++ }}</a>
                            </small>
                        </span>
                        <span class="pull-right" title="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="card-body" style="padding: 0 15px;">
                        <div class="row">
                            <div class="col-md-2 forum-avatar-box" style="padding: 15px">
                                <div class="thumbnail">
                                    <a href="/user/{{ $post->user()->id }}/"><img src="{{ $post->user()->getAvatar(155) }}" alt="Avatar of {{ $post->user()->username }}"></a>
                                    <div class="caption">
                                        <a href="/user/{{ $post->user()->id }}/">{{ $post->user()->username }}</a>, {{ $post->user()->rank()->getName() }}
                                    </div>
                                </div>
                                @php($online = $post->user()->isOnline())
                                <span class="label label-{{ $online ? "success" : "danger" }}">{{ $online ? "Online" : "Offline" }}</span>
                            </div>
                            <div class="col-md-10" style="padding: 15px; border-left: 1px solid #dddddd;">
                                <div style="min-height: 200px;">{!! $post->text !!}</div>
                                @if($post->lastuserid > 0)
                                    <div class="pull-left">
                                        <small>
                                            Last edit by <a href="/user/{{ $post->lastUser()->id }}/">{{ $post->lastUser()->username }}</a>, {{ $post->updated_at->diffForHumans() }}
                                        </small>
                                    </div>
                                @endif
                                <div class="pull-right forum-post-buttons">
                                    @if(Auth::check() && Auth::getUser()->rank()->isModerator())
                                        @if($first)
                                            <button type="button" class="btn btn-sm btn-warning btn-raised" data-toggle="modal" data-target="#moveTopicModal" data-topic="{{ $topic->id }}">MOVE</button>
                                            <a href="/forum/topic/{{ $topic->id }}/stick/" class="btn btn-sm btn-warning btn-raised">STICK</a>
                                            <a href="/forum/topic/{{ $topic->id }}/lock/" class="btn btn-sm btn-danger btn-raised">LOCK</a>
                                            <button type="button" class="btn btn-sm btn-danger btn-raised" data-toggle="modal" data-target="#deleteTopicModal" data-topic="{{ $topic->id }}">DELETE</button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-danger btn-raised" data-toggle="modal" data-target="#deletePostModal" data-post="{{ $post->id }}">DELETE</button>
                                        @endif
                                    @endif

                                    @if(Auth::check() && $post->canBeEditedBy(Auth::getUser()))
                                        <a href="/forum/edit/{{ $post->id }}/" class="btn btn-sm btn-info btn-raised">EDIT</a>
                                    @endif

                                    <div class="btn btn-sm btn-success btn-raised post-like-button{{ Auth::check() ? ($post->likedBy(Auth::user()) ? " liked" : "") : "" }}" data-post="{{ $post->id }}">
                                        <span class="badge" style="margin-right: 3px">{{ $post->likeCount() }}</span>
                                        <span class="oi oi-thumb-up"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php($first = false)
            @elseif($post->post_type == "TOPIC_MOVED")
                <div class="alert alert-info alert-no-margin" role="alert">
                    <span href="#" class="alert-link">Topic moved from "{{ \TridentSDK\ForumCategory::find($post->topic_moved_from)->name }}" to "{{ \TridentSDK\ForumCategory::find($post->topic_moved_to)->name }}"</span>
                </div>
            @endif
        @endforeach
    </div>

    <div class="mt-3">
        @include("forum.breadcrumbs")
    </div>

    <div class="centered">
        @include("utils.paginator", ["paginator" => $posts])
    </div>

    @if(Auth::check())
        <div class="card mb-3">
            <div class="card-header">New Post</div>
            <div class="card-body" style="padding: 0 15px;">

                @if($errors->getBag("topic")->any())
                    @include("utils.alert", ["message" => $errors->getBag("topic")->first(), "close" => false, "spacedown" => false])
                @endif

                <div class="row">
                    <div class="col-md-2" style="padding: 15px">
                        <div class="thumbnail">
                            <a href="/user/{{ Auth::user()->id }}/">
                                <img src="{{ Auth::user()->getAvatar(155) }}" alt="Avatar of {{ Auth::user()->username }}">
                            </a>
                            <div class="caption">
                                <a href="/user/{{ Auth::user()->id }}/">{{ Auth::user()->username }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10" style="padding: 15px; min-height: 280px; border-left: 1px solid #dddddd;">
                        {!! Form::open(["style", "margin-bottom: 0", "url" => "/forum/new/post/".$topic->id."/post"]) !!}

                        {!! Form::textarea("post_text", null, ["id" => "post_text"]) !!}

                        <script>
                            $(document).ready(function () {
                                $('#post_text').summernote({minHeight: 200});
                                $('.note-popover').css({ display: 'none' });
                            });
                        </script>

                        {!! Form::submit("Post", ["class" => "btn btn-success btn-raised pull-right"]) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @include("forum.delete-post-modal")
    @include("forum.delete-topic-modal")
    @include("forum.move-topic-modal")
@stop