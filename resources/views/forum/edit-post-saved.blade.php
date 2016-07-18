@extends("sections.wrap-layout")

@section('content')
    <h1>Edit Post</h1>

    @include("utils.success", ["message" => "Saved!", "close" => false, "spacedown" => false])

    <meta http-equiv="refresh" content="2;url={{ $url }}">
@stop