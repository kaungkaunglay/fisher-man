@extends('includes.layout')
@section('title', 'profile')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/profile_user.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sub_category.css') }}" />

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
        <div class="profile_seller container-custom row">

            <!-- <div class="col-12">
                        @include('messages.index')
                    </div> -->

            <!-- Profile Side -->
            <div class="col-12 col-lg-12 h-100 profile-side">

                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-center align-items-center mb-3">
                        <div class="p-6 d-flex justify-content-center align-items-center">
                            <div class="w-auto d-flex align-center border p-2  " style="max-width: 75%;">
                                <form action="{{ route('update_avatar') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="file" name="avatar" class="upload-photo d-none" id="avatar-input"
                                        accept="image/*">

                                    <div class="w-100 d-flex align-center position-relative  overflow-hidden gallery"
                                        style="max-height: 500px;">
                                        <img src="{{ auth_helper()->getAvatar() }}"
                                            class="default-preview img-fluid profile-avatar" id="form-img"
                                            alt="{{ $user->username ?? 'Account.png' }}">

                                        <label for="avatar-input"
                                            class="d-flex justify-content-center align-items-center position-absolute text-black bg-white rounded-5 shadow px-4 py-2"
                                            style="right: 10px; bottom: 10px;">
                                            <i class="fa-solid fa-upload"></i>
                                            <small class="fs-6 d-none d-md-inline ms-2">アップロード</small>
                                        </label>

                                    </div>
                                    @error('avatar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column gap-5">
                        <form action="{{ route('update_info') }}" id="update_info" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="w-100">
                                <!-- Form Headline -->
                                <div class="bg-primary text-white p-2 form-headline mb-2">
                                    <h2 class="fw-bold d-flex justify-content-between">{{ trans_lang('info') }}
                                        <div class="d-flex justify-content-end gap-4">
                                            <button type="submit" class="save d-none">
                                                <i class="fa-solid fa-save fs-5 text-white"></i>
                                            </button>
                                            <button type="button" class="edit">
                                                <i class="fa-solid fa-pen-to-square fs-5 text-white"></i>
                                            </button>
                                            <button type="reset" class="cancel d-none">
                                                <i class="fa-solid fa-x fs-5 text-white"></i>
                                            </button>
                                        </div>
                                    </h2>
                                </div>
                                <!-- /Form Headline -->

                                <!-- /Form Content -->
                                <div class="profile-form">
                                    <div class="mb-2">
                                        <div class="input-group mb-1 shadow-none">
                                            <span class="input-group-text w-25"
                                                style="min-width: 130px;">{{ trans_lang('name') }}</span>
                                            <input type="text"
                                                class="form-control shadow-none @error('username') is-invalid @enderror"
                                                name="username" id="username" value="{{ $user->username }}" readonly />
                                        </div>
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-2">
                                        <div class="input-group mb-1 shadow-none">
                                            <span class="input-group-text w-25"
                                                style="min-width: 130px;">{{ trans_lang('email') }}</span>
                                            <input type="text"
                                                class="form-control shadow-none @error('email') is-invalid @enderror"
                                                name="email" id="email" value="{{ $user->email }}" readonly />
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="d-flex gap-2">
                                        <div class="d-flex border rounded-3 overflow-hidden">
                                            <label class="d-flex justify-content-center align-items-center border p-2 "
                                                for="line_login">
                                                <i class="fa-brands fa-line fs-2"></i>
                                            </label>
                                            <div class="d-flex justify-content-center align-items-center p-2">
                                                <div class="form-check form-switch align-self-center">
                                                    <input type="checkbox" id="line_login" class="border form-check-input"
                                                        role="switch" @if ($user->checkProvider('line')) checked @endif />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex border rounded-3 overflow-hidden">
                                            <label class="d-flex justify-content-center align-items-center border p-2 "
                                                for="line_login">
                                                <i class="fa-brands fa-facebook fs-2"></i>
                                            </label>
                                            <div class="d-flex justify-content-center align-items-center p-2">
                                                <div class="form-check form-switch align-self-center">
                                                    <input type="checkbox" id="facebook_login"
                                                        class="border form-check-input" role="switch"
                                                        @if ($user->checkProvider('facebook')) checked @endif />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex border rounded-3 overflow-hidden">
                                            <label class="d-flex justify-content-center align-items-center border p-2 "
                                                for="line_login">
                                                <i class="fa-brands fa-google fs-2"></i>
                                            </label>
                                            <div class="d-flex justify-content-center align-items-center p-2">
                                                <div class="form-check form-switch align-self-center">
                                                    <input type="checkbox" id="google_login"
                                                        class="border form-check-input" role="switch"
                                                        @if ($user->checkProvider('google')) checked @endif />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>

                        <form action="{{ route('update_contact') }}" method="POST" id="update_contact">
                            @csrf
                            @method('PUT')
                            <div class="w-100">
                                <!-- Form Headline -->
                                <div class="bg-primary text-white p-2 form-headline mb-2">
                                    <h2 class="fw-bold d-flex justify-content-between ">
                                        {{ trans_lang('detail') }}

                                        <!-- button group -->
                                        <div class="d-flex justify-content-end gap-4">
                                            <button type="submit" class="save d-none">
                                                <i class="fa-solid fa-save fs-5 text-white"></i>
                                            </button>
                                            <button type="button" class="edit">
                                                <i class="fa-solid fa-pen-to-square fs-5 text-white"></i>
                                            </button>
                                            <button type="reset" class="cancel d-none">
                                                <i class="fa-solid fa-x fs-5 text-white"></i>
                                            </button>
                                        </div>
                                    </h2>
                                </div>
                                <!-- /Form Headline -->

                                <div class="profile-form">
                                    <div class="mb-2">
                                        <div class="input-group mb-1 shadow-none">
                                            <span class="input-group-text w-25"
                                                style="min-width: 130px;">{{ trans_lang('postal') }}</span>
                                            <input type="text"
                                                class="form-control shadow-none @error('postal_code') @enderror"
                                                name="postal_code" id="postal_code" value="{{ $user->postal_code }}"
                                                readonly />
                                        </div>

                                        @error('postal_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <div class="input-group mb-1 shadow-none">
                                            <span class="input-group-text w-25"
                                                style="min-width: 130px;">{{ trans_lang('address') }}</span>
                                            <textarea class="form-control shadow-none @error('address') is-invalid @enderror" name="address" id="address"
                                                readonly>{{ $user->address }}</textarea>
                                        </div>

                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-2">
                                        <div class="input-group mb-1 shadow-none">
                                            <span class="input-group-text w-25"
                                                style="min-width: 130px;">{{ trans_lang('first_ph') }}</span>
                                            <input type="text"
                                                class="form-control shadow-none @error('first_phone') is-invalid @enderror"
                                                name="first_phone" id="first_phone" value="{{ $user->first_phone }}"
                                                readonly />
                                        </div>

                                        @error('first_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <div class="input-group mb-1 shadow-none">
                                            <span class="input-group-text w-25"
                                                style="min-width: 130px;">{{ trans_lang('second_ph') }}</span>
                                            <input type="text"
                                                class="form-control shadow-none @error('second_phone') is-invalid @enderror"
                                                name="second_phone" id="second_phone" value="{{ $user->second_phone }}"
                                                readonly />
                                        </div>

                                        @error('second_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </form>


                        {{-- <div class="w-100">
                            @if (!auth_helper()->isEmailLinkInvalid())
                               
                                <div class="input-group">
                                    <span class="input-group-text">メール確認リンクはすでに送信されています。</span>
                                </div>
                            @elseif(!auth_helper()->isVerified())
                                <div class="input-group">
                                    <span class="input-group-text">メールアドレスを確認できません。メールアドレスを確認してください。</span>
                                    <a href="javascript:void(0);" class="btn btn-outline-secondary" id="sent_email_verify_link">こちら</a>
                                </div>
                            @endif 
                        </div> --}}

                    </div>
                </div>

                {{-- <form action="#" id="update_basic_profile" class="profile-form" method="POST">

                    @csrf

                    <!-- Profile Info -->
                    

                    <div class="w-100 h-100 d-md-flex gap-3">
                        <!-- profile img -->
                        <div class="w-100 profile-form d-flex flex-column avatar-input justify-content-center">
                            <label for="avatar-input"
                                class="w-100 d-flex align-center position-relative gallery  justify-content-center">
                                <img src="{{ auth_helper()->getAvatar() }}" class="default-preview" id="form-img"
                                    alt="{{ $user->username ?? 'Account.png' }}" style="width:40%;">
                                <div class="avatar-upload position-absolute d-none">
                                    <div class="m-auto">
                                        <i class="fas fa-upload"></i>
                                        <p>プロフィール画像をアップロード</p>
                                    </div>
                                </div>
                            </label>
                            <input type="file" name="avatar" class="upload-photo d-none" id="avatar-input"
                                accept="image/*" disabled>
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
                            <div class="px-2 py-3">

                                <!-- user name -->
                                <div class="form-group">
                                    <div class="d-flex align-items-center">
                                        <label class="w-25" for="username">{{ trans_lang('name') }}</label>:
                                        <output class="form-output" for="username">{{ $user->username }}</output>
                                        <input type="text" name="username"
                                            class="p-1 mt-1 ms-1 border-bottom border-2 d-none" id="username"
                                            value="{{ $user->username }}" disabled>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>

                                <!-- email link -->
                                <div class="form-group">
                                    <div class="d-flex align-items-center">
                                        <label class="w-25" for="email">{{ trans_lang('email') }}</label>:
                                        <output class="form-output" for="email">{{ $user->email }}</output>
                                        <input type="email" name="email"
                                            class="p-1 mt-2 ms-1 border-bottom border-2 d-none" id="email"
                                            value="{{ $user->email }}" disabled>
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
                                                    <input type="checkbox" id="google_login" class="border form-check-input"
                                                        role="switch" @if ($user->checkProvider('google')) checked @endif />
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <!-- @if (!auth_helper()->isEmailLinkInvalid())
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
                                                class="text-warning">こちら </a>
                                        </div>
                                    </div>
    @endif -->
                            <!-- /Form Content -->

                            <!-- @if (!$hasShopRequest)
    alert box
                                    <div class="mt-auto modal-btn" data-bs-toggle="modal"
                                        data-bs-target="#shop_modal_dialog">
                                        <div class="alert alert-warning d-flex mb-0" role="alert">
                                            <i class="fa-solid fa-triangle-exclamation bi flex-shrink-0 me-2 mt-1"
                                                role="img" aria-label="Warning:"></i>
                                            <div class="text-start">
                                                {{ trans_lang('payment_method_used_card_last_no') }}
                                            </div>
                                        </div>
                                    </div>
@else
    -->
                            <!-- alert box -->
                            <div>
                                <div class="alert alert-success d-flex mb-0 mt-auto" role="alert">
                                    <i class="fa-solid fa-check bi flex-shrink-0 me-2 mt-1" role="img"
                                        aria-label="Success:"></i>
                                    <div class="text-start">
                                        {{ trans_lang('shop_request_sent') }}
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </form> --}}
                <!-- /Profile Info -->

                <!-- Form Modal -->
                {{-- <div class="modal fade" id="shop_modal_dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content bg-white">

                            <!-- Modal Header -->
                            <div class="modal-header text-white bg-primary p-3">
                                <h2>{{ trans_lang('verify') }}</h2>
                            </div>
                            <!-- /Modal Header -->

                            <!-- Modal Body -->
                            <!-- <div class="row modal-body p-3">

                                    <div class="col-12">
                                        <form method="post" id="shopRequestForm" enctype="multipart/form-data">
                                            @csrf
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
                                                    
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">+81</span>
                                                        <input type="text" maxlength="10" name="phoneNumber" class="form-control" id="phoneNumber"  aria-label="phoneNumber" aria-describedby="basic-addon1">
                                                    </div>
                                                      
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <div class="col-lg-5 col-12">
                                                    <label for="exampleFormControlInput1" class="col-form-label">Shop
                                                        Description</label>
                                                </div>
                                                <div class="col-lg-7 col-12 input-box">
                                                    <textarea name="shopDescription" class="form-control" id="shopDescription" cols="30" rows="10"></textarea>
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

                                            <div class="input-box">
                                                <div class="d-flex">
                                                    <input type="checkbox" class="me-3" name="privacyPolicy" id="privacyPolicy">
                                                    <label for="privacyPolicy">Privacy Policy</label>
                                                </div>
                                                <span class="invalid-feedback"></span>
                                            </div>

                                    </div>
                                </div> -->
                            <!-- /Modal Body -->

                            <!-- Modal Footer -->
                            <div class="d-flex gap-2 p-3">
                                <button class="common-btn -solid w-50 px-0" id="cancel-btn" type="button"
                                    data-bs-dismiss="modal">{{ trans_lang('cancle') }}</button>
                                <button class="common-btn w-50 px-0" id="request-btn"
                                    type="submit">{{ trans_lang('request') }}</button>
                            </div>

                            </form>
                            <!-- /Modal Footer -->

                        </div>
                    </div>
                </div> --}}
                <!-- /Form Modal -->

                <!-- Detail Info -->
                {{-- <form action="" id="update_contact_details" method="POST" class="w-100 mt-3 profile-form">

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
                    <div class="px-2 py-3">

                        <div class="d-flex">
                            <label class="w-25" for="postalCode">{{ trans_lang('postal') }}</label>:
                            <div class="form-group">
                                <output class="form-output ps-1" for="postalCode">{{ $user->postal_code }}</output>
                                <input type="text" name="postalCode" id="postalCode" class="p-1 mt-2 border-bottom border-2 d-none" style="width: 150px;" value="{{ $user->postal_code }}">
                                <textarea name="address" class="p-1 mt-2 ms-1 border-2 d-none" id="address" disabled>{{ $user->address }}</textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>

                        <!-- address -->
                        <div class="d-flex">
                            <label class="w-25" for="address">{{ trans_lang('address') }}</label>:
                            <div class="form-group">
                                <output class="form-output ps-1" for="address">{{ $user->address }}</output>
                                <textarea name="address" class="p-1 mt-2 ms-1 border-0 outline-0 border-bottom border-2 d-none" id="address"
                                    disabled>{{ $user->address }}</textarea>
                                <span class="invalid-feedback"></span>
                            </div>

                        </div>


                        <!-- phone-number link -->
                        <div class="d-flex align-items-start">
                            <label class="w-25" for="first_phone">{{ trans_lang('phone_number') }}</label>:
                            <div class="ms-1 d-flex flex-column phone-no-container">
                                <div class="form-group">
                                    <select name="first_phone_extension" class="p-1 mt-2 border-0 outline-0 border-bottom border-2 d-none" disabled>
                                        <option value="+81" @if ($user->firstExtension == '+81') selected @endif>+81</option>
                                        <option value="+95" @if ($user->firstExtension == '+95') selected @endif>+95</option>
                                    </select>
                                    <input type="text" id="first_phone_extension"  name="first_phone_extension" 
                                        class="p-1 mt-2 border-0 outline-0 border-bottom border-2 d-none" 
                                        style="width: 40px;"  value="+81" readonly />
                                    <a href="tel:">
                                        <output class="form-output" for="first_phone">{{ $user->first_phone }}</output>
                                    </a>
                                    <input type="number" maxlength="10" name="first_phone" class="p-1 mt-2 border-bottom border-2 d-none" style="width: 150px;"
                                        id="first_phone" value="{{ $user->first_phone }}" disabled>
                                    <span class="invalid-feedback"></span>
                                </div>
                                <div class="form-group">
                                    <select name="second_phone_extension" class="p-1 mt-2 border-0 outline-0 border-bottom border-2 d-none" disabled>
                                        <option value="+81" @if ($user->secondExtension == '+81') selected @endif>+81</option>
                                        <option value="+95" @if ($user->secondExtension == '+95') selected @endif>+95</option>
                                    </select>
                                    <input type="text" id="second_phone_extension" name="second_phone_extension" 
                                        class="p-1 mt-2 border-0 outline-0 border-bottom border-2 d-none" 
                                        style="width: 40px;"  value="+81" readonly />
                                    <a href="tel:">
                                        <output class="form-output" for="second_phone">{{ $user->second_phone }}</output>
                                    </a>
                                    <input type="number" maxlength="10" name="second_phone" class="p-1 mt-2 border-bottom border-2 d-none" style="width: 150px;"
                                        value="{{ $user->second_phone }}" id="second_phone" disabled>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /Form Content -->

                </form> --}}
                <!-- /Detail Info -->

                <!-- button group -->
                {{-- <div class="buttons d-flex mt-3">
                    <button class="common-btn">注文履歴を確認</button>
                </div> --}}

            </div>
            <!-- /Profile Side -->

            <!-- Map Side -->
            <!-- <div class="col-12 col-lg-5 mt-3 mt-lg-0 map-side">

                        <div class="h-100 d-flex flex-column gap-4">
                            <h2 class="fw-bold bg-primary text-white p-2">{{ trans_lang('shops') }}{{ trans_lang('location') }}
                            </h2>
                            <iframe class="w-100 border-0 h-100 shop-location"
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d207363.6189187792!2d139.5537195!3d35.7002261!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x605d1b87f02e57e7%3A0x2e01618b22571b89!2sTokyo%2C%20Japan!5e0!3m2!1sen!2smm!4v1742175704107!5m2!1sen!2smm"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>

                    </div> -->
            <!-- /Map Side -->

        </div>
    </section>
    <!-- /Profile Section -->

    <!-- History Table -->
    <section>
        <div class="container-custom">

            <div class="history rounded-2 table-responsive">
                <h2 class="title">注文履歴</h2>

                <table class="table table-hover order-histories">
                    <thead class="fw-bold table-primary table-dark">
                        <tr>
                            <th scope="col">番号</th>
                            <th scope="col">商品画像</th>
                            <th scope="col">商品名</th>
                            <th scope="col">価格</th>
                            <th scope="col">数量</th>
                            <th scope="col">金額</th>
                            <th scope="col">店名</th>
                            <th scope="col">支払い種類</th>
                            <th scope="col">注文日</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($order_histories->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">注文履歴がありません。</td>
                            </tr>
                        @else
                            @foreach ($order_histories as $order)
                                <tr>
                                    <th scope="row">{{ ($order_histories->currentPage() - 1) * $order_histories->perPage() + $loop->iteration  }}</th>
                                    <td>
                                        <div class="image">
                                        <img loading="lazy" src="{{ asset('assets/products/'.$order->product_image) }}" style="height: auto;max-width:100%;" alt="{{ $order->product_image }}">
                                    </div>
                                        
                                    </td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->product_price }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->total_amount }}</td>
                                    <td>{{ $order->shop_name }}</td>
                                    <td>{{ $order->payment_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="row mt-4">
                    @if ($order_histories->hasPages())
                        <ul class="pagination">
                            <!-- Previous Page Link -->
                            @if ($order_histories->onFirstPage())
                                <li class="disabled">&lt;</li>
                            @else
                                <li><a href="{{ $order_histories->previousPageUrl() }}" class="">&lt;</a></li>
                            @endif

                            <!-- Page Numbers (Only Show 3 Pages at a Time) -->
                            @php
                                $start = max(1, $order_histories->currentPage() - 1);
                                $end = min($start + 2, $order_histories->lastPage());
                            @endphp @for ($i = $start; $i <= $end; $i++)
                                <li class="{{ $order_histories->currentPage() == $i ? 'active' : '' }}">
                                    <a href="{{ $order_histories->url($i) }}" class="">{{ $i }}</a>
                                </li>
                            @endfor

                            <!-- Next Page Link -->
                            @if ($order_histories->hasMorePages())
                                <li><a href="{{ $order_histories->nextPageUrl() }}" class="">&gt;</a></li>
                            @else
                                <li class="disabled">&gt;</li>
                            @endif
                        </ul>
                    @endif
                </div>
            </div>

        </div>

        
                {{-- <ol class="history-list">
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
                </ol> --}}

        {{-- 
       <div class="table-responsive">
       
       </div> --}}

    </section>
    <!-- ./History Table -->

    <!-- All Scripts -->
    {{-- <script defer src="{{ asset('assets/js/updateForm.js') }}"></script> --}}
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

    @if (session('success'))
        <script>
            toastr.success('{{ session('success') }}');
        </script>
    @endif


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
                    url: "/buyer/request-shop",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == true) {
                            window.location.href = "{{ route('profile_user') }}";

                        } else {
                            var errors = response.errors ?? {};

                            var fields = [
                                'shopName',
                                'transManagement',
                                'transEmail',
                                'phoneNumber',
                                'shopDescription',
                                'avatar',
                                'privacyPolicy'
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

            $('#cancel-btn').click(function() {
                $('.invalid-feedback').text('');
                $('#shopRequestForm input[type="checkbox"]').prop('checked', false);
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

                    // console.log(errors);

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
                        console.log(response.status);
                        if (response.status) {

                            // console.log(response.message);

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
                        // console.log(response.status);
                        if (response.status) {

                            // console.log(response.message);

                            window.location.reload();
                            // unactiveForm(cur);

                        } else {
                            var fields = ['address', 'postalCode'];
                            handleErrorMessages(fields, response.errors, response.message);
                        }
                    }
                });
            }

            $("#update_basic_profile").submit(function(e) {
                e.preventDefault();
                // console.log('Hello');

                var formData = new FormData(this);
                // formData.append('avatar', $('#avatar-input')[0].files[0] ?? null);

                // console.log(formData->getKey('username'));

                var cur = $(e.currentTarget);

                if (formData) {
                    // console.log("I work in success")
                    sendUpdateBasicData(formData, cur);
                } else {
                    // console.log("I work in status false")
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

            // $('#sent_email_verify_link').click(function(){
            //     $.ajax({
            //         url: `/email/verify/send`,
            //         method: 'POST',
            //         success: function(response) {
            //             window.location.reload();
            //             console.log(response.message);
            //         },
            //         error: function(xhr) {
            //             console.error(xhr);
            //         }
            //     });
            // });

            $('#sent_email_verify_link').click(function() {

                const $button = $(this);
                const $box = $button.closest('.email_verify_box');
                const originalText = $box.html();

                // Disable button and show loading state
                $button.prop('disabled', true);


                $box.html(`<div class="spinner-border text-primary me-2" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div> 確認リンクを送信中...`);
                $.ajax({
                    url: `/email/verify/send`,
                    method: 'POST',
                    success: function(response) {
                        // On success, reload and show message
                        console.log(response.message);
                        window.location.reload();
                    },
                    error: function(xhr) {
                        // On error, restore button state and show error
                        console.error(xhr);
                        $button.prop('disabled', true);
                        $box.html($originalText);
                        // alert('Failed to send verification link. Please try again.');
                        sessionStorage.setItem('success', 'error');
                        sessionStorage.setItem('message',
                            'Failed to send verification link. Please try again.');
                    },
                    complete: function() {
                        // This will run after success or error
                        // Only needed if you want additional cleanup
                    }
                });
            });


            $('.edit').click(function() {
                $(this).closest('.form-headline').siblings('.profile-form').find('input, textarea').attr(
                    'readonly', false);
                $(this).addClass('d-none');
                $(this).siblings('.save').removeClass('d-none');
                $(this).siblings('.cancel').removeClass('d-none');
            });

            $('.cancel').click(function() {
                $(this).closest('.form-headline').siblings('.profile-form').find('input, textarea').attr(
                    'readonly', true);
                $(this).addClass('d-none');
                $(this).siblings('.save').addClass('d-none');
                $(this).siblings('.edit').removeClass('d-none');
            });

            // start image preview
            let previewImage = function(input, outputSelector) {
                const output = $(outputSelector);

                // Clear previous preview
                output.empty();

                if (input.files && input.files.length > 0) {
                    const file = input.files[0]; // Only take the first file

                    // Check if file is an image
                    if (file.type.match('image.*')) {
                        const fileReader = new FileReader();

                        fileReader.onload = function(e) {
                            const img = $('<img>', {
                                src: e.target.result,
                                class: 'preview-image default-preview img-fluid ',
                                alt: 'Preview',
                                css: {
                                    // Add some styles to the image
                                }
                            });
                            const button = $('<button>', {
                                type: 'submit',
                                class: 'd-flex justify-content-center align-items-center position-absolute text-black bg-white rounded-5 shadow border-0 outline-0 px-4 py-2',
                                css: {
                                    "right": "10px",
                                    "bottom": "10px"
                                }
                            });

                            //<i class="fa-solid fa-floppy-disk"></i>
                            const icon = $('<icon>', {
                                class: "fa-solid fa-floppy-disk"
                            });


                            const small = $('<small>', {
                                class: "fs-6 d-none d-md-inline ms-2",
                                text: "保存"
                            });

                            button.append(icon);
                            button.append(small);

                            output.append(img);
                            output.append(button);
                        };

                        fileReader.onerror = function(e) {
                            console.error('Error reading file:', e);
                        };

                        fileReader.readAsDataURL(file);
                    } else {
                        // Show default image if file isn't an image
                        output.find('img.default-preview').removeClass("d-none");
                    }
                } else {
                    // Show default image when no file selected
                    output.find('img.default-preview').removeClass("d-none");
                }
            }

            // Event listener with error handling
            $("#avatar-input").on('change', function() {
                try {
                    previewImage(this, ".gallery");
                } catch (error) {
                    console.error('Preview error:', error);
                }
            });
            // end image preview



        });
    </script>

@endsection
