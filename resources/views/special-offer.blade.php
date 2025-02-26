@extends('includes.layout')
@section('title', 'Special Offer')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/category.css') }}" />
@endsection
@section('contents')
    <div class="container-custom row">
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb" class="py-4">
            <ol class="breadcrumb mb-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans_lang('home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans_lang('special_offer') }}</li>
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
                        <h2 class="title">{{ trans_lang('special_offer') }}</h2>
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
                                        {{ trans_lang('sortby') }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ route('special-offer', ['sort_by' => 'price_asc']) }}">{{ trans_lang('price_l_h') }}</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('special-offer', ['sort_by' => 'price_desc']) }}">{{ trans_lang('price_h_l') }}</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('special-offer', ['sort_by' => 'name_asc']) }}">{{ trans_lang('name_a_z') }}</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('special-offer', ['sort_by' => 'name_desc']) }}">{{ trans_lang('name_z_a') }}</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('special-offer', ['sort_by' => 'latest']) }}">{{ trans_lang('latest') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-list" id="view-list">
                        @foreach ($products as $product)
                            <div class="item-card">
                                <a href="{{ route('product.show', $product->id) }}" class="right">
                                    <img loading="lazy" src="{{ asset('assets/products/'.$product->product_image) }}" class="card-img-top"
                                        alt="{{ $product->name }}">
                                </a>
                                <div class="left">
                                    <p class="price m-t-b-10">
                                        @if ($product->discount > 0)
                                            ¥{{ number_format($product->product_price - $product->discount, 2) }}
                                            <span
                                                class="original-price">¥{{ number_format($product->product_price, 2) }}</span>
                                        @else
                                            <span class="">¥{{ number_format($product->product_price, 2) }}</span>
                                        @endif
                                    </p>
                                    <div class="title-category">
                                        <a href="{{ route('sub-category.show', $product->subCategory->id) }}"
                                            class="menu-category">{{ $product->subCategory->name }}</a>
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
                </li>
            </ul>
        </div>
        <!-- category list end -->
    </div>
    <!-- category list end -->
    </div>

    <script src="{{ asset('assets/js/view-list.js') }}"></script>
    <script src="{{ asset('assets/js/words-limit.js') }}"></script>

@endsection
@section('script')
    <script>
        $(document).ready(() => {
            handleAddToCartBtn('cart-btn');
            handleAddToWhiteListBtn('white-list-btn');
        })
    </script>
@endsection
