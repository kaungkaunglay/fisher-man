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
            <div class="tf-section-4 mb-30">
                <!-- chart-default -->
                <div class="wg-chart-default">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image type-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52" viewBox="0 0 48 52" fill="none">
                                    <path d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z" fill="#22C55E"/>
                                </svg>
                                <i class="icon-shopping-bag"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Total Product</div>
                                <h4>34,945</h4>
                            </div>
                        </div>
                        {{-- <div class="box-icon-trending up">
                            <i class="icon-trending-up"></i>
                            <div class="body-title number">1.56%</div>
                        </div> --}}
                    </div>
                    <div class="wrap-chart">
                        <div id="line-chart-1"></div>
                    </div>
                </div>
                <!-- /chart-default -->
            </div>
            <div class="tf-section-5 mb-30">
                <!-- top-product -->
                <div class="wg-box">
                    <div class="flex items-center justify-between">
                        <h5>Top Products</h5>
                        {{-- <div class="dropdown default">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="view-all">View all<i class="icon-chevron-down"></i></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>  
                                    <a href="javascript:void(0);">3 days</a>
                                </li>
                                <li>  
                                    <a href="javascript:void(0);">7 days</a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                    <div class="wg-table table-top-product">
                        <ul class="flex flex-column gap14">
                           @foreach($top_products as $top_product)
                           <li class="product-item">
                            <div class="image">
                                <img src="{{asset('$top_product->product_image')}}" alt="">
                            </div>
                            <div class="flex items-center justify-between flex-grow">
                                <div class="name">
                                    <a href="product-list.html" class="body-title-2">Patimax Fragrance Long...</a>
                                    <div class="text-tiny mt-3">100 ¥</div>
                                </div>
                                <div>
                                    <div class="body-title-2 mb-3">Discount</div>
                                    <div class="text-tiny">2.71</div>
                                </div>
                                <div class="seller-name">
                                    <div class="text-tiny mb-3">Seller</div>
                                    <div class="body-text">Rose</div>
                                </div>
                                <div class="stock">
                                    <div class="text-tiny mb-3">Stock</div>
                                    <div class="body-text">sadfasdfasdfasdf</div>
                                </div>
                            </div>
                        </li>
                           @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /top-product -->
            </div>
            <div class="tf-section-5 mb-30">
                <!-- product-overview -->
                <div class="wg-box">
                    <div class="flex items-center justify-between">
                        <h5>Product overview</h5>
                        <div class="dropdown default">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="view-all">View all<i class="icon-chevron-down"></i></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>  
                                    <a href="javascript:void(0);">3 days</a>
                                </li>
                                <li>  
                                    <a href="javascript:void(0);">7 days</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="wg-table table-product-overview">
                        <ul class="table-title flex gap20 mb-14">
                            <li>
                                <div class="body-title">Name</div>
                            </li>    
                            <li>
                                <div class="body-title">Product ID</div>
                            </li>
                            <li>
                                <div class="body-title">Price</div>
                            </li>
                            <li>
                                <div class="body-title">Quantity</div>
                            </li>
                            <li>
                                <div class="body-title">Sale</div>
                            </li>
                            <li>
                                <div class="body-title">Revenue</div>
                            </li>
                            <li>
                                <div class="body-title">Status</div>
                            </li>
                        </ul>
                        <ul class="flex flex-column gap10">
                            <li class="product-item gap14">
                                <div class="image">
                                    <img src="{{asset('assets/admin/images/products/6.png')}}" alt="">
                                </div>
                                <div class="flex items-center justify-between flex-grow">
                                    <div class="name">
                                        <a href="product-list.html" class="body-text">Soft Fluffy Cats</a>
                                    </div>
                                    <div class="body-text">#327</div>
                                    <div class="body-text">$11.70</div>
                                    <div class="body-text">28</div>
                                    <div class="body-text">On sale</div>
                                    <div class="body-text">$328.85</div>
                                    <div class="block-not-available">Not Available</div>
                                </div>
                            </li>
                            <li class="product-item gap14">
                                <div class="image">
                                    <img src="{{asset('assets/admin/images/products/7.png')}}" alt="">
                                </div>
                                <div class="flex items-center justify-between flex-grow">
                                    <div class="name">
                                        <a href="product-list.html" class="body-text">Taste of the Wild Formula Finder</a>
                                    </div>
                                    <div class="body-text">#380</div>
                                    <div class="body-text">$8.99</div>
                                    <div class="body-text">10</div>
                                    <div class="body-text">On sale</div>
                                    <div class="body-text">$105.55</div>
                                    <div class="block-not-available">Not Available</div>
                                </div>
                            </li>
                            <li class="product-item gap14">
                                <div class="image">
                                    <img src="{{asset('assets/admin/images/products/8.png')}}" alt="">
                                </div>
                                <div class="flex items-center justify-between flex-grow">
                                    <div class="name">
                                        <a href="product-list.html" class="body-text">Wellness Natural Food</a>
                                    </div>
                                    <div class="body-text">#126</div>
                                    <div class="body-text">$5.22</div>
                                    <div class="body-text">578</div>
                                    <div class="body-text">--/--</div>
                                    <div class="body-text">$202.87</div>
                                    <div class="block-not-available">Not Available</div>
                                </div>
                            </li>
                            <li class="product-item gap14">
                                <div class="image">
                                    <img src="{{asset('assets/admin/images/products/9.png')}}" alt="">
                                </div>
                                <div class="flex items-center justify-between flex-grow">
                                    <div class="name">
                                        <a href="product-list.html" class="body-text">Dog Food Rachael Ray</a>
                                    </div>
                                    <div class="body-text">#582</div>
                                    <div class="body-text">$14.81</div>
                                    <div class="body-text">36</div>
                                    <div class="body-text">--/--</div>
                                    <div class="body-text">$475.22</div>
                                    <div>
                                        <div class="block-available">Available</div>
                                    </div>
                                </div>
                            </li>
                            <li class="product-item gap14">
                                <div class="image">
                                    <img src="{{asset('assets/admin/images/products/10.png')}}" alt="">
                                </div>
                                <div class="flex items-center justify-between flex-grow">
                                    <div class="name">
                                        <a href="product-list.html" class="body-text">Best Buddy Bits Dog Treats</a>
                                    </div>
                                    <div class="body-text">#293</div>
                                    <div class="body-text">$6.48</div>
                                    <div class="body-text">84</div>
                                    <div class="body-text">--/--</div>
                                    <div class="body-text">$219.78</div>
                                    <div class="block-not-available">Not Available</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="divider"></div>
                    <div class="flex items-center justify-between flex-wrap gap10">
                        <div class="text-tiny">Showing 5 entries</div>
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
                <!-- /product-overview -->
            </div>
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
