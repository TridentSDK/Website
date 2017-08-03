<div class="col-lg-4 col-md-6 col-sm-12 plugin-element">
    <div class="media panel panel-default panel-body">
        <div class="media-left">
            <a href="#">
                <img class="media-object plugin-logo" src="{{ $plugin->logo == null ? url("/assets/images/no_plugin_image.svg") : $plugin->logo }}">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">
                <a href="/plugin/{{ $plugin->id }}">{{ $plugin->name }}</a>
                <small class="download-count">
                    <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                    {{ $plugin->downloads }}
                </small>
            </h4>
            <small class="plugin-author">by {{ $plugin->getSpace()->name }}</small>
            <p>{{ $plugin->description }}</p>
        </div>
    </div>
</div>