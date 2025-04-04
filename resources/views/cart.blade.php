@extends('includes.layout')

@section('title', 'cart')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}" />
    {{-- sweetalert css --}}
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/dist/sweetalert2.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}" /> --}}
    <style>
        .loader {
            width: 50px;
            --b: 8px;
            aspect-ratio: 1;
            border-radius: 50%;
            padding: 1px;
            background: conic-gradient(#0000 10%, #f03355) content-box;
            -webkit-mask:
                repeating-conic-gradient(#0000 0deg, #000 1deg 20deg, #0000 21deg 36deg),
                radial-gradient(farthest-side, #0000 calc(100% - var(--b) - 1px), #000 calc(100% - var(--b)));
            -webkit-mask-composite: destination-in;
            mask-composite: intersect;
            animation: l4 1s infinite steps(10);
        }

        @keyframes l4 {
            to {
                transform: rotate(1turn)
            }
        }
    </style>
@endsection
@section('contents')

    <!-- Step List -->
    <section class="mt-5 mb-3">
        <div class="container-custom">

            <div class="position-relative">
                <div class="progress-box position-absolute w-100 d-flex">
                    <div class="progress-bar-2 mx-auto">
                        <div class="progress-2" style="{{ 'width:' . (100 / 4) * ($step - 1) . '%;' }}"></div>
                    </div>
                </div>

                <ul class="step-list d-flex text-center">
                    <li class="step @if ($step >= 1) active @endif d-flex flex-column align-items-center">
                        <span class="me-2">1</span>
                        <p class="d-none d-md-block">{{ trans_lang('order_detail') }}</p>
                    </li>
                    <li class="step @if ($step >= 2) active @endif d-flex flex-column align-items-center">
                        <span class="me-2">2</span>
                        <p class="d-none d-md-block">{{ trans_lang('login') }}</p>
                    </li>
                    <li class="step @if ($step >= 3) active @endif  d-flex flex-column align-items-center">
                        <span class="me-2">3</span>
                        <p class="d-none d-md-block">{{ trans_lang('shipping_address') }}</p>
                    </li>
                    <li class="step @if ($step >= 4) active @endif d-flex flex-column align-items-center">
                        <span class="me-2">4</span>
                        <p class="d-none d-md-block">{{ trans_lang('payment') }}</p>
                    </li>
                    <li class="step @if ($step >= 5) active @endif d-flex flex-column align-items-center">
                        <span class="me-2">5</span>
                        <p class="d-none d-md-block">{{ trans_lang('complete') }}</p>
                    </li>
                </ul>
            </div>

        </div>
    </section>
    <!-- /Step List -->
    <section class="my-2">
        <div class="container-custom">
            @include('messages.index')
        </div>
    </section>
    <!-- Checkout Step -->
    <x-cart-step step="1" class="mt-5 mb-3" id="checkout">
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
                            <th scope="col">{{ trans_lang('画像') }}</th>
                            <th scope="col">{{ trans_lang('product_name') }}</th>
                            <th scope="col">{{ trans_lang('price') }}</th>
                            <th scope="col">{{ trans_lang('quantity') }}</th>
                            <th scope="col">{{ trans_lang('小計') }}</th>
                            <th scope="col">{{ trans_lang('remove') }}</th>
                        </tr>
                    </thead>
                    <tbody class="dsk-cart-body">
                        @foreach ($carts as $item)
                            <tr class="table-row cart-{{ $item->product->id }}" data-id="{{ $item->product->id }}"
                                data-stock="{{ $item->product->stock }}">
                                <td>
                                    <div class="table-img"><img
                                            src="{{ asset('assets/products/' . $item->product->product_image) }}"
                                            alt="{{ $item->product->name }}"></div>
                                </td>
                                <td class="col-name" id="cart-name-{{ $item->product->id }}"
                                    data-name="{{ $item->product->name }}">{{ $item->product->name }}</td>
                                <td class="price format" id="cart-price-{{ $item->product->id }}"
                                    data-price="{{ $item->product->getSellPrice() ?? 0 }}">
                                    ¥{{ number_format($item->product->getSellPrice(), 0) }}</td>
                                <td>
                                    <div class="quantity d-flex justify-content-center">
                                        <button class="btn decrement">-</button>
                                        <input type="number" id="cart-qty-{{ $item->product->id }}"
                                            value="{{ $item->quantity }}" class="quantity-value" min="1">
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
                            <td colspan="3"></td>
                            <td>{{ trans_lang('total') }}</td>
                            <td>
                                <span class="total" id="total">¥{{ number_format($total, 0) }}</span>
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- ./Desktop Style -->

            <!-- Mobile Style -->
            <div class="mobile d-md-none d-flex flex-column gap-3 table-item mb-cart-body">
                @foreach ($carts as $item)
                    <div class="card cart-{{ $item->product->id }} mobile-card" data-id="{{ $item->product->id }}"
                        data-stock="{{ $item->product->stock }}">
                        <div class="card-img align-content-center me-2">
                            <img src="{{ asset('assets/products/' . $item->product->product_image) }}" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="table-row">
                                <p class="card-name">{{ $item->product->name }}</p>
                                <div class="card-text">
                                    <span class="cost"></span>
                                    <span
                                        class="price format">¥{{ number_format($item->product->getSellPrice(), 0) }}</span>
                                </div>
                                <div class="quantity d-flex">
                                    <button class="btn decrement mobile-btn">-</button>
                                    <input type="number" value="{{ $item->quantity }}"
                                        class="quantity-value mobile-input">
                                    <button class="btn increment mobile-btn">+</button>
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
                    <p>{{ trans_lang('total') }} :</p>
                    <p>
                        <span class="total" id='mobile-total'>¥{{ number_format($total, 0) }}</span>
                    </p>
                </div>
            </div>
            <!-- ./Mobile Style -->

            <div class="d-flex my-4">
                <a href="javascript:void(0);" id="cart_btn"
                    class="common-btn btn-next ms-auto">{{ trans_lang('next') }}</a>
            </div>

        </div>
    </x-cart-step>
    <!-- /Checkout Step -->

    {{-- welcome login start --}}

    <x-cart-step class="my-5" id="login" step="2">
        {{-- <div class="container-custom">

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
                <div class="g-recaptcha" data-sitekey="6Leh4t8qAAAAAOWxMlheFOxzPhOL8STyf9FsI7WE"></div>
                <span class="invalid-feedback"></span>
            </div>
            <div class="input-box d-flex flex-column">
                <span class="text-danger" id="message"></span>
            </div>
        </div>

        <button name="submit" id="submit" type="submit"
            class="input-submit">{{ trans_lang('login') }}</button>

    </form>
    <!-- form end -->
    </div>

    </div> --}}
    </x-cart-step>

    {{-- welcome login end --}}

    {{-- Address Step --}}
    <x-cart-step class="mt-3" id="address" step="3">
        <div class="container-custom">

            <form action="{{ route('cart.address.finished') }}" method="POST" class="w-100 mt-3 profile-form">
                @csrf
                <!-- Form eadline -->
                <div>
                    <h2 class="fw-bold d-flex justify-content-between bg-primary text-white p-2 form-headline">
                        {{ trans_lang('detail') }}
                    </h2>
                </div>
                <!-- /Form Headline -->

                <!-- Form Content -->
                <div class="px-2 py-3">

                    <!-- name -->
                    <div class="input-group mb-2  shadow-none ">
                        <span class="input-group-text t-blue w-25 text-wrap"
                            style="min-width: 120px">{{ trans_lang('name') }}</span>
                        <input type="text" id="username" name="username"
                            value="{{ old('username', session('address') ? session('address')['username'] : auth_helper()?->user()->username ?? '') }}"
                            class="form-control t-blue shadow-none @error('username') is-invalid border border-danger @enderror " />
                        @error('username')
                            <div class="invalid-feedback text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>



                    <!-- phone -->
                    <div class="input-group mb-2 shadow-none">
                        <span class="input-group-text t-blue w-25 text-wrap"
                            style="min-width: 120px">{{ trans_lang('phone_number') }}</span>
                        <input type="text" id="phone" name="phone" maxlength="11"
                            placeholder="—（ハイフン）なしで入力してください"
                            value="{{ old('phone', session('address') ? session('address')['phone'] : (auth_helper()->check() ? (auth_helper()->user()->first_phone ? auth_helper()->user()->first_phone : auth_helper()->user()->second_phone) : '')) }}"
                            class="form-control t-blue shadow-none  @error('phone') is-invalid border border-danger @enderror" />
                        @error('phone')
                            <div class="invalid-feedback text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <!-- postal -->
                    <div class="input-group mb-2  shadow-none">
                        <span class="input-group-text t-blue w-25 text-wrap"
                            style="min-width: 120px">{{ trans_lang('postal') }}</span>
                        <input type="number" id="postal" name="postal" maxlength="7"
                            placeholder="—（ハイフン）なしで入力してください"
                            value="{{ old('postal', session('address') ? session('address')['postal'] : auth_helper()->user()->postal_code ?? '') }}"
                            class="form-control t-blue shadow-none  @error('postal') is-invalid border border-danger @enderror" />
                        @error('postal')
                            <div class="invalid-feedback text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!-- country -->
                    <div class="input-group mb-2  shadow-none d-none">
                        <span class="input-group-text t-blue w-25 text-wrap "
                            style="min-width: 120px">{{ trans_lang('country') }}</span>
                        <input type="text" id="country" name="country"
                            value="{{ old('country', session('address') ? session('address')['country'] : 'Japan') }}"
                            class="form-control t-blue shadow-none  @error('country') is-invalid border border-danger @enderror" />
                        @error('country')
                            <div class="invalid-feedback text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- address -->
                    <div class="input-group mb-2  shadow-none">
                        <span class="input-group-text t-blue w-25 text-wrap"
                            style="min-width: 120px">{{ trans_lang('shipping_address') }}</span>
                        <textarea id="address" name="address"
                            class="form-control t-blue shadow-none  @error('address') is-invalid border border-danger @enderror"
                            rows="3">{{ old('address', session('address') ? session('address')['address'] : auth_helper()?->user()->address ?? '') }}</textarea>
                        @error('address')
                            <div class="invalid-feedback text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>



                    <!-- name -->
                    {{-- <div class="form-group">
                        <label class="w-25" for="name"></label>:
                        <output class="form-output ms-3"
                            for="name">{{ auth_helper()->user()->username ?? '' }}</output>
                <input name="name" class="p-1 mt-2 ms-1 border-0 border-bottom border-2 d-none" id="username"
                    value="{{ auth_helper()->user()->username ?? '' }}" disabled>
                <span class="invalid-feedback"></span>
            </div> --}}

                    {{-- pohne-number link --}}
                    {{-- <div class="form-group">
                        <label class="w-25" for="first_phone">{{ trans_lang('phone_number') }}</label>:
            <output class="form-output ms-3"
                for="first_phone">{{ auth_helper()->user()->first_phone ?? '' }}</output>
            <input type="tel" name="first_phone"
                class="p-1 mt-2 ms-1 border-0 border-bottom border-2 d-none" id="first_phone"
                value="{{ auth_helper()->user()->first_phone ?? '' }}" disabled>
            <span class="invalid-feedback"></span>
    </div> --}}

                    <!-- postal link -->
                    {{-- <div class="form-group">
                        <label class="w-25" for="zip">{{ trans_lang('postal') }}</label>:
    <output class="form-output ms-3" for="zip">1105</output>
    <input type="number" class="p-1 mt-2 ms-1 border-0 border-bottom border-2 d-none" id="zip"
        value="1105" disabled>
    <span class="invalid-feedback"></span>
    </div> --}}

                    <!-- country link -->
                    {{-- <div class="form-group">
                        <label class="w-25" for="country">{{ trans_lang('country') }}</label>:
    <output class="form-output ms-3" for="country">Cambodia</output>
    <input type="text" name="country" class="p-1 mt-2 ms-1 border-0 border-bottom border-2 d-none"
        id="country" value="Cambodia" disabled>
    <span class="invalid-feedback"></span>
    </div> --}}

                    <!-- address link -->
                    {{-- <div class="form-group d-flex align-items-start">
                        <label class="w-25" for="address">{{ trans_lang('shipping_address') }}</label>:
    <output class="form-output ms-3" for="address">Cambodia</output>
    <textarea name="address" class="p-1 mt-2 ms-1 border-2 d-none" id="address" disabled>{{ auth_helper()->user()->address ?? '' }}</textarea>
    <span class="invalid-feedback"></span>
    </div> --}}

                </div>
                <!-- /Form Content -->

                <div class="d-flex gap-3 my-4 justify-content-end address-btn-group">
                    <a href="{{ route('cart.checkout') }}"
                        class="btn btn-outline-primary common-btn btn-back">{{ trans_lang('go_back') }}</a>
                    <button type="submit"
                        class="btn btn-outline-primary common-btn btn-next">{{ trans_lang('next') }}</button>
                </div>

            </form>

        </div>
    </x-cart-step>
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
    <x-cart-step class="mt-3" id="payment" step="4">
        <div class="container-custom">

            <!-- Payment Method Form -->
            <!-- No need to use said by customer -->
            <!-- <div class="popup">
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
                                                                    <a href="" class="common-btn btn btn-outline-primary btn-next-">{{ trans_lang('save') }}</a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div> -->
            <!-- ./Payment Method Form -->

            <!-- Desktop Style -->
            <div class="scroller">
                <table class="table desktop text-center d-md-table d-none table-item pannel pannel-default ">
                    <thead>
                        <tr>
                            <th scope="col">{{ trans_lang('product_name') }}</th>
                            <th scope="col">{{ trans_lang('price') }}</th>
                            <th scope="col">{{ trans_lang('quantity') }}</th>
                            <th scope="col">{{ trans_lang('小計') }}</th>
                        </tr>
                    </thead>
                    <tbody class="dsk-cart-body">
                        @foreach ($carts as $item)
                            <tr class="table-row cart-{{ $item->product->id }}">
                                <td clas="col-name">{{ $item->product->name }}</td>
                                <td class="" id="item-{{ $item->product->id }}-price"
                                    data-price="{{ $item->product->getSellPrice() ?? 0 }}">
                                    ¥{{ number_format($item->product->getSellPrice(), 0) }}</td>
                                <td clas="col-name">{{ $item->quantity }}</td>
                                <td class="">
                                    ¥{{ number_format($item->product->getSellPrice() * $item->quantity, 0) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="1"></td>
                            <td>{{ trans_lang('total') }}</td>
                            <td>
                                <span class="">¥{{ number_format($total, 0) }}</span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- ./Desktop Style -->

            <!-- Mobile Style -->
            <div class="mobile d-md-none d-flex flex-column table-item mb-cart-body">
                @foreach ($carts as $item)
                    <div class="card cart-{{ $item->product->id }}  justify-content-between">

                        <div class="card-body">
                            <p class="card-name w-25">{{ $item->product->name }}</p>
                            <p class="card-qty w-25 text-center">{{ $item->quantity }}</p>
                            <div class="card-text">
                                <span class¥{{ number_format($item->product->getSellPrice() * $item->quantity, 0) }}span>
                                    <span
                                        class="price format">¥{{ number_format($item->product->getSellPrice(), 0) }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="no-cart"></div>

                <div class="d-flex justify-content-between bg-primary text-white mb-3">
                    <p>{{ trans_lang('total') }} :</p>
                    <p>
                        <span class="">¥{{ number_format($total, 0) }}</span>
                    </p>
                </div>
            </div>
            <!-- ./Mobile Style -->
            <div class="d-flex display-block">
                <div class="col-md-6">


                    {{-- Check Payment --}}
                    <div class="">
                        <h2 class="bg-primary text-white" id="payment-check-sec">
                            {{ trans_lang('selet_payment') }}
                        </h2>
                        <div class="d-flex gap-3">
                            <!-- customer said to comment out creadit card input  -->
                            <!-- <input type="checkbox" id="credit_card" name="payment_method" class="payment-checkbox"> -->
                            <label for="credit_card" style="margin-left: 25px;">{{ trans_lang('credit_card') }}</label>
                        </div>
                        <div class="d-flex gap-3">
                            <input type="checkbox" id="cod" name="payment_method" class="payment-checkbox"
                                value="1">
                            <label for="cod">{{ trans_lang('代引き') }}</label>
                        </div>
                        <div class="d-flex gap-3">
                            <input type="checkbox" id="banktransfer" name="payment_method" class="payment-checkbox"
                                value="2">
                            <label for="banktransfer">{{ trans_lang('銀行振込') }}</label>
                        </div>
                        <div class="ms-auto text-danger warning-msg">{{ trans_lang('check_mark') }}</div>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const checkboxes = document.querySelectorAll(".payment-checkbox");

                            checkboxes.forEach(checkbox => {
                                checkbox.addEventListener("change", function() {
                                    if (this.checked) {
                                        checkboxes.forEach(cb => {
                                            if (cb !== this) {
                                                cb.checked = false;
                                                cb.classList.remove('checked');

                                            }
                                        });
                                        this.classList.add('checked');
                                    } else {
                                        this.classList.remove('checked');
                                    }
                                });
                            });
                        });
                    </script>
                    {{-- /Check Payment --}}
                </div>


                {{-- Address --}}
                <div class="col-md-6">

                    <!-- Form Headline -->
                    <div>
                        <h2 class="fw-bold d-flex justify-content-between bg-primary text-white form-headline">
                            {{ trans_lang('detail') }}
                        </h2>
                    </div>
                    <!-- /Form Headline -->

                    <!-- Form Content -->
                    <div class="">

                        <!-- name -->
                        <div class="form-group d-flex">
                            <h3 class="w-25" style="min-width: 120px;">{{ trans_lang('name') }}</h3>:
                            <h3 class="form-output ms-1">{{ session('address') ? session('address')['username'] : '' }}
                            </h3>
                        </div>

                        {{-- pohne-number link --}}
                        <div class="form-group d-flex">
                            <h3 class="w-25" style="min-width: 120px;">{{ trans_lang('phone_number') }}</h3>:
                            <h3 class="form-output ms-1">{{ session('address') ? session('address')['phone'] : '' }}</h3>
                        </div>

                        <!-- postal link -->
                        <div class="form-group d-flex">
                            <h3 class="w-25" style="min-width: 120px;">{{ trans_lang('postal') }}</h3>:
                            <h3 class="form-output ms-1">{{ session('address') ? session('address')['postal'] : '' }}
                            </h3>
                        </div>

                        <!-- country link -->
                        <!-- <div class="form-group d-flex">
                                                                        <h3 class="w-25" style="min-width: 120px;">{{ trans_lang('country') }}</h3>:
                                                                        <h3 class="form-output ms-1">{{ session('address') ? session('address')['country'] : '' }}</h3>
                                                                    </div> -->

                        <!-- address link -->
                        <div class="form-group d-flex align-items-start">
                            <h3 class="w-25" style="min-width: 120px;">{{ trans_lang('shipping_address') }}</h3>:
                            <h3 class="form-output ms-1">{{ session('address') ? session('address')['address'] : '' }}
                            </h3>
                        </div>

                    </div>
                    <!-- /Form Content -->

                </div>
                {{-- /Address --}}
            </div>

            {{-- Payment Policy Aggrement --}}
            <div class="">
                <h2 class="bg-primary text-white" id="payment-check-sec">
                    支払いポリシーに同意する</h2>
                <div class="d-flex gap-3">
                    <input required type="checkbox" id="select-payment">
                    <label for="select-payment">
                        <a href="{{ route('payment_policy') }}">支払いポリシーに同意する</a>
                    </label>
                    <div class="ms-auto text-danger d-none" id="warning-msg">支払いポリシーに同意してください</div>
                </div>

                {{-- <script>
                    document.getElementById('select-payment').addEventListener('change', function() {
                        if (this.checked) {
                            $('#warning-msg').addClass('d-none');
                        } else {
                            $('#warning-msg').removeClass('d-none'); // Show "Check Out"
                        }
                    });
                </script> --}}
            </div>
            {{-- Payment Policy Aggrement --}}
            <div class="d-flex gap-3 my-4 justify-content-end">
                <a href="{{ route('cart.address') }}"
                    class="btn btn-outline-primary common-btn btn-back">{{ trans_lang('go_back') }}</a>
                <!-- Checkout Button (Hidden by Default) -->
                <button data-page="#complete" class="btn btn-outline-primary common-btn btn-payment d-none">
                    {{ trans_lang('check_out') }}
                </button>

                <!-- Save Button (Shown by Default) -->
                <a href="" class="common-btn btn btn-outline-primary btn-next btn-payment" id="checkout_btn">
                    {{ trans_lang('check_out') }}
                </a>
            </div>
            <script>
                $(document).ready(function() {
                    function toggleButtons() {
                        if ($('#credit_card').is(':checked')) {
                            $('.btn-payment').removeClass('d-none'); // Show "Check Out"
                            $('.btn-next').addClass('d-none'); // Hide "Save"
                        } else {
                            $('.btn-payment').addClass('d-none'); // Hide "Check Out"
                            $('.btn-next').removeClass('d-none'); // Show "Save"
                        }
                    }

                    // Trigger on checkbox change
                    $('.payment-checkbox').on('change', function() {
                        toggleButtons();
                    });

                    // Initial check on page load
                    toggleButtons();

                    // Handle "Check Out" button click
                    // $('.btn-payment').on('click', function(e) {
                    //     if (!$('#select-payment').is(':checked')) {
                    //         e.preventDefault(); // Prevent form submission or navigation
                    //         $('#warning-msg').show(); // Show the warning message
                    //     } else {
                    //         console.log('checked');
                    //         $('#warning-msg').hide(); // Hide the warning message if checkbox is selected
                    //     }
                    // });
                });
            </script>
        </div>
    </x-cart-step>
    <!-- /Payment Step -->

    <!-- Complete Step -->
    <!-- Moved to cart/complete.blade.php -->
    <x-cart-step class="mt-5" id="complete" step="5">
        <div class="container-custom">
            <p class="text-center">
                お支払い処理が完了しました。販売元からメールが届きますので、ご確認下さい。
            </p>
            <div class="d-flex gap-3 py-5 justify-content-center">
                <a href="{{ route('support') }}"
                    class="btn btn-outline-primary common-btn">{{ trans_lang('contact_us') }}</a>
                <a href="{{ route('home') }}" class="btn btn-outline-primary common-btn">{{ trans_lang('home') }}</a>
            </div>
        </div>

        {{-- {{ session(['cart_step' => 1])}} --}}
    </x-cart-step>
    <!-- /Complete Step -->

    <!-- All Scripts -->
    <script src="{{ asset('assets/js/caculate.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/pageChange.js') }}"></script> --}}
    <script src="{{ asset('assets/js/updateForm.js') }}"></script>

    {{-- sweetalert js --}}
    <script src="{{ asset('assets/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <script>
        $(document).ready(function() {

            $('button.save').click(function(ev) {
                console.log('save');
                updateData(ev);
                unactiveForm(ev);
            });

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
                    toastr.success(response.message, '')
                    window.location.href = 'cart/login/finished';
                } else {
                    handleErrorMessages(response.errors, response.message);
                }
            }

            // function updatePageWithUserInfo(user) {
            //     console.log(user['username']);
            //     console.log(user['first_phone']);
            //     console.log(user['address']);
            //     $("#username").val(user.username);
            //     $("#first_phone").val(user.first_phone);
            //     $("#address").val(user.address);

            //     $('#name-result').html(user.username);
            //     $('#tel-result').html(user.first_phone);
            //     $('#line_id-result').html(user.line_id);
            //     $('#delivery-result').html(user.address);
            // }

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

            // function addCart(products) {
            //     $.ajax({
            //         url: '/cart/add/login',
            //         type: "POST",
            //         data: {
            //             products: products
            //         },
            //         success: function(response) {
            //             // return response.status;
            //             toastr.success(response.message, '')
            //         }
            //     });
            // }

            function addQty(product_id, qty, stock) {
                if (qty > stock) {
                    toastr.warning("{{ trans_lang('在庫超過') }}");
                    return;
                }
                $.ajax({
                    url: `{{ route('cart.add_qty') }}`,
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
                    if (btn.hasClass('mobile-btn')) {
                        product_id = btn.closest('.mobile-card').data('id');
                        stock = btn.closest('.mobile-card').data('stock'); // Add stock data attribute

                    } else {
                        // console.log('Mobile class does not exist in currentTarget');
                        product_id = btn.closest('tr.table-row').data('id');
                        stock = btn.closest('tr.table-row').data('stock'); // Add stock data attribute
                    }

                    quantity_box = btn.siblings('.quantity-value');
                    quantity = Number(quantity_box.val());
                    quantity += value;

                    quantity = Math.max(1, quantity);

                    addQty(product_id, quantity, stock);

                    if (quantity <= stock) {
                        quantity_box.val(quantity);
                        caculating(btn);
                        setPrice(btn);
                    }
                });
            }

            handleQty('.increment', 1);
            handleQty('.decrement', -1);

            $(document).on('keyup', '.address_input', function() {
                var resultId = '#' + $(this).attr('id') + '-result';
                $(resultId).html($(this).val());
            });

            $('.update-cart').click(function() {
                const quantity = $(this).siblings('.quantity-value').val();
                const stock = $(this).data('stock');

                if (quantity > stock) {
                    alert("{{ trans_lang('在庫超過') }}");
                    return false;
                }

                // ...existing code for updating the cart...
            });

            $('#cart_btn').click(function() {
                let cart = $('.dsk-cart-body .table-row');
                console.log(cart);


                if (cart.length === 0) {
                    Swal.fire('カートが空です!', '', 'warning');
                    return;
                }

                let total = 0;
                let tableRows = '';

                cart.each(function() {


                    id = $(this).data('id');
                    name = $("#cart-name-" + id).data('name');
                    price = +($("#cart-price-" + id).data('price'));
                    quantity = +($("#cart-qty-" + id).val());
                    let itemTotal = price * quantity;

                    total += itemTotal;

                    itemTotal = new Intl.NumberFormat().format(itemTotal);



                    tableRows += `
                        <tr>
                            <td style="padding: 8px;">${name}</td>
                            <td style="padding: 8px;">${quantity}</td>
                            <td style="padding: 8px;">¥${price}</td>
                            <td style="padding: 8px;">¥${itemTotal}</td>
                        </tr>
                    `;
                });

                total = new Intl.NumberFormat().format(total);

                let invoiceHTML = `
                    <div style="text-align:left;">
                        <table style="width:100%; border-collapse: collapse;">
                            <tr>
                                <th style="border-bottom: 1px solid #ddd; padding: 8px;">商品名</th>
                                <th style="border-bottom: 1px solid #ddd; padding: 8px;">数量</th>
                                <th style="border-bottom: 1px solid #ddd; padding: 8px;">価格</th>
                                <th style="border-bottom: 1px solid #ddd; padding: 8px;">合計</th>
                            </tr>
                            ${tableRows}
                        </table>
                        <hr>
                        <p><strong>総合計: ¥${total}</strong></p>
                    </div>
                `;

                Swal.fire({
                    title: '注文内容確認',
                    html: invoiceHTML,
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: '注文を確定',
                    cancelButtonText: 'キャンセル',
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = "{{ route('cart.login') }}"
                    }
                });
            });

        });


        $('#checkout_btn').click(function(e) {
            e.preventDefault();

            const cur = $(this);
            const originalText = cur.html(); // Store original button text

            // Check if payment method is selected
            if (!$('#select-payment').is(':checked')) {
                $('#warning-msg').removeClass('d-none'); // Show warning message
                return false; // Stop execution
            } else {
                $('#warning-msg').addClass('d-none');
            }

            // Get the checked checkbox
            const checkedCheckbox = $('.payment-checkbox:checked');

            if (checkedCheckbox.length == 0) {
                alert('Please select a payment method.');
                return false; // Stop execution if no checkbox is checked
            }

            // Extract data from the checked checkbox
            const checkboxData = checkedCheckbox.val(); // Directly get value from jQuery

            $.ajax({
                url: "{{ route('cart.complete') }}",
                type: "POST",
                data: {
                    payment_id: checkboxData
                },
                beforeSend: function() {
                    cur.prop('disabled', true).html(
                        '<div class="spinner-border spinner-border-sm"></div> 処理中...');
                },
                success: function(response) {
                    if (response.status) {
                        location.href = response.redirect; // Redirect on success
                    } else {
                        alert('Failed to complete checkout.');
                    }
                },
                error: function() {
                    alert('Something went wrong!');
                },
                complete: function() {
                    cur.prop('disabled', false).html(originalText); // Restore button text
                }
            });
        });


        //qty price calculate

        // $('.quantity-value').change(function(e){
        //     input = $(e.currentTarget);
        //     product_id = input.closest('tr.table-row').data('id');
        //     stock = input.closest('tr.table-row').data('stock');

        //     quantity_box = input.siblings('.quantity-value');
        //             quantity = Number(quantity_box.val());
        //             quantity += value;

        //             quantity = Math.max(1, quantity);

        //             addQty(product_id, quantity, stock);

        //             if (quantity <= stock) {
        //                 quantity_box.val(quantity);
        //                 caculating(btn);
        //                 setPrice(btn);
        //             }


        // });

        document.addEventListener('DOMContentLoaded', function() {
            const quantityInputs = document.querySelectorAll('.quantity-value');

            quantityInputs.forEach(input => {
                input.addEventListener('change', validateAndUpdate);
                input.addEventListener('blur', validateAndUpdate); // Update when focus leaves the input

                // Prevent decimal input on keypress
                input.addEventListener('keypress', function(e) {
                    if (e.key === '.' || e.key === ',') {
                        e.preventDefault();
                    }
                });
            });

            function addQty(product_id, qty, stock) {

                if (qty > stock) {
                    toastr.warning("在庫切れ。残り" + stock + "個");
                    return;
                }
                $.ajax({
                    url: `{{ route('cart.add_qty') }}`,
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

            function validateAndUpdate() {
                // console.log('changed');
                const row = this.closest('.mobile-input') ? this.closest('.mobile-card') : this.closest('tr');

                // console.log(row);
                const stock = +(row.getAttribute('data-stock')); // Get stock value
                const quantity = +(this.value); // Get entered quantity

                // console.log(stock);
                // console.log(quantity);

                // Remove any decimal places
                // quantity = Math.floor(quantity);

                // Validate the input value
                if (this.value <= 0 || isNaN(this.value)) {
                    this.value = 1; // Set to minimum quantity if value is <= 0 or not a number
                } else if (quantity > stock) {
                    this.value = stock; // Set to stock value if quantity exceeds stock
                    toastr.warning("在庫切れ。残り" + stock + "個");
                }

                updateTotals();
            }

            function updateTotals() {
                let deskgrandTotal = 0;
                let mobilegrandTotal = 0;
                // console.log('updated');
                //for desktop
                document.querySelectorAll('tbody tr').forEach(row => {

                    product_id = row.getAttribute('data-id');
                    stock = +(row.getAttribute('data-stock')); // Convert stock to integer
                    const priceElement = row.querySelector('.price');
                    const priceVal = priceElement ? priceElement.textContent.replace('¥', '').replace(/,/g,
                        '') : 0;
                    const quantity = +(row.querySelector('.quantity-value')
                        .value); // Convert quantity to integer

                    addQty(product_id, quantity, stock);

                    //   console.log(quantity);
                    const subtotal = priceVal * quantity;

                    //   console.log(subtotal);

                    row.querySelector('.cost').textContent = '¥' + subtotal.toLocaleString();
                    deskgrandTotal += subtotal;
                });

                //for mobile
                document.querySelectorAll('.mobile .mobile-card').forEach(row => {
                    product_id = row.getAttribute('data-id');
                    stock = +(row.getAttribute('data-stock')); // Convert stock to integer
                    const priceElement = row.querySelector('.price');
                    const priceVal = priceElement ? priceElement.textContent.replace('¥', '').replace(/,/g,
                        '') : 0;

                    const quantity = +(row.querySelector('.quantity-value')
                        .value); // Convert quantity to integer

                    addQty(product_id, quantity, stock);

                    //   console.log(quantity);
                    const subtotal = priceVal * quantity;

                    //   console.log(subtotal);

                    // row.querySelector('.cost').textContent = '¥' + subtotal.toLocaleString();
                    mobilegrandTotal += subtotal;
                });


                document.getElementById('total').textContent = '¥' + deskgrandTotal.toLocaleString();
                document.getElementById('mobile-total').textContent = '¥' + mobilegrandTotal.toLocaleString();
            }


        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const desktopInputs = document.querySelectorAll('.dsk-cart-body .quantity-value');
            const mobileInputs = document.querySelectorAll('.mb-cart-body .quantity-value');

            // Function to synchronize quantities between desktop and mobile
            function syncQuantities(productId, newQuantity) {
                // Update desktop input
                const desktopInput = document.querySelector(`.dsk-cart-body .cart-${productId} .quantity-value`);
                if (desktopInput) {
                    desktopInput.value = newQuantity;
                }

                // Update mobile input
                const mobileInput = document.querySelector(`.mb-cart-body .cart-${productId} .quantity-value`);
                if (mobileInput) {
                    mobileInput.value = newQuantity;
                }
            }

            // Add event listeners to desktop inputs
            desktopInputs.forEach(input => {
                input.addEventListener('change', function() {
                    const productId = this.closest('.table-row').getAttribute('data-id');
                    const newQuantity = this.value;

                    // Synchronize with mobile
                    syncQuantities(productId, newQuantity);

                    // Optionally, update totals or perform other actions
                    updateTotals();
                });

                input.addEventListener('blur', function() {
                    const productId = this.closest('.table-row').getAttribute('data-id');
                    const newQuantity = this.value;

                    // Synchronize with mobile
                    syncQuantities(productId, newQuantity);

                    // Optionally, update totals or perform other actions
                    updateTotals();
                });
            });

            // Add event listeners to mobile inputs
            mobileInputs.forEach(input => {
                input.addEventListener('change', function() {
                    const productId = this.closest('.mobile-card').getAttribute('data-id');
                    const newQuantity = this.value;

                    // Synchronize with desktop
                    syncQuantities(productId, newQuantity);

                    // Optionally, update totals or perform other actions
                    updateTotals();
                });

                input.addEventListener('blur', function() {
                    const productId = this.closest('.mobile-card').getAttribute('data-id');
                    const newQuantity = this.value;

                    // Synchronize with desktop
                    syncQuantities(productId, newQuantity);

                    // Optionally, update totals or perform other actions
                    updateTotals();
                });
            });

            // Function to update totals (optional)
            function updateTotals() {
                let total = 0;

                document.querySelectorAll('.dsk-cart-body .table-row').forEach(row => {
                    const price = parseFloat(row.querySelector('.price').getAttribute('data-price'));
                    const quantity = parseInt(row.querySelector('.quantity-value').value);
                    total += price * quantity;
                });

                document.getElementById('total').textContent = '¥' + total.toLocaleString();
                document.getElementById('mobile-total').textContent = '¥' + total.toLocaleString();
            }
        });
    </script>

    <!-- /All Scripts -->

    {{-- Test Scripts --}}

    {{-- /Test Scripts --}}

@endsection
