@extends('includes.layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/whitelist.css') }}">
@endsection
@section('contents')
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb" class="py-4">
        <div class="container">
            <ol class="breadcrumb mb-0 bg-transparent">
                <li class="breadcrumb-item"><a href="./home.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">White List</li>
            </ol>
        </div>
    </nav>
    <!-- ./Breadcrumbs -->

    <!-- Main Content -->
    <div class="container cart m-b-20">

        <!-- Desktop Style -->
        <div class="desktop">
            <table class="table" id="table">
                <thead class="">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product address</th>
                        <th scope="col">Price</th>
                        <th scope="col">Remove</th>
                        <th scope="col">Select</th>
                    </tr>
                </thead>
                <tbody class="dsk-white-list-body">
                    @foreach ($whitelist_products as $index => $product)
                        <tr class="white-list-{{ $product->id }}" id="row">
                            <th class="number" scope="row">
                                {{ $index + 1 }}
                            </th>
                            <th>
                                <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }}">
                            </th>
                            <td>{{ $product->name }}</td>
                            <td id="cost">{{ $product->product_price }}</td>
                            <td>
                                <a href="javascript:void(0);" class="desktop-del-btn" data-id="{{ $product->id }}"><i
                                        class="fa-solid fa-trash-can"></i></a>
                                {{-- for delete --}}

                            </td>
                            <td>
                                <input type="checkbox" class="desktop-check-product" value="{{ $product->id }}" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">Total</td>
                        <td>
                            <span id="total">{{ $total }}</span>
                        </td>
                    </tr>
                </tfoot>
            </table>

            <div class="text-end d-flex gap-3 justify-content-end">
                <a href="/" class="common-btn">Shop more</a>
                <a href="javascript:void(0);" class="common-btn" id="dsk-add-to-cart-btn">Add to Cart</a>
            </div>
        </div>
        <!-- ./Desktop Style -->

        <!-- Mobile Style -->
        <div class="mobile mb-white-list-body white-list-body" id="">

            @foreach ($whitelist_products as $idx => $product)
                <div class="card d-flex flex-row white-list-{{ $product->id }}">
                    <img src="{{ asset($product->product_image) }}" alt="product img">
                    <div class="card-body d-flex flex-row justify-content-between align-items-center">
                        <div id="row">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">
                                <span id="cost">{{ $product->product_price }}</span>
                            </p>
                        </div>
                        <div class="d-flex gap-3">
                            <a href="javascript:void(0);" class="btn mobile-del-btn" data-id="{{ $product->id }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>

                            <input type="checkbox" class="mobile-select mobile-check-product">
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="no-cart"></div>
            <div class="total">
                <p>Total :</p>
                <p>
                    <span id="total">{{ $total }}</span>
                </p>
            </div>

            <div class="text-end d-flex flex-column gap-3 mt-3">
                <a href="/" class="common-btn">Shop more</a>
                <a href="javascript:void(0);" class="common-btn" id="mb-add-to-cart-btn">Add to Card</a>
            </div>
        </div>
        <!-- ./Mobile Style -->


    </div>
    <!-- ./Main Content -->
    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function checkIfEmpty() {
                var dskbody = $('.dsk-white-list-body');
                if (dskbody.find('tr').length === 0) {
                    dskbody.html('<tr><td colspan="6" class="text-center">No product in the white list</td></tr>');
                }
                var mbbody = $('.mb-white-list-body');
                if (mbbody.find('.card').length === 0) {
                    mbbody.find('.no-cart').html('<div class="text-center my-3">No product in the white list</div>')
                }
            }

            checkIfEmpty();

            function removeCart(id) {
                $('.mb-white-list-body').find(`.white-list-${id}`).remove();
                $('.dsk-white-list-body').find(`.white-list-${id}`).remove();
                checkIfEmpty();
            }



            // for desktop

            // desktop delete button
            $('.desktop-del-btn').click(function() {
                const getid = $(this).data('id');
                $.ajax({
                        url: "{{ route('whitelist-count') }}",
                        method: 'GET',
                        success: function(response) {
                            $('#white_list_count').text(response.white_lists_count);
                        },
                        error: function(xhr) {
                            console.error(xhr);
                        }
                    });
                    
                $.ajax({
                    url: `/white-list/delete/${getid}`,
                    type: "DELETE",
                    data: {
                        id: getid
                    },
                    success: function(response) {
                        if (response.status) {
                            removeCart(getid);
                        }
                    }
                });
            });

            $('#dsk-add-to-cart-btn').click(function() {
                const selected_products = [];
                $('.desktop-check-product:checked').each(function() {
                    selected_products.push($(this).val());
                });
               
                $.ajax({
                    url: "{{ route('add_to_cart') }}",
                    type: "POST",
                    data: {
                        product_ids: selected_products
                    },
                    success: function(response) {
                        if (response.status) {
                            window.location.href = "{{ route('cart') }}";
                        }

                        if (!response.status) {
                            console.log(response.message);
                        }
                    }
                });
                $.ajax({
                    url: "{{ route('cart-count') }}",
                    method: 'GET',
                    success: function (response) {
                        // Assuming response contains the new count
                        $('#cart_count').text(response.cart_count);
                    },
                    error: function (xhr) {
                        // Handle error here
                        console.error(xhr);
                    }
                });
            });

            // mobile delete button
            $('.mobile-del-btn').click(function() {
                const getid = $(this).data('id');

                $.ajax({
                    url: `/white-list/delete/${getid}`,
                    type: "DELETE",
                    data: {
                        id: getid
                    },
                    success: function(response) {
                        if (response.status) {
                            removeCart(getid);
                        }
                    }
                });
            });

            $('#mb-add-to-cart-btn').click(function() {
                const selected_products = [];
                $('.mobile-check-product:checked').each(function() {
                    selected_products.push($(this).val());
                });

                $.ajax({
                    url: "{{ route('add_to_cart') }}",
                    type: "POST",
                    data: {
                        product_ids: selected_products
                    },
                    success: function(response) {
                        if (response.status) {
                            location.href = "{{ route('cart') }}";
                        }

                        if (response.status == false) {
                            console.log(response.message);
                        }
                    }
                });
            });


        });
    </script>
@endsection
