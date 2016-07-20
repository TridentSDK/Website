@extends("sections.wrap-layout")

@section('content')
    @include("forum.breadcrumbs", ["breadcrumbs" => array()])

    @foreach($categories as $category)
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $category->name }}<br><small>{{ $category->description }}</small></h3>
            </div>
            <table class="table" style="margin-bottom: 10px">
                <thead>
                <tr style="border-bottom: 2px solid #ddd;">
                    <th style="border-bottom: 0; padding-left: 15px;">Category</th>
                    <th style="border-bottom: 0">Last Post</th>
                    <th style="float: right; border-bottom: 0">Topics / Posts</th>
                </tr>
                </thead>
            </table>
            <div class="list-group">
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
                        <span class="badge">{{ $child->posts }}</span>
                        <span class="badge">{{ $child->topics }}</span>
                    </div>
                    <div class="list-group-separator"></div>
                @endforeach
            </div>
        </div>
    @endforeach
@stop