<div class="card mb-3">
    <div class="card-header">
        Latest Commits
    </div>
    <div class="card-body">
        <h5 class="nospace">TridentSDK <img src="https://travis-ci.org/TridentSDK/TridentSDK.svg?branch=bleeding-edge" class="build-status" alt="TridentSDK Build Status"/></h5>
        <div class="media">
            @if(isset($tridentSDKCommit->author))
                <a class="pull-left" href="#">
                    <img class="media-object" src="https://www.gravatar.com/avatar/{{ md5($tridentSDKCommit->author->email) }}?s=45" alt="Avatar of xTrollxDudex">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a class="limited" href="{{ $tridentSDKCommit->url }}" title="{{ $tridentSDKCommit->message }}">{{ $tridentSDKCommit->message }}</a></h4>
                    <div class="clearfix"></div>
                    <a href="{{ $tridentSDKCommit->url }}">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($tridentSDKCommit->timestamp))->diffForHumans() }}</a>
                </div>
            @endif
        </div>

        <h5 class="nospace" style="margin-top: 15px;">Trident <img src="https://travis-ci.org/TridentSDK/Trident.svg?branch=bleeding-edge" class="build-status" alt="Trident Build Status"/></h5>
        <div class="media">
            @if(isset($tridentCommit->author))
                <a class="pull-left" href="#">
                    <img class="media-object" src="https://www.gravatar.com/avatar/{{ md5($tridentCommit->author->email) }}?s=45" alt="Avatar of xTrollxDudex">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a class="limited" href="{{ $tridentCommit->url }}" title="{{ $tridentCommit->message }}">{{ $tridentCommit->message }}</a></h4>
                    <div class="clearfix"></div>
                    <a href="{{ $tridentCommit->url }}">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($tridentCommit->timestamp))->diffForHumans() }}</a>
                </div>
            @endif
        </div>
    </div>
</div>