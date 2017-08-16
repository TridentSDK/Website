@extends("sections.wrap-layout")

@section("title", $user == null ? "User not found" : $user->username)

@section('content')
    @if($user != null)

        <div class="headbox">
            <h1 class="display-4">{{ $user->username }}</h1>
        </div>
        <hr />

        <div class="row mb-3">
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="{{ $user->getAvatar(253) }}" alt="Avatar of {{ $user->username }}">
                    <div class="card-body">
                        <span class="da">Last Online</span>
                        <span class="dd">{{ $user->last_online == 0 ? "Never" : (time() - $user->last_online < 300 ? "Now" : \Carbon\Carbon::createFromTimestamp($user->last_online)->diffForHumans()) }}</span>
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
                <div class="card nopadding">
                    <div class="card-body tabbed">
                        <ul class="nav nav-tabs justify-content-center bg-primary" role="tablist">
                            <li class="nav-item"><a class="text-light nav-link active" href="#posts" role="tab" data-toggle="tab">Recent Posts</a></li>
                            <li class="nav-item"><a class="text-light nav-link" href="#topics" role="tab" data-toggle="tab">Recent Topics</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active nopadding" id="posts">
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
                                                    <td><a href="{{ $post->url() }}">{{ $post->topic()->name }}</a></td>
                                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    @include("utils.info", ["message" => "No Posts Found!", "close" => false, "spacedown" => false])
                                @endif
                            </div>
                            <div class="tab-pane nopadding" id="topics">
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
                                                <td><a href="/forum/topic/{{ $topic->id }}/">{{ $topic->name }}</a></td>
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