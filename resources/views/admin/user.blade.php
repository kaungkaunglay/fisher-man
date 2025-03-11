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
                    <h3>Add New User</h3>
                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                        <li>
                            <a href="index.html"><div class="text-tiny">{{trans_lang('home')}}</div></a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <a href="#"><div class="text-tiny">FAQs</div></a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <div class="text-tiny">Add New FAQ</div>
                        </li>
                    </ul>
                </div>
                <!-- add-new-user -->
                <form class="form-add-new-user form-style-2">
                    <div class="wg-box">
                        <div class="left">
                            <h5 class="mb-4">Account</h5>
                            <div class="body-text">Fill in the information below to add a new account</div>
                        </div>
                        <div class="right flex-grow">
                            <fieldset class="name mb-24">
                                <div class="body-title mb-10">Name</div>
                                <input class="flex-grow" type="text" placeholder="Username" name="name" tabindex="0" value="" aria-required="true" required="">
                            </fieldset>
                            <fieldset class="email mb-24">
                                <div class="body-title mb-10">Email</div>
                                <input class="flex-grow" type="email" placeholder="Email" name="email" tabindex="0" value="" aria-required="true" required="">
                            </fieldset>
                            <fieldset class="password mb-24">
                                <div class="body-title mb-10">Password</div>
                                <input class="password-input" type="password" placeholder="Enter password" name="password" tabindex="0" value="" aria-required="true" required="">
                                <span class="show-pass">
                                    <i class="icon-eye view"></i>
                                    <i class="icon-eye-off hide"></i>
                                </span>
                            </fieldset>
                            <fieldset class="password">
                                <div class="body-title mb-10">Confirm password</div>
                                <input class="password-input" type="password" placeholder="Confirm password" name="password" tabindex="0" value="" aria-required="true" required="">
                                <span class="show-pass">
                                    <i class="icon-eye view"></i>
                                    <i class="icon-eye-off hide"></i>
                                </span>
                            </fieldset>
                        </div>
                    </div>
                    <div class="wg-box">
                        <div class="left">
                            <h5 class="mb-4">Pernission</h5>
                            <div class="body-text">Items that the account is allowed to edit</div>
                        </div>
                        <div class="right flex-grow">
                            <fieldset class="mb-24">
                                <div class="body-title mb-10">Add product</div>
                                <div class="radio-buttons">
                                    <div class="item">
                                        <input class="" type="radio" name="add-product" id="add-product1" checked>
                                        <label class="" for="add-product1"><span class="body-title-2">Allow</span></label>
                                    </div>
                                    <div class="item">
                                        <input class="" type="radio" name="add-product" id="add-product2">
                                        <label class="" for="add-product2"><span class="body-title-2">Deny</span></label>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="mb-24">
                                <div class="body-title mb-10">Update product</div>
                                <div class="radio-buttons">
                                    <div class="item">
                                        <input class="" type="radio" name="update-product" id="update-product1">
                                        <label class="" for="update-product1"><span class="body-title-2">Allow</span></label>
                                    </div>
                                    <div class="item">
                                        <input class="" type="radio" name="update-product" id="update-product2" checked>
                                        <label class="" for="update-product2"><span class="body-title-2">Deny</span></label>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="mb-24">
                                <div class="body-title mb-10">Delete product</div>
                                <div class="radio-buttons">
                                    <div class="item">
                                        <input class="" type="radio" name="delete-product" id="delete-product1" checked>
                                        <label class="" for="delete-product1"><span class="body-title-2">Allow</span></label>
                                    </div>
                                    <div class="item">
                                        <input class="" type="radio" name="delete-product" id="delete-product2">
                                        <label class="" for="delete-product2"><span class="body-title-2">Deny</span></label>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="mb-24">
                                <div class="body-title mb-10">Apply discount</div>
                                <div class="radio-buttons">
                                    <div class="item">
                                        <input class="" type="radio" name="apply-product" id="apply-product1">
                                        <label class="" for="apply-product1"><span class="body-title-2">Allow</span></label>
                                    </div>
                                    <div class="item">
                                        <input class="" type="radio" name="apply-product" id="apply-product2" checked>
                                        <label class="" for="apply-product2"><span class="body-title-2">Deny</span></label>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="">
                                <div class="body-title mb-10">Create coupon</div>
                                <div class="radio-buttons">
                                    <div class="item">
                                        <input class="" type="radio" name="create-product" id="create-product1">
                                        <label class="" for="create-product1"><span class="body-title-2">Allow</span></label>
                                    </div>
                                    <div class="item">
                                        <input class="" type="radio" name="create-product" id="create-product2" checked>
                                        <label class="" for="create-product2"><span class="body-title-2">Deny</span></label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="bot">
                        <button class="tf-button w180" type="submit">Save</button>
                    </div>

                </form>
                <!-- /add-new-user -->
            </div>
            <!-- /main-content-wrap -->
        </div>
        <!-- /main-content-wrap -->
        <!-- bottom-page -->
        <div class="bottom-page">
            <div class="body-text">Copyright © 2025 r-mekiki.com, All rights reserved.</div>
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

