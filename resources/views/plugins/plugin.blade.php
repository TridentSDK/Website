@extends("sections.wrap-layout")

@section("title", $plugin->name)

@section('content')

    <div class="headbox">
        <h1 class="display-4">{{ $plugin->name }}</h1>
    </div>
    <hr />

    <ol class="breadcrumb headcrab">
        <li class="breadcrumb-item"><a href="/plugins/">Plugins</a></li>
        <li class="breadcrumb-item active">{{ $plugin->name }}</li>
    </ol>

    <div class="row plugin-page">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body tabbed">
                    <ul class="nav nav-tabs justify-content-center bg-primary" role="tablist">
                        <li role="presentation" class="nav-item"><a class="text-light nav-link active" href="#description" role="tab" data-toggle="tab">Description</a></li>
                        <li role="presentation" class="nav-item"><a class="text-light nav-link" href="#version" role="tab" data-toggle="tab">Versions</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="description">
                            {{ $plugin->fulldescription }}
                        </div>
                        <div role="tabpanel" class="tab-pane nopadding panel-margin-fixer" id="version">
                            <div class="panel-group mb-0" id="versions" role="tablist" aria-multiselectable="true">
                                @php($first = true)
                                @php($space = $plugin->getSpace())
                                @foreach(collect($plugin->versions())->sortByDesc("created_at") as $version)
                                    <div class="card straight-corner version-card">
                                        <div class="card-header bg-success straight-corner" role="tab" id="version-heading-{{ $version->id }}">
                                            <a class="text-light" role="button" data-toggle="collapse" data-parent="#versions" href="#version-{{ $version->id }}" aria-expanded="true" aria-controls="version-{{ $version->id }}"{{ $first ? "" : " class='collapsed'" }}>
                                                Version {{ $version->version }}
                                            </a>
                                        </div>
                                        <div id="version-{{ $version->id }}" class="card-body collapse{{ $first ? " in" : "" }}" role="tabpanel" aria-labelledby="version-heading-{{ $version->id }}">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a class="btn btn-info btn-raised pull-right nomargin" href="/version/{{ $version->id }}/download">Download</a>

                                                        <span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span> <strong>Downloads:</strong> {{ $version->downloads }}<br>
                                                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <strong>Uploaded:</strong> {{ $version->created_at->diffForHumans() }}<br>
                                                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span> <strong>File Size:</strong> {{ \TridentSDK\Utils\File::bytesToHuman($version->file_size) }}<br>
                                                        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span> <strong>MD5:</strong> {{ $version->md5_hash }}<br>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{ $version->changelog }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php($first = false)
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @if($plugin->canAddVersions(Auth::user()))
                <a href="/plugin/{{ $plugin->id }}/upload" class="btn btn-success text-light new-version-button mb-3">
                    Upload New Version
                </a>
            @endif
            <div class="card mb-3">
                <div class="card-header bg-info text-light">
                    Info
                </div>
                <div class="card-body">
                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> <strong>Views:</strong> {{ $plugin->views }}<br>
                    <span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span> <strong>Downloads:</strong> {{ $plugin->downloads }}<br>
                    <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> <strong>Favourites:</strong> {{ $plugin->favourites }}<br>
                    @if($plugin->latestversion != null)
                        <span class="glyphicon glyphicon-fire" aria-hidden="true"></span> <strong>Latest Version:</strong> {{ $plugin->latestversion }}<br>
                    @endif
                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <strong>Created:</strong> <time datetime="{{ $plugin->created_at }}" itemprop="datePublished" title="{{ $plugin->created_at }}">{{ $plugin->created_at->diffForHumans() }}</time><br>
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span> <strong>License:</strong> <a href="{{ $plugin->getLicense()[1] }}">{{ $plugin->getLicense()[0] }}</a><br>
                </div>
            </div>
            @if($plugin->latestversion != null)
                <div class="card">
                    <div class="card-header bg-success text-light">
                        Installation
                    </div>
                    <div class="card-body tabbed">
                        <ul class="nav nav-tabs justify-content-center bg-success" role="tablist">
                            <li role="presentation" class="nav-item"><a class="text-light nav-link active" href="#owner" role="tab" data-toggle="tab">Server</a></li>
                            <li role="presentation" class="nav-item"><a class="text-light nav-link" href="#maven" role="tab" data-toggle="tab">Maven</a></li>
                            <li role="presentation" class="nav-item"><a class="text-light nav-link" href="#gradle" role="tab" data-toggle="tab">Gradle</a></li>
                            <li role="presentation" class="nav-item"><a class="text-light nav-link" href="#module" role="tab" data-toggle="tab">Module</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane preformatted active" id="owner">
                                <span style="color: #66D9EF">/trd</span> <span style="color: #FD971F">i</span> <span style="color: #A6E22E">{{ $plugin->getSpaceWithArtifact() }}</span> <span style="color: #F92672">{{ $plugin->latestversion }}</span>
                            </div>
                            <div role="tabpanel" class="tab-pane preformatted" id="maven">
                                &lt;<span style="color: #F92672">dependency</span>&gt;<br>
                                &nbsp;&nbsp;&lt;<span style="color: #F92672">groupId</span>&gt;trd.{{ $plugin->getSpace()->name }}&lt;<span style="color: #F92672">/groupId</span>&gt;<br>
                                &nbsp;&nbsp;&lt;<span style="color: #F92672">artifactId</span>&gt;{{ $plugin->artifact }}&lt;<span style="color: #F92672">/artifactId</span>&gt;<br>
                                &nbsp;&nbsp;&lt;<span style="color: #F92672">version</span>&gt;{{ $plugin->latestversion }}&lt;<span style="color: #F92672">/version</span>&gt;<br>
                                &lt;/<span style="color: #F92672">dependency</span>&gt;
                            </div>
                            <div role="tabpanel" class="tab-pane preformatted" id="gradle">
                                provided <span style="color: #E6DB74">"trd.{{ $plugin->getSpace()->name }}:{{ $plugin->artifact }}:{{ $plugin->latestversion }}"</span>
                            </div>
                            <div role="tabpanel" class="tab-pane preformatted" id="module">
                                @<span style="color: #66D9EF">DependsOn</span>(id = <span style="color: #E6DB74">"{{ $plugin->getSpaceWithArtifact() }}"</span>, version = <span style="color: #E6DB74">"{{ $plugin->latestversion }}"</span>)
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@stop