<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Fisherman Admin</title>

    <meta name="author" content="andfun">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
    <!-- Font -->
    <link rel="stylesheet" href="{{ asset('assets/admin/font/fonts.css') }}">

    <!-- Icon -->
    <link rel="stylesheet" href="{{ asset('assets/admin/icon/style.css') }}">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="images/favicon.png">

</head>

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <div class="wrap-login-page">
                <div class="flex-grow flex flex-column justify-center gap30">
                    <a href="index.html" id="site-logo-inner">

                    </a>
                    <div class="login-box">
                        <div>
                            <h3>{{trans_lang('dashboard')}}{{trans_lang('login')}}</h3>
                            <!-- <div class="body-text">Enter your email & password to login</div> -->
                        </div>
                        <form id="login_form" class="form-login flex flex-column gap24">
                            @csrf
                            <fieldset class="email">
                                <div class="body-title mb-10">{{trans_lang('email')}} <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" id="email" type="email" placeholder="{{trans_lang('email')}}" name="email" tabindex="0" value="" aria-required="true" required="">
                                <span class="invalid-feedback"></span>

                            </fieldset>
                            <fieldset class="password">
                                <div class="body-title mb-10">{{trans_lang('password')}} <span class="tf-color-1">*</span></div>
                                <input class="password-input" id="password" type="password" placeholder="{{trans_lang('password')}}" name="password" tabindex="0" value="" aria-required="true" required="">
                                <span class="invalid-feedback"></span>
                                <span class="show-pass">
                                    <i class="icon-eye view"></i>
                                    <i class="icon-eye-off hide"></i>
                                </span>

                            </fieldset>
                            <div class="input-box d-flex flex-column">
                                <p class="mb-3 text-danger" id="message"></p>
                            </div>

                            <button type="submit" class="tf-button w-full">{{trans_lang('login')}}</button>
                        </form>
                    </div>
                </div>
                <div class="text-tiny">Copyright © <?php echo date('Y') ?> r-mekiki.com, All rights reserved.</div>
            </div>
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <!-- Javascript -->
    <script src="{{ asset(path: 'assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#login_form").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                // console.log(formData.get('email'),formData.get('password'));
                $.ajax({
                    url: "{{ route('admin.login_store') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == true) {
                            window.location.href = "{{ route('admin.index')}}";
                        } else {

                            // if response has message, show the message , if not empty the message, clear the error messages
                            $('#message').html(response.message ?? '');

                            var errors = response.errors ?? {};

                            var fields = [
                                'email',
                                'password'
                            ];

                            fields.forEach(function(field) {
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


</body>


<!-- Mirrored from themesflat.co/html/remos/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Jan 2025 01:50:16 GMT -->
</html>
