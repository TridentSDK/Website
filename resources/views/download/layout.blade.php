@extends("sections.wrap-layout")

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-success plugin-sidebar">
                <div class="panel-heading">
                    <h3 class="panel-title">Stable Release</h3>
                </div>
                <div class="panel-body">
                    <strong>Version:</strong> {{ $version["stable"]["version"] }}<br/>
                    <strong>Download:</strong> <a href="{{ $version["stable"]["url"] }}">{{ $version["stable"]["message"] }}</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-warning plugin-sidebar">
                <div class="panel-heading">
                    <h3 class="panel-title">Unstable Release</h3>
                </div>
                <div class="panel-body">
                    <strong>Version:</strong> {{ $version["unstable"]["version"] }}<br/>
                    <strong>Download:</strong> <a href="{{ $version["unstable"]["url"] }}">{{ $version["unstable"]["message"] }}</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-danger plugin-sidebar">
                <div class="panel-heading">
                    <h3 class="panel-title">Bleeding-Edge</h3>
                </div>
                <div class="panel-body">
                    <strong>Version:</strong> {{ $version["bleeding"]["version"] }}<br/>
                    <strong>Download:</strong> <a href="{{ $version["bleeding"]["url"] }}">{{ $version["bleeding"]["message"] }}</a>
                </div>
            </div>
        </div>
    </div>
@stop