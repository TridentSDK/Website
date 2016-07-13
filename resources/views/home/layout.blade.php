@extends("sections.wrap-layout")

@section('content')
    <div class="row">
        <div class='col-md-8 col-sm-12'>
            @include("home.news.news")
        </div>
        <div class='col-md-4 col-sm-12'>
            @include("home.sidebar.sidebar")
        </div>
    </div>
@stop