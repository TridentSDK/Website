<div class="bottom-bar">
    <div class="container">
        <div class="pull-left">
            Copyright &copy; <?=date("Y"); ?> TridentSDK
        </div>
        <div class="pull-right">
            Made by <a href="/user/1/">Vilsol</a>
        </div>
    </div>
</div>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-55613111-1', 'auto');
    ga('send', 'pageview');
</script>
<script async type="text/javascript" src="https://tridentsdk.atlassian.net/s/a4a7b9334313b4bdad6cf58a80507f0b-T/en_USkpukdf/64003/8/1.4.15/_/download/batch/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector.js?locale=en-US&amp;collectorId=368ecb29"></script>
<script src="{{ asset("/bower_components/jquery-ui/jquery-ui.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/assets/js/jquery.noty.packaged.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/assets/js/nestable.js") }}" type="text/javascript"></script>
<script src="{{ asset("/assets/js/jquery.jeditable.mini.js") }}" type="text/javascript"></script>

<script src="{{ asset("/bower_components/bootstrap/dist/js/bootstrap.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/bower_components/bootstrap-material-design/dist/js/material.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/bower_components/bootstrap-material-design/dist/js/ripples.min.js") }}" type="text/javascript"></script>

<script src="{{ asset("/bower_components/bootstrap-validator/dist/validator.min.js") }}" type="text/javascript"></script>

<script src="{{ asset("/assets/js/js.js") }}" type="text/javascript"></script>

<script src="{{ asset("/bower_components/summernote/dist/summernote.min.js") }}"></script>

<script>
    $(function () {
        $.material.init();
    });

    @if(Auth::check())
        var SECURITY_TOKEN = "{{ Auth::user()->token }}";
    @endif
</script>