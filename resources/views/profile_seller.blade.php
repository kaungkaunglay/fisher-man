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
        <div class="profile_seller container-custom row m-auto">

            <div class="col-12 text-center">
                @include('messages.index')
            </div>

            <!-- Profile Side -->
            <div class="col-12 col-lg-7 h-100 profile-side">

                <form action="#" id="update_basic_profile" class="profile-form" method="POST">

                    @csrf

                    <div class="w-100 h-100 d-md-flex gap-3">
                        <!-- profile img -->
                        <div class="w-100 profile-form d-flex flex-column avatar-input">
                            <label for="avatar-input" class="w-100 d-block position-relative gallery">
                                <img src="{{ $user->avatar
                                            ? (Str::startsWith($user->avatar, 'https://')
                                                ? $user->avatar
                                                : asset('assets/avatars/' . $user->avatar))
                                            : asset('assets/avatars/default_avatar.png') }}"
                                    class="default-preview" id="form-img"
                                    alt="{{ $user->username ?? 'Account.png' }}">
                                    <div class="avatar-upload position-absolute d-none">
                                        <div class="m-auto">
                                        <i class="fas fa-upload"></i>
                                        <p>Upload Profile Image</p>
                                    </div>
                                </div>
                            </label>
                            <input type="file" name="avatar" class="upload-photo d-none" id="avatar-input"
                                accept="image/*">
                        </div>
                        <!-- /profile img -->

                        <!-- Profile Info -->
                        <div class="w-100 d-flex flex-column">

                            <!-- Form Headline -->
                            <div class="bg-primary text-white p-2 form-headline">
                                <h2 class="fw-bold d-flex justify-content-between">{{ trans_lang('info') }}
                                    <div class="d-flex justify-content-end gap-4">
                                        <button type="submit" class="save d-none">
                                            <i class="fa-solid fa-save fs-5 text-white"></i>
                                        </button>
                                        <button class="edit">
                                            <i class="fa-solid fa-pen-to-square fs-5 text-white"></i>
                                        </button>
                                        <button class="cancel d-none">
                                            <i class="fa-solid fa-x fs-5 text-white"></i>
                                        </button>
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
                                        <output class="form-output" for="username">{{ $user->username }}</output>
                                        <input type="text" name="username"
                                            class="p-1 mt-1 ms-1 border-bottom border-2 d-none" id="username"
                                            value="{{ $user->username }}" disabled>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>

                                <!-- email link -->
                                <div class="form-group">
                                    <div class="d-flex align-items-center form-group">
                                        <label class="w-25 me-5" for="email">{{ trans_lang('email') }}</label>:
                                        <output class="form-output" for="email">{{ $user->email }}</output>
                                        <input type="email" name="email"
                                            class="p-1 mt-2 ms-1 border-bottom border-2 d-none" id="email"
                                            value="{{ $user->email }}" disabled>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>

                                <!-- organizaion -->
                                <div class="form-group">
                                    <div class="d-flex align-items-center form-group">
                                        <label class="w-25 me-5"
                                            for="first_org_name">{{ trans_lang('first_org_name') }}</label>:
                                        <output class="form-output"
                                            for="first_org_name">{{ $user->first_org_name }}</output>
                                        <input type="text" name="first_org_name"
                                            class="p-1 mt-2 ms-1 border-bottom border-2 d-none" id="first_org_name"
                                            value="{{ $user->first_org_name }}" disabled>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>

                                <!-- account checkbox -->
                                <div class="mt-2">
                                    <!-- form on state -->
                                    <ul class="d-flex gap-4 checkbox-list">
                                        <li>
                                            <div class="form-group d-flex flex-column gap-1">
                                                <label for="line_login">
                                                    <i class="fa-brands fa-line fs-2 mt-1"></i>
                                                </label>
                                                <div class="form-check form-switch align-self-center">
                                                    <input type="checkbox" id="line_login" class="border form-check-input"
                                                        role="switch" @if ($user->checkProvider('line')) checked @endif />
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
                                                        @if ($user->checkProvider('facebook')) checked @endif />
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-group d-flex flex-column gap-1">
                                                <label for="google_login">
                                                    <i class="fa-brands fa-google fs-2 mt-1"></i>
                                                </label>
                                                <div class="form-check form-switch align-self-center">
                                                    <input type="checkbox" id="google_login"
                                                        class="border form-check-input" role="switch"
                                                        @if ($user->checkProvider('google')) checked @endif />
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            @if (!auth_helper()->isEmailLinkInvalid())
                                <div class="alert alert-success d-flex mb-2 mt-auto" role="alert">
                                    <i class="fa-solid fa-check bi flex-shrink-0 me-2 mt-1" role="img"
                                        aria-label="Success:"></i>
                                    <div class="text-start">
                                        メール確認リンクはすでに送信されています。
                                    </div>
                                </div>
                            @elseif(!auth_helper()->isVerified())
                                <div class="alert alert-warning d-flex mb-2 email_verify_box" role="alert">
                                    <i class="fa-solid fa-triangle-exclamation bi flex-shrink-0 me-2 mt-1" role="img"
                                        aria-label="Warning:"></i>
                                    <div class="text-start">
                                            メールを確認してください
                                        <a href="javascript:void(0);" id="sent_email_verify_link"
                                            class="text-warning">こちら</a>
                                    </div>
                                </div>
                            @endif
                            <!-- /Form Content -->

                        </div>
                    </div>
                </form>


                <!-- Detail Info -->
                <form action="" id="update_contact_details" method="POST" class="w-100 mt-3 profile-form">

                    <!-- Form Headline -->
                    <div>
                        <h2 class="fw-bold d-flex justify-content-between bg-primary text-white p-2 form-headline">
                            {{ trans_lang('detail') }}

                            <!-- button group -->
                            <div class="d-flex justify-content-end gap-4">
                                <button type="submit" class="save d-none">
                                    <i class="fa-solid fa-save fs-5 text-white"></i>
                                </button>
                                <button class="edit">
                                    <i class="fa-solid fa-pen-to-square fs-5 text-white"></i>
                                </button>
                                <button class="cancel d-none">
                                    <i class="fa-solid fa-x fs-5 text-white"></i>
                                </button>
                            </div>
                        </h2>
                    </div>
                    <!-- /Form Headline -->

                    <!-- Form Content -->
                    <div class="px-2 py-3 seller-detail">

                        <!-- address -->
                        <div class="d-flex align-items-center form-group">
                            <label class="w-25" for="address">{{ trans_lang('address') }}</label>:
                            <output class="form-output" for="address">{{ $user->address }}</output>
                            <textarea name="address" class="p-1 mt-2 ms-1 border-2 d-none" id="address" disabled>{{ $user->address }}</textarea>
                            <span class="invalid-feedback"></span>
                        </div>

                        <!-- phone-number link -->
                        <div class="d-flex align-items-start form-group">
                            <label class="w-25" for="first_phone">{{ trans_lang('phone_number') }}</label>:
                            <div class="ms-1 d-flex flex-column phone-no-container">
                                <div class="form-group">
                                    <select name="first_phone_extension" class="p-1 mt-2 border-0 outline-0 border-bottom border-2 d-none" disabled>
                                        <option value="+81" @if($user->firstExtension == '+81') selected @endif>+81</option>
                                        <option value="+95" @if($user->firstExtension == '+95') selected @endif>+95</option>
                                    </select>
                                    <a href="tel:">
                                        <output class="form-output" for="first_phone">{{ $user->first_phone }}</output>
                                    </a>
                                    <input type="tel" name="first_phone" min="10" class="mt-2 border-bottom border-2 d-none" style="width: 150px;"
                                        id="first_phone" value="{{ $user->firstNumber }}" disabled>
                                    <span class="invalid-feedback"></span>
                                </div>
                                <div class="form-group">
                                    <select name="second_phone_extension" class="p-1 mt-2 border-0 outline-0 border-bottom border-2 d-none" disabled>
                                        <option value="+81" @if($user->secondExtension == '+81') selected @endif>+81</option>
                                        <option value="+95" @if($user->secondExtension == '+95') selected @endif>+95</option>
                                    </select>
                                    <a href="tel:">
                                        <output class="form-output" for="second_phone">{{ $user->second_phone }}</output>
                                    </a>
                                    <input type="tel" name="second_phone" min="10" class="mt-2 border-bottom border-2 d-none" style="width: 150px;"
                                        value="{{ $user->secondNumber }}" id="second_phone" disabled>
                                    <span class="invalid-feedback"></span>
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
                    <a href="{{route('create_product')}}" class="common-btn">{{ trans_lang('upload_product') }}</a>
                    <button class="common-btn">{{ trans_lang('check_order') }}</button>
                </div>

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
    <section class="discount-products bg-second mt-3 py-3">
        <div class="container-custom">


            <h6 class="txt-primary fw-bold mb-3">{{ trans_lang('uploaded_products') }}</h6>
            <div class="filter d-flex justify-content-between align-items-center mb-3">

                <!-- display -->
                <div class="icon-buttons txt-primary d-flex gap-3 align-items-center">
                    <i class="fa-solid fa-grip fs-2 fw-bold" id="card-list-btn"></i>
                    <i class="fa-solid fa-list fs-3 fw-bold" id="row-list-btn"></i>
                </div>

            </div>

            <div class="card-list" id="view-list" data-list="fish-list-1">

                @foreach ($products as $product)
                @if ($product->status == 'approved')
                    <div class="item-card mb-2">
                        <a href="{{ route('product.show', $product->id) }}" class="right">
                            <img src="{{ asset('assets/products/' . $product->product_image) }}" class="card-img-top"
                                alt="{{ $product->name }}">
                        </a>
                        <div class="left pt-3">
                            <p class="price">
                                @if ($product->discount > 0)
                                    ¥{{ number_format($product->product_price - $product->discount, 2) }}
                                    <span class="original-price ms-2">¥{{ number_format($product->product_price) }}</span>
                                @else
                                    <span class="">¥{{ number_format($product->product_price) }}</span>
                                @endif
                            </p>
                            <div class="title-category mb-2">
                                <a href="{{ route('sub-category.show', $product->subCategory->id) }}"
                                    class="menu-category ">{{ $product->subCategory->name }}</a>
                                <h3 class="title">{{ $product->name }}</h3>
                            </div>
                            <a href="{{ route('product.show', $product->id) }}" class="txt m-b-10 description">
                                {{ $product->description }}
                            </a>

                        </div>
                    </div>
                @endif
                @endforeach

            </div>



            <div class="row mt-4">
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
            </div>
        </div>
    </section>
    <!-- /Product Section -->

    <!-- All Scripts -->
    <script defer src="{{ asset('assets/js/view-list.js') }}"></script>
    <script defer src="{{ asset('assets/js/updateForm.js') }}"></script>

    {{-- Testing --}}

    {{-- /Testing --}}
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
                            var fields = ['username', 'email', 'first_org_name'];
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

                if (formData) {
                    sendUpdateBasicData(formData, cur);
                } else {
                    unactiveForm(cur);
                }
            });

            $("#update_contact_details").submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                var cur = $(this);

                if (formData) {
                    sendUpdateDetailData(formData, cur);
                } else {
                    unactiveForm(cur);
                }

            });

            // Function to handle login/logout for OAuth providers
            function handleOAuthLogin(provider) {
                var checkbox = $('#' + provider + '_login');
                if (checkbox.prop('checked')) {
                    checkbox.prop('checked', false)
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
@endsection
