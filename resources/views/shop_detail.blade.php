@extends('includes.layout')
@section('title', 'Shop Profile')
@section('style')
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}" />
@endsection

@section('contents')
    <!-- Breadcrumbs -->
    <section class="mt-5">
        <div class="container-custom">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans_lang('home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans_lang('shops') }}{{ trans_lang('detail') }}</li>
                </ol>
            </nav>

        </div>
    </section>
    <!-- /Breadcrumbs -->

    <!-- Shop Info -->
    <section class="mt-4 mb-5">
        <div class="container-custom">
            <div class="row">

                {{-- Shop Detail --}}
                <div class="col-md-3 text-center text-md-start">

                    <img src="{{ asset('assets/images/avatars/' . $shop->avatar) }}" class="rounded" alt="Shop avatar">
                    <div class="mt-3">
                        <p class="mb-2 text-center d-flex justify-content-center">
                            <span>{{ trans_lang('shops') }}{{ trans_lang('name') }} : &nbsp;</span>
                            <span class="text-muted">{{ $shop->shop_name }}</span>
                        </p>
                        <p class="mb-2 text-center d-flex justify-content-center">
                            <span>{{ trans_lang('username') }} : &nbsp;</span>
                            <span class="text-muted">{{ $shop->username }}</span>
                        </p>
                        <div class="d-grid gap-2">
                            <a class="common-btn -solid" href="{{ route('seller.contact', $shop->user_id) }}"><i
                                    class="fas fa-envelope me-2"></i>{{ trans_lang('contact') }}</a>
                        </div>
                    </div>
                </div>
                {{-- /Shop Detail --}}

                {{-- Tab Box --}}
                <div class="col-md-9 mt-4 mt-md-0">
                    <div class="card shadow-sm">
                        <div class="card-body p-0 rounded overflow-hidden">

                            {{-- Tab List --}}
                            <ul class="nav nav-tabs bg-primary p-3 pb-0" id="shopTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link text-white active" id="home-tab" data-bs-toggle="tab" href="#home"
                                        role="tab">{{ trans_lang('about') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" id="products-tab" data-bs-toggle="tab" href="#products"
                                        role="tab">{{ trans_lang('product') }}</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link text-white" id="reviews-tab" data-bs-toggle="tab" href="#reviews"
                                        role="tab">Reviews</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link text-white" id="policies-tab" data-bs-toggle="tab" href="#policies"
                                        role="tab">{{ trans_lang('location') }}</a>
                                </li>
                            </ul>
                            {{-- /Tab List --}}

                            {{-- Tab Content  --}}
                            <div class="tab-content p-3 all-products" id="shopTabsContent">

                                {{-- About Tab --}}
                                <div class="tab-pane fade show active" id="home" role="tabpanel">
                                    <h4 class="p-2 border-bottom border-2 fw-bold">{{ trans_lang('about') }}{{ trans_lang('shops') }}</h4>
                                    <p class="p-2">{{ $shop->description }}</p>
                                    <div class="row mt-4">
                                        <div>
                                            <h5 class="p-2 border-bottom border-2 fw-bold">{{ trans_lang('shops') }}{{ trans_lang('detail') }}</h5>
                                            <ul class="list-unstyled p-2">
                                                <li><i class="fas fa-phone text-primary mb-3 me-2"></i>
                                                    {{ $shop->phone_number }}
                                                </li>
                                                <li><i class="fas fa-envelope text-primary mb-3 me-2"></i>
                                                    {{ $shop->email }}
                                                </li>
                                                <li><i class="fas fa-map-marker-alt text-primary mb-3 me-2"></i>
                                                    {{ $shop->address }}
                                                </li>
                                                <li><i
                                                        class="fas fa-box text-primary mb-3 me-2"></i>{{ $products->count() }}
                                                    products</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                {{-- /About Tab --}}

                                {{-- Product Tab --}}
                                <div class="tab-pane fade" id="products" role="tabpanel">

                                    {{-- Product Headline --}}
                                    <div class="filter d-flex justify-content-between align-items-center mb-3">

                                        <!-- display -->
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
                                    {{-- /Product Headline --}}

                                    {{-- Products List --}}
                                    <div class="scroller">
                                        <div class="card-list m-3" id="view-list">


                                            @foreach ($products as $product)
                                            @if ($product->status == 'approved')
                                                <div class="item-card mb-3">
                                                    <a href="#" class="right">
                                                        <img src="{{ asset('assets/products/' . $product->product_image) }}"
                                                            class="card-img-top" alt="">
                                                    </a>
                                                    <div class="left pt-3">
                                                        <p class="price">
                                                            @if ($product->discount > 0)
                                                                <span
                                                                    class="format me-2">{{ $product->product_price - $product->discount }}</span>
                                                                <span
                                                                    class="original-price format">{{ $product->product_price }}</span>
                                                            @else
                                                                <span class="format">{{ $product->product_price }}</span>
                                                            @endif

                                                        <div class="title-category mb-2">
                                                            <a href="#" class="menu-category">{{ $product->sub_categories_name }}</a>
                                                            <h3 class="title m-t-b-10">{{ $product->name }}</h3>
                                                        </div>
                                                        <a href="#" class="txt m-b-10 description">
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
                                                @endif
                                            @endforeach


                                        </div>
                                    </div>
                                    {{-- /Products List --}}

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
                                {{-- /Product Tab --}}

                                {{-- Review Tab --}}
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h4>Reviews</h4>
                                        <div>
                                            <button class="btn btn-primary">Write a Review</button>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <div class="text-center p-4 bg-light rounded">
                                                <h2 class="display-3 fw-bold">4.5</h2>
                                                <div class="rating-stars mb-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <p class="text-muted">Based on 256 reviews</p>

                                                <div class="d-flex align-items-center mt-3">
                                                    <span class="me-2">5</span>
                                                    <div class="progress flex-grow-1" style="height: 8px;">
                                                        <div class="progress-bar bg-success" style="width: 75%"></div>
                                                    </div>
                                                    <span class="ms-2 text-muted small">75%</span>
                                                </div>

                                                <div class="d-flex align-items-center mt-2">
                                                    <span class="me-2">4</span>
                                                    <div class="progress flex-grow-1" style="height: 8px;">
                                                        <div class="progress-bar bg-success" style="width: 15%"></div>
                                                    </div>
                                                    <span class="ms-2 text-muted small">15%</span>
                                                </div>

                                                <div class="d-flex align-items-center mt-2">
                                                    <span class="me-2">3</span>
                                                    <div class="progress flex-grow-1" style="height: 8px;">
                                                        <div class="progress-bar bg-warning" style="width: 6%"></div>
                                                    </div>
                                                    <span class="ms-2 text-muted small">6%</span>
                                                </div>

                                                <div class="d-flex align-items-center mt-2">
                                                    <span class="me-2">2</span>
                                                    <div class="progress flex-grow-1" style="height: 8px;">
                                                        <div class="progress-bar bg-danger" style="width: 3%"></div>
                                                    </div>
                                                    <span class="ms-2 text-muted small">3%</span>
                                                </div>

                                                <div class="d-flex align-items-center mt-2">
                                                    <span class="me-2">1</span>
                                                    <div class="progress flex-grow-1" style="height: 8px;">
                                                        <div class="progress-bar bg-danger" style="width: 1%"></div>
                                                    </div>
                                                    <span class="ms-2 text-muted small">1%</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-8">

                                            <!-- Review Item 1 -->
                                            <div class="card mb-3">
                                                <div class="card-body review-box">
                                                    <div class="d-flex justify-content-between mb-2 row">
                                                        <div class="d-flex col-6 align-items-center review-img">
                                                            <img src="{{ asset('assets/images/account1.svg') }}"
                                                                class="rounded-circle me-2" alt="User avatar">
                                                            <div>
                                                                <h6 class="mb-0">Maria Johnson</h6>
                                                                <p class="text-muted small mb-0">Verified Purchase</p>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="rating-stars">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                            <p class="text-muted small mb-0">2 weeks ago</p>
                                                        </div>
                                                    </div>
                                                    <h6>Beautiful craftsmanship!</h6>
                                                    <p>The ceramic bowl I purchased is absolutely stunning. You can truly
                                                        see the artistry and care that went into making it. The glaze colors
                                                        are even more beautiful in person than in the photos.</p>
                                                    <hr>
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn btn-sm btn-outline-secondary me-2"><i
                                                                class="fas fa-thumbs-up me-1"></i> Helpful (12)</button>
                                                        <button class="btn btn-sm btn-link text-muted">Report</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Shop Response -->
                                            <div class="card mb-3 ms-5 border-start border-primary">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <img src="{{ asset('assets/images/account1.svg') }}"
                                                            class="rounded-circle me-2" alt="Shop avatar">
                                                        <div>
                                                            <h6 class="mb-0">Artisan Crafts <span
                                                                    class="badge bg-primary">Shop Owner</span></h6>
                                                            <p class="text-muted small mb-0">Responded 3 weeks ago</p>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        Thank you for your feedback, James! We apologize for the shipping
                                                        delay. We had some unexpected issues with our carrier, but we've
                                                        addressed them to ensure faster delivery times. We're glad you're
                                                        enjoying the spoons!
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-center mt-4">
                                                <button class="btn btn-outline-primary">Load More Reviews</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- /Review Tab --}}

                                {{-- Location Tab --}}
                                <div class="tab-pane fade" id="policies" role="tabpanel">
                                    <iframe class="w-100 border-0 h-100 shop-location"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d250151.16276620553!2d104.72537013378734!3d11.579654014369655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109513dc76a6be3%3A0x9c010ee85ab525bb!2sPhnom%20Penh%2C%20Cambodia!5e0!3m2!1sen!2ssg!4v1736774811619!5m2!1sen!2ssg"
                                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                                {{-- /Location Tab --}}

                            </div>
                            {{-- /Tab Content --}}

                        </div>
                    </div>
                </div>
                {{-- /Tab Box --}}

            </div>
        </div>

        {{-- All Scripts --}}
        <script src="{{ asset('assets/js/loadmore.js') }}"></script>
        <script defer src="{{ asset('assets/js/view-list.js') }}"></script>
        {{-- /All Scripts --}}

        {{-- Test Scripts --}}

        {{-- /Test Scripts --}}
    </section>


@endsection

@section('script')
    <script>
        $(document).ready(() => {
            handleAddToCartBtn('cart-btn');
            handleAddToWhiteListBtn('white-list-btn');

            //sort-by
            $(".sort-option").on("click", function (e) {
            e.preventDefault();
            let sortType = $(this).data("sort");
            
            $.ajax({
                url: "{{ route('products.sort') }}",
                type: "GET",
                data: { sort: sortType },
                beforeSend: function () {
                    $("#product-list").html('<div class="text-center"><span>Loading...</span></div>');
                },
                success: function (response) {
                    console.log(response);
                    // $("#product-list").html(response.products);
                },
                error: function () {
                    alert("Something went wrong!");
                }
            });
        });
        })
    </script>
@endsection
