<div class="panel panel-default plugin-sidebar" itemscope itemtype="http://schema.org/Article">
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