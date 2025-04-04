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
                <h3>{{trans_lang('order_list')}}</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="index.html"><div class="text-tiny">{{trans_lang('home')}}</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#"><div class="text-tiny">{{ trans_lang('order')}}</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">{{ trans_lang('order_list')}}</div>
                    </li>
                </ul>
            </div>
            <!-- order-list -->
            <div class="wg-box">
                <div class="wg-table table-all-category">
                    <ul class="table-title flex gap20 mb-14">
                        <li>
                            <div class="body-title">{{ trans_lang('product')}}</div>
                        </li>    
                        <li>
                            <div class="body-title">{{ trans_lang('order')}}ID</div>
                        </li>
                        <li>
                            <div class="body-title">{{ trans_lang('price')}}</div>
                        </li>
                        <li>
                            <div class="body-title">{{ trans_lang('quantity')}}</div>
                        </li>
                        <li>
                            <div class="body-title">{{ trans_lang('payment')}}</div>
                        </li>
                        <li>
                            <div class="body-title">{{ trans_lang('status') }}</div>
                        </li>
                        <li>
                            <div class="body-title">{{ trans_lang('ordered_by')}}</div>
                        </li>
                        <li>
                            <div class="body-title">{{trans_lang('order_date') }}</div>
                        </li>
                    </ul>
                    <ul class="flex flex-column">
                        @foreach ($orders as $order)
                            @foreach ($order->products as $product)
                            <li class="product-item gap14">
                                <div class="image no-bg">
                                    <img src="{{ asset('assets/products/'.$product->product_image) }}" alt="{{ $product->name }}">
                                </div>
                                <div class="flex items-center justify-between gap20 flex-grow">
                                    <div class="name">
                                        <a href="{{ route('admin.product.show',$product->id)}}" class="body-title-2">{{ $product->name}}</a>
                                    </div>
                                    <div class="body-text">{{ $order->id }}</div>
                                    <div class="body-text">¥{{ number_format($product->product_price - $product->discount, 0) }} </div>
                                    <div class="body-text">{{ $product->order_quantity}}</div>
                                    <div class="body-text">{{ $order->payment->name }}</div>
                                    <div>
                                        <div class="@if($order->status == 'pending') block-pending @elseif($order->status == 'success') block-available @else block-not-available @endif">{{ trans_lang($order->status)}}</div>
                                    </div>
                                    <div class="body-text">{{ $order->user->username }}</div>
                                    <div class="body-text">{{ $order->order_date }}</div>
                                </div>
                            </li>
                            @endforeach
                        @endforeach
                    </ul>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10">
                    <div class="text-tiny">10件を表示</div>
                    {{-- pagination --}}
                    @if ($orders->hasPages())
                    <div class="flex items-center justify-between flex-wrap gap10 mt-4">
                        {{-- <div class="text-tiny">{{trans_lang('showing_10_entries')}}</div> --}}
                        <ul class="wg-pagination">
                            <!-- Previous Page -->
                            <li class="{{ $orders->onFirstPage() ? 'disabled' : '' }}">
                                <a href="{{ $orders->previousPageUrl() }}">
                                    <i class="icon-chevron-left"></i>
                                </a>
                            </li>

                            <!-- Page Numbers (Show 5 buttons) -->
                            @php
                                $currentPage = $orders->currentPage();
                                $lastPage = $orders->lastPage();
                                $start = max(1, $currentPage - 2); // Show 2 pages before current
                                $end = min($lastPage, $currentPage + 2); // Show 2 pages after current

                                // Adjust to always show 5 buttons if possible
                                if ($end - $start < 4 && $lastPage > 5) {
                                    if ($currentPage <= 3) {
                                        $end = 5;
                                    } else {
                                        $start = max(1, $lastPage - 4);
                                    }
                                }

                                $pages = range($start, $end);
                            @endphp

                            @foreach ($pages as $page)
                                <li class="{{ $page == $currentPage ? 'active' : '' }}">
                                    <a href="{{ $orders->url($page) }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            <!-- Next Page -->
                            <li class="{{ $orders->hasMorePages() ? '' : 'disabled' }}">
                                <a href="{{ $orders->nextPageUrl() }}">
                                    <i class="icon-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endif
                    {{-- pagination --}}
                </div>
            </div>
            <!-- /order-list -->
        </div>
        <!-- /main-content-wrap -->
    </div>
    <!-- /main-content-wrap -->

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

