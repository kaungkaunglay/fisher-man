@extends('includes.layout')
@section('title', 'home')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
@endsection

@section('contents')
    <!-- Hero Section -->
    <section class="hero mt-5">
        <div class="container-custom">
            <div class="row justify-content-between">
                <div class="col-lg-4 d-none d-lg-block">
                    @include('includes.aside') <!-- Aside Layout -->
                </div>
                <div class="col-lg-8 col-md-12">
                    @include('includes.slider') <!-- Slider Layout -->
                </div>
            </div>
        </div>
    </section>
    <!-- /Hero Section -->

    <!-- Recommand Products -->
    <section class="bg-second my-3 py-3">
        <div class="container-custom">

            <!-- Recomnand HeadLine -->
            <div>
                <h6 class="txt-primary fw-bold mb-3">Recommand Products</h6>
                <div class="filter d-flex justify-content-between align-items-center mb-3">
                    <div class="icon-buttons txt-primary d-flex gap-3 align-items-center">
                        <i class="fa-solid fa-grip fs-2 fw-bold" id="card-list-btn"></i>
                        <i class="fa-solid fa-list fs-3 fw-bold" id="row-list-btn"></i>
                    </div>
                </div>
            </div>
            <!-- /Recomnand HeadLine -->

            <!-- Card List -->
            <div class="card-list" id="view-list" data-list="fish-list-1">
                @foreach ($products->take(6) as $product)
                    <div class="item-card">
                        <a href="{{ route('product.show', $product->id) }}" class="right">
                            <img src="{{ asset($product->product_image) }}" class="card-img-top" alt="{{ $product->name }}">
                        </a>
                        <div class="left">
                            <p class="price m-t-b-10">
                                @if ($product->discount > 0)
                                    ¥{{ number_format($product->product_price - $product->discount, 2) }}
                                    <span class="original-price">¥{{ number_format($product->product_price, 2) }}</span>
                                @else
                                    <span class="">¥{{ number_format($product->product_price, 2) }}</span>
                                @endif
                            </p>
                            <div class="title-category">
                                <a href="" class="menu-category">鮮魚 | 白身魚</a>
                                <h3 class="title m-t-b-10">{{ $product->name }}</h3>
                            </div>
                            <a href="{{ route('product.show', $product->id) }}" class="txt m-b-10 description">
                                {{ $product->description }}
                            </a>
                            <div class="d-flex gap-2 card-btn m-t-10">
                                <a href="javascript:void(0);"
                                    class="py-1 common-btn2 -solid cart-btn @if ($product->inCart()) active @endif"
                                    data-id="{{ $product->id }}">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                                <a href="javascript:void(0);"
                                    class="py-1 common-btn2 white-list-btn @if ($product->inWhiteLists()) active @endif"
                                    data-id="{{ $product->id }}">
                                    <i class="fa-solid fa-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /Card List -->

        </div>
    </section>
    <!-- /Recommand Products -->

    <!-- Animation Bar -->
    <section class="m-t-b-20 moving-discount">
        <div id="moving-text">
            <p class="title">Discount Products</p>
            <p class="title">Discount Products</p>
            <p class="title">Discount Products</p>
            <p class="title">Discount Products</p>
            <p class="title">Discount Products</p>
        </div>
    </section>
    <!-- /Animation Bar -->

    <!-- Porpular Shop -->
    <section class="popular_top_rate_shop_section mt-3">
        <div class="container-custom">

            <!-- Porpular Headline -->
            <div>
                <h6 class="txt-primary fw-bold mb-3">Popular & Top Rating Shop</h6>
            </div>
            <!-- /Porpular Headline -->

            <!-- Shop List  -->
            <div class="row shop-carts">

                <div class="col-6 col-md-6 col-lg-3 mb-3">
                    <div class="card rounded-4 overflow-hidden w-100 shop-card" style="width: 15rem">
                        <img src="{{ asset('assets/images/fishes/Rectangle 92 (3).png') }}" class="card-img-top"
                            alt="..." />
                        <div class="card-body bg-main">
                            <p class="card-text text-center text-white">Shop Name</p>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-3">
                    <div class="card rounded-4 overflow-hidden w-100 shop-card" style="width: 15rem">
                        <img src="{{ asset('assets/images/fishes/Rectangle 92 (2).png') }}" class="card-img-top"
                            alt="..." />
                        <div class="card-body bg-main">
                            <p class="card-text text-center text-white">Shop Name</p>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-3">
                    <div class="card rounded-4 overflow-hidden w-100 shop-card" style="width: 15rem">
                        <img src="{{ asset('assets/images/fishes/Rectangle 92 (1).png') }}" class="card-img-top"
                            alt="..." />
                        <div class="card-body bg-main">
                            <p class="card-text text-center text-white">Shop Name</p>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-3">
                    <div class="card rounded-4 overflow-hidden w-100 shop-card" style="width: 15rem">
                        <img src="{{ asset('assets/images/fishes/Rectangle 92.png') }}" class="card-img-top"
                            alt="..." />
                        <div class="card-body bg-main">
                            <p class="card-text text-center text-white">Shop Name</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Shop List -->

        </div>
    </section>
    <!-- /Porpular Shop -->

    <!-- Discount Products -->
    <section class="discount-products bg-second py-4">
        <div class="container-custom">

            <!-- Discount Headline -->
            <div>
                <h6 class="txt-primary fw-bold mb-3">Discount Products</h6>
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
                                <li><a class="dropdown-item"
                                        href="{{ route('home', ['sort_by' => 'price_asc']) }}">Price: Low to High</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('home', ['sort_by' => 'price_desc']) }}">Price: High to Low</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('home', ['sort_by' => 'name_asc']) }}">Name:
                                        A to Z</a></li>
                                <li><a class="dropdown-item" href="{{ route('home', ['sort_by' => 'name_desc']) }}">Name:
                                        Z to A</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('home', ['sort_by' => 'latest']) }}">Latest</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /Discount Headline -->

            <!-- Products List -->
            <div class="card-list" id="view-list">
                @foreach ($products->filter(fn($product) => $product->discount > 0.0)->take(6) as $product)
                    <div class="item-card">
                        <a href="{{ route('product.show', $product->id) }}" class="right">
                            <img src="{{ asset($product->product_image) }}" class="card-img-top"
                                alt="{{ $product->name }}">
                        </a>
                        <div class="left">
                            <p class="price m-t-b-10">
                                @if ($product->discount > 0)
                                    ¥{{ number_format($product->product_price - $product->discount, 2) }}
                                    <span class="original-price">¥{{ number_format($product->product_price, 2) }}</span>
                                @else
                                    <span class="">¥{{ number_format($product->product_price, 2) }}</span>
                                @endif
                            </p>
                            <div class="title-category flex-column flex-sm-row align-items-start">
                                <a href="" class="menu-category ">鮮魚 | 白身魚</a>
                                <h3 class="title m-t-b-10">{{ $product->name }}</h3>
                            </div>
                            <a href="{{ route('product.show', $product->id) }}" class="txt m-b-10 description">
                                {{ $product->description }}
                            </a>
                            <div class="d-flex gap-2 card-btn m-t-10">
                                <a href="javascript:void(0);"
                                    class="py-1 common-btn2 -solid cart-btn 
                  @if ($product->inCart()) active @endif"
                                    data-id="{{ $product->id }}">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                                <a href="#"
                                    class="py-1 common-btn2 white-list-btn 
                  @if ($product->inWhiteLists()) active @endif"
                                    data-id="{{ $product->id }}">
                                    <i class="fa-solid fa-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /Products List -->

            <!-- Discount Footline -->
            <div class="row justify-content-center mx-0 mt-5">
                <div class="col-5 col-lg-4 text-center">
                    <a class="common-btn see-more-btn w-100" href="{{ route('special-offer') }}">See More</a>
                </div>
            </div>
            <!-- /Discount Footline -->

        </div>
    </section>
    <!-- /Discount Products -->

    <!-- All Products -->
    <section class="all-products my-3">
        <div class="container-custom">

            <!-- All Products Headline -->
            <div>
                <h6 class="txt-primary fw-bold mb-3">All Products</h6>
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
                                <li><a class="dropdown-item"
                                        href="{{ route('home', ['sort_by' => 'price_asc']) }}">Price: Low to High</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('home', ['sort_by' => 'price_desc']) }}">Price: High to Low</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('home', ['sort_by' => 'name_asc']) }}">Name:
                                        A to Z</a></li>
                                <li><a class="dropdown-item" href="{{ route('home', ['sort_by' => 'name_desc']) }}">Name:
                                        Z to A</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('home', ['sort_by' => 'latest']) }}">Latest</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /All Product Headline -->

            <!-- Products List -->
            <div class="card-list" id="view-list">
                @foreach ($products as $product)
                    <div class="item-card">
                        <a href="{{ route('product.show', $product->id) }}" class="right">
                            <img src="{{ asset($product->product_image) }}" class="card-img-top"
                                alt="{{ $product->name }}">
                        </a>
                        <div class="left">
                            <p class="price m-t-b-10">
                                @if ($product->discount > 0)
                                    ¥{{ number_format($product->product_price - $product->discount, 2) }}
                                    <span class="original-price">¥{{ number_format($product->product_price, 2) }}</span>
                                @else
                                    <span class="">¥{{ number_format($product->product_price, 2) }}</span>
                                @endif
                            </p>
                            <div class="title-category">
                                <a href="" class="menu-category ">鮮魚 | 白身魚</a>
                                <h3 class="title m-t-b-10">{{ $product->name }}</h3>
                            </div>
                            <a href="{{ route('product.show', $product->id) }}" class="txt m-b-10 description">
                                {{ $product->description }}
                            </a>
                            <div class="d-flex gap-2 card-btn m-t-10">
                                <a href="javascript:void(0);"
                                    class="py-1 common-btn2 -solid cart-btn 
                  @if ($product->inCart()) active @endif"
                                    data-id="{{ $product->id }}">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                                <a href="javascript:void(0);"
                                    class="py-1 common-btn2 white-list-btn 
                  @if ($product->inWhiteLists()) active @endif"
                                    data-id="{{ $product->id }}">
                                    <i class="fa-solid fa-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /Products List -->

            <!-- All Products Footline -->
            <div class="row justify-content-center">
                <div class="col-5 col-lg-3 text-center">
                    <button class="btn btn-outline-primary px-5 py-2  mt-5" id="load-more" title="Load More Items">
                        <i class="fas fa-chevron-down"></i>
                    </button>
                </div>
            </div>
            <!-- /All Products Footline -->

        </div>
    </section>
    <!-- /All Products -->

    <!-- All Scripts -->
    <script src="{{ asset('assets/js/loadmore.js') }}"></script>
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

        // $('.white-list-btn').click((ev) => {
        //     ev.preventDefault();
        //     const target = ev.currentTarget;

        //     $(target).toggleClass('active');

        //     if (!$('#bookmark_btn').hasClass('active')) {

        //         $('#bookmark_btn').addClass('active');

        //         setTimeout(() => {
        //             $('#bookmark_btn').removeClass('active');
        //         }, 1000);
        //     }
        // });
    </script>

    <!-- /All Scripts -->

    <!-- Testing Scripts -->

    <!-- /Testing Scripts -->
@endsection
