@extends('includes.layout')
@section('title', 'support')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/support.css') }}" />
@endsection
@section('contents')
    <div class="container m-t-20">

        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb" class="py-4">
            <div class="container">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans_lang('home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans_lang('support') }}</li>
                </ol>
            </div>
        </nav>

        <!-- Help -->
        <div class="accordion w-100" id="basicAccordion">
            @foreach ($faqs as $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header " id="heading{{ $faq->id }}">
                        <button class="accordion-button collapsed title" type="button" data-mdb-toggle="collapse"
                            data-mdb-target="#basicAccordionCollapse{{ $faq->id }}" aria-expanded="false"
                            aria-controls="basicAccordionCollapseOne">
                            {{ $faq->question }}
                        </button>
                    </h2>
                    <div id="basicAccordionCollapse{{ $faq->id }}" class="accordion-collapse collapse"
                        aria-labelledby="heading{{ $faq->id }}" data-mdb-parent="#basicAccordion">
                        <div class="accordion-body">
                            <strong>{{ $faq->answer }}</strong>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="text-success">
                <hr>
            </div>
            <!-- support form  -->
            <div class="container support-form mb-4">
                <!-- Success Message -->
                <div id="success-message" class="alert alert-success d-none"></div>
                
                <div class="row">
                    <nav class="mb-3">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                                aria-selected="true">{{ trans_lang('contact') }}</button>
                            <button class="nav-link" id="nav-wishlist-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-wishlist" type="button" role="tab" aria-controls="nav-wishlist"
                                aria-selected="false">{{ trans_lang('wishlist') }}</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-contact" role="tabpanel"
                            aria-labelledby="nav-contact-tab" tabindex="0">
                            <form method="POST" id="contact-form">
                                @csrf
                                <div class="mb-3 contact-box">
                                    <label for="name" class="form-label">{{ trans_lang('name') }}</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        value="{{ auth_helper()->check() ? auth_helper()->user()->username : '' }}"
                                        placeholder="{{ trans_lang('name') }}" @if(auth_helper()->check()) readonly @endif>
                                    <span class="invalid-feedback"></span>

                                </div>

                                <div class="mb-3 contact-box">
                                    <label for="phone" class="form-label">{{ trans_lang('phone_number') }}</label>
                                    <input type="tel" name="phone" class="form-control" id="phone"
                                        value="{{ auth_helper()->check() ? auth_helper()->user()->first_phone : '' }}"
                                        placeholder="{{ trans_lang('phone_number') }}">
                                    <span class="invalid-feedback"></span>
                                </div>

                                <div class="mb-3 contact-box">
                                    <label for="email" class="form-label">{{ trans_lang('email') }}</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{ auth_helper()->check() ? auth_helper()->user()->email : '' }}"
                                        placeholder="{{ trans_lang('email') }}" @if(auth_helper()->check()) readonly @endif>
                                    <span class="invalid-feedback"></span>
                                </div>

                                <div class="mb-3 contact-box">
                                    <label for="description" class="form-label">{{ trans_lang('description') }}</label>
                                    <textarea class="form-control" name="description" id="description" rows="3"
                                        placeholder="{{ trans_lang('description') }}"></textarea>
                                    <span class="invalid-feedback"></span>
                                </div>
                                <div class="mb-3 contact-box">
                                    <label for="recaptcha" class="form-label">ReCaptcha:</label>
                                    <div class="g-recaptcha" data-sitekey="6Leh4t8qAAAAAOWxMlheFOxzPhOL8STyf9FsI7WE">
                                    </div>
                                </div>

                                <div class="text-center mb-mobile-3 mb-3">
                                    <button type="submit" class="common-btn">{{ trans_lang('submit') }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-wishlist" role="tabpanel" aria-labelledby="nav-wishlist-tab"
                            tabindex="0">
                            <form method="POST" id="wishlistForm">
                                @csrf
                                <div class="mb-3 wish-box">
                                    <label for="name" class="form-label">{{ trans_lang('name') }}</label>
                                    <input type="text" name="wish_name" class="form-control" id="wish_name"
                                        placeholder="{{ trans_lang('name') }}"
                                        value="{{ auth_helper()->check() ? auth_helper()->user()->username : '' }}" @if(auth_helper()->check()) readonly @endif>
                                    <span class="invalid-feedback"></span>
                                </div>

                                <div class="mb-3 wish-box">
                                    <label for="phone" class="form-label">{{ trans_lang('phone_number') }}</label>
                                    <input type="tel" name="wish_phone" class="form-control" id="wish_phone"
                                        placeholder="{{ trans_lang('phone_number') }}"
                                        value="{{ auth_helper()->check() ? auth_helper()->user()->first_phone : '' }}">
                                    <span class="invalid-feedback"></span>
                                </div>

                                <div class="mb-3 wish-box">
                                    <label for="email" class="form-label">{{ trans_lang('email') }}</label>
                                    <input type="email" name="wish_email" class="form-control" id="wish_email"
                                        placeholder="{{ trans_lang('email') }}"
                                        value="{{ auth_helper()->check() ? auth_helper()->user()->email : '' }}" @if(auth_helper()->check()) readonly @endif>
                                    <span class="invalid-feedback"></span>
                                </div>

                                <div class="mb-3 wish-box">
                                    <label for="description" class="form-label">{{ trans_lang('description') }}</label>
                                    <textarea class="form-control" name="wish_description" id="wish_description" rows="3"
                                        placeholder="{{ trans_lang('description') }}"></textarea>
                                    <span class="invalid-feedback"></span>
                                </div>
                                <div class="mb-3 wish-box">
                                    <label for="recaptcha" class="form-label">ReCaptcha:</label>
                                    <div class="g-recaptcha" id="g-recaptcha-response"
                                        data-sitekey="6Leh4t8qAAAAAOWxMlheFOxzPhOL8STyf9FsI7WE"></div>
                                    <span class="invalid-feedback"></span>
                                </div>
                                <div class="text-center mb-mobile-3">
                                    <button type="submit" class="common-btn">{{ trans_lang('submit') }}</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <script src="{{ asset('assets/js/support.js') }}"></script>
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $("#wishlistForm").submit(function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        url: "{{ route('wishList') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.status == true) {
                                // window.location.href = "{{ route('profile_user') }}";
                                $('#success-message').text(response.message).removeClass('d-none').addClass('d-block');
                                // window.location.reload();
                            } else {
                                var errors = response.errors ?? {};



                                var fields = [
                                    'wish_name',
                                    'wish_phone',
                                    'wish_email',
                                    'wish_description',
                                    'g-recaptcha-response',
                                ];

                                fields.forEach(function(field) {
                                    if (errors[field]) {
                                        $('#' + field)
                                            .closest('.wish-box')
                                            .find('span.invalid-feedback')
                                            .addClass('d-block')
                                            .html(errors[field]);
                                    } else {
                                        $('#' + field)
                                            .closest('.wish-box')
                                            .find('span.invalid-feedback')
                                            .removeClass('d-block')
                                            .html('');
                                    }
                                });
                            }
                        }
                    });
                });
                $("#contact-form").submit(function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        url: "{{ route('contact') }}",
                        type: 'POST',
                        dataType: 'json',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.status == true) {
                                // Display success message
                                $('#success-message').text(response.message).removeClass('d-none').addClass('d-block');
                                // Optionally, clear the form fields
                                // $('#contact-form')[0].reset();
                            } else {
                                var errors = response.errors ?? {};


                                var fields = [
                                    'name',
                                    'phone',
                                    'email',
                                    'description',
                                    'g-recaptcha-response',
                                ];

                                fields.forEach(function(field) {
                                    if (errors[field]) {
                                        $('#' + field)
                                            .closest('.contact-box')
                                            .find('span.invalid-feedback')
                                            .addClass('d-block')
                                            .html(errors[field]);
                                    } else {
                                        $('#' + field)
                                            .closest('.contact-box')
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
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var form = document.querySelector("form");
                var g - recaptcha = document.querySelector(".g-recaptcha");
                // console.log(form);
                form.addEventListener("submit", function() {
                    g - recaptcha.reset(); // Reset reCAPTCHA every time the form is submitted
                });
            });
        </script>

    @endsection
