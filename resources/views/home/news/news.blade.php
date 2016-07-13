@if($news->total() > 0)
    @each('home.news.article', $news->items(), 'article')
    <div class="centered">
        @include("utils.paginator", ["paginator" => $news])
    </div>
@else
    @include("utils.info", ["message" => "No News Found!", "close" => true, "spacedown" => true])
@endif