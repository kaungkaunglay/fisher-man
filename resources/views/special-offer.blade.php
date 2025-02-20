@extends('includes.layout')
@section('title','Special Offer')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/category.css') }}" />
@endsection
@section('contents')
    <div class="wpr row">
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb" class="py-4">
            <ol class="breadcrumb mb-0 bg-transparent">
                <li class="breadcrumb-item"><a href="./home.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Special Offer</li>
            </ol>
        </nav>
        <!-- ./Breadcrumbs -->
        <!-- aside start -->
        <div class="side-menu col-4">
            @include('includes.aside')
        </div>
        <!-- aside end -->

        <!-- category list start -->
        <div class="category col-8 mb-3">
            <ul class="list-group category-list">
                <li class="d-flex flex-column">
                    <div class="card-head">
                        <h2 class="title">Special Offer</h2>
                        <div class="filter d-flex justify-content-between align-items-center">
                            <div class="icon-buttons txt-primary d-flex gap-3 align-items-center">
                                <i class="fa-solid fa-grip fs-2 fw-bold" id="card-list-btn"></i>
                                <i class="fa-solid fa-list fs-3 fw-bold" id="row-list-btn"></i>
                            </div>
                            <div class="sort-container">
                                <div class="arrows">
                                    <button><i class="fa-solid fa-caret-up"></i></button>
                                    <button><i class="fa-solid fa-caret-down"></i></button>
                                </div>
                                <div class="dropdown">
                                    <button class="sort-button dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Sort by
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- card itmes list start -->

                    <div class="card-list" id="view-list">
                        @foreach ($products as $product)
                            <div class="item-card">
                                <a href="{{ route('product.show', $product->id) }}" class="right">
                                    <img src="{{ asset($product->product_image) }}" class="card-img-top"
                                        alt="{{ $product->name }}">
                                </a>
                                <div class="left">
                                    <p class="price m-t-b-10">¥{{ number_format($product->product_price, 2) }}</p>
                                    <div class="title-category">
                                        <a href="" class="menu-category ">鮮魚 | 白身魚</a>
                                        <h3 class="title m-t-b-10">{{ $product->name }}</h3>
                                    </div>
                                    <a href="{{ route('product.show', $product->id) }}" class="txt m-b-10 description">
                                        {{ $product->description }}
                                    </a>
                                    <div class="d-flex card-btn m-t-10">
                                        <a href="javascript:void(0);"
                                            class="me-2 py-1 common-btn cart-btn @if ($product->inCart()) active @endif"
                                            data-id="{{ $product->id }}"><i class="fa-solid fa-cart-shopping"></i></a>

                                        <a href="javascript:void(0);"
                                            class="py-1 common-btn white-list-btn @if ($product->inWhiteLists()) active @endif"
                                            data-id="{{ $product->id }}"><i class="fa-solid fa-bookmark"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
        </div>

        <!-- card items list end -->
        <!-- <div class="see-more-box d-flex m-t-b-20 justify-content-center justify-content-lg-end">
              <a href="{{ url('/sub-category') }}" class="common-btn">See More</a>
            </div> -->
        </li>
        </ul>
    </div>
    <!-- category list end -->
    </div>
    <!-- category list end -->
    </div>

    <script src="{{ asset('assets/js/view-list.js') }}"></script>
    <script src="{{ asset('assets/js/words-limit.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('.white-list-btn').click(function(e) {
                e.preventDefault();
                const getid = $(this).data('id');
                const cur = $(`.white-list-btn[data-id="${getid}"]`);



                $.ajax({
                    url: `/white-list/${getid}`,
                    type: "POST",
                    data: {
                        id: getid
                    },
                    success: function(response) {
                        if (response.status == "redirect") {
                            window.location.href = response.url;
                        } else if (response.status) {
                            // cur.toggleClass('active');
                        }
                        console.log(response.message);
                    }
                });

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

            });

            $('.cart-btn').click(function(e) {
                e.preventDefault();
                const getid = $(this).data('id');
                const cur = $(`.cart-btn[data-id="${getid}"]`);

                var products = [{
                    id: getid,
                    quantity: 1
                }];

                $.ajax({
                    url: "{{ route('cart.add') }}",
                    type: "POST",
                    data: {
                        products: products
                    },
                    success: function(response) {

                        if (response.status) {
                            // cur.toggleClass('active');

                        }
                        console.log(response.message);
                    }
                });

                $.ajax({
                    url: "{{ route('cart-count') }}",
                    method: 'GET',
                    success: function(response) {
                        // Assuming response contains the new count
                        $('#cart_count').text(response.cart_count);
                    },
                    error: function(xhr) {
                        // Handle error here
                        console.error(xhr);
                    }
                });

            });
        });
    </script>
@endsection
