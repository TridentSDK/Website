@extends("sections.wrap-layout")

@section("title", $plugin->name)

@section('content')

    <div class="row plugin-page">
        <div class="col-md-8 col-md-8-5">
            <div class="panel">
                <div class="panel-body">
                    {{ $plugin->fulldescription }}
                </div>
            </div>
        </div>
        <div class="col-md-4 col-md-3-5">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Info</h3>
                </div>
                <div class="panel-body">
                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> <strong>Views:</strong> {{ $plugin->views }}<br>
                    <span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span> <strong>Downloads:</strong> {{ $plugin->downloads }}<br>
                    <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> <strong>Favourites:</strong> {{ $plugin->favourites }}<br>
                    <span class="glyphicon glyphicon-fire" aria-hidden="true"></span> <strong>Latest Version:</strong> {{ $plugin->latestversion }}<br>
                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <strong>Created:</strong> <time datetime="{{ $plugin->created_at }}" itemprop="datePublished" title="{{ $plugin->created_at }}">{{ $plugin->created_at->diffForHumans() }}</time><br>
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span> <strong>License:</strong> <a href="{{ $plugin->getLicense()[1] }}">{{ $plugin->getLicense()[0] }}</a><br>
                </div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Installation</h3>
                </div>
                <div class="panel-body tabbed">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#owner" aria-controls="home" role="tab" data-toggle="tab">Server</a></li>
                        <li role="presentation"><a href="#maven" aria-controls="profile" role="tab" data-toggle="tab">Maven</a></li>
                        <li role="presentation"><a href="#gradle" aria-controls="profile" role="tab" data-toggle="tab">Gradle</a></li>
                        <li role="presentation"><a href="#module" aria-controls="profile" role="tab" data-toggle="tab">Module</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane preformatted active" id="owner">/trd i {{ $plugin->getSpaceWithArtifact() }}</div>
                        <div role="tabpanel" class="tab-pane preformatted" id="maven">
                            &lt;dependency&gt;<br>
                            &nbsp;&nbsp;&lt;groupId&gt;trd.{{ $plugin->getSpace()->name }}&lt;/groupId&gt;<br>
                            &nbsp;&nbsp;&lt;artifactId&gt;{{ $plugin->artifact }}&lt;/artifactId&gt;<br>
                            &nbsp;&nbsp;&lt;version&gt;{{ $plugin->latestversion }}&lt;/version&gt;<br>
                            &lt;/dependency&gt;
                        </div>
                        <div role="tabpanel" class="tab-pane preformatted" id="gradle">
                            provided 'trd.{{ $plugin->getSpace()->name }}:{{ $plugin->artifact }}:{{ $plugin->latestversion }}'
                        </div>
                        <div role="tabpanel" class="tab-pane preformatted" id="module">@ModuleDependency('^{{ $plugin->getSpaceWithArtifact() }}:{{ $plugin->latestversion }}')</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop