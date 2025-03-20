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
            <h3>{{trans_lang('all_sub_category')}}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{route('admin.index')}}">
                        <div class="text-tiny">{{trans_lang('home')}}</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="#">
                        <div class="text-tiny">{{trans_lang('sub_category')}}</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">{{trans_lang('all_sub_category')}}</div>
                </li>
            </ul>
        </div>
        <!-- all-sub-category -->
        <div class="wg-box">
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
                    {{-- <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="ここで検索。。。" class="" name="name" tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                        <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form> --}}
                </div>
               @if (check_role(2))
               <a class="tf-button style-1 w208" href="/admin/sub-categories/create"><i class="icon-plus"></i>{{trans_lang('add_sub_category')}}</a>
               @endif
            </div>
            <div class="wg-table table-product-list">
                <ul class="table-title flex gap20 mb-14">
                    <li>
                        <div class="body-title">{{trans_lang('sub_category')}}</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('uploaded_date')}}</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('category')}}</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('action')}}</div>
                    </li>
                </ul>
                <ul class="flex flex-column">
                    @foreach($sub_categories as $subCategory)
                    <li class="product-item gap14">
                        <!-- <div class="image no-bg">

                            <img src="{{ asset('assets/images/sub_categories/'.$subCategory->image) }}" alt="{{ $subCategory->name }}">
                        </div> -->
                        <div class="flex items-center justify-between gap20 flex-grow">
                            <div class="name">
                                <a href="{{ route('admin.sub_categories.edit', $subCategory) }}" class="body-title-2">{{ $subCategory->name }}</a>
                            </div>
                            <div class="body-text">{{ $subCategory->created_at->format('d M Y') }}</div>
                            <div class="body-text">{{ $subCategory->category->category_name }}</div>
                            <div class="list-icon-function">
                         
                                @if($subCategory->products->isEmpty()) 
                                <div class="item edit">
                                    <a href="{{ route('admin.sub_categories.edit', $subCategory) }}">
                                        <i class="icon-edit-3"></i>
                                    </a>
                                </div>
                                <div class="item trash">
                                    <form id="delete-form-{{ $subCategory->id }}" action="{{ route('admin.sub_categories.destroy', $subCategory->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $subCategory->id }}').submit();" class="btn-trash">
                                        <i class="icon-trash-2"></i>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>

            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10">
                <div class="text-tiny">{{trans_lang('showing_10_entries')}}</div>
                <ul class="wg-pagination">
                    {{-- Previous Page Link --}}
                    @if ($sub_categories->onFirstPage())
                        <li class="disabled">
                            <span><i class="icon-chevron-left"></i></span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $sub_categories->previousPageUrl() }}"><i class="icon-chevron-left"></i></a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($sub_categories->getUrlRange(1, $sub_categories->lastPage()) as $page => $url)
                        <li class="{{ $sub_categories->currentPage() == $page ? 'active' : '' }}">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($sub_categories->hasMorePages())
                        <li>
                            <a href="{{ $sub_categories->nextPageUrl() }}"><i class="icon-chevron-right"></i></a>
                        </li>
                    @else
                        <li class="disabled">
                            <span><i class="icon-chevron-right"></i></span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- /all-sub-category -->
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
