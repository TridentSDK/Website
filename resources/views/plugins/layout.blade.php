@extends("sections.wrap-layout")

@section("title", "Plugins")

@section("container-type", "container-fluid")

@section('content')

    <div class="row plugins-page">
        <div class="col-lg-10 col-md-9 col-sm-8 plugin-list">
            <div class="row search-bar mb-3">
                <div class="col-xs-12 col-sm-10 search-box">
                    <div class="card">
                        <div class="card-body">
                            <input type="text" class="form-control" placeholder="Search..."/>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 new-plugin">
                    <a class="btn btn-success btn-raised" href="{{ url("/plugins/new") }}">New Plugin</a>
                </div>
            </div>
            <div class="row plugin-cards mb-3">
                @if(count($plugins) == 0)
                    <div class="col-sm-12 plugin-element">
                        @include("utils.info", ["message" => "No Plugins Found!", "close" => false, "spacedown" => false])
                    </div>
                @else
                    @each('plugins.card', $plugins->items(), 'plugin')
                @endif
            </div>
            @if(count($plugins) > 0)
                <div class="centered">
                    @include("utils.paginator", ["paginator" => $plugins])
                </div>
            @endif
        </div>

        <div class="col-lg-2 col-md-3 col-sm-4">
            <div class="card">
                <div class="card-header">
                    Filters
                </div>
                <div class="card-body plugin-filter nopadding">
                    <div class="btn-group-vertical" role="group">
                        @foreach(\TridentSDK\Plugin::$categories as $id => $filter)
                            <button type="button" class="btn btn-default btn-raised">
                                <img src="{{ url("/assets/images/icons/".$filter[1]) }}" />
                                {{ $filter[0] }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop