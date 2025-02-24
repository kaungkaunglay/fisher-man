@extends('includes.layout')
@section('title','support')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/support.css') }}" />
@endsection
@section('contents')
    <div class="container m-t-20">

        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb" class="py-4">
            <div class="container">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">{{trans_lang('home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans_lang('selet_payment')}}</li>
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
            <div class="container support-form">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row">

                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="contact-form">
                            <h2 class="title m-b-45">{{trans_lang('contact')}}</h2>
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{ route('contact') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">{{trans_lang('name')}}</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                placeholder="{{trans_lang('name')}}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6 mb-mobile-3">
                                                <label for="line-id" class="form-label">{{trans_lang('line_id')}}</label>
                                                <input type="text" name="line_id"
                                                    class="form-control @error('line_id') is-invalid @enderror"
                                                    id="line-id" placeholder="{{trans_lang('line_id')}}">
                                                @error('line_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone" class="form-label">{{trans_lang('phone_number')}}</label>
                                                <input type="tel" name="phone"
                                                    class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                    placeholder="{{trans_lang('phone_number')}}">
                                                @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">{{trans_lang('email')}}</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                placeholder="{{trans_lang('email')}}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">{{trans_lang('description')}}</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                                rows="3" placeholder="{{trans_lang('description')}}"></textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="recaptcha" class="form-label">ReCaptcha:</label>
                                            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                            @error('g-recaptcha-response')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="text-center mb-mobile-3">
                                            <button type="submit" class="common-btn">{{trans_lang('submit')}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="wish-list-form">
                            <h2 class="title m-b-45">{{trans_lang('wishlist')}}</h2>
                            <div class="row ">
                                <div class="col-12">
                                    <form action="{{ route('wishList') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">{{trans_lang('name')}}</label>
                                            <input type="text" name="wish_name"
                                                class="form-control @error('wish_name') is-invalid @enderror"
                                                id="name" placeholder="{{trans_lang('name')}}">
                                            @error('wish_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6 mb-mobile-3">
                                                <label for="line-id" class="form-label">{{trans_lang('line_id')}}</label>
                                                <input type="text" name="lineID"
                                                    class="form-control @error('lineID') is-invalid @enderror"
                                                    id="line-id" placeholder="{{trans_lang('line_id')}}">
                                                @error('lineID')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone" class="form-label">{{trans_lang('phone_number')}}</label>
                                                <input type="tel" name="wish_phone"
                                                    class="form-control @error('wish_phone') is-invalid @enderror"
                                                    id="phone" placeholder="{{trans_lang('phone_number')}}">
                                                @error('wish_phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">{{trans_lang('email')}}</label>
                                            <input type="email" name="wish_email"
                                                class="form-control @error('wish_email') is-invalid @enderror"
                                                id="email" placeholder="{{trans_lang('email')}}">
                                            @error('wish_email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">{{trans_lang('description')}}</label>
                                            <textarea class="form-control @error('wish_description') is-invalid @enderror" name="wish_description"
                                                id="description" rows="3" placeholder="{{trans_lang('description')}}"></textarea>
                                            @error('wish_description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="recaptcha" class="form-label">ReCaptcha:</label>
                                            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                            @error('g-recaptcha-response')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="text-center mb-mobile-3">
                                            <button type="submit" class="common-btn">{{trans_lang('submit')}}</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- location & contact -->
            <div class="row">
                <div class="col-md-6">
                    <div class="p-3">
                        <h2 class="title m-b-20">{{trans_lang('contact_us')}}</h2>
                        <div class="support-icon">
                            <i class="fa-brands fa-line"></i>
                            <i class="fa-brands fa-square-facebook"></i>
                            <i class="fa-brands fa-x-twitter"></i>
                            <i class="fa-brands fa-square-instagram"></i>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="txt m-b-10">{{trans_lang('address')}}: 1234 Main Street, Anytown, Japan</p>
                                <p class="txt m-b-10">{{trans_lang('phone_number')}}: 1234567890</p>
                                <p class="txt m-b-10">{{trans_lang('email')}}:user@email.com</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('assets/js/support.js') }}"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var form = document.querySelector("form");
                var g-recaptcha = document.querySelector(".g-recaptcha");
                // console.log(form);
                form.addEventListener("submit", function() {
                    g-recaptcha.reset(); // Reset reCAPTCHA every time the form is submitted
                });
            });
        </script>
    @endsection

