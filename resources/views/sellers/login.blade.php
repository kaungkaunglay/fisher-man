@extends('includes.layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}" />
@endsection
@section('contents')

    <div class="login-box d-flex flex-column">

        <div class="login-header">
            <h2> Login
                <p> Welcome to Fisherman Login Page</p>
            </h2>
        </div>

        <!-- form start -->
        <form method="POST" name="login_seller_form" class="input-container d-flex flex-column">

            <div class="input-box  d-flex flex-column">
                <label for="user">Username</label>
                <div class="input-group">
                    <input name="username" placeholder="Username or Email" type="text" id="user"
                        class="form-control bg-second ">
                    <button class="btn" tabindex="-1"><i class="fa-solid fa-user"></i></button>
                </div>
            </div>

            <div class="input-box  d-flex flex-column">
                <label for="pass">Password</label>
                <div class="input-group">
                    <input name="password" placeholder="********" type="password" id="pass"
                        class="form-control bg-second ">
                    <button class="btn" tabindex="-1"><i class="fa-solid fa-eye"></i></button>
                </div>
            </div>

            <div class="pw-setting d-flex">
                <div class="remember">
                    <input type="checkbox" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <div class="forgot-pw">
                    <a href="#">Forgot password</a>
                </div>
            </div>
            <input type="submit" class="input-submit" value="Login">

            <div class="register">
                <span>Don't have an account?
                    <a href="{{ route('register_seller') }}" class="ms-1">Register</a>
                </span>
                <p class="">(or)</p>
            </div>
            <div class="line-wpr green-bg">
                <a href="#">
                    <img loading="lazy" class="icon_social" src="{{ asset('assets/icons/custom/line.png') }}" alt="Line">
                    Login with Line
                </a>
            </div>
            <div class="icon-wpr">
                <a href=""><img class="icon_social" src="{{ asset('assets/icons/custom/google.png') }}"
                        alt="Google"></a>
                <a href=""><img class="icon_social" src="{{ asset('assets/icons/custom/facebook.png') }}"
                        alt="Facebook"></a>
            </div>
        </form>
        <!-- form end -->
    </div>

    {{-- All Script --}}
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#login_seller_form").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('login_store_seller') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == true) {
                            window.location.href = "{{ route('login_seller') }}";
                        } else {
                            if (response.message) {
                                alert(response.message);
                            }
                        }
                    }
                });
            });
        });
    </script>
@endsection
