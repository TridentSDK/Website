@extends("sections.wrap-layout")

@if(isset($article))

    @section("title", $article->title)

    @section('content')

        <div class="headbox">
            <h1 class="display-4">
                {{ $article->title }}
                <small class="text-muted article-date">
                    <time datetime="{{ $article->created_at }}" itemprop="datePublished" title="{{ $article->created_at }}">{{ $article->created_at->diffForHumans() }}</time>
                </small>
            </h1>
        </div>
        <hr />

        <div class="card mb-3" itemscope itemtype="http://schema.org/Article">
            <meta itemprop="author" content="TridentSDK Team" />
            <meta itemprop="headline" content="{{ $article->title }}" />
            <meta itemprop="publisher" content="TridentSDK" />
            <meta itemprop="dateModified" content="{{ $article->updated_at }}" />
            <meta itemprop="mainEntityOfPage" content="{{ env("APP_URL") }}" />

            <div class="card-body" itemprop="text">
                {!! $article->text !!}
                <div class="clearfix"></div>
            </div>
        </div>
    @stop

@endif