@extends("sections.wrap-layout")

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Rules</h3>
        </div>
        <div class="panel-body">
            {!! $rules !!}
        </div>
    </div>
@stop