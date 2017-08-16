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
<script src="{{ asset("/assets/js/jquery.noty.packaged.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/assets/js/nestable.js") }}" type="text/javascript"></script>
<script src="{{ asset("/assets/js/jquery.jeditable.mini.js") }}" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

<script src="{{ asset("/node_modules/bootstrap/dist/js/bootstrap.min.js") }}" type="text/javascript"></script>

<script src="{{ asset("/node_modules/bootstrap-validator/dist/validator.min.js") }}" type="text/javascript"></script>

<script src="{{ asset("/assets/js/js.js") }}" type="text/javascript"></script>

<script src="{{ asset("/node_modules/summernote/dist/summernote.min.js") }}"></script>

<script>
    $(function () {
        $('body').bootstrapMaterialDesign({});
    });

    @if(Auth::check())
        var SECURITY_TOKEN = "{{ Auth::user()->token }}";
    @endif
</script>

@section("javascript-extra")
@show
