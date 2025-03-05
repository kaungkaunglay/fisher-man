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
                <h3>Order List</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="index.html"><div class="text-tiny">Dashboard</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#"><div class="text-tiny">Order</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Order List</div>
                    </li>
                </ul>
            </div>
            <!-- order-list -->
            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="ここで検索。。。" class="" name="name" tabindex="2" value="" aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <a class="tf-button style-1 w208" href="oder-detail.html"><i class="icon-file-text"></i>Export all order</a>
                </div>
                <div class="wg-table table-all-category">
                    <ul class="table-title flex gap20 mb-14">
                        <li>
                            <div class="body-title">Product</div>
                        </li>    
                        <li>
                            <div class="body-title">Order ID</div>
                        </li>
                        <li>
                            <div class="body-title">Price</div>
                        </li>
                        <li>
                            <div class="body-title">Quantity</div>
                        </li>
                        <li>
                            <div class="body-title">Payment</div>
                        </li>
                        <li>
                            <div class="body-title">Status</div>
                        </li>
                        <li>
                            <div class="body-title">Tracking</div>
                        </li>
                        <li>
                            <div class="body-title">Action</div>
                        </li>
                    </ul>
                    <ul class="flex flex-column">
                        <li class="product-item gap14">
                            <div class="image no-bg">
                                <img src="images/products/51.png" alt="">
                            </div>
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="name">
                                    <a href="product-list.html" class="body-title-2">Kristin Watson</a>
                                </div>
                                <div class="body-text">#7712309</div>
                                <div class="body-text">$1,452.500</div>
                                <div class="body-text">1,638</div>
                                <div class="body-text">20</div>
                                <div>
                                    <div class="block-available">Success</div>
                                </div>
                                <div>
                                    <div class="block-tracking">Tracking</div>
                                </div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item gap14">
                            <div class="image no-bg">
                                <img src="images/products/52.png" alt="">
                            </div>
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="name">
                                    <a href="product-list.html" class="body-title-2">Kristin Watson</a>
                                </div>
                                <div class="body-text">#7712309</div>
                                <div class="body-text">$1,452.500</div>
                                <div class="body-text">1,638</div>
                                <div class="body-text">20</div>
                                <div>
                                    <div class="block-pending">Pending</div>
                                </div>
                                <div>
                                    <div class="block-tracking">Tracking</div>
                                </div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item gap14">
                            <div class="image no-bg">
                                <img src="images/products/53.png" alt="">
                            </div>
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="name">
                                    <a href="product-list.html" class="body-title-2">Kristin Watson</a>
                                </div>
                                <div class="body-text">#7712309</div>
                                <div class="body-text">$1,452.500</div>
                                <div class="body-text">1,638</div>
                                <div class="body-text">20</div>
                                <div>
                                    <div class="block-available">Success</div>
                                </div>
                                <div>
                                    <div class="block-tracking">Tracking</div>
                                </div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item gap14">
                            <div class="image no-bg">
                                <img src="images/products/54.png" alt="">
                            </div>
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="name">
                                    <a href="product-list.html" class="body-title-2">Kristin Watson</a>
                                </div>
                                <div class="body-text">#7712309</div>
                                <div class="body-text">$1,452.500</div>
                                <div class="body-text">1,638</div>
                                <div class="body-text">20</div>
                                <div>
                                    <div class="block-available">Success</div>
                                </div>
                                <div>
                                    <div class="block-tracking">Tracking</div>
                                </div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item gap14">
                            <div class="image no-bg">
                                <img src="images/products/55.png" alt="">
                            </div>
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="name">
                                    <a href="product-list.html" class="body-title-2">Kristin Watson</a>
                                </div>
                                <div class="body-text">#7712309</div>
                                <div class="body-text">$1,452.500</div>
                                <div class="body-text">1,638</div>
                                <div class="body-text">20</div>
                                <div>
                                    <div class="block-not-available">Cancel</div>
                                </div>
                                <div>
                                    <div class="block-tracking">Tracking</div>
                                </div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item gap14">
                            <div class="image no-bg">
                                <img src="images/products/56.png" alt="">
                            </div>
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="name">
                                    <a href="product-list.html" class="body-title-2">Kristin Watson</a>
                                </div>
                                <div class="body-text">#7712309</div>
                                <div class="body-text">$1,452.500</div>
                                <div class="body-text">1,638</div>
                                <div class="body-text">20</div>
                                <div>
                                    <div class="block-not-available">Cancel</div>
                                </div>
                                <div>
                                    <div class="block-tracking">Tracking</div>
                                </div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item gap14">
                            <div class="image no-bg">
                                <img src="images/products/57.png" alt="">
                            </div>
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="name">
                                    <a href="product-list.html" class="body-title-2">Kristin Watson</a>
                                </div>
                                <div class="body-text">#7712309</div>
                                <div class="body-text">$1,452.500</div>
                                <div class="body-text">1,638</div>
                                <div class="body-text">20</div>
                                <div>
                                    <div class="block-available">Success</div>
                                </div>
                                <div>
                                    <div class="block-tracking">Tracking</div>
                                </div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item gap14">
                            <div class="image no-bg">
                                <img src="images/products/58.png" alt="">
                            </div>
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="name">
                                    <a href="product-list.html" class="body-title-2">Kristin Watson</a>
                                </div>
                                <div class="body-text">#7712309</div>
                                <div class="body-text">$1,452.500</div>
                                <div class="body-text">1,638</div>
                                <div class="body-text">20</div>
                                <div>
                                    <div class="block-available">Success</div>
                                </div>
                                <div>
                                    <div class="block-tracking">Tracking</div>
                                </div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item gap14">
                            <div class="image no-bg">
                                <img src="images/products/59.png" alt="">
                            </div>
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="name">
                                    <a href="product-list.html" class="body-title-2">Kristin Watson</a>
                                </div>
                                <div class="body-text">#7712309</div>
                                <div class="body-text">$1,452.500</div>
                                <div class="body-text">1,638</div>
                                <div class="body-text">20</div>
                                <div>
                                    <div class="block-available">Success</div>
                                </div>
                                <div>
                                    <div class="block-tracking">Tracking</div>
                                </div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item gap14">
                            <div class="image no-bg">
                                <img src="images/products/60.png" alt="">
                            </div>
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="name">
                                    <a href="product-list.html" class="body-title-2">Kristin Watson</a>
                                </div>
                                <div class="body-text">#7712309</div>
                                <div class="body-text">$1,452.500</div>
                                <div class="body-text">1,638</div>
                                <div class="body-text">20</div>
                                <div>
                                    <div class="block-available">Success</div>
                                </div>
                                <div>
                                    <div class="block-tracking">Tracking</div>
                                </div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10">
                    <div class="text-tiny">Showing 10 entries</div>
                    <ul class="wg-pagination">
                        <li>
                            <a href="#"><i class="icon-chevron-left"></i></a>
                        </li>
                        <li>
                            <a href="#">1</a>
                        </li>
                        <li class="active">
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /order-list -->
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

