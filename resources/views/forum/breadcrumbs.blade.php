<ol class="breadcrumb">
    <li><a href="/forum/">Forum</a></li>

    @foreach($breadcrumbs as $crumb => $url)
        @if($url == "#")
            <li class="active">{{ $crumb }}</li>
        @else
            <li><a href={{ $url }}>{{ $crumb }}</a></li>
        @endif
    @endforeach
</ol>