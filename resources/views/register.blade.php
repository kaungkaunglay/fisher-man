@extends('includes.layout')
@section('title','Register')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}" />
@endsection
@section('contents')
    <div class="login-box d-flex flex-column">
        <div class="login-header mx-auto">
            <h2> Customer Registeration
            </h2>
            <p>Register Account & Buy Our Products</p>
        </div>

        <!-- form start -->
        <form id="register_form" name="register_seller_form" method="POST" class="input-container d-flex flex-column">
            @csrf
            <div class="input-box d-flex flex-column">
                <label for="username">Username</label>
                <input id="username" name="username" placeholder="John Doe" type="text" spellcheck="false" autofocus>
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-box d-flex flex-column">
                <label for="email">Email</label>
                <input id="email" name="email" placeholder="example@domain.com" type="text" spellcheck="false">
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-box d-flex flex-column">
                <label for="password">Password</label>
                <div class="input-group">
                    <input name="password" placeholder="********" type="password" id="password"
                        class="form-control bg-second">
                    <button class="btn password" tabindex="-1"><i class="fa-solid fa-eye"></i></button>
                </div>
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-box d-flex flex-column">
                <label for="confirm_password">Confirm Password</label>
                <div class="input-group">
                    <input id="confirm_password" name="confirm_password" placeholder="********" type="password"
                        class="form-control bg-second">
                    <button class="btn password" tabindex="-1" autocomplete="off"><i class="fa-solid fa-eye"></i></button>
                </div>
                <span class="invalid-feedback"></span>
            </div>
            <div class="row ph-no">
                <div class="input-box col-md-6 col-xs-12 d-flex flex-column">
                    <label for="first_phone">First Phone No</label>
                    <div class="input-group">
                        <select name="first_phone_extension">
                            <option value="+81">+81</option>
                            <option value="+95">+95</option>
                        </select>
                        <input id="first_phone" name="first_phone" placeholder="90-1234-5678" type="number"
                            class="form-control bg-second" autocomplete="off">
                    </div>
                    <span class="invalid-feedback"></span>
                </div>
                <div class="input-box col-md-6 col-xs-12 d-flex flex-column">
                    <label for="second_phone">Second Phone No</label>
                    <div class="input-group">
                        <select name="second_phone_extension">
                            <option value="+81">+81</option>
                            <option value="+95">+95</option>
                        </select>
                        <input id="second_phone" name="second_phone" placeholder="90-1234-5678" type="number"
                            class="form-control bg-second" autocomplete="off">
                    </div>
                    <span class="invalid-feedback"></span>
                </div>
            </div>

            <!-- Qr section -->
            <!-- <div class="d-flex mt-2">
                <div class="rounded text-center qr-box">
                    <button class="p-2 qr-btn">
                        <img src="{{ asset('assets/images/QR.svg') }}" alt="QR.svg">
                    </button>
                </div>
                <button class="bg-primary ps-3 py-2 pe-2 mt-auto mb-4 qr-btn qr-text">Scan Your Line ID Here</button>
            </div> -->

            <button name="submit" id="submit" type="submit" class="input-submit">Register</button>
            <div class="register">
                <p>Already have an account?
                    <a href="{{ route('login') }}" class="ms-1">Login</a>
                </p>
            </div>
        </form>
        <!-- form end -->
    </div>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#register_form").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                // first phone number with extension
                var firstPhoneExtension = $('select[name="first_phone_extension"]').val();
                var firstPhoneNumber = $('#first_phone').val();
                formData.set('first_phone', firstPhoneExtension + firstPhoneNumber);
                //second phone number with extension
                var secondPhoneExtension = $('select[name="second_phone_extension"]').val();
                var secondPhoneNumber = $('#second_phone').val();
                if (secondPhoneNumber) {
                    formData.set('second_phone', secondPhoneExtension + secondPhoneNumber);
                } else {
                    formData.set('second_phone', secondPhoneNumber);
                }

                $.ajax({
                    url: "{{ route('register_store') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == true) {
                            window.location.href = "{{ route('login') }}";
                        } else {
                            if (response.message) {
                                alert(response.message);
                            }
                            var errors = response.errors;
                            var fields = [
                                'username',
                                'email',
                                'password',
                                'confirm_password',
                                'first_phone',
                                'second_phone',
                                'line_id'
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
@endsection
