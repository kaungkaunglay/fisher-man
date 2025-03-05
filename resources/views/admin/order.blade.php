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
                <h3>Order #123783</h3>
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
                        <a href="#"><div class="text-tiny">Order detail</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Order #123783</div>
                    </li>
                </ul>
            </div>
            <!-- order-detail -->
            <div class="wg-order-detail">
                <div class="left flex-grow">
                    <div class="wg-box mb-20">
                        <div class="wg-table table-order-detail">
                            <ul class="table-title flex items-center justify-between gap20 mb-24">
                                <li>
                                    <div class="body-title">All item</div>
                                </li>    
                                <li>
                                    <div class="dropdown default">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="body-title-2 flex items-center gap8">Sort<i class="h6 icon-chevron-down"></i></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>  
                                                <a href="javascript:void(0);">Name</a>
                                            </li>
                                            <li>  
                                                <a href="javascript:void(0);">Quantity</a>
                                            </li>
                                            <li>  
                                                <a href="javascript:void(0);">Price</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <ul class="flex flex-column">
                                <li class="product-item gap14">
                                    <div class="image no-bg">
                                        <img src="images/products/41.png" alt="">
                                    </div>
                                    <div class="flex items-center justify-between gap40 flex-grow">
                                        <div class="name">
                                            <div class="text-tiny mb-1">Product name</div>
                                            <a href="product-list.html" class="body-title-2">Kristin Watson</a>
                                        </div>
                                        <div class="name">
                                            <div class="text-tiny mb-1">Quantity</div>
                                            <div class="body-title-2">1</div>
                                        </div>
                                        <div class="name">
                                            <div class="text-tiny mb-1">Price</div>
                                            <div class="body-title-2">$50.47</div>
                                        </div>
                                    </div>
                                </li>
                                <li class="product-item gap14">
                                    <div class="image no-bg">
                                        <img src="images/products/44.png" alt="">
                                    </div>
                                    <div class="flex items-center justify-between gap40 flex-grow">
                                        <div class="name">
                                            <div class="text-tiny mb-1">Product name</div>
                                            <a href="product-list.html" class="body-title-2">Kristin Watson</a>
                                        </div>
                                        <div class="name">
                                            <div class="text-tiny mb-1">Quantity</div>
                                            <div class="body-title-2">1</div>
                                        </div>
                                        <div class="name">
                                            <div class="text-tiny mb-1">Price</div>
                                            <div class="body-title-2">$50.47</div>
                                        </div>
                                    </div>
                                </li>
                                <li class="product-item gap14">
                                    <div class="image no-bg">
                                        <img src="images/products/43.png" alt="">
                                    </div>
                                    <div class="flex items-center justify-between gap40 flex-grow">
                                        <div class="name">
                                            <div class="text-tiny mb-1">Product name</div>
                                            <a href="product-list.html" class="body-title-2">Kristin Watson</a>
                                        </div>
                                        <div class="name">
                                            <div class="text-tiny mb-1">Quantity</div>
                                            <div class="body-title-2">1</div>
                                        </div>
                                        <div class="name">
                                            <div class="text-tiny mb-1">Price</div>
                                            <div class="body-title-2">$50.47</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="wg-box">
                        <div class="wg-table table-cart-totals">
                            <ul class="table-title flex mb-24">
                                <li>
                                    <div class="body-title">Cart Totals</div>
                                </li>    
                                <li>
                                    <div class="body-title">Price</div>
                                </li>    
                            </ul>
                            <ul class="flex flex-column gap14">
                                <li class="cart-totals-item">
                                    <span class="body-text">Subtotal:</span>
                                    <span class="body-title-2">$70.13</span>
                                </li>
                                <li class="divider"></li>
                                <li class="cart-totals-item">
                                    <span class="body-text">Shipping:</span>
                                    <span class="body-title-2">$10.00</span>
                                </li>
                                <li class="divider"></li>
                                <li class="cart-totals-item">
                                    <span class="body-text">Tax (GST):</span>
                                    <span class="body-title-2">$5.00</span>
                                </li>
                                <li class="divider"></li>
                                <li class="cart-totals-item">
                                    <span class="body-title">Total price:</span>
                                    <span class="body-title tf-color-1">$90.58</span>
                                </li>
                              
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="wg-box mb-20 gap10">
                        <div class="body-title">Summary</div>
                        <div class="summary-item">
                            <div class="body-text">Order ID</div>
                            <div class="body-title-2">#192847</div>
                        </div>
                        <div class="summary-item">
                            <div class="body-text">Date</div>
                            <div class="body-title-2">20 Nov 2023</div>
                        </div>
                        <div class="summary-item">
                            <div class="body-text">Total</div>
                            <div class="body-title-2 tf-color-1">$948.5</div>
                        </div>
                    </div>
                    <div class="wg-box mb-20 gap10">
                        <div class="body-title">Shipping Address</div>
                        <div class="body-text">3517 W. Gray St. Utica, Pennsylvania 57867</div>
                    </div>
                    <div class="wg-box mb-20 gap10">
                        <div class="body-title">Payment Method</div>
                        <div class="body-text">Pay on Delivery (Cash/Card). Cash on delivery (COD) available. Card/Net banking acceptance subject to device availability.</div>
                    </div>
                    <div class="wg-box gap10">
                        <div class="body-title">Expected Date Of Delivery</div>
                        <div class="body-title-2 tf-color-2">20 Nov 2023</div>
                        <a class="tf-button style-1 w-full" href="oder-tracking.html"><i class="icon-truck"></i>Track order</a>
                    </div>
                </div>
            </div>
            <!-- /order-detail -->
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

