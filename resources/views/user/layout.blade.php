@extends("sections.wrap-layout")

@section('content')
    @if($user != null)
        <div class="clearfix headbox">
            <h1 class="pull-left">{{ $user->username }}</h1>
        </div>
        <hr />

        <div class="row">
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="{{ $user->getAvatar(253) }}" alt="Avatar of {{ $user->username }}">
                </div>
                <div class="panel panel-info plugin-sidebar">
                    <div class="panel-heading">
                        <h3 class="panel-title">Info</h3>
                    </div>
                    <div class="panel-body">
                        <span class="da">Last Online</span>
                        <span class="dd">{{ $user->last_online == 0 ? "Never" : \Carbon\Carbon::createFromTimestamp($user->last_online)->diffForHumans() }}</span>
                        <span class="da">Joined</span>
                        <span class="dd">{{ $user->created_at->diffForHumans() }}</span>
                        <span class="da">Topics</span>
                        <span class="dd">{{ $user->topicCount() }}</span>
                        <span class="da">Posts</span>
                        <span class="dd">{{ $user->postCount() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-info plugin-sidebar nopadding">
                    <div class="panel-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#posts" role="tab" data-toggle="tab">Recent Posts</a></li>
                            <li><a href="#topics" role="tab" data-toggle="tab">Recent Topics</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="posts">
                                @if($user->topicCount() > 0)
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="border-bottom: 0">Title</th>
                                                <th style="border-bottom: 0">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user->recentPosts(14) as $post)
                                                <tr>
                                                    <td><a href="/f/t/{{ $post->topic()->id }}/">{{ $post->name }}</a></td>
                                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    @include("utils.info", ["message" => "No Posts Found!", "close" => false, "spacedown" => false])
                                @endif
                            </div>
                            <div class="tab-pane fade" id="topics">
                                @if($user->postCount() > 0)
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th style="border-bottom: 0">Title</th>
                                            <th style="border-bottom: 0">Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->recentTopics(14) as $topic)
                                            <tr>
                                                <td><a href="/f/t/{{ $topic->id }}/">{{ $topic->name }}</a></td>
                                                <td>{{ $topic->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    @include("utils.info", ["message" => "No Topics Found!", "close" => false, "spacedown" => false])
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="clearfix headbox">
            <h1 class="pull-left">User not found!</h1>
        </div>
    @endif
@stop