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
                        <p class="d-none d-md-block">注文詳細</p>
                    </li>
                    <li class="step d-flex flex-column align-items-center">
                        <span class="me-2">2</span>
                        <p class="d-none d-md-block">ログイン</p>
                    </li>
                    <li class="step d-flex flex-column align-items-center">
                        <span class="me-2">3</span>
                        <p class="d-none d-md-block">配送先住所</p>
                    </li>
                    <li class="step d-flex flex-column align-items-center">
                        <span class="me-2">4</span>
                        <p class="d-none d-md-block">支払い</p>
                    </li>
                    <li class="step d-flex flex-column align-items-center">
                        <span class="me-2">5</span>
                        <p class="d-none d-md-block">完了</p>
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
            <div class="scroller d-none d-md-block">
                <table class="table desktop text-center d-md-table d-none table-item">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Product address</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody class="dsk-cart-body">
                        @foreach ($carts as $item)
                            <tr class="table-row cart-{{ $item->product->id }}">
                                <td>
                                    <div class="table-img"><img src="{{ asset($item->product->product_image) }}"
                                            alt="{{ $item->product->name }}"></div>
                                </td>
                                <td class="col-name">{{ $item->product->name }}</td>
                                <td class="price">¥{{ $item->product->product_price }}</td>
                                <td>
                                    <div class="quantity d-flex">
                                        <button class="btn decrement">-</button>
                                        <input type="text" value="{{ $item->quantity }}" class="quantity-value" readonly>
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
                            <td>Total</td>
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
                                    <input type="text" value="{{ $item->quantity }}" class="quantity-value" readonly>
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
                    <p>合計 :</p>
                    <p>
                        <span class="total"></span>
                    </p>
                </div>
            </div>
            <!-- ./Mobile Style -->

            <div class="text-end my-4">
                <a href="{{ auth_helper()->check() ? '#address' : '#login' }}" id="next-btn"
                    class="common-btn btn-next">Next</a>
            </div>

        </div>
    </section>
    <!-- /Checkout Step -->

    <!-- Login Step -->
    <section class="page mt-3" id="login">
        <div class="container-custom">

            <div class="border w-75 mx-auto px-5 py-3 rounded shadow login-box">
                <h2 class="text-center mb-3">ログイン</h2>
                <form action="#" method="POST" id="login_form" name="login_form">
                    @csrf

                    <div class="d-flex flex-column">
                        <div class="form-group row mt-3 align-items-center">
                            <label for="username" class="col-12 col-md-4">ユーザー名</label>
                            <div class="col-12 col-md-8 mt-2">
                                <div class="input-group border border-2 rounded px-0">
                                    <input type="text" id="username" name="username" class="form-control border-0" placeholder="ユーザー名またはメールアドレス">
                                    <button class="btn" tabindex="-1">
                                        <i class="fa-solid fa-user"></i>
                                    </button>
                                </div>
                            </div>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group row mt-3 align-item-center">
                            <label for="password" class="col-12 col-md-4">パスワード</label>
                            <div class="col-12 col-md-8 mt-2">
                                <div class="input-group border border-2 rounded px-0">
                                    <input type="text" id="password" name="password" class="form-control border-0" placeholder="********">
                                    <button class="btn" tabindex="-1">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="input-box d-flex flex-column">
                            <span class="mb-3 text-danger" id="message"></span>
                        </div>
                        <button type="submit" class="common-btn -solid mx-auto mt-5 rounded-pill w-100">ログイン</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
    <!-- /Login Step -->

    <!-- Address Step -->
    <section class="page" id="address">
        <div class="container-custom">

            <div class="p-3 bg-primary d-flex text-white">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <h2>Address</h2>
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
                                <label for="name">Name</label>
                                <b>:</b>
                            </th>
                            <td class="p-1 bg-white">
                                <input type="text" id="name" class="p-1"
                                    value="{{ auth()->user()->username ?? '' }}">
                            </td>
                        </tr>
                        <tr>
                            <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                                <label for="tel">Phone Number</label>
                                <b>:</b>
                            </th>
                            <td class="p-1 bg-white">
                                <input type="number" id="tel" class="p-1"
                                    value="{{ auth()->user()->first_phone ?? '' }}">
                            </td>
                        </tr>
                        <tr>
                            <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                                <label for="line_id">Line ID</label>
                                <b>:</b>
                            </th>
                            <td class="p-1 bg-white">
                                <input type="text" id="line_id" class="p-1"
                                    value="{{ auth()->user()->line_id ?? '' }}">
                            </td>
                        </tr>
                        <tr>
                            <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                                <label for="zip">Postal Code</label>
                                <b>:</b>
                            </th>
                            <td class="p-1 bg-white">
                                <input type="number" id="zip" class="p-1">
                            </td>
                        </tr>
                        <tr>
                            <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                                <label for="country">Country</label>
                                <b>:</b>
                            </th>
                            <td class="p-1 bg-white">
                                <select id="country" class="p-1">
                                    <option value="Japan" selected>Japan</option>
                                    <option value="America" selected>America</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                                <label for="delivery">Delivery Address</label>
                                <b>:</b>
                            </th>
                            <td class="p-1 bg-white">
                                <input type="number" id="delivery" class="p-1"
                                    value="{{ auth()->user()->address ?? '' }}">
                            </td>
                        </tr>
                    </table>
                    <div class="d-flex gap-3 my-4 justify-content-end">
                        <button class="btn btn-outline-primary common-btn" id="cancel">Cancel</button>
                        <a href="#payment" class="btn btn-outline-primary common-btn">Save</a>
                    </div>
                </form>
            </div>
            <!-- /input -->

            <!-- Output -->
            <div class="address-detail">
                <table>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>Name</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <p class="p-1">{{ auth()->user()->username ?? '' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>Phone Number</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <a class="p-1" href="tel:0988888888">{{ auth()->user()->first_phone ?? '' }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>Line ID</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <a class="p-1" href="#">{{ auth()->user()->line_id ?? '' }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>Postal Code</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <p class="p-1">110001</p>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>Country</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <p class="p-1">Japan</p>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-2 ps-2 gap-2 d-flex justify-content-between">
                            <p>Delivery Address</p>
                            <b>:</b>
                        </th>
                        <td class="p-1 bg-white">
                            <p class="p-1">{{ auth()->user()->address ?? '' }}</p>
                        </td>
                    </tr>
                </table>
                <div class="d-flex gap-3 my-4 justify-content-end">
                    <a href="#checkout" class="btn btn-outline-primary common-btn btn-back">Go Back</a>
                    <a href="#payment" class="btn btn-outline-primary common-btn btn-next">Next</a>
                </div>
            </div>
            <!-- /output -->

        </div>
    </section>
    <!-- /Address Step -->

    <!-- Payment Step -->
    <section class="page" id="payment">
        <div class="container-custom">

            <!-- Payment Method Form -->
            <div class="popup">
                <div class="bg-white rounded-3 border text-black mx-auto" id="payment-form">
                    <h2 class="title">Add Payment Method</h2>
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
                                <label for="count">Country</label>
                                <select id="count" class="w-100 p-2 border rounded">
                                    <option value="jpn" selected>Japan</option>
                                </select>
                            </div>
                            <div class="w-100">
                                <label for="zp">ZIP</label>
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
                            <button class="common-btn btn btn-outline-primary" id="cancel">Cancel</button>
                            <a href="#complete" class="common-btn btn btn-outline-primary btn-next">Save</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ./Payment Method Form -->

            <!-- Desktop Style -->
            <table class="table desktop text-center d-md-table d-none table-item pannel pannel-default ">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Product address</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
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
                        <td>Total</td>
                        <td>
                            <span class="total"></span>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <!-- ./Desktop Style -->

            <!-- Mobile Style -->
            <div class="mobile d-md-none d-flex flex-column gap-3 table-item mb-cart-body">
                @foreach ($carts as $item)
                    <div class="card cart-{{ $item->product->id }}">
                        <div class="card-img me-2">
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

            <h2 class="py-3 px-3 mt-5 bg-primary text-white" id="payment-check-sec">Select Payment</h2>
            <div class="d-flex gap-3 py-3 px-3">
                <input type="checkbox" id="select-payment">
                <label for="select-payment">Credit Card</label>
                <div class="ms-auto text-danger" id="warning-msg">Please Check the mark</div>
            </div>

            <h2 class="py-3 px-3 bg-primary text-white">Address</h2>
            <ul class="list-group gap-3 py-3 px-3">
                <li>
                    <span>Name </span>
                    : <span id="name-result"></span>
                </li>
                <li>
                    <span>Phone Number </span>
                    : <span id="tel-result"></span>
                </li>
                <li>
                    <span>Line ID </span>
                    : <span id="line_id-result"></span>
                </li>
                <li>
                    <span>Postal Code </span>
                    : 110001
                </li>
                <li>
                    <span>Country </span>
                    : Japan
                </li>
                <li>
                    <span>Delivery Address </span>
                    : <span id="delivery-result"></span>
                </li>
            </ul>
            <div class="d-flex gap-3 my-4 justify-content-end">
                <a href="#address" class="btn btn-outline-primary common-btn btn-back">Go Back</a>
                <button class="btn btn-outline-primary common-btn btn-payment">Check Out</button>
            </div>

        </div>
    </section>
    <!-- /Payment Step -->

    <!-- Complete Step -->
    <section class="page mt-4" id="complete">
        <div class="container-custom">
            <p class="text-center">お支払いが成功しました。請求書はメールとLINE IDに送信されますので、ご確認ください。</p>
            <div class="d-flex gap-3 py-5 justify-content-center">
                <a href="{{ url(path: '/') }}" class="btn btn-outline-primary common-btn">お問い合わせ</a>
                <a href="{{ url('/') }}" class="btn btn-outline-primary common-btn">ホーム</a>
            </div>
        </div>
    </section>
    <!-- /Complete Step -->

    <!-- All Scripts -->
    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script>
        $(document).ready(function() {

            function checkIfEmpty() {
                var dskbody = $('.dsk-cart-body');
                if (dskbody.find('tr').length === 0) {
                    dskbody.html('<tr><td colspan="6" class="text-center">No product in the cart</td></tr>');
                }
                var mbbody = $('.mb-cart-body');
                if (mbbody.find('.card').length === 0) {
                    mbbody.find('.no-cart').html('<div class="text-center my-3">No product in the cart</div>')
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
                            removeCart(product_id);
                            netTotal();
                            updateCartCount();
                        }

                        console.log(response.message);
                    }
                });

            }

            function handleDeleteBtn(class_name) {
                $(`.${class_name}`).click(function(e) {
                    e.preventDefault();
                    const getid = $(this).data('id');

                    // delete cart
                    deleteCart(getid);

                });
            }

            // for desktop
            // desktop delete button
            handleDeleteBtn('dsk-cart-del-btn');


            // mobile delete button
            handleDeleteBtn('mb-cart-del-btn');

            // for address text input
            $('.address-input').keyup(function() {
                var fieldId = $(this).attr('id');
                var resultId = '#' + fieldId + '-result';
                $(resultId).html($(this).val());
            });

            // for login
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#login_form").submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('login_store') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.status == true) {
                            window.location.href = "#address";
                        } else {

                            // if response has message, show the message , if not empty the message, clear the error messages
                            $('#message').html(response.message ?? '');

                            var errors = response.errors ?? {};

                            var fields = [
                                'username',
                                'password'
                            ];

                            fields.forEach(function (field) {
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
@endsection
