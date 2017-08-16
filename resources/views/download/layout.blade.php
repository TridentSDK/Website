@extends("sections.wrap-layout")

@section("title", "Downloads")

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header bg-success text-light">
                    Stable Release
                </div>
                <div class="card-body">
                    <strong>Version:</strong> {{ $version["stable"]["version"] }}<br/>
                    <strong>Download:</strong> <a href="{{ $version["stable"]["url"] }}">{{ $version["stable"]["message"] }}</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    Unstable Release
                </div>
                <div class="card-body">
                    <strong>Version:</strong> {{ $version["unstable"]["version"] }}<br/>
                    <strong>Download:</strong> <a href="{{ $version["unstable"]["url"] }}">{{ $version["unstable"]["message"] }}</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header bg-danger text-light">
                    Bleeding-Edge
                </div>
                <div class="card-body">
                    <strong>Version:</strong> {{ $version["bleeding"]["version"] }}<br/>
                    <strong>Download:</strong> <a href="{{ $version["bleeding"]["url"] }}">{{ $version["bleeding"]["message"] }}</a>
                </div>
            </div>
        </div>
    </div>
@stop