@extends("sections.wrap-layout")

@section('content')

    @include("forum.breadcrumbs")

    <div class="posts">
        @php($first = true)
        @foreach($posts as $post)
            <div class="panel panel-{{ $first ? "info" : "default" }}">
                <div class="panel-heading clearfix" id="post-{{ $post->id }}">
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
                                    <a href="/user/{{ $post->user()->id }}/">{{ $post->user()->username }}</a>, Member {{-- TODO Get actual rank --}}
                                </div>
                            </div>
                            <span class="label label-success">Online {{-- TODO Check if actually online --}}</span>
                        </div>
                        <div class="col-md-10" style="padding: 15px; border-left: 1px solid #dddddd;">
                            <div style="min-height: 270px;">{!! $post->text !!}</div>
                            @if($post->lastuserid > 0)
                                <div class="pull-left">
                                    <small>
                                        Last edit by <a href="/user/{{ $post->lastUser()->id }}/">{{ $post->lastUser()->username }}</a>, {{ $post->updated_at->diffForHumans() }}
                                    </small>
                                </div>
                            @endif
                            <div class="pull-right" style="margin-left: 10px">
                                <small>
                                    <span class="badge">0</span>
                                    <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                                </small>
                            </div>
                            <div class="pull-right">
                                <small>
                                    @if($first)
                                        <a href="/forum/topic/{{ $topic->id }}/lock/">LOCK</a>
                                        <a href="/forum/topic/{{ $topic->id }}/stick/">STICK</a>
                                        <a href="/forum/topic/{{ $topic->id }}/delete/">DELETE</a>
                                    @else
                                        <a href="/forum/post/{{ $post->id }}/delete/">DELETE</a>
                                    @endif

                                    <a href="/forum/edit/{{ $post->id }}/">EDIT</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php($first = false)
        @endforeach
    </div>
@stop