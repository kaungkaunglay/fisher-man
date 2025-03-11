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
                <h3>Shop Detail</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{route('admin.index')}}"><div class="text-tiny">{{trans_lang('home')}}</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Shop Detail</div>
                    </li>
                </ul>
            </div>
            <!-- all-user -->
            <div class="wg-box">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-20">
                            <label class="fs-4 fw-bold mb-8">Owner Name:</label>
                            <p>{{ $shop->user->username }}</p>
                        </div>

                        <div class="mb-20">
                            <label class="fs-4 fw-bold mb-8">Shop Name:</label>
                            <p>{{ $shop->shop_name }}</p>
                        </div>

                        <div class="mb-20">
                            <label class="fs-4 fw-bold mb-8">Trans_management:</label>
                            <p>{{ $shop->trans_management }}</p>
                        </div>
                        <div class="mb-20">
                            <label class="fs-4 fw-bold mb-8">Email:</label>
                            <p>{{ $shop->email }}</p>
                        </div>

                        <div class="mb-20">
                            <label class="fs-4 fw-bold mb-8">Phone:</label>
                            <p>{{ $shop->phone_number }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="fs-4 fw-bold mb-8">Submitted At:</label>
                            <p>{{ $shop->created_at->format('Y-m-d') }}</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                            <div class="image rounded">
                                <img src="{{asset('assets/images/avatars/'.$shop->avatar)}}" class="rounded-2 avatar" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /all-user -->
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

