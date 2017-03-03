@extends("sections.wrap-layout")

@section("title", "Password Reset")

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                {!! Form::open(["id" => "newPasswordForm", "url" => "/password/reset"]) !!}
                <div class="panel-body">
                    {!! Form::hidden("token", $token) !!}

                    <div class="form-group">
                        {!! Form::label("email", "Email") !!}
                        {!! Form::email("email", $email or old('email'), ["class" => "form-control", "required"]) !!}
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        {!! Form::label("password", "New Password") !!}
                        {!! Form::password("password", ["class" => "form-control", "data-validpassword", "required"]) !!}
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        {!! Form::label("password_confirmation", "Confirm Password") !!}
                        {!! Form::password("password_confirmation", ["class" => "form-control", "data-validpassword", "required"]) !!}
                        <div class="help-block with-errors"></div>
                    </div>

                    {!! Form::submit("Reset Password", ["class" => "btn btn-primary"]) !!}
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
            $('#newPasswordForm').validator({
                delay: 200,
                custom: validationOptions
            });
        });
    </script>
@stop