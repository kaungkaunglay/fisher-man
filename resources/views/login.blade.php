@extends('includes.layout')
@section('title','Login')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}" />
@endsection
@section('contents')
{{-- @dd(ITE_KEY')) --}}
    <div class="login-box d-flex flex-column">

        <div class="login-header">
            <h2> Login
                <p> Welcome to Fisherman Login Page</p>
            </h2>
        </div>

        <!-- form start -->
        <form method="POST" id="update_basic" name="login_form" class="input-container d-flex flex-column">
            @csrf
            <div class="input-box d-flex flex-column">
                <label for="username">Username</label>
                <div class="input-group">
                    <input id="username" name="username" placeholder="Username or Email" type="text" class="form-control">
                    <button class="btn" tabindex="-1"><i class="fa-solid fa-user"></i></button>
                </div>
                <span class="invalid-feedback"></span>
            </div>

            <div class="input-box d-flex flex-column">
                <label for="password">Password</label>
                <div class="input-group">
                    <input name="password" placeholder="********" type="password" id="password" class="form-control">
                    <button class="btn password" tabindex="-1"><i class="fa-solid fa-eye"></i></button>
                </div>
                <span class="invalid-feedback"></span>
            </div>

            <div class="input-box d-flex flex-column mx-auto">
                <div class="g-recaptcha" data-sitekey="{{env('RECAPTCHA_SITE_KEY')}}"></div>
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-box d-flex flex-column">
                <span class="mb-3 text-danger" id="message"></span>
            </div>
            <div class="pw-setting d-flex">
                <div class="remember">
                    <input type="checkbox" name="remember" id="remember" value="1">
                    <label for="remember">Remember me</label>
                </div>

                <div class="forgot-pw">
                    <a href="{{ route('forgotpassword') }}">Forgot password</a>
                </div>
            </div>

            <button name="submit" id="submit" type="submit" class="input-submit">Login</button>

            <div class="register">
                <span>Don't have an account?
                    <a href="{{ route('register') }}" class="ms-1">Register</a>
                </span>
                <p class="">(or)</p>
            </div>
            <div class="line-wpr green-bg">
                <a href="{{route('line.login')}}">
                    <img class="icon_social" src="{{ asset('assets/icons/custom/line.png') }}" alt="Line">
                    Login with Line
                </a>
            </div>
            <div class="icon-wpr">
                <a href="{{route('google.login')}}"><img class="icon_social" src="{{ asset('assets/icons/custom/google.png') }}" alt="Google"></a>
                <a href="{{route('facebook.login')}}"><img class="icon_social" src="{{ asset('assets/icons/custom/facebook.png') }}" alt="Facebook"></a>
            </div>

        </form>
        <!-- form end -->
    </div>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#update_basic").submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('login_store') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.status == true) {
                            window.location.href = "{{ route('home') }}";
                        } else {

                            // if response has message, show the message , if not empty the message, clear the error messages
                            $('#message').html(response.message ?? '');

                            var errors = response.errors ?? {};

                            var fields = [
                                'username',
                                'password',
                                'g-recaptcha-response'
                            ];

                            fields.forEach(function (field) {
                                if (errors[field]) {
                                    $('#' + field)
                                        .closest('.input-box')
                                        .find('span.invalid-feedback')
                                        .addClass('d-block')
                                        .html(errors[field]);
                                } else {
                                    $('#' + field)
                                        .closest('.input-box')
                                        .find('span.invalid-feedback')
                                        .removeClass('d-block')
                                        .html('');
                                }
                            });

                        }
                    }
                });
            });
        });
    </script>
@endsection
