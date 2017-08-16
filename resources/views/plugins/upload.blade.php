@extends("sections.wrap-layout")

@section("title", "New Plugin")

@section('content')
    <ol class="breadcrumb headcrab">
        <li class="breadcrumb-item"><a href="/plugins/">Plugins</a></li>
        <li class="breadcrumb-item"><a href="/plugin/{{ $plugin->id }}">{{ $plugin->name }}</a></li>
        <li class="breadcrumb-item active version">Version Upload</li>
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
            <div class="card">
                {!! Form::open(["id" => "settingsForm", "url" => "plugin/".$plugin->id."/upload", "files" => true]) !!}
                <div class="card-body">

                    <div class="form-group">
                        {!! Form::label("trident-version", "Trident Version") !!}
                        {!! Form::select("trident-version", \TridentSDK\Utils\Trident::versionsAsDropdown(), null, ["class" => "form-control"]) !!}
                    </div>

                    <div class="fake-form-group">
                        {!! Form::label("plugin-version", "Plugin Version") !!}
                        <div class="form-row">
                            <div class="col-2 form-group no-margin-above">
                                {!! Form::label("plugin-version-major", "Major", ["class" => "control-label", "min" => 0, "max" => 9999]) !!}
                                {!! Form::number("plugin-version-major", null, ["class" => "form-control"]) !!}
                            </div>
                            <div class="col-2 form-group no-margin-above">
                                {!! Form::label("plugin-version-minor", "Minor", ["class" => "control-label", "min" => 0, "max" => 9999]) !!}
                                {!! Form::number("plugin-version-minor", null, ["class" => "form-control"]) !!}
                            </div>
                            <div class="col-2 form-group no-margin-above">
                                {!! Form::label("plugin-version-patch", "Patch", ["class" => "control-label", "min" => 0, "max" => 9999]) !!}
                                {!! Form::number("plugin-version-patch", null, ["class" => "form-control"]) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label("plugin-file", "Plugin File") !!}
                        <br>
                        <label class="custom-file">
                            <input type="file" id="plugin-file" name="plugin-file" class="custom-file-input">
                            <span class="custom-file-control"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        {!! Form::label("changelog", "Changelog") !!}
                        {!! Form::textarea("changelog", null, ["class" => "form-control", "id" => "changelog"]) !!}
                        <div class="help-block with-errors"></div>

                        <script>
                            $(document).ready(function() {
                                $('#changelog').summernote({minHeight: 200});
                                $('.note-popover').css({ display: 'none' });
                            });
                        </script>
                    </div>

                    <div class="form-group normal-captcha">
                        {!! Form::label("captcha", "Captcha") !!}
                        {!! app('captcha')->render(); !!}
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