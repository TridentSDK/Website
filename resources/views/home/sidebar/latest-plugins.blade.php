<div class="panel panel-info plugin-sidebar">
    <div class="panel-heading">
        <h3 class="panel-title">Latest Plugins</h3>
    </div>
    <div class="panel-body">
        @forelse($latestPlugins as $plugin)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object plugin-logo-small" src="{{ $plugin->logo == "" ? asset("assets/images/no_plugin_image.svg") : $plugin->logo }}" alt="Logo of {{ $plugin->name }}">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="/p/v/{{ $plugin->id }}/" title="{{ $plugin->name }}">{{ $plugin->name }}</a></h4>
                    <small>{{ $plugin->description }}</small>
                </div>
            </div>
        @empty
            @include("utils.info", ["message" => "No Plugins Found!", "close" => false, "spacedown" => false])
        @endforelse
    </div>
</div>