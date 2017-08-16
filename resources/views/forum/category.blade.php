@extends("sections.wrap-layout")

@section("title", $category->name)

@section('content')
    @include("forum.breadcrumbs")

    <div class="card mb-3">
        <div class="card-header bg-primary text-light">
            <span class="float-left">{{ $category->name }}<br><small>{{ $category->description }}</small></span>
            @if(Auth::check())
                <a href="/forum/new/topic/{{ $category->id }}/" class="float-right" style="margin-top: 4px; margin-bottom: 0;">
                    <button type="button" class="btn btn-success my-2 my-sm-0">New Topic</button>
                </a>
            @endif
        </div>
        @if($category->hasChildren())
            <table class="table" style="margin-bottom: 0">
                <thead>
                <tr style="border-bottom: 2px solid #ddd;">
                    <th style="border-bottom: 0; padding-left: 20px; width: 360px;">Category</th>
                    <th style="border-bottom: 0">Last Post</th>
                    <th style="float: right; border-bottom: 0">Topics / Posts</th>
                </tr>
                </thead>
            </table>
            <div class="list-group list-group-flush">
                @foreach($category->children() as $child)
                    <div class="list-group-item clearfix">
                        <div style="width: 350px; float: left;">
                            <a href="/forum/category/{{ $child->id }}/">{{ $child->name }}</a><br>
                            <small>{{ $child->description }}</small>
                        </div>
                        <div style="float: left;">
                            @php($lastPost = $child->lastPost())
                            @if($lastPost)
                                <div class="pull-left" style="margin-right: 5px">
                                    <a href="/user/{{ $lastPost->user()->id }}/">{{ $lastPost->user()->username }}</a> on
                                </div>
                                <a href="{{ $lastPost->url() }}" class="forum-text-limited">{{ $lastPost->topic()->name }}</a>, {{ $lastPost->created_at->diffForHumans() }}
                            @else
                                None
                            @endif
                        </div>
                        <div class="float-right">
                            <span class="badge badge-primary">{{ $child->topics }}</span>
                            <span class="badge badge-primary">{{ $child->posts }}</span>
                        </div>
                    </div>
                    <div class="list-group-separator"></div>
                @endforeach
            </div>
        @endif
        @php($topics = $category->pageTopics())
        @if($topics->total() > 0)
            <table class="table table-striped">
                <thead style="background-color: #008cba; border-color: #008cba; color: #fff">
                <tr>
                    <th style="border-bottom: 0">Title</th>
                    <th style="border-bottom: 0">Started</th>
                    <th style="border-bottom: 0">Views</th>
                    <th style="border-bottom: 0">Replies</th>
                    <th style="border-bottom: 0">Last Reply</th>
                </tr>
                </thead>
                <tbody>
                @foreach($topics->items() as $topic)
                    <tr>
                        <td><a href="{{ $topic->url() }}">{{ $topic->name }}</a></td>
                        <td>{{ $topic->created_at->diffForHumans() }}</td>
                        <td>{{ $topic->viewCount() }}</td>
                        <td>{{ $topic->replyCount() }}</td>
                        @php($lastReply = $topic->lastReply())
                        @if($lastReply)
                            <td><a href="/user/{{ $lastReply->user()->id }}/">{{ $lastReply->user()->username }}</a>, <a href="{{ $lastReply->url() }}">{{ $lastReply->created_at->diffForHumans() }}</a></td>
                        @else
                            <td>None</td>
                        @endif
                    </tr>
                @endforeach
            </table>
        @else
            <div class="alert alert-primary" role="alert">No topics found.</div>
        @endif
    </div>
@stop