<div class="alert alert-warning {{ $close ? "alert-dismissible" : ""  }}" {{ ($spacedown ? "" : "style='margin-bottom: 0;'") }} role="alert">
    @if(@$close)
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    @endif
    {{ $message }}
</div>
