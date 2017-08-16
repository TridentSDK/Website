<div class="card mb-3">
    <div class="card-header">
        Latest Plugins
    </div>
    <div class="card-body">
        <ul class="list-unstyled mb-0">
            @forelse($latestPlugins as $plugin)
                <li class="media">
                    <a class="d-flex mr-3" href="#">
                        <img class="plugin-logo-small" src="{{ $plugin->logo == "" ? asset("assets/images/no_plugin_image.svg") : $plugin->logo }}" alt="Logo of {{ $plugin->name }}">
                    </a>
                    <div class="media-body">
                        <h5 class="mt-0"><a class="limited" href="/p/v/{{ $plugin->id }}/" title="{{ $plugin->name }}">{{ $plugin->name }}</a></h5>
                        <div class="clearfix"></div>
                        <small>{{ $plugin->description }}</small>
                    </div>
                </li>
            @empty
                @include("utils.info", ["message" => "No Plugins Found!", "close" => false, "spacedown" => false])
            @endforelse
        </ul>
    </div>
</div>