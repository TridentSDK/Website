@extends("sections.wrap-layout")

@section("title", "New Plugin")

@section('content')
    <ol class="breadcrumb headcrab">
        <li><a href="/plugins/">Plugins</a></li>
        <li class="/plugins/new">New Plugin</li>
    </ol>

    @include("utils.success", ["message" => "Plugin Posted!", "close" => false, "spacedown" => false])

    <meta http-equiv="refresh" content="2;url={{ $url }}">
@stop