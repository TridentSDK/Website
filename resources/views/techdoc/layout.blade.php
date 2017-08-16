@extends("sections.wrap-layout")

@section("title", "Tech-Doc")

@section('content')
    <div class="card">
        <div class="card-header bg-info text-light">
            Tech-Doc
        </div>
        <div class="card-body">
            {!! $doc !!}
        </div>
    </div>
@stop