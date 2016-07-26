@extends("sections.wrap-layout")

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

    <div class="posts">
        @php($first = $posts->currentPage() == 1)
        @foreach($posts as $post)
            <div class="panel panel-{{ $first ? "info" : "default" }}">
                <div class="panel-heading clearfix">
                    <span class="title-linker" id="post-{{ $post->id }}"></span>
                    <h3 class="panel-title pull-left">{{ $topic->name }}
                        <small>
                            <a href="/forum/topic/{{ $topic->id }}/?page={{ $posts->currentPage() }}#post-{{ $post->id }}" title="#{{ $post->id }}">#{{ $enum++ }}</a>
                        </small>
                    </h3>
                    <h3 class="panel-title pull-right" title="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</h3>
                </div>
                <div class="panel-body" style="padding: 0 15px;">
                    <div class="row">
                        <div class="col-md-2 forum-avatar-box" style="padding: 15px">
                            <div class="thumbnail">
                                <a href="/user/{{ $post->user()->id }}/"><img src="{{ $post->user()->getAvatar(155) }}" alt="Avatar of {{ $post->user()->username }}"></a>
                                <div class="caption">
                                    <a href="/user/{{ $post->user()->id }}/">{{ $post->user()->username }}</a>, {{ $post->user()->rank()->getName() }}
                                </div>
                            </div>
                            <span class="label label-success">Online {{-- TODO Check if actually online --}}</span>
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
                                        <a href="/forum/topic/{{ $topic->id }}/stick/" class="btn btn-xs btn-warning btn-raised">STICK</a>
                                        <a href="/forum/topic/{{ $topic->id }}/lock/" class="btn btn-xs btn-danger btn-raised">LOCK</a>
                                        <button type="button" class="btn btn-xs btn-danger btn-raised" data-toggle="modal" data-target="#deleteTopicModal" data-topic="{{ $topic->id }}">DELETE</button>
                                    @else
                                        <button type="button" class="btn btn-xs btn-danger btn-raised" data-toggle="modal" data-target="#deletePostModal" data-post="{{ $post->id }}">DELETE</button>
                                    @endif
                                @endif

                                @if(Auth::check() && $post->canBeEditedBy(Auth::getUser()))
                                    <a href="/forum/edit/{{ $post->id }}/" class="btn btn-xs btn-info btn-raised">EDIT</a>
                                @endif

                                <div class="btn btn-xs btn-success btn-raised">
                                    <span class="badge" style="margin-right: 3px">0</span>
                                    <span class="glyphicon glyphicon-thumbs-up" style="font-size: 15px; margin-top: -10px; top: 4px;" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php($first = false)
        @endforeach
    </div>

    @include("forum.breadcrumbs")

    <div class="centered">
        @include("utils.paginator", ["paginator" => $posts])
    </div>

    @if(Auth::check())
        <div class="panel panel-info">
            <div class="panel-heading"><h3 class="panel-title">New Post</h3></div>
            <div class="panel-body" style="padding: 0 15px;">

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
@stop