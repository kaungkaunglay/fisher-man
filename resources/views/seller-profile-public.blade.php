@extends('includes.layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/profile_seller.css') }}" />
@endsection
@section('contents')
    <!-- Breadcrumbs -->
    <section class="mt-4 mb-3 ">
        <div class="container-custom">

            <nav aria-label="breadcrumb">
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
        <div class="profile_seller container-customn row m-auto">

            {{-- <div class="col-12 text-center">
                @include('messages.index')
            </div> --}}

            <!-- Profile Side -->
            <div class="col-12 col-lg-7 h-100 profile-side">
                {{-- <form action="#" id="update_basic_profile" class="profile-form" method="POST">
                    @csrf --}}
                <div class="w-100 h-100 d-md-flex gap-3">
                    <!-- profile img -->
                    <div class="w-100 profile-form d-flex flex-column avatar-input">
                        <label for="avatar-input" class="w-100 d-block position-relative gallery">
                            <img src="{{ asset('assets/avatars/' . $sellerInfo->avatar) }}" class="default-preview"
                                id="form-img" alt="">
                        </label>
                    </div>
                    <!-- /profile img -->

                    <!-- Profile Info -->
                    <div class="w-100 d-flex flex-column">


                        <!-- Form Headline -->
                        <div class="bg-primary text-white p-2 form-headline">
                            <h2 class="fw-bold d-flex justify-content-between">{{ trans_lang('info') }}
                                <div class="d-flex justify-content-end gap-4">
                                </div>
                            </h2>
                        </div>
                        <!-- /Form Headline -->

                        <!-- /Form Content -->
                        <div class="px-2 py-3 seller-info">

                            <!-- user name -->
                            <div class="form-group">
                                <div class="d-flex align-items-center">
                                    <label class="w-25 me-5" for="username">{{ trans_lang('name') }}</label>:
                                    <output class="form-output" for="username">{{ $sellerInfo->username }}</output>
                                </div>

                            </div>

                            <!-- email link -->
                            <div class="form-group">
                                <div class="d-flex align-items-center form-group">
                                    <label class="w-25 me-5" for="email">{{ trans_lang('email') }}</label>:
                                    <output class="form-output" for="email">{{ $sellerInfo->email }}</output>

                                </div>

                            </div>

                            <!-- organizaion -->
                            <div class="form-group">
                                <div class="d-flex align-items-center form-group">
                                    <label class="w-25 me-5" for="first_org_name">{{ trans_lang('first_org_name') }}</label>:
                                    <output class="form-output"
                                        for="first_org_name">{{ $sellerInfo->first_org_name }}</output>

                                </div>

                            </div>

                            <!-- account checkbox -->
                            {{-- <div class="mt-2">
                                    <!-- form on state -->
                                    <ul class="d-flex gap-4 checkbox-list">
                                        <li>
                                            <div class="form-group d-flex flex-column gap-1">
                                                <label for="line_login">
                                                    <i class="fa-brands fa-line fs-2 mt-1"></i>
                                                </label>
                                                <div class="form-check form-switch align-self-center">
                                                    <input type="checkbox" id="line_login" class="border form-check-input"
                                                        role="switch" />
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-group d-flex flex-column gap-1">
                                                <label for="facebook_login">
                                                    <i class="fa-brands fa-facebook fs-2 mt-1"></i>
                                                </label>
                                                <div class="form-check form-switch align-self-center">
                                                    <input type="checkbox" id="facebook_login"
                                                        class="border form-check-input" role="switch"
                                                         />
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-group d-flex flex-column gap-1">
                                                <label for="google_login">
                                                    <i class="fa-brands fa-google fs-2 mt-1"></i>
                                                </label>
                                                <div class="form-check form-switch align-self-center">
                                                    <input type="checkbox" id="google_login" class="border form-check-input"
                                                        role="switch"  />
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div> --}}

                        </div>

                    </div>
                </div>
                {{-- </form> --}}


                <!-- Detail Info -->
                {{-- <form action="" id="update_contact_details" method="POST" class="w-100 mt-3 profile-form"> --}}

                <!-- Form Headline -->
                <div class="mt-3">
                    <h2 class="fw-bold d-flex justify-content-between bg-primary text-white p-2 form-headline">
                        {{ trans_lang('detail') }}
                    </h2>
                </div>
                <!-- /Form Headline -->

                <!-- Form Content -->
                <div class="px-2 py-3 seller-detail">
                    <!-- address -->
                    <div class="d-flex align-items-center form-group">
                        <label class="w-25" for="address">{{ trans_lang('address') }}</label>:
                        <output class="form-output" for="address">{{ $sellerInfo->address }}</output>

                    </div>

                    <!-- phone-number link -->
                    <div class="d-flex align-items-start form-group">
                        <label class="w-25" for="first_phone">{{ trans_lang('phone_number') }}</label>:
                        <div class="ms-1 d-flex flex-column phone-no-container">
                            <a href="tel:">
                                <output class="form-output" for="first_phone">{{ $sellerInfo->first_phone }}</output>
                            </a>

                            {{-- <a href="tel:">
                                    <output class="form-output" for="second_phone">{{$sellerInfo->second_phone}}</output>
                                </a> --}}

                        </div>

                    </div>
                    <!-- shop name -->
                    <div class="d-flex align-items-center form-group">
                        <label class="w-25">Shop Name</label>:
                        <a href="{{route('shop.detail',$sellerInfo->shop_id)}}"><output class="form-output text-warning">{{ $sellerInfo->shop_name }}</output></a>

                    </div>

                </div>
                <!-- /Form Content -->

                </form>
                <!-- /Detail Info -->

                <!-- button group -->
                {{-- <div class="buttons d-flex gap-2 mt-3">
                    <button class="common-btn">{{ trans_lang('upload_product') }}</button>
                    <button class="common-btn">{{ trans_lang('check_order') }}</button>
                </div> --}}

            </div>
            <!-- /Profile Side -->

            <!-- Map Side -->
            <div class="col-12 col-lg-5 mt-3 mt-lg-0 map-side">

                <!-- Map Side -->
                <div class="h-100 d-flex flex-column gap-4">
                    <h2 class="fw-bold bg-primary text-white p-2">{{ trans_lang('address') }}</h2>
                    <iframe class="w-100 border-0 h-100 shop-location"
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

    <!-- Product Section -->
    <section class="discount-products bg-second py-3 mt-3">
        <div class="container-custom">
            <h6 class="txt-primary fw-bold mb-3">{{ trans_lang('uploaded_products') }}</h6>
            <div class="filter d-flex justify-content-between align-items-center mb-3">

                <!-- display -->
                <div class="icon-buttons txt-primary d-flex gap-3 align-items-center">
                    <i class="fa-solid fa-grip fs-2 fw-bold" id="card-list-btn"></i>
                    <i class="fa-solid fa-list fs-3 fw-bold" id="row-list-btn"></i>
                </div>

                <!-- sorting -->
                <div class="sort-container">
                    <div class="arrows">
                        <button><i class="fa-solid fa-caret-up"></i></button>
                        <button><i class="fa-solid fa-caret-down"></i></button>
                    </div>
                    <div class="dropdown">
                        <button class="sort-button dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Sort by</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card-list" id="view-list" data-list="fish-list-1">
                @foreach ($sellerProducts as $sellerProduct)
                    <div class="item-card">
                        <a href="{{ route('product.show', $sellerProduct->id) }}" class="right">
                            <img loading="lazy" src="{{ asset('assets/products/' . $sellerProduct->product_image) }}"
                                class="card-img-top" alt="{{ $sellerProduct->name }}">
                        </a>
                        <div class="left">
                            <p class="price m-t-b-10">
                                @if ($sellerProduct->discount > 0)
                                    ¥{{ number_format($sellerProduct->product_price - $sellerProduct->discount, 2) }}
                                    <span
                                        class="original-price">¥{{ number_format($sellerProduct->product_price) }}</span>
                                @else
                                    <span class="">¥{{ number_format($sellerProduct->product_price) }}</span>
                                @endif
                            </p>
                            <div class="title-category">
                                <a href="{{ route('sub-category.show', $sellerProduct->subCategory->id) }}"
                                    class="menu-category ">{{ $sellerProduct->subCategory->name }}</a>
                                <h3 class="title m-t-b-10">{{ $sellerProduct->name }}</h3>
                            </div>
                            <a href="{{ route('product.show', $sellerProduct->id) }}" class="txt m-b-10 description">
                                {{ $sellerProduct->description }}
                            </a>
                            <div class="d-flex gap-2 card-btn m-t-10">
                                <a href="javascript:void(0);" class="py-1 common-btn2 -solid cart-btn" data-id="{{ $sellerProduct->id }}">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                                <a href="javascript:void(0);" class="py-1 common-btn2 white-list-btn" data-id="{{ $sellerProduct->id }}">
                                    <i class="fa-solid fa-bookmark"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

            <!-- All Products Footline -->
            <div class="row justify-content-center">
                <div class="col-5 col-lg-3 text-center">
                    <button class="btn btn-outline-primary px-5 py-2  mt-5" id="load-more"
                        title="Load More Items">
                        <i class="fas fa-chevron-down"></i>
                    </button>
                </div>
            </div>
            <!-- /All Products Footline -->



            {{-- <div class="row mt-4">
                @if ($products->hasPages())
                    <ul class="pagination">
                        <!-- Previous Page Link -->
                        @if ($products->onFirstPage())
                            <li class="disabled">&lt;</li>
                        @else
                            <li><a href="{{ $products->previousPageUrl() }}" class="">&lt;</a></li>
                        @endif

                        <!-- Page Numbers (Only Show 3 Pages at a Time) -->
                        @php
                            $start = max(1, $products->currentPage() - 1);
                            $end = min($start + 2, $products->lastPage());
                        @endphp

                        @for ($i = $start; $i <= $end; $i++)
                            <li class="{{ $products->currentPage() == $i ? 'active' : '' }}">
                                <a href="{{ $products->url($i) }}" class="">{{ $i }}</a>
                            </li>
                        @endfor

                        <!-- Next Page Link -->
                        @if ($products->hasMorePages())
                            <li><a href="{{ $products->nextPageUrl() }}" class="">&gt;</a></li>
                        @else
                            <li class="disabled">&gt;</li>
                        @endif
                    </ul>
                @endif
            </div> --}}
        </div>
    </section>
    <!-- /Product Section -->

    <!-- All Scripts -->
    <script src="{{ asset('assets/js/loadmore.js') }}"></script>
    <script defer src="{{ asset('assets/js/view-list.js') }}"></script>
    <script defer src="{{ asset('assets/js/words-limit.js') }}"></script>
    <script defer src="{{ asset('assets/js/profile-seller.js') }}"></script>

    {{-- <script>
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
                        if (response.status == true) {
                            window.location.href = "{{ route('profile_seller') }}";
                        } else {}
                    }
                });
            });
        });
    </script> --}}
    <!-- /All Scripts -->

    {{-- Testing --}}

    {{-- /Testing --}}
