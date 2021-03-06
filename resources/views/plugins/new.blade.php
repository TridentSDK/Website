@extends("sections.wrap-layout")

@section("title", "New Plugin")

@section('content')
    <ol class="breadcrumb headcrab">
        <li class="breadcrumb-item"><a href="/plugins/">Plugins</a></li>
        <li class="breadcrumb-item active">New Plugin</li>
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
        <div class="card">
            {!! Form::open(["id" => "pluginForm", "url" => "plugins/new"]) !!}
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label("plugin-name", "Plugin Name") !!}
                    {!! Form::text("plugin-name", null, ["class" => "form-control"]) !!}
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    {!! Form::label("plugin-space", "Plugin Space") !!}
                    {!! Form::select("plugin-space", [-1 => Auth::user()->username], null, ["class" => "form-control"]) !!}
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    {!! Form::label("plugin-license", "Plugin License") !!}
                    {!! Form::select("plugin-license", \TridentSDK\Plugin::licensesAsDropdown(), null, ["class" => "form-control"]) !!}
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    {!! Form::label("primary-category", "Primary Category") !!}

                    <div class="hidden-checkboxes" id="plugin-primary-category">
                        @foreach(\TridentSDK\Plugin::$categories as $id => $filter)
                            <label class="btn btn-success btn-raised{{ old("primary-category") == $id ? " active" : "" }}" title="{{ $filter[0] }}">
                                <input type="radio" name="primary-category" value="{{ $id }}"{{ old("primary-category") == $id ? " checked" : "" }}> <img src="{{ url("/assets/images/icons/".$filter[1]) }}" class="placeholder-image-32"/> <span>{{ $filter[0] }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label("secondary-category", "Secondary Category") !!}

                    <div class="hidden-checkboxes" id="plugin-secondary-category">
                        @foreach(\TridentSDK\Plugin::$categories as $id => $filter)
                            <label class="btn btn-success btn-raised{{ in_array($id, old("secondary-category", [])) ? " active" : "" }}" title="{{ $filter[0] }}">
                                <input type="checkbox" name="secondary-category[]" value="{{ $id }}"{{ in_array($id, old("secondary-category", [])) ? " checked" : "" }}> <img src="{{ url("/assets/images/icons/".$filter[1]) }}" class="placeholder-image-32"/> <span>{{ $filter[0] }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label("short-description", "Short Description") !!}
                    {!! Form::text("short-description", null, ["class" => "form-control"]) !!}
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    {!! Form::label("full-description", "Full Description") !!}
                    {!! Form::textarea("full-description", null, ["class" => "form-control", "id" => "full-description"]) !!}
                    <div class="help-block with-errors"></div>

                    <script>
                        $(document).ready(function() {
                            $('#full-description').summernote({minHeight: 200});
                            $('.note-popover').css({ display: 'none' });
                        });
                    </script>
                </div>

                <div class="form-group normal-captcha">
                    {!! Form::label("captcha", "Captcha") !!}
                    {!! app('captcha')->render(); !!}
                </div>

                {!! Form::submit("Submit", ["class" => "btn btn-primary"]) !!}
            </div>
            {!! Form::close() !!}
        </div>
    @else
        @include("utils.warning", ["message" => "Please login or register to submit a plugin!", "close" => false, "spacedown" => false])
    @endif
@stop