@extends('includes.layout')
@section('title', 'home')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
@endsection

@section('contents')
    <!-- Hero Section -->
    <section class="hero mt-4">
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
                <h6 class="txt-primary fw-bold mb-3">{{trans_lang('recomended_product')}}</h6>
                <div class="filter d-flex justify-content-between align-items-center mb-3">
                    <div class="icon-buttons txt-primary d-flex gap-3 align-items-center">
                        <i class="fa-solid fa-grip fs-2 fw-bold" id="card-list-btn"></i>
                        <i class="fa-solid fa-list fs-3 fw-bold" id="row-list-btn"></i>
                    </div>
                </div>
            </div>
            <!-- /Recomnand HeadLine -->

            <!-- Card List -->
            <div class="card-list" id="view-list">
                @foreach ($random_products  as $product)
                    <div class="item-card mb-5">
                        <a href="{{ route('product.show', $product->id) }}" class="right">
                            <img loading="lazy" src="{{ asset('assets/products/'.$product->product_image) }}" class="card-img-top" alt="{{ $product->name }}">
                        </a>
                        <div class="left">
                            <p class="price m-t-b-10">
                                @if ($product->discount > 0)
                                <span class="format">{{$product->product_price - $product->discount}}</span>
                                <span class="original-price format">{{ $product->product_price }}</span>
                                @else
                                    <span class="">¥{{ number_format($product->product_price, 2) }}</span>
                                @endif
                            </p>
                            <div class="title-category">
                                <a href="{{ route('sub-category.show', $product->subCategory->id) }}" class="menu-category">{{ $product->subCategory->name }}</a>
                                <h3 class="title m-t-b-10">{{ $product->name }}</h3>
                            </div>
                            <a href="{{ route('product.show', $product->id) }}" class="txt m-b-10 description">
                                {{ $product->description }}
                            </a>
                            <div class="d-flex gap-2 card-btn m-t-10">
                                <a href="javascript:void(0);"
                                    class="py-1 common-btn2 -solid cart-btn"
                                    data-id="{{ $product->id }}">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                                <a href="javascript:void(0);"
                                    class="py-1 common-btn2 white-list-btn"
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
            <p class="title">{{trans_lang('special_offer')}}</p>
            <p class="title">{{trans_lang('special_offer')}}</p>
            <p class="title">{{trans_lang('special_offer')}}</p>
            <p class="title">{{trans_lang('special_offer')}}</p>
            <p class="title">{{trans_lang('special_offer')}}</p>
        </div>
    </section>
    <!-- /Animation Bar -->

    <!-- Porpular Shop -->
    <section class="popular_top_rate_shop_section mt-3">
        <div class="container-custom">

            <!-- Porpular Headline -->
            <div>
                <h6 class="txt-primary fw-bold mb-3">{{trans_lang('popular_shop')}}</h6>
            </div>
            <!-- /Porpular Headline -->

            <!-- Shop List  -->
            <div class="row shop-carts">

               @foreach ($popular_shops as $popular_shop)
               <div class="col-6 col-md-6 col-lg-3 mb-3">
                <div class="card rounded-4 overflow-hidden w-100 shop-card" style="width: 15rem">
                    <img loading="lazy" src="{{ asset('assets/images/avatars/'.$popular_shop->avatar) }}" class="card-img-top"
                        alt="..." />
                    <div class="card-body bg-main">
                        <p class="card-text text-center text-white">{{$popular_shop->shop_name}}</p>
                    </div>
                </div>
            </div>
               @endforeach

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
                <h6 class="txt-primary fw-bold mb-3">{{trans_lang('special_offer')}}</h6>
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
                                aria-expanded="false">{{trans_lang('sortby')}}</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="{{ route('home', ['sort_by' => 'price_asc']) }}">{{trans_lang('price_l_h')}}</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('home', ['sort_by' => 'price_desc']) }}">{{trans_lang('price_h_l')}}</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('home', ['sort_by' => 'name_asc']) }}">{{trans_lang('name_a_z')}}</a></li>
                                <li><a class="dropdown-item" href="{{ route('home', ['sort_by' => 'name_desc']) }}">{{trans_lang('name_z_a')}}</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('home', ['sort_by' => 'latest']) }}">{{trans_lang('latest')}}</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /Discount Headline -->

            <!-- Products List -->
            <div class="card-list" id="view-list">
                @foreach ($products->filter(fn($product) => $product->discount > 0.0)->take(6) as $product)
                    <div class="item-card mb-5">
                        <a href="{{ route('product.show', $product->id) }}" class="right">
                            <img loading="lazy" src="{{ asset('assets/products/'.$product->product_image) }}" class="card-img-top"
                                alt="{{ $product->name }}">
                        </a>
                        <div class="left">
                            <p class="price m-t-b-10">
                                @if ($product->discount > 0)
                                    <span class="format">{{$product->product_price - $product->discount}}</span>
                                    <span class="original-price format">{{ $product->product_price }}</span>
                                @else
                                    <span class="format">{{ $product->product_price }}</span>
                                @endif
                            </p>
                            <div class="title-category flex-column flex-sm-row align-items-start">
                                <a href="{{ route('sub-category.show', $product->subCategory->id) }}" class="menu-category">{{ $product->subCategory->name }}</a>
                                <h3 class="title m-t-b-10">{{ $product->name }}</h3>
                            </div>
                            <a href="{{ route('product.show', $product->id) }}" class="txt m-b-10 description">
                                {{ $product->description }}
                            </a>
                            <div class="d-flex gap-2 card-btn m-t-10">
                                <a href="javascript:void(0);"
                                    class="py-1 common-btn2 -solid cart-btn"
                                    data-id="{{ $product->id }}">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                                <a href="#"
                                    class="py-1 common-btn2 white-list-btn"
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
                    <a class="common-btn see-more-btn w-100" href="{{ route('special-offer') }}">{{trans_lang('seemore')}}</a>
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
                <h6 class="txt-primary fw-bold mb-3">{{trans_lang('all_products')}}</h6>
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
                                aria-expanded="false">{{trans_lang('sortby')}}</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="{{ route('home', ['sort_by' => 'price_asc']) }}">{{trans_lang('price_l_h')}}</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('home', ['sort_by' => 'price_desc']) }}">{{trans_lang('price_h_l')}}</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('home', ['sort_by' => 'name_asc']) }}">{{trans_lang('name_a_z')}}</a></li>
                                <li><a class="dropdown-item" href="{{ route('home', ['sort_by' => 'name_desc']) }}">{{trans_lang('name_z_a')}}</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('home', ['sort_by' => 'latest']) }}">{{trans_lang('latest')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /All Product Headline -->

            <!-- Products List -->
            <div class="card-list" id="view-list">
                @foreach ($products as $product)
                    <div class="item-card mb-5">
                        <a href="{{ route('product.show', $product->id) }}" class="right">
                            <img loading="lazy" src="{{ asset('assets/products/'.$product->product_image) }}" class="card-img-top"
                                alt="{{ $product->name }}">
                        </a>
                        <div class="left">
                            <p class="price m-t-b-10">
                                @if ($product->discount > 0)
                                    <span class="format">{{$product->product_price - $product->discount}}</span>
                                    <span class="original-price format">{{ $product->product_price }}</span>
                                @else
                                    <span class="format">{{ $product->product_price }}</span>
                                @endif
                            </p>
                            <div class="title-category">
                                <a href="{{ route('sub-category.show', $product->subCategory->id) }}" class="menu-category">{{ $product->subCategory->name }}</a>
                                <h3 class="title m-t-b-10">{{ $product->name }}</h3>
                            </div>
                            <a href="{{ route('product.show', $product->id) }}" class="txt m-b-10 description">
                                {{ $product->description }}
                            </a>

                            <div class="d-flex gap-2 card-btn m-t-10">
                                <a href="javascript:void(0);"
                                    class="py-1 common-btn2 -solid cart-btn"
                                    data-id="{{ $product->id }}">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                                {{-- <small class="py-1 common-btn2 -solid cart-btn "><i class="fa-solid fa-cart-plus"></i></small> --}}
                                <a href="javascript:void(0);"
                                    class="py-1 common-btn2 white-list-btn position-relative"
                                    data-id="{{ $product->id }}">
                                    <i class="fa-solid fa-bookmark"></i>
                                    {{-- <i class="fa-solid fa-check position-absolute top-50 start-50 translate-middle fa-2xs text-white" ></i> --}}
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
    <!-- /All Scripts -->

    <!-- Testing Scripts -->

    <!-- /Testing Scripts -->
@endsection

@section('script')
    <script>
        $(document).ready(() => {
            handleAddToCartBtn('cart-btn');
            handleAddToWhiteListBtn('white-list-btn');
        })
    </script>
@endsection
