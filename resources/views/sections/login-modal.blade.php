<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelLogin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabelLogin">Login</h4>
            </div>
            {!! Form::open(["id" => "loginForm", "url" => "login"]) !!}


            <div class="modal-body">

                @if($errors->getBag("login")->any())

                    <div class="alert alert-danger" style="margin-bottom: 0;" role="alert">
                        @foreach($errors->getBag("login")->getMessages() as $field => $error)
                            {{ $error[0] }}
                            <br/>
                        @endforeach
                    </div>

                    <script>$(document).ready(function(){ $('#loginModal').modal('show');});</script>

                @endif

                @if(session("registered"))
                    <div class="alert alert-success" role="alert">Registration Successful!</div>
                    <script>$(document).ready(function(){ $('#loginModal').modal('show');});</script>
                @endif

                <div class="form-group">
                    {!! Form::label("username", "Username *") !!}
                    {!! Form::text("username", null, ["class" => "form-control", "data-validusername", "required"]) !!}
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    {!! Form::label("password", "Password *") !!}
                    {!! Form::password("password", ["class" => "form-control", "data-validpassword", "required"]) !!}
                    <div class="help-block with-errors"></div>
                </div>


                <div class="checkbox">
                    <label>
                        {{ Form::checkbox("remember") }} Remember
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal" data-toggle="modal" data-target="#resetModal">Forgot Password</button>
                <button type="button" class="btn btn-info" data-dismiss="modal" data-toggle="modal" data-target="#registerModal">Register</button>
                <button type="submit" class="btn btn-primary" style="margin-bottom: 0;" value="Login" name="login">Login</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelRegister" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabelRegister">Register</h4>
            </div>

            {!! Form::open(["id" => "registerForm", "url" => "register"]) !!}
                <div class="modal-body">

                    @if($errors->getBag("register")->any())

                        <div class="alert alert-danger" style="margin-bottom: 0;" role="alert">
                            @foreach($errors->getBag("register")->getMessages() as $field => $error)
                                @if($field === "g-recaptcha-response")
                                    {{ "Invalid Captcha." }}
                                @else
                                    {{ $error[0] }}
                                @endif
                                <br/>
                            @endforeach
                        </div>

                        <script>$(document).ready(function(){ $('#registerModal').modal('show');});</script>

                    @endif

                    <div class="form-group">
                        {!! Form::label("username", "Username *") !!}
                        {!! Form::text("username", null, ["class" => "form-control", "data-validusername", "required"]) !!}
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        {!! Form::label("email", "Email *") !!}
                        {!! Form::email("email", null, ["class" => "form-control", "required"]) !!}
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        {!! Form::label("password", "Password *") !!}
                        {!! Form::password("password", ["class" => "form-control", "id" => "register-password", "data-validpassword", "required"]) !!}
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        {!! Form::label("password_confirmation", "Password Confirmation *") !!}
                        {!! Form::password("password_confirmation", ["class" => "form-control", "data-match" => "#register-password", "required"]) !!}
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        {!! Form::label("captcha", "Captcha *") !!}
                        {!! Recaptcha::render() !!}
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::submit("Register", ["class" => "btn btn-primary right"]) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelReset" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabelReset">Reset Password</h4>
            </div>
            {!! Form::open(["id" => "resetForm", "url" => "/password/email"]) !!}

            <div class="modal-body">

                @if($errors->getBag("email")->any())

                    <div class="alert alert-danger" style="margin-bottom: 0;" role="alert">
                        @foreach($errors->getBag("email")->getMessages() as $field => $error)
                            {{ $error[0] }}
                            <br/>
                        @endforeach
                    </div>

                    <script>$(document).ready(function(){ $('#resetModal').modal('show');});</script>

                @endif

                @if(session("reset-sent"))
                    <div class="alert alert-success" role="alert">{{ session("reset-sent") }}</div>
                    <script>$(document).ready(function(){ $('#resetModal').modal('show');});</script>
                @endif

                <div class="form-group">
                    {!! Form::label("email", "Email *") !!}
                    {!! Form::email("email", null, ["class" => "form-control", "required"]) !!}
                    <div class="help-block with-errors"></div>
                </div>

            </div>
            <div class="modal-footer">
                {!! Form::submit("Send password reset", ["class" => "btn btn-primary right"]) !!}
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
        },
        validusername: function (el) {
            if (el.val().length < 6 || el.val().length >= 30) {
                return "The username must be at least 6 and less than 30 characters long";
            }

            if (!el.val().match("^[a-zA-Z0-9_]+$")) {
                return "The username can only consist of alphabetical, number and underscore";
            }
        }
    };

    $(document).ready(function() {
        $('#registerForm').validator({
            delay: 200,
            custom: validationOptions
        });

        $('#loginForm').validator({
            delay: 200,
            custom: validationOptions
        });
    });
</script>