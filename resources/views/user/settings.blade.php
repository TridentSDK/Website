@extends("sections.wrap-layout")

@section("title", $user == null ? "User not found" : $user->username)

@section('content')
    @if($user != null)

        <div class="clearfix">
            <h1 class="display-4">{{ $user->username }}</h1>
        </div>
        <hr />

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    @if($errors->getBag("settings")->any())
                        <div class="alert alert-danger" style="margin-bottom: 0;" role="alert">
                            @foreach($errors->getBag("settings")->getMessages() as $field => $error)
                                {{ $error[0] }}<br/>
                            @endforeach
                        </div>
                    @endif

                    @if(session("accepted"))
                        <div class="alert alert-success" role="alert">Settings Saved!</div>
                    @endif

                    {!! Form::open(["id" => "settingsForm", "url" => "settings/".$user->id]) !!}
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label("new-email", "New Email") !!}
                            {!! Form::email("new-email", null, ["class" => "form-control"]) !!}
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            {!! Form::label("new-password", "New Password") !!}
                            {!! Form::password("new-password", ["class" => "form-control", "data-validpassword"]) !!}
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            {!! Form::label("current-password", "Current Password") !!}
                            {!! Form::password("current-password", ["class" => "form-control", "data-validpassword", "required"]) !!}
                            <div class="help-block with-errors"></div>
                        </div>

                        {!! Form::submit("Save", ["class" => "btn btn-primary"]) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
        <script>
            var validationOptions = {
                validpassword: function (el) {
                    if (!el.val().match("^(?=.*?[a-z])(?=.*?[0-9]).{8,}$")) {
                        return "Passwords must be at least 8 characters with 1 number.";
                    }
                }
            };

            $(document).ready(function() {
                $('#settingsForm').validator({
                    delay: 200,
                    custom: validationOptions
                });
            });
        </script>
    @else
        <div class="clearfix headbox">
            <h1 class="pull-left">User not found!</h1>
        </div>
    @endif
@stop