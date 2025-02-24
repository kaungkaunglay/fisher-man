@extends('includes.layout')
@section('title', 'profile')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/profile_user.css') }}" />
@endsection

@section('contents')
    @php
        $hasShopRequest = \App\Models\Shop::where('user_id', auth_helper()->id())->exists();
    @endphp
    <!-- Breadcrumbs -->
    <section class="mt-2">
        <div class="container-custom">

            <nav aria-label="breadcrumb" class="py-4">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans_lang('home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans_lang('profile') }}</li>
                </ol>
            </nav>

        </div>
    </section>
    <!-- /Breadcrumbs -->

    <!-- Profile Section -->
    <section>
        <div class="profile_seller container-custom row">

            <div class="col-12">
                @include('messages.index')
            </div>

            <!-- Profile Side -->
            <div class="col-12 col-lg-7 h-100 profile-side">
                <div class="d-md-flex gap-3">

                    <!-- profile img -->
                    <div class="w-100">
                        <img src="{{ $user->avatar ?? asset('assets/images/account1.svg') }}" class="w-100" alt="">
                    </div>

                    <!-- Profile Info -->
                    <form action="#" id="update_basic_profile" method="POST"
                        class="w-100 profile-form d-flex flex-column">
                        @csrf
                        <!-- Form Headline -->
                        <div class="bg-primary text-white p-2">
                            <h2 class="fw-bold d-flex justify-content-between">{{ trans_lang('info') }}
                                <div class="d-flex justify-content-end gap-4">
                                    <button type="submit" class="save">
                                        <i class="fa-solid fa-save fs-5 text-white"></i>
                                    </button>
                                    <button class="edit">
                                        <i class="fa-solid fa-pen-to-square fs-5 text-white"></i>
                                    </button>
                                    <button class="cancel">
                                        <i class="fa-solid fa-x fs-5 text-white"></i>
                                    </button>
                                </div>
                            </h2>
                        </div>
                        <!-- /Form Headline -->

                        <!-- /Form Content -->
                        <div class="px-2 py-3">
                            <!-- user name -->
                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <label class="w-25" for="username">{{ trans_lang('name') }}</label>:
                                    <input type="text" name="username" class="p-1 mt-1 ms-1 rounded-1" id="username"
                                        value="{{ $user->username }}" readonly>

                                </div>
                                <span class="invalid-feedback"></span>
                            </div>

                            <!-- email link -->
                            <div class="form-group">
                                <div class="d-flex align-items-center form-group">
                                    <label class="w-25" for="email">{{ trans_lang('email') }}</label>:
                                    <input type="email" name="email" class="p-1 mt-2 ms-1 rounded-1" id="email"
                                        value="{{ $user->email }}" readonly>

                                </div>
                                <span class="invalid-feedback"></span>
                            </div>

                            {{-- <div class="d-flex align-items-center">
                                <label class="w-25" for="phone_number">{{ trans_lang('phone_number') }}</label>:

                                <input type="tel" name="phone_number" class="p-1 mt-2 ms-1 rounded-1" id="phone_number"
                                    value="{{ $user->first_phone }}" readonly>
                                <span class="invalid-feedback"></span>
                            </div> --}}
                            <!-- account checkbox -->
                            <div class="mt-2">
                                <!-- form on state -->
                                <ul class="d-flex gap-4 checkbox-list-on">
                                    <li>
                                        <div class="form-group d-flex flex-column gap-1">
                                            <label for="">
                                                <i class="fa-brands fa-line fs-2 mt-1"></i>
                                            </label>
                                            <div class="form-check form-switch align-self-center">
                                                <input type="checkbox" id="line_login" class="border form-check-input" role="switch"
                                                    @if ($user->checkProvider('line')) checked @endif />
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group d-flex flex-column gap-1">
                                            <label for="">
                                                <i class="fa-brands fa-facebook fs-2 mt-1"></i>
                                            </label>
                                            <div class="form-check form-switch align-self-center">
                                                <input type="checkbox" id="facebook_login" class="border form-check-input" role="switch"
                                                    @if ($user->checkProvider('facebook')) checked @endif />
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-group d-flex flex-column gap-1">
                                            <label for="">
                                                <i class="fa-brands fa-google fs-2 mt-1"></i>
                                            </label>
                                            <div class="form-check form-switch align-self-center">
                                                <input type="checkbox" id="google_login" class="border form-check-input" role="switch"
                                                    @if ($user->checkProvider('google')) checked @endif />
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="input-box d-flex flex-column">
                            <span class="mb-3 text-danger" id="message"></span>
                        </div>
                        <!-- /Form Content -->

                        @if (!$hasShopRequest)
                            <!-- alert box -->
                        <button class="mt-auto" data-bs-toggle="modal" data-bs-target="#modal_dialog"
                        onclick="event.preventDefault()">
                        <div class="alert alert-warning d-flex mb-0" role="alert">
                            <i class="fa-solid fa-triangle-exclamation bi flex-shrink-0 me-2 mt-1" role="img"
                                aria-label="Warning:"></i>
                            <div class="text-start">
                                {{ trans_lang('payment_method_used_card_last_no') }}
                            </div>
                        </div>
                    </button>
                        @else
                            <!-- alert box -->

                        <div class="alert alert-warning d-flex mb-0" role="alert">
                            <i class="fa-solid fa-triangle-exclamation bi flex-shrink-0 me-2 mt-1" role="img"
                                aria-label="Warning:"></i>
                            <div class="text-start">
                                You have been requested
                                {{-- {{ trans_lang('payment_method_used_card_last_no') }} --}}
                            </div>
                        </div>
                    {{-- </button> --}}
                        @endif



                    </form>
                    <!-- /Profile Info -->

                    <!-- Form Modal -->
                    <div class="modal fade" id="modal_dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content bg-white">

                                <!-- Modal Header -->
                                <div class="modal-header text-white bg-primary p-3">
                                    <h2>{{ trans_lang('verify') }}</h2>
                                </div>
                                <!-- /Modal Header -->

                                <!-- Modal Body -->
                                <div class="row modal-body p-3">

                                    <div class="col-12 col-md-6">
                                        <form id="shopRequestForm" enctype="multipart/form-data">
                                            <div class="mb-2 row align-items-center">
                                                <div class="col-lg-5 col-12">
                                                    <label for="exampleFormControlInput1"
                                                        class="col-form-label">{{ trans_lang('shop_name') }}</label>
                                                </div>
                                                <div class="col-lg-7 col-12 input-box">
                                                    <input type="text" class="form-control" name="shopName"
                                                        id="shopName">
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="mb-2 row align-items-center">
                                                <div class="col-lg-5 col-12">
                                                    <label for="exampleFormControlInput1" class="col-form-label">Trans
                                                        Management</label>
                                                </div>
                                                <div class="col-lg-7 col-12 input-box">
                                                    <input type="text" class="form-control" name="transManagement"
                                                        id="transManagement">
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="mb-2 row align-items-center">
                                                <div class="col-lg-5 col-12">
                                                    <label for="exampleFormControlInput1"
                                                        class="col-form-label">{{ trans_lang('email') }}</label>
                                                </div>
                                                <div class="col-lg-7 col-12 input-box">
                                                    <input type="email" class="form-control" name="transEmail"
                                                        id="transEmail">
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="mb-2 row align-items-center">
                                                <div class="col-lg-5 col-12">
                                                    <label for="exampleFormControlInput1"
                                                        class="col-form-label">{{ trans_lang('phone_number') }}</label>
                                                </div>
                                                <div class="col-lg-7 col-12 input-box">
                                                    <input type="tel" class="form-control" name="phoneNumber"
                                                        id="phoneNumber">
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="mb-2 row align-items-center">
                                                <div class="col-lg-5 col-12">
                                                    <label for="exampleFormControlInput1"
                                                        class="col-form-label">{{ trans_lang('upload_img') }}</label>
                                                </div>
                                                <div class="col-lg-7 col-12 input-box">
                                                    <input type="file" class="form-control" name="avatar"
                                                        id="avatar">
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                            </div>


                                    </div>

                                    <!-- Qr -->
                                    <div class="col-12 col-md-6">
                                        <div class="border h-100 d-flex flex-column justify-content-between">
                                            <div class="w-100 qr-box mx-auto">
                                                <img src="{{ asset('assets/images/QR.svg') }}" alt="">
                                            </div>
                                            <p class="w-auto px-2 py-3 bg-primary text-center text-white">
                                                {{ trans_lang('scan_qr') }}
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <!-- /Modal Body -->

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button class="common-btn"
                                        data-bs-dismiss="modal">{{ trans_lang('cancle') }}</button>
                                    <button class="common-btn" type="submit">{{ trans_lang('request') }}</button>
                                </div>
                                </form>
                                <!-- /Modal Footer -->

                            </div>
                        </div>
                    </div>
                    <!-- /Form Modal -->

                </div>

                <!-- Detail Info -->
                <form action="" id="update_contact_details" method="POST" class="w-100 mt-3 profile-form">

                    <!-- Form Headline -->
                    <div>
                        <h2 class="fw-bold d-flex justify-content-between bg-primary text-white p-2">
                            {{ trans_lang('detail') }}

                            <!-- button group -->
                            <div class="d-flex justify-content-end gap-4">
                                <button type="submit" class="save">
                                    <i class="fa-solid fa-save fs-5 text-white"></i>
                                </button>
                                <button class="edit">
                                    <i class="fa-solid fa-pen-to-square fs-5 text-white"></i>
                                </button>
                                <button class="cancel">
                                    <i class="fa-solid fa-x fs-5 text-white"></i>
                                </button>
                            </div>
                        </h2>
                    </div>
                    <!-- /Form Headline -->

                    <!-- Form Content -->
                    <div class="px-2 py-3">

                        <!-- address -->
                        <div class="form">
                            <div class="d-flex align-items-center">
                                <label class="w-25" for="address">{{ trans_lang('address') }}</label>:
                                <input type="text" name="address" class="p-1 mt-2 ms-1 rounded-1" id="address"
                                    value="{{ $user->address }}" readonly>

                            </div>
                            <span class="invalid-feedback"></span>
                        </div>

                        <!-- phone-number link -->
                        <div class="form-group">
                            <div class="d-flex align-items-start">
                                <label class="w-25" for="tel">{{ trans_lang('phone_number') }}</label>:
                                <div class="ms-1 d-flex phone-no-container">
                                    <!-- <a href="tel:"> -->
                                    <input type="tel" name="first_phone" class="p-1 mt-2 rounded-1" id="first_phone"
                                        value="{{ $user->first_phone }}" readonly>

                                    <!-- </a> -->
                                    <b class="cor align-content-end">, </b>
                                    <!-- <a href="tel:"> -->
                                    <input type="tel" name="second_phone" class="p-1 mt-2 rounded-1" value="{{ $user->second_phone }}"
                                        id="second_phone" readonly>

                                    <!-- </a> -->
                                </div>
                            </div>
                            <span class="invalid-feedback"></span>
                        </div>

                    </div>
                    <!-- /Form Content -->

                </form>
                <!-- /Detail Info -->

                <!-- button group -->
                <div class="buttons d-flex gap-2 mt-3">
                    <button class="common-btn">{{ trans_lang('upload_product') }}</button>
                    <button class="common-btn">{{ trans_lang('check_order') }}</button>
                </div>

            </div>
            <!-- /Profile Side -->

        </div>
    </section>
    <!-- /Profile Section -->

    <!-- History Table -->
    <section>
        <div class="container-custom">

            <div class="history rounded-2">
                <h2 class="title">History</h2>
                <ol class="history-list">
                    <li>
                        <div class="history-item row">
                            <div class="col-md-8 col-sm-12">
                                <h3 class="shop-name">Shop Name</h3>
                                <p class="payment">Payment method & used card last no.</p>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <span class="date">15/06/2024</span>
                                <a class="download" download="">
                                    <i class="fa-solid fa-download"></i>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="history-item row">
                            <div class="col-md-8 col-sm-12">
                                <h3 class="shop-name">Shop Name</h3>
                                <p class="payment">Payment method & used card last no.</p>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <span class="date">15/06/2024</span>
                                <a class="download" download="">
                                    <i class="fa-solid fa-download"></i>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="history-item row">
                            <div class="col-md-8 col-sm-12">
                                <h3 class="shop-name">Shop Name</h3>
                                <p class="payment">Payment method & used card last no.</p>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <span class="date">15/06/2024</span>
                                <a class="download" download="">
                                    <i class="fa-solid fa-download"></i>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="history-item row">
                            <div class="col-md-8 col-sm-12">
                                <h3 class="shop-name">Shop Name</h3>
                                <p class="payment">Payment method & used card last no.</p>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <span class="date">15/06/2024</span>
                                <a class="download" download="">
                                    <i class="fa-solid fa-download"></i>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="history-item row">
                            <div class="col-md-8 col-sm-12">
                                <h3 class="shop-name">Shop Name</h3>
                                <p class="payment">Payment method & used card last no.</p>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <span class="date">15/06/2024</span>
                                <a class="download" download="">
                                    <i class="fa-solid fa-download"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                </ol>
            </div>

        </div>

    </section>
    <!-- ./History Table -->

    <!-- All Scripts -->
    <script src="{{ asset('assets/js/profile-seller.js') }}"></script>
    {{-- <script>
        $(document).ready(function() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    console.log("Found your location \nLat : " + position.coords.latitude + " \nLang :" +
                        position.coords.longitude);
                }, function(error) {
                    console.error("Error getting location:", error);
                });
            }
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#shopRequestForm").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('buyer.request_shop') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response.status);
                        if (response.status == true) {
                            window.location.href = "{{ route('profile_user') }}";
                            // console.log('success');
                            // window.location.reload();
                        } else {
                            var errors = response.errors ?? {};

                            console.log(errors);

                            var fields = [
                                'shopName',
                                'transManagement',
                                'transEmail',
                                'phoneNumber',
                                'avatar'
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
    <!-- /All Scripts -->

@endsection

@section('script')
    <script>
        $(document).ready(function() {

            function handleErrorMessages(fields, errors, message) {
                $('#message').html(message ?? '');

                fields.forEach(function(field) {
                    var fieldGroup = $('#' + field).closest('.form-group');
                    var errorSpan = fieldGroup.find('span.invalid-feedback');

                    if (errors[field]) {
                        errorSpan.addClass('d-block').html(errors[field]);
                    } else {
                        errorSpan.removeClass('d-block').html('');
                    }
                });
            }

            function sendUpdateBasicData(formData,cur) {
                $.ajax({
                    url: "{{ route('update_basic_profile') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response.status);
                        if (response.status) {

                            console.log(response.message);

                            window.location.reload();
                            // unactiveForm(cur);
                        } else {
                            var fields = ['username', 'email'];
                            handleErrorMessages(fields, response.errors, response.message);
                        }
                    }
                });
            }



            function sendUpdateDetailData(formData,cur) {
                $.ajax({
                    url: "{{ route('update_contact_details') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response.status);
                        if (response.status) {

                            console.log(response.message);

                            window.location.reload();
                            // unactiveForm(cur);

                        } else {
                            var fields = ['address', 'first_phone','second_phone'];
                            handleErrorMessages(fields, response.errors, response.message);
                        }
                    }
                });
            }

            $("#update_basic_profile").submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                var cur = $(this);

                sendUpdateBasicData(formData,cur);
            });

            $("#update_contact_details").submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                var cur = $(this);

                sendUpdateDetailData(formData,cur);
            });

            // Function to handle login/logout for OAuth providers
            function handleOAuthLogin(provider) {
                if ($('#' + provider + '_login').prop('checked')) {
                    window.location.href = `/login/${provider}`;
                } else {
                    remove_oauth(provider);
                }
            }

            // Function to remove OAuth provider association
            function remove_oauth(provider) {
                $.ajax({
                    url: `/oauth/remove/${provider}`,
                    method: 'POST',
                    data: { provider: provider },  // Pass the provider info in the data
                    success: function(response) {
                        window.location.reload();
                        console.log(response.message);
                    },
                    error: function(xhr) {
                        console.error(xhr);
                    }
                });
            }

            // Attach click event handlers to each OAuth provider login button
            $('#line_login').click(function() {
                handleOAuthLogin('line');
            });

            $('#facebook_login').click(function() {
                handleOAuthLogin('facebook');
            });

            $('#google_login').click(function() {
                handleOAuthLogin('google');
            });

        });
    </script>

@endsection
