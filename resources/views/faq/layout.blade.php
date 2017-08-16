@extends("sections.wrap-layout")

@section("title", "FAQ")

@section('content')
    <div class="card">
        <div class="card-header bg-info text-light">
            FAQ
        </div>
        <div class="card-body">
            {!! $faq !!}
        </div>
    </div>
@stop