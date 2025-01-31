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
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Category infomation</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="index.html"><div class="text-tiny">Dashboard</div></a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="#"><div class="text-tiny">Category</div></a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">New category</div>
                </li>
            </ul>
        </div>
        <!-- new-category -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" >
                <fieldset class="name">
                    <div class="body-title">Product name <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Category name" name="text" tabindex="0" value="" aria-required="true" required="">
                </fieldset>
                <fieldset>
                    <div class="body-title">Upload images <span class="tf-color-1">*</span></div>
                    <div class="upload-image flex-grow">
                        <div class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                <input type="file" id="myFile" name="filename">
                            </label>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="category">
                    <div class="body-title">Select category icon</div>
                    <div class="select flex-grow">
                        <select class="">
                            <option>Select icon</option>
                            <option>icon 1</option>
                            <option>icon 2</option>
                        </select>
                    </div>
                </fieldset>
                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Save</button>
                </div>
            </form>
        </div>
        <!-- /new-category -->
    </div>
    <!-- /main-content-wrap -->
</div>
<!-- /main-content-wrap -->
<!-- bottom-page -->
<div class="bottom-page">
    <div class="body-text">Copyright © 2024 Remos. Design with</div>
    <i class="icon-heart"></i>
    <div class="body-text">by <a href="https://themeforest.net/user/themesflat/portfolio">Themesflat</a> All rights reserved.</div>
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
