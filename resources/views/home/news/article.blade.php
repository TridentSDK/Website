<div class="card mb-3" itemscope itemtype="http://schema.org/Article">
    <meta itemprop="author" content="TridentSDK Team" />
    <meta itemprop="headline" content="{{ $article->title }}" />
    <meta itemprop="publisher" content="TridentSDK" />
    <meta itemprop="dateModified" content="{{ $article->updated_at }}" />
    <meta itemprop="mainEntityOfPage" content="{{ env("APP_URL") }}" />

    <div class="card-header">
        <span class="float-left" itemprop="name"><a href="/article/{{ $article->id }}">{{ $article->title }}</a></span>
        <time datetime="{{ $article->created_at }}" itemprop="datePublished" class="pull-right" title="{{ $article->created_at }}">{{ $article->created_at->diffForHumans() }}</time>
        <div class="clearfix"></div>
    </div>
    <div class="card-body" itemprop="text">
        {!! $article->text !!}
        <div class="clearfix"></div>
    </div>
</div>