@extends("sections.wrap-layout")

@section("title", "New Plugin")

@section('content')
    <ol class="breadcrumb headcrab">
        <li><a href="/plugins/">Plugins</a></li>
        <li><a href="/plugin/{{ $plugin->id }}">{{ $plugin->name }}</a></li>
        <li class="version">Version Upload</li>
    </ol>

    @if(isset($errors) && $errors->getBag("plugin")->any())
        <div class="alert alert-danger headcrab" role="alert">
            @foreach($errors->getBag("plugin")->getMessages() as $field => $error)
                {{ $error[0] }}
                <br/>
            @endforeach
        </div>
    @endif

    @if(Auth::check())
        @if($plugin->canAddVersions(Auth::user()))
            <div class="panel panel-info">
                {!! Form::open(["id" => "settingsForm", "url" => "plugin/".$plugin->id."/upload", "files" => true]) !!}
                <div class="panel-body">

                    <div class="form-group">
                        {!! Form::label("trident-version", "Trident Version") !!}
                        {!! Form::select("trident-version", \TridentSDK\Utils\Trident::versionsAsDropdown(), null, ["class" => "form-control"]) !!}
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="fake-form-group">
                        {!! Form::label("plugin-version", "Plugin Version") !!}
                        <div class="row">
                            <div class="col-xs-2 form-group no-margin-above">
                                {!! Form::label("plugin-version-major", "Major", ["class" => "control-label", "min" => 0, "max" => 9999]) !!}
                                {!! Form::number("plugin-version-major", null, ["class" => "form-control col-md-1"]) !!}
                            </div>
                            <div class="col-xs-2 form-group no-margin-above">
                                {!! Form::label("plugin-version-minor", "Minor", ["class" => "control-label", "min" => 0, "max" => 9999]) !!}
                                {!! Form::number("plugin-version-minor", null, ["class" => "form-control col-md-1"]) !!}
                            </div>
                            <div class="col-xs-2 form-group no-margin-above">
                                {!! Form::label("plugin-version-patch", "Patch", ["class" => "control-label", "min" => 0, "max" => 9999]) !!}
                                {!! Form::number("plugin-version-patch", null, ["class" => "form-control"]) !!}
                            </div>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        {!! Form::label("plugin-file", "Plugin File") !!}

                        <input type="text" readonly="" class="form-control" placeholder="Browse...">
                        {!! Form::file("plugin-file") !!}
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        {!! Form::label("changelog", "Changelog") !!}
                        {!! Form::textarea("changelog", null, ["class" => "form-control", "id" => "changelog"]) !!}
                        <div class="help-block with-errors"></div>

                        <script>
                            $(document).ready(function() {
                                $('#changelog').summernote({minHeight: 200});
                            });
                        </script>
                    </div>

                    <div class="form-group">
                        {!! Form::label("captcha", "Captcha") !!}
                        {!! Recaptcha::render() !!}
                    </div>

                    {!! Form::submit("Upload", ["class" => "btn btn-primary"]) !!}
                </div>
                {!! Form::close() !!}
            </div>
        @else
            @include("utils.warning", ["message" => "You are not allowed to upload this plugin!", "close" => false, "spacedown" => false])
        @endif
    @else
        @include("utils.warning", ["message" => "Please login or register to submit a plugin!", "close" => false, "spacedown" => false])
    @endif
@stop