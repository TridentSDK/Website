@extends("sections.wrap-layout")

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">FAQ</h3>
        </div>
        <div class="panel-body">
            {!! $faq !!}
        </div>
    </div>
@stop