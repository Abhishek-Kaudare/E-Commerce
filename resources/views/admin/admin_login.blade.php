<!DOCTYPE html>
<html lang="en">

<head>
    <title>Matrix Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('inc.style')

</head>

<body>
    <div id="loginbox">
        @if(Session::has('flash_message_error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">&CircleTimes;</button>
            <strong>{{ Session('flash_message_error') }}</strong>
        </div>
        @endif
        @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">&CircleTimes;</button>
            <strong>{{ Session('flash_message_success') }}</strong>
        </div>
        @endif
        <form id="loginform" class="form-vertical" method="post" action="{{ url('admin') }}">{{ csrf_field() }}
            <div class="control-group normal_text">
                <h3>
                    <img src="{{ asset('images/Backend_images/logo.png') }}" alt="Logo" />
                </h3>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg">
                            <i class="icon-user"> </i>
                        </span>
                        <input type="email" name="email" placeholder="Email" />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly">
                            <i class="icon-lock"></i>
                        </span>
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <span class="pull-left">
                    <a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a>
                </span>
                <span class="pull-right">
                    <input type="submit" href="index.html" value="Login" class="btn btn-success" />
                </span>
            </div>
        </form>
        <form id="recoverform" action="#" class="form-vertical">
            <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lo">
                        <i class="icon-envelope"></i>
                    </span>
                    <input type="text" placeholder="E-mail address" />
                </div>
            </div>

            <div class="form-actions">
                <span class="pull-left">
                    <a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a>
                </span>
                <span class="pull-right">
                    <a class="btn btn-info" />Recover</a>
                </span>
            </div>
        </form>
    </div>

    @include('inc.script')
</body>

</html>
