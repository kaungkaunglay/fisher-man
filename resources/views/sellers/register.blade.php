@extends('includes.layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}" />
@endsection
@section('contents')
    <div class="login-box d-flex flex-column">
        <div class="login-header">
            <h2> Seller Registeration
                <p> Start Selling Your Products</p>
            </h2>
        </div>

        <!-- form start -->
        <form method="POST" name="register_seller_form" id="register_seller_form" class="input-container d-flex flex-column">
            @csrf
            <div class="input-box d-flex flex-column">
                <label for="username">Username</label>
                <input name="username" placeholder="John Doe" type="text" id="username" spellcheck="false" autofocus
                    required>
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-box d-flex flex-column">
                <label for="email">Email</label>
                <input name="email" placeholder="example@domain.com" type="text" id="email" spellcheck="false"
                    autofocus required>
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-box d-flex flex-column">
                <label for="pass">Password</label>
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
            <div class="input-box d-flex flex-column">
                <label for="line_id">Line ID</label>
                <input name="line_id" placeholder="U8189cf6745fc0d808977bdb0b9f22995" type="text" id="line_id"
                    autocomplete="off">
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-box d-flex flex-column">
                <label for="ship_name">Ship Name</label>
                <input name="ship_name" placeholder="Ship Name" type="text" id="ship_name" spellcheck="false"
                    autocomplete="off">
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-box d-flex flex-column">
                <label for="first_org_name">First Org Name</label>
                <input name="first_org_name" placeholder="First Org Name" type="text" id="first_org_name" spellcheck="false"
                    autocomplete="off">
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-box d-flex flex-column">
                <label for="trans_management">Trans Management</label>
                <input name="trans_management" placeholder="Trans Management" type="text" id="trans_management"
                    spellcheck="false" autocomplete="off">
                <span class="invalid-feedback"></span>
            </div>
            <input name="submit" type="submit" class="input-submit" value="Register">
            <div class="register">
                <p>Already have an account?
                    <a href="{{ route('login') }}" class="ms-1">Login</a>
                </p>
                <p class="mt-2">Are you a buyer?
                    <a href="{{ route('register') }}" class="ms-1">Register as buyer</a>
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
            $("#register_seller_form").submit(function(e) {
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
                                'line_id',
                                'ship_name',
                                'first_org_name',
                                'trans_management'
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
