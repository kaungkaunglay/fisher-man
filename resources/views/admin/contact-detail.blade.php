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
                <h3>お問い合わせ内容</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{route('admin.index')}}"><div class="text-tiny">{{trans_lang('home')}}</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="{{route('admin.users.contact')}}"><div class="text-tiny">お問い合わせ内容</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">{{trans_lang('contact_detail')}}</div>
                    </li>
                </ul>
            </div>
            <!-- all-user -->

                <div class="wg-box">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-20">
                                <label class="fs-4 fw-bold mb-8">{{trans_lang('name')}}:</label>
                                <p>{{ $contact->name }}</p>
                            </div>

                            <div class="mb-20">
                                <label class="fs-4 fw-bold mb-8">{{trans_lang('email')}}:</label>
                                <p>{{ $contact->email }}</p>
                            </div>
                            <div class="mb-20">
                                <label class="fs-4 fw-bold mb-8">{{trans_lang('phone_number')}}:</label>
                                <p>{{ $contact->phone_number }}</p>
                            </div>

                            <div class="mb-20">
                                <label class="fs-4 fw-bold mb-8">{{trans_lang('description')}}:</label>
                                <p>{{ $contact->description }}</p>
                            </div>

                            <div class="mb-3">
                                <label class="fs-4 fw-bold mb-8">{{trans_lang('uploaded_date')}}:</label>
                                <p>{{ $contact->created_at->format('Y-m-d') }}</p>
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

