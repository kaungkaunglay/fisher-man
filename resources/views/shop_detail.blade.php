@extends('includes.layout')
@section('title', 'Shop Profile')
@section('style')
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}" />
@endsection

@section('contents')
    {{-- <section class="shop-profile py-5">
        <div class="container-custom">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center">
                    <img src="{{ asset('assets/images/shop-logo.png') }}" class="shop-logo mb-3" alt="Shop Logo">
                    <h2 class="shop-name">Shop Name</h2>
                    <p class="shop-description">This is a short description of the shop, providing details about its offerings and specialties.</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6">
                    <h5>Contact Information</h5>
                    <p>Email: shop@example.com</p>
                    <p>Phone: +123 456 7890</p>
                    <p>Address: 123 Street, City, Country</p>
                </div>
                <div class="col-lg-6">
                    <h5>Social Media</h5>
                    <a href="#" class="btn btn-primary me-2">Facebook</a>
                    <a href="#" class="btn btn-info">Twitter</a>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section>
        <div class="container-custom">

            <div class="shop-banner">
                <div class="container">
                    <div class="position-absolute bottom-0 start-0 p-3 text-white">
                        <span class="badge bg-success mb-2">Verified Seller</span>
                        <h1 class="display-5 fw-bold text-shadow">Artisan Crafts</h1>
                    </div>
                </div>
            </div>

        </div>
    </section> --}}

    <!-- Breadcrumbs -->
    <section class="mt-5">
        <div class="container-custom">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans_lang('home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop Detail</li>
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

                    <img src="{{ asset('assets/images/avatars/'.$shop->avatar) }}" class="rounded" alt="Shop avatar">
                    <div class="mt-3">
                        <p class="mb-2 text-center d-flex justify-content-center">
                            <span>Shop Name : &nbsp;</span>
                            <span class="text-muted">{{$shop->shop_name}}</span>
                        </p>
                        <div class="d-grid gap-2">
                            <a class="common-btn -solid" href="{{route('seller.contact')}}"><i class="fas fa-envelope me-2"></i>Contact Seller</a>
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
                                        role="tab">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" id="products-tab" data-bs-toggle="tab" href="#products"
                                        role="tab">Products</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link text-white" id="reviews-tab" data-bs-toggle="tab" href="#reviews"
                                        role="tab">Reviews</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link text-white" id="policies-tab" data-bs-toggle="tab" href="#policies"
                                        role="tab">Location</a>
                                </li>
                            </ul>
                            {{-- /Tab List --}}

                            {{-- Tab Content  --}}
                            <div class="tab-content p-3" id="shopTabsContent">

                                {{-- About Tab --}}
                                <div class="tab-pane fade show active" id="home" role="tabpanel">
                                    <h4 class="p-2 border-bottom border-2 fw-bold">About Shop</h4>
                                    <p class="p-2">{{$shop->description}}</p>
                                    <div class="row mt-4">
                                        <div>
                                            <h5 class="p-2 border-bottom border-2 fw-bold">Shop Details</h5>
                                            <ul class="list-unstyled p-2">
                                                <li><i class="fas fa-phone text-primary mb-3 me-2"></i> {{$shop->phone_number}}
                                                </li>
                                                <li><i class="fas fa-envelope text-primary mb-3 me-2"></i> {{$shop->email}}
                                                </li>
                                                <li><i class="fas fa-map-marker-alt text-primary mb-3 me-2"></i> {{$shop->address}}
                                                </li>
                                                <li><i class="fas fa-box text-primary mb-3 me-2"></i>{{$products->count()}} products</li>
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
                                                <button class="sort-button dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">Sort by</button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- /Product Headline --}}

                                    {{-- Products List --}}
                                    <div class="scroller">
                                        <div class="card-list m-3" id="view-list" data-list="fish-list">


                                                @foreach ($products as $product)
                                                <div class="item-card mb-3">
                                                    <a href="#" class="right">
                                                        <img src="{{ asset('assets/products/'. $product->product_image) }}"
                                                            class="card-img-top" alt="">
                                                    </a>
                                                    <div class="left">
                                                        <p class="price m-t-b-10">
                                                            @if ($product->discount > 0)
                                                            <span class="format">{{$product->product_price - $product->discount}}</span>
                                                            <span class="original-price format">{{ $product->product_price }}</span>
                                                        @else
                                                            <span class="format">{{ $product->product_price }}</span>
                                                        @endif
                                                            
                                                        <div
                                                            class="title-category flex-column flex-sm-row align-items-start">
                                                            <a href="#" class="menu-category">{{$product->sub_categories_name}}</a>
                                                            <h3 class="title m-t-b-10">{{$product->name}}</h3>
                                                        </div>
                                                        <a href="#" class="txt m-b-10 description">
                                                           {{$product->description}}
                                                        </a>
                                                        <div class="d-flex gap-2 card-btn m-t-10">
                                                            <a href="#" class="py-1 common-btn2 -solid cart-btn">
                                                                <i class="fa-solid fa-cart-shopping"></i>
                                                            </a>
                                                            <a href="#" class="py-1 common-btn2 white-list-btn">
                                                                <i class="fa-solid fa-bookmark"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
 

                                        </div>
                                    </div>
                                    {{-- /Products List --}}

                                    <div class="d-flex">
                                        <button class="common-btn mx-auto">Load More</button>
                                    </div>

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
        <script defer src="{{ asset('assets/js/view-list.js') }}"></script>
        {{-- /All Scripts --}}

        {{-- Test Scripts --}}
        <script defer src="{{ asset('assets/js/cloneNode.test.js') }}"></script>
        {{-- /Test Scripts --}}
    </section>


@endsection
