<div class="panel panel-info plugin-sidebar">
    <div class="panel-heading">
        <h3 class="panel-title">Latest Commits</h3>
    </div>
    <div class="panel-body">
        <h3 class="nospace">TridentSDK</h3>
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="https://www.gravatar.com/avatar/{{ md5($tridentSDKCommit->author->email) }}?s=45" alt="Avatar of xTrollxDudex">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><a href="{{ $tridentSDKCommit->url }}" title="{{ $tridentSDKCommit->message }}">{{ $tridentSDKCommit->message }}</a></h4>
                <a href="{{ $tridentSDKCommit->url }}">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($tridentSDKCommit->timestamp))->diffForHumans() }}</a>
            </div>
        </div>

        <h3 class="nospace" style="margin-top: 15px;">Trident</h3>
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="https://www.gravatar.com/avatar/{{ md5($tridentCommit->author->email) }}?s=45" alt="Avatar of xTrollxDudex">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><a href="{{ $tridentCommit->url }}" title="{{ $tridentCommit->message }}">{{ $tridentCommit->message }}</a></h4>
                <a href="{{ $tridentCommit->url }}">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($tridentCommit->timestamp))->diffForHumans() }}</a>
            </div>
        </div>
    </div>
</div>