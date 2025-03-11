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
                <h3>{{trans_lang('contact')}} {{trans_lang('request')}}</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{route('admin.index')}}"><div class="text-tiny">{{trans_lang('home')}}</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">{{trans_lang('contact')}} {{trans_lang('request')}}</div>
                    </li>
                </ul>
            </div>
            <!-- all-user -->
            <div class="wg-box">
                {{-- <div class="flex items-center justify-between gap10 flex-wrap">
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

                </div> --}}
                <div class="wg-table table-all-user">
                    <ul class="table-title flex gap20 mb-14">
                        <li>
                            <div class="body-title">{{trans_lang('name')}}</div>
                        </li>
                        <li>
                            <div class="body-title">{{trans_lang('email')}}</div>
                        </li>
                        <li>
                            <div class="body-title">{{trans_lang('action')}}</div>
                        </li>
                    </ul>
                  @foreach($contacts as $contact)
                  <ul class="flex flex-column">
                    <li class="user-item gap14">
                        {{-- <div class="image">
                            <img src="images/avatar/user-6.png" alt="">
                        </div> --}}
                        <div class="flex items-center justify-between gap20 flex-grow">
                            <div class="name">
                                <a href="#" class="body-title-2">{{$contact->name}}</a>

                            </div>
                            <div class="body-text">{{$contact->email}}</div>
                            <div class="list-icon-function">
                                <div class="item eye">
                                   <a href="{{route('admin.contact.detail',$contact->id)}}"><i class="icon-eye"></i></a>
                                </div>


                            </div>
                        </div>
                    </li>
                </ul>
                  @endforeach
                </div>
                <div class="divider"></div>
                {{-- pagination --}}
                @if ($contacts->hasPages())
                <div class="flex items-center justify-between flex-wrap gap10">
                    <!-- <div class="text-tiny">
                        Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} of {{ $contacts->total() }} entries
                    </div> -->
                    <ul class="wg-pagination">
                        <!-- Previous Page -->
                        <li class="{{ $contacts->onFirstPage() ? 'disabled' : '' }}">
                            <a href="{{ $contacts->previousPageUrl() }}">
                                <i class="icon-chevron-left"></i>
                            </a>
                        </li>

                        <!-- Page Numbers -->
                        @foreach ($contacts->links()->elements[0] as $page => $url)
                            <li class="{{ $page == $contacts->currentPage() ? 'active' : '' }}">
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        <!-- Next Page -->
                        <li class="{{ $contacts->hasMorePages() ? '' : 'disabled' }}">
                            <a href="{{ $contacts->nextPageUrl() }}">
                                <i class="icon-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
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

