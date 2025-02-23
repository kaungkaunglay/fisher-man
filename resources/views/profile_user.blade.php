@extends('includes.layout')
@section('title', 'profile')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/profile_user.css') }}" />
@endsection
@section('contents')
    <!-- Breadcrumbs -->
    <section class="mt-2">
        <div class="container-custom">

            <nav aria-label="breadcrumb" class="py-4">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{trans_lang('home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans_lang('profile')}}</li>
                </ol>
            </nav>

        </div>
    </section>
    <!-- /Breadcrumbs -->

    <!-- Profile Section -->
    <section>
        <div class="profile_seller container-custom row">

            <!-- Profile Side -->
            <div class="col-12 col-lg-7 h-100 profile-side">
                <div class="d-md-flex gap-3">

                    <!-- profile img -->
                    <div class="w-100">
                        <img src="{{ asset('assets/images/account1.svg') }}" class="w-100" alt="">
                    </div>

                    <!-- Profile Info -->
                    <form action="#" id="update_basic_profile" method="POST"
                        class="w-100 profile-form d-flex flex-column">
                        @csrf
                        <!-- Form Headline -->
                        <div class="bg-primary text-white p-2">
                            <h2 class="fw-bold d-flex justify-content-between">{{trans_lang('info')}}
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
                            <div class="d-flex align-items-center">
                                <label class="w-25" for="username">{{trans_lang('name')}}</label>:
                                <input type="text" name="username" class="p-1 mt-1 ms-1 rounded-1" id="username"
                                    value="{{ $user->username }}" readonly>
                                <span class="invalid-feedback"></span>
                            </div>

                            <!-- email link -->
                            <div class="d-flex align-items-center">
                                <label class="w-25" for="email">{{trans_lang('email')}}</label>:
                                <input type="email" name="email" class="p-1 mt-2 ms-1 rounded-1" id="email"
                                    value="{{ $user->email }}" readonly>
                                <span class="invalid-feedback"></span>
                            </div>

                            <div class="d-flex align-items-center">
                                <label class="w-25" for="phone_number">{{trans_lang('phone_number')}}</label>:

                                <input type="tel" name="phone_number" class="p-1 mt-2 ms-1 rounded-1" id="phone_number"
                                    value="{{ $user->first_phone }}" readonly>
                                <span class="invalid-feedback"></span>
                            </div>
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
                                                <input type="checkbox" class="border form-check-input" role="switch"
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
                                                <input type="checkbox" class="border form-check-input" role="switch"
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
                                                <input type="checkbox" class="border form-check-input" role="switch"
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

                        <!-- alert box -->
                        <button class="mt-auto" data-bs-toggle="modal" data-bs-target="#modal_dialog"
                            onclick="event.preventDefault()">
                            <div class="alert alert-warning d-flex mb-0" role="alert">
                                <i class="fa-solid fa-triangle-exclamation bi flex-shrink-0 me-2 mt-1" role="img"
                                    aria-label="Warning:"></i>
                                <div class="text-start">
                                    {{trans_lang('payment_method_used_card_last_no')}}
                                </div>
                            </div>
                        </button>

                    </form>
                    <!-- /Profile Info -->

                    <!-- Form Modal -->
                    <div class="modal fade" id="modal_dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content bg-white">

                                <!-- Modal Header -->
                                <div class="modal-header text-white bg-primary p-3">
                                    <h2>{{trans_lang('verify')}}</h2>
                                </div>
                                <!-- /Modal Header -->

                                <!-- Modal Body -->
                                <div class="row modal-body p-3">

                                    <div class="col-12 col-md-6">
                                        <form id="shopRequestForm" enctype="multipart/form-data">
                                            <div class="mb-2 row align-items-center">
                                                <div class="col-lg-5 col-12">
                                                    <label for="exampleFormControlInput1" class="col-form-label">{{trans_lang('shop_name')}}</label>
                                                </div>
                                                <div class="col-lg-7 col-12">
                                                    <input type="text" class="form-control" name="shopName"
                                                        id="exampleFormControlInput1">
                                                </div>
                                            </div>

                                            <div class="mb-2 row align-items-center">
                                                <div class="col-lg-5 col-12">
                                                    <label for="exampleFormControlInput1" class="col-form-label">Trans
                                                        Management</label>
                                                </div>
                                                <div class="col-lg-7 col-12">
                                                    <input type="text" class="form-control" name="transManagement"
                                                        id="exampleFormControlInput1">
                                                </div>
                                            </div>

                                            <div class="mb-2 row align-items-center">
                                                <div class="col-lg-5 col-12">
                                                    <label for="exampleFormControlInput1"
                                                        class="col-form-label">{{trans_lang('email')}}</label>
                                                </div>
                                                <div class="col-lg-7 col-12">
                                                    <input type="email" class="form-control" name="email"
                                                        id="exampleFormControlInput1">
                                                </div>
                                            </div>

                                            <div class="mb-2 row align-items-center">
                                                <div class="col-lg-5 col-12">
                                                    <label for="exampleFormControlInput1" class="col-form-label">{{trans_lang('phone_number')}}</label>
                                                </div>
                                                <div class="col-lg-7 col-12">
                                                    <input type="tel" class="form-control" name="phoneNumber"
                                                        id="exampleFormControlInput1">
                                                </div>
                                            </div>

                                            <div class="mb-2 row align-items-center">
                                                <div class="col-lg-5 col-12">
                                                    <label for="exampleFormControlInput1" class="col-form-label">{{trans_lang('upload_img')}}</label>
                                                </div>
                                                <div class="col-lg-7 col-12">
                                                    <input type="file" class="form-control" name="avatar"
                                                        id="exampleFormControlInput1">
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
                                                {{trans_lang('scan_qr')}}
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <!-- /Modal Body -->

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button class="common-btn" data-bs-dismiss="modal">{{trans_lang('cancle')}}</button>
                                    <button class="common-btn" type="submit">{{trans_lang('request')}}</button>
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
                            {{trans_lang('detail')}}

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
                        <div class="d-flex align-items-center">
                            <label class="w-25" for="address">{{trans_lang('address')}}</label>:
                            <input type="text" class="p-1 mt-2 ms-1 rounded-1" id="address"
                                value="house no street,sue distict,city" readonly>
                            <span class="invalid-feedback"></span>
                        </div>

                        <!-- phone-number link -->
                        <div class="d-flex align-items-start">
                            <label class="w-25" for="tel">{{trans_lang('phone_number')}}</label>:
                            <div class="ms-1 d-flex phone-no-container">
                                <!-- <a href="tel:"> -->
                                <input type="tel" class="p-1 mt-2 rounded-1" id="first_phone"
                                    value="{{ $user->first_phone }}" readonly>

                                <!-- </a> -->
                                <b class="cor align-content-end">, </b>
                                <!-- <a href="tel:"> -->
                                <input type="tel" class="p-1 mt-2 rounded-1" value="{{ $user->second_phone }}"
                                    id="second_phone" readonly>
                                <span class="invalid-feedback"></span>
                                <!-- </a> -->
                            </div>
                        </div>

                    </div>
                    <!-- /Form Content -->

                </form>
                <!-- /Detail Info -->

                <!-- button group -->
                <div class="buttons d-flex gap-2 mt-3">
                    <button class="common-btn">{{trans_lang('upload_product')}}</button>
                    <button class="common-btn">{{trans_lang('check_order')}}</button>
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

    <!-- Main Content => disable -->
    <div class="container-custom mt-2 d-none">
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb" class="py-4">
            <ol class="breadcrumb mb-0 bg-transparent">
                <li class="breadcrumb-item"><a href="./home.html">{{trans_lang('home')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Porfile</li>
            </ol>
        </nav>
        <!-- ./Breadcrumbs -->


        <!-- Profile Section -->
        <div class="profile_seller">

            <div class="row">

                <!-- Profile Side -->
                <div class="col-12 col-lg-7">

                    <div class="row">

                        <!-- profile img -->
                        <div class="col-12 col-lg-6">
                            <img src="{{ asset('assets/images/account1.svg') }}" class="w-100" alt="">
                        </div>

                        <!-- profile info -->
                        <form action="#" class="col-12 col-lg-6 mt-2 mt-lg-0 profile-form">

                            <div class="d-flex justify-content-end gap-4">
                                <button type="submit" class="save">
                                    <i class="fa-solid fa-save fs-5 text-danger"></i>
                                </button>
                                <button class="edit">
                                    <i class="fa-solid fa-pen-to-square fs-5 text-danger"></i>
                                </button>
                                <button class="cancel">
                                    <i class="fa-solid fa-x fs-5 text-danger"></i>
                                </button>
                            </div>

                            <!-- user name -->
                            <div class="d-flex align-items-center mt-1">
                                <label class="w-25" for="name">{{trans_lang('name')}}</label>:
                                <input type="text" class="p-1 ms-1 rounded-1" id="name"
                                    value="{{ $user->username }}" readonly>
                            </div>

                            <!-- email link -->
                            <div class="d-flex align-items-center link-contain mt-2">
                                <label class="w-25" for="email">{{trans_lang('email')}}</label>:
                                <a href="mailto:{{ $user->email }}" class="p-1">{{ $user->email }}</a>
                                <input type="email" class="p-1 ms-1 rounded-1" id="email"
                                    value="{{ $user->email }}" readonly>
                            </div>

                            <!-- line link -->
                            <div class="d-flex align-items-center link-contain mt-2">
                                <label class="w-25" for="line">Line</label>:
                                <a href="#" class="p-1">{{ $user->line_id }}</a>
                                <input type="text" class="p-1 ms-1 rounded-1" id="line"
                                    value="{{ $user->line_id }}" readonly>
                            </div>

                            <!-- organization link -->
                            <div class="d-flex align-items-center mt-2">
                                <label class="w-25" for="organize">{{trans_lang('organize')}}</label>:
                                <input type="text" class="p-1 ms-1 rounded-1" id="organize"
                                    value="Chat with name or Organization name" readonly>
                            </div>

                            <div>
                                <i class="fa-brands fa-line fs-2 mt-1"></i>
                            </div>

                        </form>
                        <!-- /profile info -->

                        <!-- detail info -->
                        <form action="#" class="col-12 col-lg-12 mt-4 profile-form">

                            <h2 class="fw-bold d-flex justify-content-between">
                                {{trans_lang('detail')}}
                                <div class="d-flex justify-content-end gap-4">
                                    <button type="submit" class="save">
                                        <i class="fa-solid fa-save fs-5 text-danger"></i>
                                    </button>
                                    <button class="edit">
                                        <i class="fa-solid fa-pen-to-square fs-5 text-danger"></i>
                                    </button>
                                    <button class="cancel">
                                        <i class="fa-solid fa-x fs-5 text-danger"></i>
                                    </button>
                                </div>
                            </h2>

                            <!-- address -->
                            <div class="d-flex align-items-center mt-2">
                                <label class="w-25" for="address">{{trans_lang('address')}}/label>:
                                <input type="text" class="p-1 ms-1 rounded-1" id="address"
                                    value="house no street,sue distict,city" readonly>
                            </div>

                            <!-- phone-number link -->
                            <div class="d-flex align-items-start link-contain">
                                <label class="w-25" for="tel">{{trans_lang('phone_number')}}</label>:
                                <div class="ms-1 d-flex phone-no-container">
                                    <a href="tel:{{ $user->first_phone }}" class="p-1">{{ $user->first_phone }}</a>
                                    <input type="tel" class="p-1 mt-2 rounded-1" id="tel"
                                        value="{{ $user->first_phone }}" readonly>
                                    <b class="cor align-content-end">, </b>
                                    <a href="tel:{{ $user->second_phone }}" class="p-1">{{ $user->second_phone }}</a>
                                    <input type="tel" class="p-1 mt-2 rounded-1 sec-phone"
                                        value="{{ $user->second_phone }}" readonly>
                                </div>
                            </div>

                        </form>
                        <!-- /detail info -->

                        <!-- button group -->
                        <div class="buttons d-flex gap-2 mt-3">
                            <button class="btn btn-outline-primary px-4 w-50 py-1">{{trans_lang('request_shops')}}</button>
                            <button class="btn btn-outline-primary px-4 ms-2 w-50">{{trans_lang('check_order')}}</button>
                        </div>

                    </div>

                </div>
                <!-- /Profile Side -->

                <!-- Map Side -->
                <div class="col-12 col-lg-5 mt-3 mt-lg-0">
                    <h6 class="fw-bold">{{trans_lang('select_location')}}</h6>
                    <iframe class="w-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d250151.16276620553!2d104.72537013378734!3d11.579654014369655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109513dc76a6be3%3A0x9c010ee85ab525bb!2sPhnom%20Penh%2C%20Cambodia!5e0!3m2!1sen!2ssg!4v1736774811619!5m2!1sen!2ssg"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <!-- /Map-->

            </div>
            <!-- /Map Side -->

        </div>
    </section>
    <!-- /Profile Section -->

        <!-- History Table -->
        <div class="history">
            <h2 class="title">{{trans_lang('history')}}/h2>
            <ol class="history-list">
                <li>
                    <div class="history-item row">
                        <div class="col-md-8 col-sm-12">
                            <h3 class="shop-name">{{trans_lang('shop_name')}}</h3>
                            <p class="payment">{{trans_lang('payment_method_used_card_last_no')}}</p>
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
                            <h3 class="shop-name">{{trans_lang('shop_name')}}</h3>
                            <p class="payment">{{trans_lang('payment_method_used_card_last_no')}}</p>
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
                            <h3 class="shop-name">{{trans_lang('shop_name')}}</h3>
                            <p class="payment">{{trans_lang('payment_method_used_card_last_no')}}</p>
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
                            <h3 class="shop-name">{{trans_lang('shop_name')}}</h3>
                            <p class="payment">{{trans_lang('payment_method_used_card_last_no')}}</p>
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
                            <h3 class="shop-name">{{trans_lang('shop_name')}}</h3>
                            <p class="payment">{{trans_lang('payment_method_used_card_last_no')}}</p>
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
        <!-- ./History Table -->


    </div>
    <!-- ./Main Content -->

    <!-- All Scripts -->
    <script src="{{ asset('assets/js/profile-seller.js') }}"></script>
    <script>
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
    </script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#shopRequestForm").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('buyer.request_shop') }}",
                type: 'POST',
                dataType: 'json',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == true) {
                        window.location.href = "{{ route('profile_seller') }}";
                    } else {
                    }
                }
            });
        });
    });
</script>
    <!-- /All Scripts -->

@endsection
