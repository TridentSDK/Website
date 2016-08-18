@extends("sections.wrap-layout")

@section("title", "Members")

@section('content')
    <h1>Members</h1>
    <hr/>
    <div class="row">
        @php($count = 0)
        @foreach($members as $member)
            @if($count % 6 == 0)
                </div><div class="row">
            @endif

            @include("members.member", ["member" => $member])
            @php($count++)
        @endforeach
    </div>

    <div class="centered">
        @include("utils.paginator", ["paginator" => $members])
    </div>
@stop