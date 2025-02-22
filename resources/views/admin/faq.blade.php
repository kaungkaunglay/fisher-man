@extends('admin.includes.layout')
@section('style')
<!-- Theme Style -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/animation.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/animation.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
<!-- Font -->
<link rel="stylesheet" href="{{ asset('assets/admin/font/fonts.css') }}">

<!-- Icon -->
<link rel="stylesheet" href="{{ asset('assets/admin/icon/style.css') }}">
@endsection
@section('contents')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>{{ isset($faq) ? 'FAQを編集' : 'FAQを追加' }}</h3>
            <!-- {{ isset($faq) ? 'Edit FAQ' : 'Add FAQ' }} -->

            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="index.html">
                        <div class="text-tiny">{{trans_lang('home')}}</div>
                    </a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="#">
                        <div class="text-tiny">{{trans_lang('ecommerce')}}</div>
                    </a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>
                    <div class="text-tiny">{{ isset($faq) ? 'FAQを編集' : 'FAQを追加' }}</div>
                    <!-- {{ isset($faq) ? 'Edit FAQ' : 'Add FAQ' }} -->
                </li>
            </ul>
        </div>

        <!-- form-add-product -->
        <form class="tf-section-custom form-add-product" action="{{ isset($faq) ? route('update_faq', $faq->id) : route('add_faq') }}" method="POST">

            @csrf
            {{-- @if(isset($faq)) @method('PUT') @endif --}}

            <!-- Check for validation errors -->
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <div class="wg-box">
                <fieldset class="name">
                    <div class="body-title mb-10">FAQ {{trans_lang('question')}} <span class="tf-color-1">*</span></div>
                    <input class="mb-10 @error('question') is-invalid @enderror" type="text" placeholder="FAQ 質問" name="question" value="{{ old('question', $faq->question ?? '') }}">
                    @error('question')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <!-- <div class="text-tiny">Do not exceed 255 characters when entering the product name.</div> -->
                </fieldset>
                <fieldset class="description">
                    <div class="body-title mb-10">FAQ {{trans_lang('answer')}}</div>
                    <textarea class="mb-10 @error('answer') is-invalid @enderror" name="answer" placeholder="FAQ 回答">{{ old('answer', $faq->answer ?? '') }}</textarea>
                    @error('answer')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <!-- <div class="text-tiny">Do not exceed 255 characters when entering the product description.</div> -->
                </fieldset>
            </div>

            <div class="cols gap10">
                <button class="tf-button w-full" type="submit">{{ isset($faq) ? 'FAQを更新' : 'FAQを追加' }}</button>
                <!-- {{ isset($product) ? 'Update Product' : 'Add Product' }} -->
                <a href="{{ route('admin.products') }}" class="tf-button style-2 w-full">{{trans_lang('cancle')}}</a>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<!-- Javascript -->
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/zoom.js') }}"></script>
<script src="{{ asset('assets/admin/js/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('assets/admin/js/apexcharts/line-chart-1.js') }}"></script>
<script src="{{ asset('assets/admin/js/apexcharts/line-chart-2.js') }}"></script>
<script src="{{ asset('assets/admin/js/apexcharts/line-chart-3.js') }}"></script>
<script src="{{ asset('assets/admin/js/apexcharts/line-chart-4.js') }}"></script>
<script src="{{ asset('assets/admin/js/apexcharts/line-chart-5.js') }}"></script>
<script src="{{ asset('assets/admin/js/apexcharts/line-chart-6.js') }}"></script>
<script src="{{ asset('assets/admin/js/switcher.js') }}"></script>
<script src="{{ asset('assets/admin/js/theme-settings.js') }}"></script>
<script src="{{ asset('assets/admin/js/main.js') }}"></script>
@endsection
