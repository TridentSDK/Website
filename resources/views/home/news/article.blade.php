<div class="panel panel-default plugin-sidebar" itemscope itemtype="http://schema.org/Article">
    <meta itemprop="author" content="TridentSDK Team" />
    <meta itemprop="headline" content="{{ $article->title }}" />
    <meta itemprop="publisher" content="TridentSDK" />
    <meta itemprop="dateModified" content="{{ $article->updated_at }}" />
    <meta itemprop="mainEntityOfPage" content="{{ env("APP_URL") }}" />

    <div class="panel-heading">
        <h3 class="panel-title pull-left" itemprop="name"><a href="/n/{{ $article->id }}">{{ $article->title }}</a></h3>
        <time datetime="{{ $article->created_at }}" itemprop="datePublished" class="pull-right" title="{{ $article->created_at }}">{{ $article->created_at->diffForHumans() }}</time>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body" itemprop="text">
        {!! $article->text !!}
        <div class="clearfix"></div>
    </div>
</div>