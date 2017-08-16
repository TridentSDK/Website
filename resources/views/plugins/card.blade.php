<div class="col-lg-4 col-md-6 col-sm-12 plugin-element">
    <div class="card">
        <div class="media card-body">
            <img class="d-flex mr-3 plugin-logo" src="{{ $plugin->logo == null ? url("/assets/images/no_plugin_image.svg") : $plugin->logo }}">
            <div class="media-body">
                <h5 class="media-heading mt-0">
                    <a href="/plugin/{{ $plugin->id }}">{{ $plugin->name }}</a>
                    <small class="download-count">
                        {{ $plugin->downloads }}
                        <span class="oi oi-cloud-download"></span>
                    </small>
                </h5>
                <small class="plugin-author">by {{ $plugin->getSpace()->name }}</small>
                <p>{{ $plugin->description }}</p>
            </div>
        </div>
    </div>
</div>