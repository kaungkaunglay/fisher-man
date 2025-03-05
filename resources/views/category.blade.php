@extends('includes.layout')
@section('title', 'category')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/category.css') }}" />
@endsection
@section('contents')

    <!-- Breadcrumbs -->
    <section class="mt-4 mb-3">
        <div class="container-custom">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans_lang('home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $category->category_name }}</li>
                </ol>
            </nav>

        </div>
    </section>
    <!-- ./Breadcrumbs -->

    <div class="container-custom row">

        <!-- aside start -->
        <div class="side-menu col-4">
            @include('includes.aside')
        </div>
        <!-- aside end -->

        <!-- category list start -->
        <div class="category col-8">
            <ul class="list-group category-list">
                @if ($category->subCategories->isEmpty())
                    <h6 class="txt-primary fw-bold mb-3">このカテゴリには商品がありません</h6>
                @else
                    @foreach ($category->subCategories as $subcategory)
                        @if ($subcategory->products->isNotEmpty())
                            <li class="d-flex flex-column">
                                <div class="card-head">
                                    <h2 class="title">{{ $subcategory->name }}</h2>
                                    <div class="filter d-flex justify-content-between align-items-center">
                                        <div class="icon-buttons txt-primary d-flex gap-3 align-items-center">
                                            <i class="fa-solid fa-grip fs-2 fw-bold" id="card-list-btn"></i>
                                            <i class="fa-solid fa-list fs-3 fw-bold" id="row-list-btn"></i>
                                        </div>
                                    </div>
                                </div>
            
                                <!-- card items list start -->
                                <div class="card-list" id="view-list">
                                    @foreach ($subcategory->products->take(4) as $product)
                                        @if ($product->status == 'approved')
                                            <div class="item-card">
                                                <a href="{{ route('product.show', $product->id) }}" class="right">
                                                    <img loading="lazy" src="{{ asset('assets/products/'.$product->product_image) }}" class="card-img-top"
                                                        alt="{{ $product->name }}">
                                                </a>
                                                <div class="left pt-3">
                                                    <p class="price">¥{{ number_format($product->product_price) }}</p>
                                                    <div class="title-category">
                                                        <a href="{{ route('sub-category.show', $product->subCategory->id) }}"
                                                            class="menu-category">{{ $product->subCategory->name }}</a>
                                                        <h3 class="title">{{ $product->name }}</h3>
                                                    </div>
                                                    <a href="{{ route('product.show', $product->id) }}"
                                                        class="txt m-b-10 description">
                                                        {{ $product->description }}
                                                    </a>
                                                    <div class="d-flex gap-2 card-btn m-t-10">
                                                        <a href="javascript:void(0);"
                                                            class="py-1 common-btn2 -solid cart-btn "
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
                                        @endif
                                    @endforeach
                                </div>
                                <!-- card items list end -->
                                <div class="see-more-box d-flex m-t-b-20 justify-content-center justify-content-lg-end mt-5">
                                    <a href="{{ route('sub-category.show', $subcategory->id) }}"
                                        class="common-btn">{{ trans_lang('seemore') }}</a>
                                </div>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>

        <script defer src="{{ asset('assets/js/view-list.js') }}"></script>
        <script src="{{ asset('assets/js/notify.js') }}"></script>

    @endsection
    @section('script')
        <script>
            $(document).ready(() => {
                handleAddToCartBtn('cart-btn');
                handleAddToWhiteListBtn('white-list-btn');
            })
        </script>
    @endsection
