@extends("sections.wrap-layout")

@section('content')
    <h1>New Topic</h1>

    @include("utils.success", ["message" => "Topic Posted!", "close" => false, "spacedown" => false])

    <meta http-equiv="refresh" content="2;url={{ $url }}">
@stop