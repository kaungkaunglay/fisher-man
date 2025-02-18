@extends('includes.layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/category.css') }}"> -->
@endsection

@section('contents')
    <section class="hero mt-5 container-custom">
        <div class="row justify-content-between">
            <div class="col-lg-4 d-none d-lg-block">
                @include('includes.aside')
            </div>
            <div class="col-lg-8 col-md-12">
                @include('includes.slider')
            </div>
        </div>
    </section>

    <section class=" bg-second my-3 py-3">
        <div class="container-custom">
            <h6 class="txt-primary fw-bold mb-3">Recommand Products</h6>
            <div class="filter d-flex justify-content-between align-items-center mb-3">
                <div class="icon-buttons txt-primary d-flex gap-3 align-items-center">
                    <i class="fa-solid fa-grip fs-2 fw-bold" id="card-list-btn"></i>
                    <i class="fa-solid fa-list fs-3 fw-bold" id="row-list-btn"></i>
                </div>
            </div>

            <div class="card-list" id="view-list">
                <div class="item-card">
                    <a href="{{ url('/product') }}" class="right">
                        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
                    </a>
                    <div class="left">
                        <p class="price m-t-b-10">¥1000</p>
                        <div class="title-category">
                            <a href="" class="menu-category ">鮮魚 | 白身魚</a>
                            <h3 class="title m-t-b-10">真鯛</h3>
                        </div>
                        <a href="{{ url('/product') }}" class="txt m-b-10 description ">
                            たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
                        </a>

                        <div class="d-flex card-btn m-t-10">
                            <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
                            <a href="#" class="product-btn p-2 w-100"><i class="fa-solid fa-bookmark"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item-card">
                    <a href="{{ url('/product') }}" class="right">
                        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
                    </a>
                    <div class="left">
                        <p class="price m-t-b-10">¥1000</p>
                        <div class="title-category">
                            <a href="" class="menu-category ">鮮魚 | 白身魚</a>
                            <h3 class="title m-t-b-10">真鯛</h3>
                        </div>
                        <a href="{{ url('/product') }}" class="txt m-b-10 description">
                            たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
                        </a>
                        <div class="d-flex card-btn m-t-10">
                            <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
                            <a href="#" class="product-btn p-2 w-100"><i class="fa-solid fa-bookmark"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item-card">
                    <a href="{{ url('/product') }}" class="right">
                        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
                    </a>
                    <div class="left">
                        <p class="price m-t-b-10">¥1000</p>
                        <div class="title-category">
                            <a href="" class="menu-category ">鮮魚 | 白身魚</a>
                            <h3 class="title m-t-b-10">真鯛</h3>
                        </div>
                        <a href="{{ url('/product') }}" class="txt m-b-10 description">
                            たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
                        </a>
                        <div class="d-flex card-btn m-t-10">
                            <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
                            <a href="#" class="product-btn p-2 w-100"><i class="fa-solid fa-bookmark"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item-card">
                    <a href="{{ url('/product') }}" class="right">
                        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
                    </a>
                    <div class="left">
                        <p class="price m-t-b-10">¥1000</p>
                        <div class="title-category">
                            <a href="" class="menu-category ">鮮魚 | 白身魚</a>
                            <h3 class="title m-t-b-10">真鯛</h3>
                        </div>
                        <a href="{{ url('/product') }}" class="txt m-b-10 description">
                            たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
                        </a>
                        <div class="d-flex card-btn m-t-10">
                            <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
                            <a href="#" class="product-btn p-2 w-100"><i class="fa-solid fa-bookmark"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item-card">
                    <a href="{{ url('/product') }}" class="right">
                        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
                    </a>
                    <div class="left">
                        <p class="price m-t-b-10">¥1000</p>
                        <div class="title-category">
                            <a href="" class="menu-category ">鮮魚 | 白身魚</a>
                            <h3 class="title m-t-b-10">真鯛</h3>
                        </div>
                        <a href="{{ url('/product') }}" class="txt m-b-10 description">
                            たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
                        </a>
                        <div class="d-flex card-btn m-t-10">
                            <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
                            <a href="#" class="product-btn p-2 w-100"><i class="fa-solid fa-bookmark"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item-card">
                    <a href="{{ url('/product') }}" class="right">
                        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
                    </a>
                    <div class="left">
                        <p class="price m-t-b-10">¥1000</p>
                        <div class="title-category">
                            <a href="" class="menu-category ">鮮魚 | 白身魚</a>
                            <h3 class="title m-t-b-10">真鯛</h3>
                        </div>
                        <a href="{{ url('/product') }}" class="txt m-b-10 description">
                            たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
                        </a>
                        <div class="d-flex card-btn m-t-10">
                            <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
                            <a href="#" class="product-btn p-2 w-100"><i class="fa-solid fa-bookmark"></i></a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>


    <section class="m-t-b-20 moving-discount">
        <div id="moving-text">
            <p class="title">Discount Products</p>
            <p class="title">Discount Products</p>
            <p class="title">Discount Products</p>
            <p class="title">Discount Products</p>
            <p class="title">Discount Products</p>
        </div>
    </section>

    <section class="popular_top_rate_shop_section mt-3 container-custom">
        <h6 class="txt-primary fw-bold mb-3">Popular & Top Rating Shop</h6>
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
    </section>


    <section class="discount-products bg-second py-4">
        <div class="container-custom">
            <h6 class="txt-primary fw-bold mb-3">Discount Products</h6>
            <div class="filter d-flex justify-content-between align-items-center mb-3">
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

            <div class="card-list" id="view-list">
                @foreach ($products->filter(fn($product) => $product->discount > 0.0)->take(6) as $product)
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
                                <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
                                <a href="#" class="w-100 py-1 common-btn"><i class="fa-solid fa-bookmark"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row justify-content-center mx-0 mt-5">
                <div class="col-5 col-lg-4 text-center">
                    <a class="common-btn see-more-btn w-100" href="{{ route('special-offer') }}">
                        See More
                    </a>
                </div>
            </div>
        </div>
    </section>


    <section class="all-products container-custom my-3">
        <h6 class="txt-primary fw-bold mb-3">All Products</h6>
        <div class="filter d-flex justify-content-between align-items-center mb-3">
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
                            <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
                            <a href="javascript:void(0);" class="w-100 py-1 common-btn" data-id="{{ $product->id }}"><i class="fa-solid fa-bookmark"></i></a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="col-5 col-lg-3 text-center">
                <button class="btn btn-outline-primary px-5 py-2  mt-5" id="load-more" title="Load More Items">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>
    </section>

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


            $('.product-btn').click(function(e) {
                e.preventDefault();
                const getid = $(this).data('id');

                $.ajax({
                    url: `/white-list/${getid}`,
                    type: "POST",
                    data: {
                        id: getid
                    },
                    success: function(data) {
                        if (data.status) {

                        }
                        console.log(data.message);
                    }
                });
            });
        });
    </script>
@endsection
