<div class="panel panel-default plugin-sidebar">
    <div class="panel-heading">
        <h3 class="panel-title pull-left"><a href="/n/{{ $article->id }}">{{ $article->title }}</a></h3>
        <span class="pull-right" title="{{ $article->created_at }}">{{ $article->created_at->diffForHumans() }}</span>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        {!! $article->text !!}
        <div class="clearfix"></div>
    </div>
</div>