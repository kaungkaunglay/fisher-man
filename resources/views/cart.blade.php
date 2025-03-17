@extends('includes.layout')

@section('title', 'cart')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}" /> --}}
@endsection
@section('contents')

    <!-- Step List -->
    <section class="mt-5 mb-3">
        <div class="container-custom">

            <div class="position-relative">
                <div class="progress-box position-absolute w-100 d-flex">
                    <div class="progress-bar-2 mx-auto">
                        <div class="progress-2"></div>
                    </div>
                </div>

                <ul class="step-list d-flex text-center">
                    <li class="step active d-flex flex-column align-items-center">
                        <span class="me-2">1</span>
                        <p class="d-none d-md-block">{{ trans_lang('order_detail') }}</p>
                    </li>
                    <li class="step d-flex flex-column align-items-center">
                        <span class="me-2">2</span>
                        <p class="d-none d-md-block">{{ trans_lang('login') }}</p>
                    </li>
                    <li class="step d-flex flex-column align-items-center">
                        <span class="me-2">3</span>
                        <p class="d-none d-md-block">{{ trans_lang('shipping_address') }}</p>
                    </li>
                    <li class="step d-flex flex-column align-items-center">
                        <span class="me-2">4</span>
                        <p class="d-none d-md-block">{{ trans_lang('payment') }}</p>
                    </li>
                    <li class="step d-flex flex-column align-items-center">
                        <span class="me-2">5</span>
                        <p class="d-none d-md-block">{{ trans_lang('complete') }}</p>
                    </li>
                </ul>
            </div>

        </div>
    </section>
    <!-- /Step List -->

    <!-- Checkout Step -->
    <section class="page" id="checkout" data-step="1">
        <div class="container-custom">

            <!-- Desktop Style -->
            <div class="scroller">
                <table class="table desktop text-center d-md-table d-none table-item">
                    <colgroup>
                        <col width="15%"> <!-- image -->
                        <col width="25%"> <!-- product name -->
                        <col width="15%"> <!-- price -->
                        <col width="20%"> <!-- quantity -->
                        <col width="15%"> <!-- total -->
                        <col width="10%"> <!-- remove -->
                    </colgroup>
                    <thead>
                        <tr>
                            <th scope="col">{{ trans_lang('image') }}</th>
                            <th scope="col">{{ trans_lang('product_name') }}</th>
                            <th scope="col">{{ trans_lang('price') }}</th>
                            <th scope="col">{{ trans_lang('quantity') }}</th>
                            <th scope="col">{{ trans_lang('total') }}</th>
                            <th scope="col">{{ trans_lang('remove') }}</th>
                        </tr>
                    </thead>
                    <tbody class="dsk-cart-body">
                        @foreach ($carts as $item)
                            <tr class="table-row cart-{{ $item->product->id }}" data-id="{{ $item->product->id }}">
                                <td>
                                    <div class="table-img"><img
                                            src="{{ asset('assets/products/' . $item->product->product_image) }}"
                                            alt="{{ $item->product->name }}"></div>
                                </td>
                                <td class="col-name">{{ $item->product->name }}</td>
                                <td class="price format">¥{{ number_format($item->product->getSellPrice(), 0) }}</td>
                                <td>
                                    <div class="quantity d-flex justify-content-center">
                                        <button class="btn decrement">-</button>
                                        <input type="number" value="{{ $item->quantity }}" class="quantity-value"
                                            readonly>
                                        <button class="btn increment">+</button>
                                    </div>
                                </td>
                                <td class="cost"></td>
                                <td class="col-remove">
                                    <a href="javascript:void(0);" class="mx-auto dsk-cart-del-btn"
                                        data-id="{{ $item->product->id }}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <td>{{ trans_lang('total') }}</td>
                            <td>
                                <span class="total"></span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- ./Desktop Style -->

            <!-- Mobile Style -->
            <div class="mobile d-md-none d-flex flex-column gap-3 table-item mb-cart-body">
                @foreach ($carts as $item)
                    <div class="card cart-{{ $item->product->id }}">
                        <div class="card-img align-content-center me-2">
                            <img src="{{ asset('assets/products/' . $item->product->product_image) }}" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="table-row">
                                <p class="card-name">{{ $item->product->name }}</p>
                                <div class="card-text">
                                    <span class="cost"></span>
                                    <span
                                        class="price format">¥{{ number_format($item->product->product_price, 0) }}</span>
                                </div>
                                <div class="quantity d-flex">
                                    <button class="btn decrement">-</button>
                                    <input type="number" value="{{ $item->quantity }}" class="quantity-value">
                                    <button class="btn increment">+</button>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="btn mb-cart-del-btn" data-id="{{ $item->product->id }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
                <div class="no-cart"></div>
                <div class="d-flex justify-content-between bg-primary text-white p-2 mt-3">
                    <p>Total :</p>
                    <p>
                        <span class="total"></span>
                    </p>
                </div>
            </div>
            <!-- ./Mobile Style -->

            <div class="d-flex my-4">
                <button class="common-btn btn-next ms-auto"
                    data-page="{{ $carts->count() > 0 ? (auth_helper()->check() ? '#address' : '#login') : '#checkout' }}">{{ trans_lang('next') }}</button>
            </div>

        </div>
    </section>
    <!-- /Checkout Step -->

    {{-- welcome login start --}}

    <section class="page my-5" id="login" data-step="2">
        <div class="container-custom">

            <div class="login-box d-flex flex-column">
                <div class="login-header">
                    <h2> {{ trans_lang('login') }}
                        <p> {{ trans_lang('welcome') }}</p>
                    </h2>
                </div>

                <!-- form start -->
                <form action="#" id="login_form" method="POST" name="login_form"
                    class="input-container d-flex flex-column">
                    @csrf
                    <div class="input-box d-flex flex-column">
                        <label for="username">{{ trans_lang('username') }}</label>
                        <div class="input-group">
                            <input id="username" name="username"
                                placeholder="{{ trans_lang('username') }} or {{ trans_lang('email') }}" type="text"
                                class="form-control">
                            <button class="btn" type="button" tabindex="-1"><i
                                    class="fa-solid fa-user"></i></button>
                        </div>
                        <span class="invalid-feedback"></span>
                    </div>

                    <div class="input-box d-flex flex-column">
                        <label for="password">{{ trans_lang('password') }}</label>
                        <div class="input-group">
                            <input name="password" placeholder="********" type="password" id="password"
                                class="form-control">
                            <button class="btn password" tabindex="-1"><i class="fa-solid fa-eye"></i></button>
                        </div>
                        <span class="invalid-feedback"></span>
                    </div>

                    <div>
                        <div class="input-box d-flex flex-column mx-auto">
                            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="input-box d-flex flex-column">
                            <span class="text-danger" id="message"></span>
                        </div>
                    </div>

                    <button name="submit" id="submit" type="submit"
                        class="input-submit">{{ trans_lang('login') }}</button>
                    {{-- <div class="line-wpr green-bg">
                        <a href="{{ route('line.login') }}">
                            <img loading="lazy" class="icon_social" src="{{ asset('assets/icons/custom/line.png') }}"
                                alt="Line">
                            {{ trans_lang('login_line') }}
                        </a>
                    </div>
                    <div class="icon-wpr">
                        <a loading="lazy" href="{{ route('google.login') }}"><img class="icon_social"
                                src="{{ asset('assets/icons/custom/google.png') }}" alt="Google"></a>
                        <a loading="lazy" href="{{ route('facebook.login') }}"><img class="icon_social"
                                src="{{ asset('assets/icons/custom/facebook.png') }}" alt="Facebook"></a>
                    </div>
                    <div class="register">
                        <span>{{ trans_lang('no_have_account_msg') }}
                            <a href="{{ route('register') }}" class="ms-1">{{ trans_lang('register') }}</a>
                        </span>
                    </div>
                    <div class="pw-setting d-flex flex-column gap-3 align-items-center">
                        <div class="remember">
                            <input type="checkbox" name="remember" id="remember" value="1">
                            <label for="remember">{{ trans_lang('remember') }}</label>
                        </div>

                        <div class="forgot-pw">
                            <a href="{{ route('forgotpassword') }}">{{ trans_lang('forget_password') }}</a>
                        </div>
                    </div> --}}
                </form>
                <!-- form end -->
            </div>

        </div>
    </section>

    {{-- welcome login end --}}

    <!-- Login Step -->
    {{-- <section class="page mt-5" id="login" data-step="2">
        <div class="container-custom">

            <div class="border w-75 mx-auto px-5 py-3 rounded shadow login-box">
                <h2 class="text-center mb-3">{{ trans_lang('login') }}</h2>
                <form action="#" id="login_form" method="POST">
                    @csrf
                    <div class="d-flex flex-column">
                        <div class="form-group row mt-3 align-items-center">
                            <label for="username" class="col-12 col-md-4">{{ trans_lang('name') }}</label>
                            <div class="col-12 col-md-8 mt-2">
                                <div class="input-group border border-2 rounded px-0">
                                    <input type="text" name="username" id="username" class="form-control border-0"
                                        placeholder="Username or Email">
                                    <button class="btn" tabindex="-1">
                                        <i class="fa-solid fa-user"></i>
                                    </button>
                                </div>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="form-group row mt-3 align-item-center">
                            <label for="password" class="col-12 col-md-4">{{ trans_lang('password') }}</label>
                            <div class="col-12 col-md-8 mt-2">
                                <div class="input-group border border-2 rounded px-0">
                                    <input type="password" name="password" id="password" class="form-control border-0"
                                        placeholder="********">
                                    <button class="btn password" tabindex="-1">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </div>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="input-box text-center">
                            <span class="mb-3 text-danger" id="message"></span>
                        </div>
                        <div class="form-group d-flex flex-column mt-2 mx-auto">
                            <div class="g-recaptcha" data-sitekey="{{env('RECAPTCHA_SITE_KEY')}}"></div>
                            <span class="invalid-feedback mt-1"></span>
                        </div>
                        <button type="submit" class="common-btn -solid mx-auto mt-5 rounded-pill w-100 m-b-20">Login</button>
                        <div class="line-wpr green-bg">
                            <a href="{{route('line.login')}}">
                                <img loading="lazy" class="icon_social" src="{{ asset('assets/icons/custom/line.png') }}" alt="Line">
                                {{trans_lang('login_line')}}
                            </a>
                        </div>
                        <div class="icon-wpr">
                            <a loading="lazy" href="{{route('google.login')}}"><img class="icon_social" src="{{ asset('assets/icons/custom/google.png') }}" alt="Google"></a>
                            <a loading="lazy" href="{{route('facebook.login')}}"><img class="icon_social" src="{{ asset('assets/icons/custom/facebook.png') }}" alt="Facebook"></a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section> --}}
    <!-- /Login Step -->

    {{-- Address Step --}}
    <section class="page mt-3" id="address" data-step="3">
        <div class="container-custom">

            <form action="#" class="w-100 mt-3 profile-form">

                <!-- Form Headline -->
                <div>
                    <h2 class="fw-bold d-flex justify-content-between bg-primary text-white p-2 form-headline">
                        {{ trans_lang('detail') }}

                        <!-- button group -->
                        <div class="d-flex justify-content-end gap-4">
                            <button type="button" class="save d-none">
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

                    <!-- name -->
                    <div class="form-group">
                        <label class="w-25" for="name">{{ trans_lang('name') }}</label>:
                        <output class="form-output ms-3"
                            for="name">{{ auth_helper()->user()->username ?? '' }}</output>
                        <input name="name" class="p-1 mt-2 ms-1 border-0 border-bottom border-2 d-none" id="name"
                            value="{{ auth_helper()->user()->username ?? '' }}" disabled>
                        <span class="invalid-feedback"></span>
                    </div>

                    {{-- pohne-number link --}}
                    <div class="form-group">
                        <label class="w-25" for="first_phone">{{ trans_lang('phone_number') }}</label>:
                        <output class="form-output ms-3"
                            for="first_phone">{{ auth_helper()->user()->first_phone ?? '' }}</output>
                        <input type="tel" name="first_phone"
                            class="p-1 mt-2 ms-1 border-0 border-bottom border-2 d-none" id="first_phone"
                            value="{{ auth_helper()->user()->first_phone ?? '' }}" disabled>
                        <span class="invalid-feedback"></span>
                    </div>

                    <!-- postal link -->
                    <div class="form-group">
                        <label class="w-25" for="zip">{{ trans_lang('postal') }}</label>:
                        <output class="form-output ms-3" for="zip">1105</output>
                        <input type="number" class="p-1 mt-2 ms-1 border-0 border-bottom border-2 d-none" id="zip"
                            value="1105" disabled>
                        <span class="invalid-feedback"></span>
                    </div>

                    <!-- country link -->
                    <div class="form-group">
                        <label class="w-25" for="country">{{ trans_lang('country') }}</label>:
                        <output class="form-output ms-3" for="country">Cambodia</output>
                        <input type="text" name="country" class="p-1 mt-2 ms-1 border-0 border-bottom border-2 d-none"
                            id="country" value="Cambodia" disabled>
                        <span class="invalid-feedback"></span>
                    </div>

                    <!-- address link -->
                    <div class="form-group d-flex align-items-start">
                        <label class="w-25" for="address">{{ trans_lang('shipping_address') }}</label>:
                        <output class="form-output ms-3" for="address">Cambodia</output>
                        <textarea name="address" class="p-1 mt-2 ms-1 border-2 d-none" id="address" disabled>{{ auth_helper()->user()->address ?? '' }}</textarea>
                        <span class="invalid-feedback"></span>
                    </div>

                </div>
                <!-- /Form Content -->

                <div class="d-flex gap-3 my-4 justify-content-end address-btn-group">
                    <button class="btn btn-outline-primary common-btn btn-back"
                        data-page="#checkout">{{ trans_lang('go_back') }}</button>
                    <button class="btn btn-outline-primary common-btn btn-next"
                        data-page="#payment">{{ trans_lang('next') }}</button>
                </div>

            </form>

        </div>
    </section>
    {{-- /Address Step --}}

    <!-- Address Step -->
    {{-- <section class="page mt-3" id="address" data-step="3">
        <div class="container-custom">

            <div class="p-3 bg-primary d-flex text-white">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h2>{{ trans_lang('detail') }}</h2>
                    <button id="edit">
                        <i class="fas fa-square-pen text-white"></i>
                    </button>
                </div>
            </div>

            <!-- Input -->
            <div class="address-form">
                <form action="#" method="post">
                    <table>
                        <tr>
                            <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                                <label for="name">{{ trans_lang('name') }}</label>
                                <b>:</b>
                            </th>
                            <td class="p-1 bg-white">
                                <input type="text" id="username" name="username" class="p-1 address_input"
                                    value="{{ auth_helper()->user()->username ?? '' }}">
                            </td>
                        </tr>
                        <tr>
                            <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                                <label for="tel">{{ trans_lang('phone_number') }}</label>
                                <b>:</b>
                            </th>
                            <td class="p-1 bg-white">
                                <input type="number" name="first_phone" id="tel" class="p-1 address_input"
                                    value="{{ auth_helper()->user()->first_phone ?? '' }}">
                            </td>
                        </tr>
                        <tr>
                            <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                                <label for="line_id">{{ trans_lang('line_id') }}</label>
                                <b>:</b>
                            </th>
                            <td class="p-1 bg-white">
                                <input type="text" id="line_id" class="p-1 address_input"
                                    value="{{ auth_helper()->user()->line_id ?? '' }}">
                            </td>
                        </tr>
                        <tr>
                            <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                                <label for="zip">{{ trans_lang('postal') }}</label>
                                <b>:</b>
                            </th>
                            <td class="p-1 bg-white">
                                <input type="text" id="zip" class="p-1 address_input">
                            </td>
                        </tr>
                        <tr>
                            <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                                <label for="country">{{ trans_lang('country') }}</label>
                                <b>:</b>
                            </th>
                            <td class="p-1 bg-white">
                                <select id="country" class="p-1 address_input">
                                    <option value="Japan" selected>Japan</option>
                                    <option value="America" selected>America</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                                <label for="delivery">{{ trans_lang('shipping_address') }}</label>
                                <b>:</b>
                            </th>
                            <td class="p-1 bg-white">
                                <input type="number" id="delivery" class="p-1 address_input"
                                    value="{{ auth()->user()->address ?? '' }}">
                            </td>
                        </tr>
                    </table>
                    <div class="d-flex gap-3 my-4 justify-content-end">
                        <button data-page="#checkout" class="btn btn-outline-primary common-btn"
                            id="cancel">{{ trans_lang('cancle') }}</button>
                        <button type="button" data-page="#payment"
                            class="btn btn-outline-primary common-btn">{{ trans_lang('save') }}</button>
                    </div>
                </form>
            </div>
            <!-- /input -->

            <!-- Output -->
            <div class="address-detail">
                <table>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>{{ trans_lang('name') }}</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <p class="p-1">{{ auth()->user()->username ?? '' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>{{ trans_lang('phone_number') }}</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <a class="p-1" href="tel:0988888888">{{ auth()->user()->first_phone ?? '' }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>{{ trans_lang('line_id') }}</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <a class="p-1" href="#">{{ auth()->user()->line_id ?? '' }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>{{ trans_lang('postal') }}</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <p class="p-1">110001</p>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>{{ trans_lang('country') }}</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <p class="p-1">Japan</p>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>{{ trans_lang('shipping_address') }}</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <p class="p-1">{{ auth()->user()->address ?? '' }}</p>
                        </td>
                    </tr>
                </table>
                <div class="d-flex gap-3 my-4 justify-content-end">
                    <button class="btn btn-outline-primary common-btn btn-back"
                        data-page="#checkout">{{ trans_lang('go_back') }}</button>
                    <button class="btn btn-outline-primary common-btn btn-next"
                        data-page="#payment">{{ trans_lang('next') }}</button>
                </div>
            </div>
            <!-- /output -->

        </div>
    </section> --}}
    <!-- /Address Step -->

    <!-- Payment Step -->
    <section class="page mt-3" id="payment" data-step="4">
        <div class="container-custom">

            <!-- Payment Method Form -->
            <div class="popup">
                <div class="bg-white rounded-3 border text-black mx-auto" id="payment-form">
                    <h2 class="title">{{ trans_lang('payment') }}</h2>
                    <form class="d-flex flex-column" action="">
                        <div>
                            <label for="card-number">Card number</label>
                            <div class="input-group border bg-white rounded">
                                <input type="number" name="" id="card-number"
                                    class="form-control border-0 p-2 shadow-none" placeholder="1234 1234 1234 1234">
                                <div class="input-group-append d-flex gap-1 p-2 align-item-center">
                                    <div class="card-bank-img align-content-center">
                                        <img src="{{ asset('assets/icons/custom/visa.svg') }}" alt="visa.svg">
                                    </div>
                                    <div class="card-bank-img align-content-center">
                                        <img src="{{ asset('assets/icons/custom/mastercard.svg') }}"
                                            alt="mastercard.svg">
                                    </div>
                                    <div class="card-bank-img align-content-center">
                                        <img src="{{ asset('assets/icons/custom/visa.svg') }}" alt="amex.svg">
                                    </div>
                                    <div class="card-bank-img align-content-center">
                                        <img src="{{ asset('assets/icons/custom/discover.svg') }}" alt="discover.svg">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column flex-sm-row input-wpr">
                            <div class="w-100">
                                <label for="expire">Expiration</label>
                                <input type="date" name="" id="expire" class="w-100 p-2 border rounded">
                            </div>
                            <div class="w-100">
                                <label for="cvc">CVC</label>
                                <div class="input-group border bg-white rounded">
                                    <input type="number" name="" id="cvc"
                                        class="form-control border-0 p-2 shadow-none" placeholder="CVC">
                                    <div class="input-group-append p-2 align-content-center">
                                        <div class="card-bank-img">
                                            <img src="{{ asset('assets/icons/custom/discover.svg') }}" alt="visa.svg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column flex-sm-row input-wpr">
                            <div class="w-100">
                                <label for="count">{{ trans_lang('country') }}</label>
                                <select id="count" class="w-100 p-2 border rounded">
                                    <option value="jpn" selected>Japan</option>
                                </select>
                            </div>
                            <div class="w-100">
                                <label for="zp">{{ trans_lang('postal') }}</label>
                                <input name="" type="number" id="zp" class="w-100 p-2 border rounded"
                                    placeholder="104-0044">
                            </div>
                        </div>

                        <p class="content">
                            By providing your card information, you allow Awardco, Inc. to charge your card for future
                            payments in
                            accordance with their terms.
                        </p>
                        <div class="d-flex align-items-start gap-2">
                            <input type="checkbox" id="agree" class=" mt-2">
                            <label for="agree">
                                I agree that by saving this payment method it will be available for use to all who have
                                access to this
                                page or to processing funding deposits.
                            </label>
                        </div>

                        <div class="d-flex gap-3 text-center justify-content-center">
                            <button class="common-btn btn btn-outline-primary"
                                id="cancel">{{ trans_lang('cancle') }}</button>
                            <button class="common-btn btn btn-outline-primary btn-next"
                                data-page="#complete">{{ trans_lang('save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ./Payment Method Form -->

            <!-- Desktop Style -->
            <div class="scroller">
                <table class="table desktop text-center d-md-table d-none table-item pannel pannel-default ">
                    <thead>
                        <tr>
                            <th scope="col">{{ trans_lang('image') }}</th>
                            <th scope="col">{{ trans_lang('product_name') }}</th>
                            <th scope="col">{{ trans_lang('price') }}</th>
                            <th scope="col">{{ trans_lang('total') }}</th>
                        </tr>
                    </thead>
                    <tbody class="dsk-cart-body">
                        @foreach ($carts as $item)
                            <tr class="table-row cart-{{ $item->product->id }}">
                                <td>
                                    <div class="table-img"><img
                                            src="{{ asset('assets/products/' . $item->product->product_image) }}"
                                            alt="product img"></div>
                                </td>
                                <td clas="col-name">{{ $item->product->name }}</td>
                                <td class="price format">¥{{ number_format($item->product->getSellPrice(), 0) }}</td>
                                <td class="cost">
                                    <input type="hidden" value="1" class="quantity-value">
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td>{{ trans_lang('total') }}</td>
                            <td>
                                <span class="total"></span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- ./Desktop Style -->

            <!-- Mobile Style -->
            <div class="mobile d-md-none d-flex flex-column gap-3 table-item mb-cart-body">
                @foreach ($carts as $item)
                    <div class="card cart-{{ $item->product->id }}">
                        <div class="card-img align-content-center me-2">
                            <img src="{{ asset('assets/products/' . $item->product->product_image) }}" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="table-row">
                                <p class="card-name">{{ $item->product->name }}</p>
                                <div class="card-text">
                                    <span class="cost">
                                        <input type="hidden" value="1" class="quantity-value">
                                    </span>
                                    <span
                                        class="price format">¥{{ number_format($item->product->product_price, 0) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="no-cart"></div>

                <div class="d-flex justify-content-between bg-primary text-white p-2 mt-3">
                    <p>Total :</p>
                    <p>
                        <span class="total"></span>
                    </p>
                </div>
            </div>
            <!-- ./Mobile Style -->

            {{-- Payment Policy Aggrement --}}
            <div>
                <h2 class="py-3 px-3 mt-5 bg-primary text-white" id="payment-check-sec">
                    {{ trans_lang('agrement_payment_policy') }}</h2>
                <div class="d-flex gap-3 py-3 px-3">
                    <input required type="checkbox" id="select-payment">
                    <label for="select-payment"><a
                            href="{{ route('payment_policy') }}">{{ trans_lang('agree_payment_policy') }}</a></label>
                    <div class="ms-auto text-danger" id="warning-msg">{{ trans_lang('check_mark') }}</div>
                </div>
            </div>
            {{-- Payment Policy Aggrement --}}

            {{-- Check Payment --}}
            <div>
                <h2 class="py-3 px-3 mt-3 bg-primary text-white" id="payment-check-sec">{{ trans_lang('selet_payment') }}
                </h2>
                <div class="d-flex gap-3 py-3 px-3">
                    <input type="checkbox" id="select-payment">
                    <label for="select-payment">{{ trans_lang('credit_card') }}</label>
                    <div class="ms-auto text-danger" id="warning-msg">{{ trans_lang('check_mark') }}</div>
                </div>
            </div>
            {{-- /Check Payment --}}

            {{-- Address --}}
            <div>

                <!-- Form Headline -->
                <div>
                    <h2 class="fw-bold d-flex justify-content-between bg-primary text-white p-2 form-headline">
                        {{ trans_lang('detail') }}
                    </h2>
                </div>
                <!-- /Form Headline -->

                <!-- Form Content -->
                <div class="px-2 py-3">

                    <!-- name -->
                    <div class="form-group d-flex">
                        <h3 class="w-25">{{ trans_lang('name') }}</h3>:
                        <output class="form-output ms-">{{ auth_helper()->user()->username ?? '' }}</output>
                        <span class="invalid-feedback"></span>
                    </div>

                    {{-- pohne-number link --}}
                    <div class="form-group d-flex">
                        <h3 class="w-25">{{ trans_lang('phone_number') }}</h3>:
                        <output class="form-output">{{ auth_helper()->user()->first_phone ?? '' }}</output>
                        <span class="invalid-feedback"></span>
                    </div>

                    <!-- postal link -->
                    <div class="form-group d-flex">
                        <h3 class="w-25">{{ trans_lang('postal') }}</h3>:
                        <output class="form-output">1105</output>
                        <span class="invalid-feedback"></span>
                    </div>

                    <!-- country link -->
                    <div class="form-group d-flex">
                        <h3 class="w-25">{{ trans_lang('country') }}</h3>:
                        <output class="form-output">Cambodia</output>
                        <span class="invalid-feedback"></span>
                    </div>

                    <!-- address link -->
                    <div class="form-group d-flex align-items-start">
                        <h3 class="w-25">{{ trans_lang('shipping_address') }}</h3>:
                        <output class="form-output">{{ auth_helper()->user()->address ?? '' }}</output>
                        <span class="invalid-feedback"></span>
                    </div>

                </div>
                <!-- /Form Content -->

            </div>
            {{-- /Address --}}

            <div class="d-flex gap-3 my-4 justify-content-end">
                <a
                    data-page="#address"class="btn btn-outline-primary common-btn btn-back">{{ trans_lang('go_back') }}</a>
                <button data-page="#complete"
                    class="btn btn-outline-primary common-btn btn-payment">{{ trans_lang('check_out') }}</button>
            </div>
        </div>
    </section>
    <!-- /Payment Step -->
    <!-- Complete Step -->
    <section class="page mt-5" id="complete" data-step="5">
        <div class="container-custom">
            <p class="text-center">
                {{ trans_lang('paymnet_success_msg') }}
            </p>
            <div class="d-flex gap-3 py-5 justify-content-center">
                <a href="{{ route('support') }}"
                    class="btn btn-outline-primary common-btn">{{ trans_lang('contact_us') }}</a>
                <a href="{{ route('home') }}" class="btn btn-outline-primary common-btn">{{ trans_lang('home') }}</a>
            </div>
        </div>
    </section>
    <!-- /Complete Step -->

    <!-- All Scripts -->
    <script src="{{ asset('assets/js/caculate.js') }}"></script>
    <script src="{{ asset('assets/js/pageChange.js') }}"></script>
    <script src="{{ asset('assets/js/updateForm.js') }}"></script>
    <script>
        $(document).ready(function() {

            function checkIfEmpty() {
                var dskbody = $('.dsk-cart-body');
                var mbbody = $('.mb-cart-body');
                if (dskbody.find('tr').length === 0 || mbbody.find('.card').length === 0) {
                    dskbody.html(
                        `<tr><td colspan="6" class="text-center">{{ trans_lang('no_product') }}</td></tr>`);

                    mbbody.find('.no-cart').html(
                        `<div class="text-center my-3">{{ trans_lang('no_product') }}</div>`)

                    $('[data-page]').attr('data-page', '#checkout');
                }

            }

            checkIfEmpty();

            function removeCart(id) {
                $('.table-item').find(`.cart-${id}`).remove();
                checkIfEmpty();
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // for desktop

            function deleteCart(product_id) {
                $.ajax({
                    url: `/cart/delete/${product_id}`,
                    type: "DELETE",
                    data: {
                        id: product_id
                    },
                    success: function(response) {
                        // location.reload();
                        if (response.status) {

                            // toastr.warning(response.message,'')
                            removeCart(product_id);
                            netTotal();
                            // updateCartCount();
                            let count = Math.max(0, getStoredCount("cart_count") - 1);
                            updateStoredCount("cart_count", "#cart_count, #cart_count_bottom", count);
                        } else {
                            // toastr.error(response.message,'')
                        }
                    }
                });
            }

            //dsk-cart-del-btn
            function handelDeleteCartBtn(class_name) {
                $(`.${class_name}`).click(function(e) {
                    e.preventDefault();

                    const getid = $(this).data('id');

                    deleteCart(getid);

                });
            }
            // desktop delete button
            handelDeleteCartBtn('dsk-cart-del-btn');

            // mobile delete button
            handelDeleteCartBtn('mb-cart-del-btn');

            $('#login_form').submit(function(e) {
                e.preventDefault();

                var products = collectProducts();

                var formData = new FormData(this);

                sendLoginData(formData, products);
            });

            function collectProducts() {
                var products = [];
                $('.table-row').each(function() {
                    var productId = $(this).data('id');
                    if (productId) {
                        var quantity = $(this).find('.quantity-value').val();
                        products.push({
                            id: productId,
                            quantity: quantity
                        });
                    }
                });
                return products;
            }

            function sendLoginData(formData, products) {
                $.ajax({
                    url: "{{ route('login_store') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        handleLoginResponse(response, products);
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error: ', error);
                    }
                });
            }

            function handleLoginResponse(response, products) {
                if (response.status) {
                    $(".btn-next[data-page='#login']").attr('data-page', '#address');

                    updatePageWithUserInfo(response.user);
                    $('#login').closest('.page').hide();
                    $('#address').fadeIn();
                    addCart(products);
                } else {
                    handleErrorMessages(response.errors, response.message);
                }
            }

            function updatePageWithUserInfo(user) {
                $(".address_input#username").val(user.username);
                $(".address_input#tel").val(user.first_phone);
                $(".address_input#line_id").val(user.line_id);
                $(".address_input#delivery").val(user.address);

                $('#name-result').html(user.username);
                $('#tel-result').html(user.first_phone);
                $('#line_id-result').html(user.line_id);
                $('#delivery-result').html(user.address);
            }

            function handleErrorMessages(errors, message) {
                $('#message').html(message ?? '');

                var fields = ['username', 'password', 'g-recaptcha-response'];
                fields.forEach(function(field) {
                    var fieldGroup = $('#' + field).closest('.input-box');
                    var errorSpan = fieldGroup.find('span.invalid-feedback');

                    if (errors[field]) {
                        errorSpan.addClass('d-block').html(errors[field]);
                    } else {
                        errorSpan.removeClass('d-block').html('');
                    }
                });
            }

            function addCart(products) {
                $.ajax({
                    url: '/cart/add/login',
                    type: "POST",
                    data: {
                        products: products
                    },
                    success: function(response) {
                        // return response.status;
                        toastr.success(response.message, '')
                    }
                });
            }

            function addQty(product_id, qty) {
                $.ajax({
                    url: '{{ route('cart.add_qty') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        product_id: product_id,
                        quantity: qty
                    },
                    success: function(response) {
                        // console.log(response.message);
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error: ', error);
                    }
                });
            }

            function handleQty(class_name, value) {
                $(class_name).click(function(e) {
                    btn = $(e.currentTarget);
                    product_id = btn.closest('tr.table-row').data('id');

                    quantity_box = btn.siblings('.quantity-value');
                    quantity = Number(quantity_box.val());
                    quantity += value;

                    quantity = Math.max(1, quantity);

                    addQty(product_id, quantity);

                    quantity_box.val(quantity);

                    caculating(btn);
                    setPrice(btn);
                })

            }

            handleQty('.increment', 1);
            handleQty('.decrement', -1);

            $(document).on('keyup', '.address_input', function() {
                var resultId = '#' + $(this).attr('id') + '-result';
                $(resultId).html($(this).val());
            });

        });
    </script>
    <!-- /All Scripts -->

    {{-- Test Scripts --}}

    {{-- /Test Scripts --}}

@endsection