@endsection

@section('script')
    <script>
        $(document).ready(() => {
            handleAddToCartBtn('cart-btn');
            handleAddToWhiteListBtn('white-list-btn');
        })
    </script>
@endsection

{{-- @section('script')
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

            function sendUpdateBasicData(formData, cur) {
                $.ajax({
                    url: "{{ route('update_basic_profile') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {

                        if (response.status) {
                            window.location.reload();
                            // unactiveForm(cur);
                        } else {
                            var fields = ['username', 'email'];
                            handleErrorMessages(fields, response.errors, response.message);
                        }
                    }
                });
            }



            function sendUpdateDetailData(formData, cur) {
                $.ajax({
                    url: "{{ route('update_contact_details') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status) {



                            window.location.reload();
                            // unactiveForm(cur);

                        } else {
                            var fields = ['address', 'first_phone', 'second_phone'];
                            handleErrorMessages(fields, response.errors, response.message);
                        }
                    }
                });
            }

            $("#update_basic_profile").submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                var cur = $(this);

                if (formData && Object.keys(formData).length > 0) {
                    sendUpdateBasicData(formData, cur);
                } else {
                    unactiveForm(cur);
                }
            });

            $("#update_contact_details").submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                var cur = $(this);

                if (formData && Object.keys(formData).length > 0) {
                    sendUpdateDetailData(formData, cur);
                } else {
                    unactiveForm(cur);
                }

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
                    data: {
                        provider: provider
                    }, // Pass the provider info in the data
                    success: function(response) {
                        window.location.reload();
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

    <script>
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            fetchProducts(page);
        });

        function fetchProducts(page) {
            $.ajax({
                url: "?page=" + page,
                success: function(data) {
                    $('#view-list').html($(data).find('#view-list').html());
                    $('.pagination').html($(data).find('.pagination').html());
                }
            });
        }
    </script>
@endsection --}}
