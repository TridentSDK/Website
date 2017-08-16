<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/forum/">Forum</a></li>

    @foreach($breadcrumbs as $crumb => $url)
        @if($url == "#")
            <li class="breadcrumb-item active">{{ $crumb }}</li>
        @else
            <li class="breadcrumb-item"><a href={{ $url }}>{{ $crumb }}</a></li>
        @endif
    @endforeach
</ol>