@extends('includes.layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}" />
@endsection
@section('contents')
    <div class="container-custom mt-2 cart">

        <!-- Step List -->
        @include('includes.cart_step_list')
        <!-- ./Step List -->

        <!-- Checkout -->
        <div class="page" id="checkout">
            <!-- Desktop Style -->
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
                <tbody>
                    @if (!$carts->isEmpty())
                        @foreach ($carts as $idx => $item)
                            <tr class="table-row">
                                <td>
                                    <div class="table-img"><img src="{{ asset($item->product->product_image) }}"
                                            alt="{{ $item->product->name }}"></div>
                                </td>
                                <td class="col-name">{{ $item->product->name }}</td>
                                <td class="price">{{ $item->product->product_price }}</td>
                                <td>
                                    <div class="quantity d-flex">
                                        <button class="btn decrement">-</button>
                                        <input type="text" value="{{ $item->quantity }}" class="quantity-value" readonly>
                                        <button class="btn increment">+</button>
                                    </div>
                                </td>
                                <td class="cost"></td>
                                <td class="col-remove"><a href="#" class="mx-auto"><i
                                            class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center">No product in the whitelist</td>
                    </tr>

                    @endif
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
            <!-- ./Desktop Style -->

            <!-- Mobile Style -->
            <div class="mobile d-md-none d-flex flex-column gap-3 table-item">
                @if (!$carts->isEmpty())
                    @foreach ($carts as $item )
                    <div class="card">
                        <div class="card-img align-content-center me-2">
                            <img src="{{ asset($item->product->product_image) }}" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="table-row">
                                <p class="card-name">{{ $item->product->name }}</p>
                                <div class="card-text">
                                    <span class="cost"></span>
                                    <span class="price">{{ $item->product->product_price }}</span>
                                </div>
                                <div class="quantity d-flex">
                                    <button class="btn decrement">-</button>
                                    <input type="text" value="{{ $item->quantity }}" class="quantity-value" readonly>
                                    <button class="btn increment">+</button>
                                </div>
                            </div>
                            <a href="#" class="btn del-btn">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </div>
                    </div>

                    @endforeach
                @else
                    <div class="text-center my-3">No product in the cart</div>
                @endif



                <div class="card">
                    <div class="card-img align-content-center me-2">
                        <img src="{{ asset('assets/images/account2.svg') }}" alt="product img">
                    </div>
                    <div class="card-body">
                        <div class="table-row">
                            <p class="card-name">Mark</p>
                            <div class="card-text">
                                <span class="cost">¥100</span>
                                <span class="price">¥100</span>
                            </div>
                            <div class="quantity d-flex">
                                <button class="btn decrement">-</button>
                                <input type="text" value="1" class="quantity-value" readonly>
                                <button class="btn increment">+</button>
                            </div>
                        </div>
                        <a href="#" class="btn del-btn">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </div>
                </div>
                <div class="d-flex justify-content-between bg-primary text-white p-2 mt-3">
                    <p>Total :</p>
                    <p>
                        <span class="total"></span>
                    </p>
                </div>
            </div>
            <!-- ./Mobile Style -->

            <div class="text-end my-4">
                <a href="#address" class="common-btn btn-next">Next</a>
            </div>
        </div>
        <!-- ./Checkout -->



    </div>


    <script src="{{ asset('assets/js/cart.js') }}"></script>
@endsection
