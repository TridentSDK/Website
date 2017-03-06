@extends("sections.wrap-layout")

@section("title", "Plugins")

@section("container-type", "container-fluid")

@section('content')

    <div class="row plugins-page">
        <div class="col-lg-10 col-md-9 col-sm-8 plugin-list">
            <div class="row search-bar">
                <div class="col-xs-12 col-sm-10 search-box">
                    <div class="panel panel-default panel-body">
                        <input type="text" class="form-control" placeholder="Search..."/>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 new-plugin">
                    <a class="btn btn-success btn-raised" href="{{ url("/plugins/new") }}">New Plugin</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    @for($i = 0; $i < 18; $i++)
                        <div class="col-lg-4 col-md-6 col-sm-12 plugin-element">
                            <div class="media panel panel-default panel-body">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object plugin-logo" src="{{ url("/assets/images/no_plugin_image.svg") }}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="#">Sample Plugin</a>
                                        <small class="download-count">
                                            <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                                            16,416,963
                                        </small>
                                    </h4>
                                    <small class="plugin-author">by TridentSDK Team</small>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam dolor, sagittis vel feugiat at nullam.</p>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="centered">
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-3 col-sm-4">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Filters</h3>
                </div>
                <div class="panel-body plugin-filter">
                    <div class="btn-group-vertical" role="group">
                        @php($data = [
                            "Admin Tools" => "Iron_Pickaxe.png",
                            "Anti-Griefing" => "Iron_Sword.png",
                            "Chat Related" => "Paper.png",
                            "Developer Tools" => "Disc.png",
                            "Economy" => "Emerald.png",
                            "Fixes" => "Compass.png",
                            "Fun" => "Cake.png",
                            "General" => "Apple.png",
                            "Informational" => "Sign.png",
                            "Mechanics" => "Redstone.png",
                            "Miscellaneous" => "Slimeball.png",
                            "Role-Playing" => "Book.png",
                            "Web Administration" => "Painting.png",
                            "World Manipulation" => "Door.png",
                            "World Generation" => "Map.png"
                        ])
                        @foreach($data as $name => $image)
                            <button type="button" class="btn btn-default btn-raised">
                                <img src="{{ url("/assets/images/icons/".$image) }}" />
                                {{ $name }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop