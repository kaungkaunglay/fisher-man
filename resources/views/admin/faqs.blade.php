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
@include('messages.index')

<!-- main-content-wrap -->
<div class="main-content-inner">
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>{{trans_lang('faqs')}}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{route('admin.index')}}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">{{trans_lang('faqs')}}</div>
                </li>
            </ul>
        </div>
        <!-- product-list -->
        <div class="wg-box">
            <!-- <div class="title-box">
                <i class="icon-coffee"></i>
                <div class="body-text">Tip search by Product ID: Each product is provided with a unique ID, which you can rely on to find the exact product you need.</div>
            </div> -->
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <!-- <div class="show">
                        <div class="text-tiny">Showing</div>
                        <div class="select">
                            <select class="">
                                <option>10</option>
                                <option>20</option>
                                <option>30</option>
                            </select>
                        </div>
                        <div class="text-tiny">entries</div>
                    </div> -->
                </div>
                <a class="tf-button style-1 w208" href="/admin/faq/create"><i class="icon-plus"></i>{{trans_lang('add_faq')}}</a>
            </div>
            <div class="wg-table table-product-list">
                <ul class="table-title flex gap20 mb-14 faqs-table">
                    <li>
                        <div class="body-title">ID</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('question')}}</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('answer')}}</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('action')}}</div>
                    </li>
                </ul>

                @foreach($faqs as $faq)
                <ul class="flex flex-column">
                    <li class="product-item gap14">

                        <div class="flex items-center justify-between gap20 flex-grow faqs-data">

                            <div class="body-text">{{ $faq->id }}</div>
                            <div class="body-text">{{ $faq->question }}</div>
                            <div class="body-text answer">{{ $faq->answer }}</div>
                        </div>
                        <div class="list-icon-function">
                            <div class="item edit">
                                <a href="{{ route('admin.faqs.edit', $faq->id) }}">
                                    <i class="icon-edit-3"></i>
                                </a>
                            </div>
                            <div class="item trash">
                                    {{-- <form id="delete-form-{{ $faq->id }}" action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form> --}}
                                    {{-- onclick="event.preventDefault(); document.getElementById('delete-form-{{ $faq->id }}').submit();" --}}
                                    <a href="#" class="btn-trash delete-faq" data-id="{{ $faq->id }}">
                                        <i class="icon-trash-2"></i>
                                    </a>
                            </div>
                        </div>
                    </li>
                 </ul>
                 @endforeach
            </div>
        </div>

        <div class="divider"></div>
        <div class="flex items-center justify-between flex-wrap gap10">
            <!-- <div class="text-tiny">Showing 10 entries</div> -->
            {{-- <ul class="wg-pagination">
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
            </ul> --}}
        </div>
    </div>
    <!-- /product-list -->
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

<script>
    $(document).ready(function () {
        $(".delete-faq").click(function () {
            let faqId = $(this).data("id");

                $.ajax({
                    url: "/admin/faqs/" + faqId,
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        alert('FAQ deleted successfully');
                    },
                    error: function () {
                        alert("Error deleting FAQ");
                    }
                });

        });
    });
</script>
@endsection
