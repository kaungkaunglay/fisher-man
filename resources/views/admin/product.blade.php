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
      <!-- main-content-wrap -->
      <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Add Product</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="index.html"><div class="text-tiny">Dashboard</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#"><div class="text-tiny">Ecommerce</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Add product</div>
                    </li>
                </ul>
            </div>
            <!-- form-add-product -->
            <form class="tf-section-2 form-add-product" >
                <div class="wg-box">
                    <fieldset class="name">
                        <div class="body-title mb-10">Product name <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter product name" name="text" tabindex="0" value="" aria-required="true" required="">
                        <div class="text-tiny">Do not exceed 20 characters when entering the product name.</div>
                    </fieldset>
                    <div class="gap22 cols">
                        <fieldset class="category">
                            <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>
                            <div class="select">
                                <select class="">
                                    <option>Choose category</option>
                                    <option>Shop</option>
                                    <option>Product</option>
                                </select>
                            </div>
                        </fieldset>
                        <fieldset class="male">
                            <div class="body-title mb-10">Gender <span class="tf-color-1">*</span></div>
                            <div class="select">
                                <select class="">
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </fieldset>
                    </div>
                    <fieldset class="brand">
                        <div class="body-title mb-10">Brand <span class="tf-color-1">*</span></div>
                        <div class="select">
                            <select class="">
                                <option>Choose category</option>
                                <option>Shop</option>
                                <option>Product</option>
                            </select>
                        </div>
                    </fieldset>
                    <fieldset class="description">
                        <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                        <textarea class="mb-10" name="description" placeholder="Description" tabindex="0" aria-required="true" required=""></textarea>
                        <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                    </fieldset>
                </div>
                <div class="wg-box">
                    <fieldset>
                        <div class="body-title mb-10">Upload images</div>
                        <div class="upload-image mb-16">
                            <div class="item">
                                <img src="images/upload/upload-1.png" alt="">
                            </div>
                            <div class="item">
                                <img src="images/upload/upload-2.png" alt="">
                            </div>
                            <div class="item up-load">
                                <label class="uploadfile" for="myFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="text-tiny">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                    <input type="file" id="myFile" name="filename">
                                </label>
                            </div>
                        </div>
                        <div class="body-text">You need to add at least 4 images. Pay attention to the quality of the pictures you add, comply with the background color standards. Pictures must be in certain dimensions. Notice that the product shows all the details</div>
                    </fieldset>
                    <div class="cols gap22">
                        <fieldset class="name">
                            <div class="body-title mb-10">Add size</div>
                            <div class="select mb-10">
                                <select class="">
                                    <option>EU - 44</option>
                                    <option>EU - 40</option>
                                    <option>EU - 50</option>
                                </select>
                            </div>
                            <div class="list-box-value mb-10">
                                <div class="box-value-item"><div class="body-text">EU - 38.5</div></div>
                                <div class="box-value-item"><div class="body-text">EU - 39</div></div>
                                <div class="box-value-item"><div class="body-text">EU - 40</div></div>
                            </div>
                            <div class="list-box-value">
                                <div class="box-value-item"><div class="body-text">EU - 41.5</div></div>
                                <div class="box-value-item"><div class="body-text">EU - 42</div></div>
                                <div class="box-value-item"><div class="body-text">EU - 43</div></div>
                            </div>
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title mb-10">Product date</div>
                            <div class="select">
                                <input type="date" name="date" value="2023-11-20">
                            </div>
                        </fieldset>
                    </div>
                    <div class="cols gap10">
                        <button class="tf-button w-full" type="submit">Add product</button>
                        <button class="tf-button style-1 w-full" type="submit">Save product</button>
                        <a href="#" class="tf-button style-2 w-full">Schedule</a>
                    </div>
                </div>
            </form>
            <!-- /form-add-product -->
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
    <!-- /bottom-page -->
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

