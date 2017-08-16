@extends("sections.wrap-layout")

@section("title", "Forum")

@section('content')
    @include("forum.breadcrumbs", ["breadcrumbs" => array()])

    @if (session('topic-deleted'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Topic Deleted
        </div>
    @endif

    @foreach($categories as $category)
        <div class="card mb-3">
            <div class="card-header bg-primary text-light">
                {{ $category->name }}<br><small>{{ $category->description }}</small>
            </div>
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
        </div>
    @endforeach
@stop