@extends('admin.includes.layout')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/animate.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/animation.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap-select.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/swiper-bundle.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css')}}">



<!-- Font -->
<link rel="stylesheet" href="{{ asset('assets/admin/font/fonts.css') }}">

<!-- Icon -->
<link rel="stylesheet" href="{{ asset('assets/admin/icon/style.css') }}">

@endsection
@section('contents')


<!-- main-content-wrap -->
<div class="main-content-inner">
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>{{trans_lang('product')}}{{trans_lang('detail')}}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="index.html">
                        <div class="text-tiny">{{trans_lang('home')}}</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="#">
                        <div class="text-tiny">{{trans_lang('ecommerce')}}</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">{{$product->name}} - {{trans_lang('detail')}}</div>
                </li>
            </ul>
        </div>
        <!-- Product Detail -->
        <div class="wg-box">
            <div class="tf-main-product section-image-zoom flex">
                <div class="tf-product-media-wrap thumbs-bottom">
                    <div class="thumbs-slider">
                        <div class="swiper tf-product-media-main" id="gallery-swiper-started">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="">
                                        <img style="width: 100%;" src="{{ asset('assets/products/'.$product->product_image) }}" alt="{{$product->name}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tf-product-info-wrap relative flex-grow">
                    <div class="tf-zoom-main"></div>
                    <div class="tf-product-info-list other-image-zoom">
                        <div class="tf-product-info-title">
                            <h3>{{$product->name}}</h3>
                            <div class="d-flex justify-content-between">
                                <div class="price body-title">
                                    @if ($product->discount > 0)
                                    <span class="format">{{$product->product_price - $product->discount}}</span>
                                    <span class="original-price format text-decoration-line-through" style="opacity: 0.5;">¥{{ number_format($product->product_price) }}</span>
                                    @else
                                        <span class="">¥{{ number_format($product->product_price) }}</span>
                                    @endif
                                </div>
                                <div class="price body-title">{{ $product->created_at->format('d M Y') }}</div>
                            </div>
                            
                        </div>
                        <div class="tf-product-info-variant-picker">
                            <div class="variant-picker-label body-text">
                                {{trans_lang('length')}} : <span class="body-title-2 variant-picker-label-value">{{number_format($product->size)}} cm</span>
                            </div>
                            <div class="variant-picker-label body-text">
                                {{trans_lang('weight')}} : <span class="body-title-2 variant-picker-label-value">{{number_format($product->weight)}} kg</span>
                            </div>
                            <div class="variant-picker-label body-text">
                                {{trans_lang('quanity')}} : <span class="body-title-2 variant-picker-label-value">{{number_format($product->stock)}}</span>
                            </div>
                            <div class="variant-picker-label body-text">
                                {{trans_lang('day_of_caught')}} : <span class="body-title-2 variant-picker-label-value">{{ $product->day_of_caught }}</span>
                            </div>
                            <div class="variant-picker-label body-text">
                                {{trans_lang('expire_date')}} : <span class="body-title-2 variant-picker-label-value">{{ $product->expiration_date }}</span>
                            </div>
                            <div class="variant-picker-label body-text">
                                {{trans_lang('description')}} : <span class="body-title-2 variant-picker-label-value">{{ $product->description }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Product Detail -->
    </div>
    <!-- /main-content-wrap -->
</div>
<!-- /main-content-wrap -->

@endsection
@section('script')

<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/zoom.js') }}"></script>
<script src="{{ asset('assets/admin/js/switcher.js') }}"></script>
<script src="{{ asset('assets/admin/js/theme-settings.js') }}"></script>
<script src="{{ asset('assets/admin/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/carousel.js') }}"></script>
<script src="{{ asset('assets/admin/s/main.js') }}j"></script>
@endsection