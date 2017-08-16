@extends("sections.wrap-layout")

@section("title", "Rules")

@section('content')
    <div class="card">
        <div class="card-header bg-info text-light">
            Rules
        </div>
        <div class="card-body">
            {!! $rules !!}
        </div>
    </div>
@stop