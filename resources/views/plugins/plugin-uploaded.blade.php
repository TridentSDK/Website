@extends("sections.wrap-layout")

@section("title", "New Plugin")

@section('content')
    <ol class="breadcrumb headcrab">
        <li><a href="/plugins/">Plugins</a></li>
        <li><a href="/plugin/{{ $plugin->id }}">{{ $plugin->name }}</a></li>
        <li class="version">Version Upload</li>
    </ol>

    @include("utils.success", ["message" => "Plugin Uploaded!", "close" => false, "spacedown" => false])

    <meta http-equiv="refresh" content="2;url={{ $url }}">
@stop