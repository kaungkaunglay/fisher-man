@extends('includes.layout')

@section('title', 'cart')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}" />
@endsection
@section('contents')

    <!-- Step List -->
    <section class="py-4 mt-3">
        <div class="container-custom px-0">

            <div class="position-relative">
                <div class="progress-box w-100 h-100 position-absolute d-flex">
                    <span class="progress-bar m-auto">
                        <span class="progress"></span>
                    </span>
                </div>
                <ul class="step-list d-flex text-center">
                    <li class="step active d-flex flex-column align-items-center">
                        <span class="me-2">1</span>
                        <p class="d-none d-md-block">{{trans_lang('order_detail')}}s</p>
                    </li>
                    <li class="step d-flex flex-column align-items-center">
                        <span class="me-2">2</span>
                        <p class="d-none d-md-block">{{trans_lang('login')}}</p>
                    </li>
                    <li class="step d-flex flex-column align-items-center">
                        <span class="me-2">3</span>
                        <p class="d-none d-md-block">{{trans_lang('shipping_address')}}</p>
                    </li>
                    <li class="step d-flex flex-column align-items-center">
                        <span class="me-2">4</span>
                        <p class="d-none d-md-block">{{trans_lang('payment')}}</p>
                    </li>
                    <li class="step d-flex flex-column align-items-center">
                        <span class="me-2">5</span>
                        <p class="d-none d-md-block">{{trans_lang('complete')}}</p>
                    </li>
                </ul>
            </div>

        </div>
    </section>
    <!-- /Step List -->

    <!-- Checkout Step -->
    <section class="page" id="checkout">
        <div class="container-custom">

            <!-- Desktop Style -->
            <div class="scroller">
                <table class="table desktop text-center d-md-table d-none table-item">
                    <thead>
                        <tr>
                            <th scope="col">{{trans_lang('image')}}</th>
                            <th scope="col">{{trans_lang('product_name')}}</th>
                            <th scope="col">{{trans_lang('price')}}</th>
                            <th scope="col">{{trans_lang('quantity')}}</th>
                            <th scope="col">{{trans_lang('total')}}</th>
                            <th scope="col">{{trans_lang('remove')}}</th>
                        </tr>
                    </thead>
                    <tbody class="dsk-cart-body">
                        @foreach ($carts as $item)
                            <tr class="table-row cart-{{ $item->product->id }}" data-id="{{ $item->product->id }}">
                                <td>
                                    <div class="table-img"><img src="{{ asset($item->product->product_image) }}"
                                            alt="{{ $item->product->name }}"></div>
                                </td>
                                <td class="col-name">{{ $item->product->name }}</td>
                                <td class="price">¥{{ $item->product->product_price }}</td>
                                <td>
                                    <div class="quantity d-flex">
                                        <button class="btn decrement">-</button>
                                        <input type="number" value="{{ $item->quantity }}" class="quantity-value">
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
                            <td>{{trans_lang('total')}}</td>
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
                            <img src="{{ asset($item->product->product_image) }}" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="table-row">
                                <p class="card-name">{{ $item->product->name }}</p>
                                <div class="card-text">
                                    <span class="cost"></span>
                                    <span class="price">¥{{ $item->product->product_price }}</span>
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

            <div class="text-end my-4">
                <button class="common-btn btn-next" data-page="{{ auth_helper()->check() ? "#address" : "#login"}}">{{trans_lang('next')}}</button>
            </div>

        </div>
    </section>
    <!-- /Checkout Step -->

    <!-- Login Step -->
    <section class="page mt-5" id="login" data-step="2">
        <div class="container-custom">

            <div class="border w-75 mx-auto px-5 py-3 rounded shadow login-box">
                <h2 class="text-center mb-3">{{trans_lang('login')}}</h2>
                <form action="#" id="login_form" method="POST">
                    @csrf
                    <div class="d-flex flex-column">
                        <div class="form-group row mt-3 align-items-center">
                            <label for="username" class="col-12 col-md-4">{{trans_lang('name')}}</label>
                            <div class="col-12 col-md-8 mt-2">
                                <div class="input-group border border-2 rounded px-0">
                                    <input  type="text" name="username" id="username" class="form-control border-0" placeholder="Username or Email">
                                    <button class="btn" tabindex="-1">
                                        <i class="fa-solid fa-user"></i>
                                    </button>
                                </div>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="form-group row mt-3 align-item-center">
                            <label for="password" class="col-12 col-md-4">{{trans_lang('password')}}</label>
                            <div class="col-12 col-md-8 mt-2">
                                <div class="input-group border border-2 rounded px-0">
                                    <input type="password" name="password" id="password" class="form-control border-0" placeholder="********">
                                    <button class="btn" tabindex="-1">
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
                            <div class="g-recaptcha" data-sitekey="6LfCvtoqAAAAAP_U1Pm-7x4IFB-avJ8O_SxjNQZ8"></div>
                            <span class="invalid-feedback mt-1"></span>
                        </div>
                        <button type="submit" class="common-btn -solid mx-auto mt-5 rounded-pill w-100">Login</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
    <!-- /Login Step -->

    <!-- Address Step -->
    <section class="page mt-3" id="address" data-step="3">
        <div class="container-custom">

            <div class="p-3 bg-primary d-flex text-white">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h2>{{trans_lang('detail')}}</h2>
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
                                <label for="name">{{trans_lang('name')}}</label>
                                <b>:</b>
                            </th>
                            <td class="p-1 bg-white">
                                <input type="text" id="username" name="username" class="p-1 address_input"
                                    value="{{ auth_helper()->user()->username ?? '' }}">
                            </td>
                        </tr>
                        <tr>
                            <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                                <label for="tel">{{trans_lang('phone_number')}}</label>
                                <b>:</b>
                            </th>
                            <td class="p-1 bg-white">
                                <input type="number" name="first_phone" id="tel" class="p-1 address_input"
                                    value="{{ auth_helper()->user()->first_phone ?? '' }}">
                            </td>
                        </tr>
                        <tr>
                            <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                                <label for="line_id">{{trans_lang('line_id')}}</label>
                                <b>:</b>
                            </th>
                            <td class="p-1 bg-white">
                                <input type="text" id="line_id" class="p-1 address_input"
                                    value="{{ auth_helper()->user()->line_id ?? '' }}">
                            </td>
                        </tr>
                        <tr>
                            <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                                <label for="zip">{{trans_lang('postal')}}</label>
                                <b>:</b>
                            </th>
                            <td class="p-1 bg-white">
                                <input type="text" id="zip" class="p-1 address_input">
                            </td>
                        </tr>
                        <tr>
                            <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                                <label for="country">{{trans_lang('country')}}</label>
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
                                <label for="delivery">{{trans_lang('shipping_address')}}</label>
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
                            id="cancel">{{trans_lang('cancle')}}</button>
                        <button type="button" data-page="#payment" class="btn btn-outline-primary common-btn">{{trans_lang('save')}}</button>
                    </div>
                </form>
            </div>
            <!-- /input -->

            <!-- Output -->
            <div class="address-detail">
                <table>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>{{trans_lang('name')}}</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <p class="p-1">{{ auth()->user()->username ?? '' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>{{trans_lang('phone_number')}}</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <a class="p-1" href="tel:0988888888">{{ auth()->user()->first_phone ?? '' }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>{{trans_lang('line_id')}}</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <a class="p-1" href="#">{{ auth()->user()->line_id ?? '' }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>{{trans_lang('postal')}}</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <p class="p-1">110001</p>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>{{trans_lang('country')}}</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <p class="p-1">Japan</p>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>{{trans_lang('shipping_address')}}</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <p class="p-1">{{ auth()->user()->address ?? '' }}</p>
                        </td>
                    </tr>
                </table>
                <div class="d-flex gap-3 my-4 justify-content-end">
                    <button class="btn btn-outline-primary common-btn btn-back" data-page="#checkout">{{trans_lang('go_back')}}</button>
                    <button class="btn btn-outline-primary common-btn btn-next" data-page="#payment">{{trans_lang('next')}}</button>
                </div>
            </div>
            <!-- /output -->

        </div>
    </section>
    <!-- /Address Step -->

    <!-- Payment Step -->
    <section class="page mt-3" id="payment" data-step="4">
        <div class="container-custom">

            <!-- Payment Method Form -->
            <div class="popup">
                <div class="bg-white rounded-3 border text-black mx-auto" id="payment-form">
                    <h2 class="title">{{trans_lang('payment')}}</h2>
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
                                <label for="count">{{trans_lang('country')}}</label>
                                <select id="count" class="w-100 p-2 border rounded">
                                    <option value="jpn" selected>Japan</option>
                                </select>
                            </div>
                            <div class="w-100">
                                <label for="zp">{{trans_lang('postal')}}</label>
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
                            <button class="common-btn btn btn-outline-primary" id="cancel">{{trans_lang('cancle')}}</button>
                            <button class="common-btn btn btn-outline-primary btn-next" data-page="#complete">{{trans_lang('save')}}</button>
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
                            <th scope="col">{{trans_lang('image')}}</th>
                            <th scope="col">{{trans_lang('product_name')}}</th>
                            <th scope="col">{{trans_lang('price')}}</th>
                            <th scope="col">{{trans_lang('total')}}</th>
                        </tr>
                    </thead>
                    <tbody class="dsk-cart-body">
                        @foreach ($carts as $item)
                            <tr class="table-row cart-{{ $item->product->id }}">
                                <td>
                                    <div class="table-img"><img src="{{ asset($item->product->product_image) }}"
                                            alt="product img"></div>
                                </td>
                                <td clas="col-name">{{ $item->product->name }}</td>
                                <td class="price">¥{{ $item->product->product_price }}</td>
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
                            <td>{{trans_lang('total')}}</td>
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
                            <img src="{{ asset($item->product->product_image) }}" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="table-row">
                                <p class="card-name">{{ $item->product->name }}</p>
                                <div class="card-text">
                                    <span class="cost">
                                        <input type="hidden" value="1" class="quantity-value">
                                    </span>
                                    <span class="price">{{ $item->product->product_price }}</span>
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

            <h2 class="py-3 px-3 mt-5 bg-primary text-white" id="payment-check-sec">{{trans_lang('selet_payment')}}</h2>
            <div class="d-flex gap-3 py-3 px-3">
                <input type="checkbox" id="select-payment">
                <label for="select-payment">{{trans_lang('credit_card')}}</label>
                <div class="ms-auto text-danger" id="warning-msg">{{trans_lang('check_mark')}}<</div>
            </div>

            <h2 class="py-3 px-3 bg-primary text-white">{{trans_lang('detail')}}</h2>
            <ul class="list-group gap-3 py-3 px-3">
                <li>
                    <span>{{trans_lang('name')}}</span>
                    : <span id="name-result"></span>
                </li>
                <li>
                    <span>{{trans_lang('phone_number')}}</span>
                    : <span id="tel-result"></span>
                </li>
                <li>
                    <span>{{trans_lang('line_id')}}</span>
                    : <span id="line_id-result"></span>
                </li>
                <li>
                    <span>{{trans_lang('postal')}}</span>
                    : 110001
                </li>
                <li>
                    <span>{{trans_lang('country')}}</span>
                    : Japan
                </li>
                <li>
                    <span>{{trans_lang('shipping_address')}}</span>
                    : <span id="delivery-result"></span>
                </li>
            </ul>
            <div class="d-flex gap-3 my-4 justify-content-end">
                <a data-page="#address" class="btn btn-outline-primary common-btn btn-back">{{trans_lang('go_back')}}</a>
                <button data-page="#complete" class="btn btn-outline-primary common-btn btn-payment">{{trans_lang('check_out')}}</button>
            </div>

        </div>
    </section>
    <!-- /Payment Step -->

    <!-- Complete Step -->
    <section class="page mt-5" id="complete" data-step="5">
        <div class="container-custom">
            <p class="text-center">
                {{trans_lang('paymnet_success_msg')}}
            </p>
            <div class="d-flex gap-3 py-5 justify-content-center">
                <a href="{{ route('support') }}" class="btn btn-outline-primary common-btn">{{trans_lang('contact_us')}}</a>
                <a href="{{ route('home') }}" class="btn btn-outline-primary common-btn">{{trans_lang('home')}}</a>
            </div>
        </div>
    </section>
    <!-- /Complete Step -->

    <!-- All Scripts -->
    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script src="{{ asset('assets/js/pageChange.js') }}"></script>
    <script>
        $(document).ready(function() {

            function checkIfEmpty() {
                var dskbody = $('.dsk-cart-body');
                if (dskbody.find('tr').length === 0) {
                    dskbody.html(`<tr><td colspan="6" class="text-center">{{ trans_lang('no_product') }}</td></tr>`);
                }
                var mbbody = $('.mb-cart-body');
                if (mbbody.find('.card').length === 0) {
                    mbbody.find('.no-cart').html(`<div class="text-center my-3">{{ trans_lang('no_product') }}</div>`)
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

            function deleteCart(product_id){
                $.ajax({
                    url: `/cart/delete/${product_id}`,
                    type: "DELETE",
                    data: {
                        id: product_id
                    },
                    success: function(response) {
                        // location.reload();
                        if (response.status) {
                            removeCart(product_id);
                            netTotal();
                            updateCartCount();
                        }
                    }
                });
            }

            //dsk-cart-del-btn
            function handelDeleteCartBtn(class_name){
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
                console.log(products);

                var formData = new FormData(this);

                sendLoginData(formData, products);
            });

            function collectProducts() {
                var products = [];
                $('.table-row').each(function() {
                    var productId = $(this).data('id');
                    if (productId) {
                        var quantity = $(this).find('.quantity-value').val();
                        products.push({ id: productId, quantity: quantity });
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
                    console.log('Login successfully');

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
                console.log("user data: " + user.username);
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
                    var fieldGroup = $('#' + field).closest('.form-group');
                    var errorSpan = fieldGroup.find('span.invalid-feedback');

                    if (errors[field]) {
                        errorSpan.addClass('d-block').html(errors[field]);
                    } else {
                        errorSpan.removeClass('d-block').html('');
                    }
                });
            }


            function addCart(products)
            {
                $.ajax({
                    url: '/cart/add/login',
                    type: "POST",
                    data: {
                        products: products
                    },
                    success: function(response) {
                        console.log(response.message);
                        // return response.status;
                    }
                });
            }


            $(document).on('keyup', '.address_input', function() {
                var resultId = '#' + $(this).attr('id') + '-result';
                $(resultId).html($(this).val());
            });


        });
    </script>
    <!-- /All Scripts -->

    {{-- Test Scripts --}}
    <script src="{{asset('assets/js/skipTester.test.js')}}"></script>
    {{-- /Test Scripts --}}

@endsection
