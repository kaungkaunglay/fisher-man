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
            <h3>{{trans_lang('all_products')}}</h3>
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
                        <div class="text-tiny">{{trans_lang('ecommerce')}}</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">{{trans_lang('all_products')}}</div>
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
                {{-- <div class="wg-filter flex-grow">
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
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="ここで検索。。。" class="" name="name" tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div> --}}
                @if (check_role(2))
                <a class="tf-button style-1 w208" id="update_time_sale" href="javascript:void(0);" disabled><i class="icon-edit"></i>{{trans_lang('update_time_sale')}}</a>
                <a class="tf-button style-1 w208" href="/admin/products/create"><i class="icon-plus"></i>{{trans_lang('add_product')}}</a>
                @endif
            </div>
            <div class="wg-table table-product-list">
                <ul class="table-title flex gap20 mb-14">
                    <li>
                        <div class="body-title">{{trans_lang('product')}}</div>
                    </li>
                    <li>
                        <div class="body-title">Time Sale</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('product')}} ID</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('price')}}</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('status')}}</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('sale')}}</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('quanity')}}</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('uploaded_date')}}</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('action')}}</div>
                    </li>
                </ul>

                @foreach($products as $product)
                <ul class="flex flex-column">
                    <li class="product-item gap14">
                        <div class="image no-bg">
                            <img src="{{ asset('assets/products/'.$product->product_image) }}" alt="{{ $product->name }}">
                        </div>
                        <div class="flex items-center justify-between gap20 flex-grow">
                            <div class="name">
                                <a href="{{ route('admin.products', $product->id) }}" class="body-title-2">{{ $product->name }}</a>
                            </div>
                            <div class="body-text">
                                <input type="checkbox" class="timesale" id="timesale-{{ $product->id }}" data-id="{{ $product->id }}" {{ $product->is_time_sale == 1 ? 'checked' : '' }}>
                            </div>
                            <div class="body-text">{{ $product->id }}</div>
                            <div class="body-text">¥{{ number_format($product->product_price) }}</div>
                            <div class="body-text">{{ $product->status }}</div>
                            <div class="body-text">{{ $product->sale_percentage ?? 'N/A' }}</div>
                            <div>
                                @if($product->stock <= 0)
                                    <div class="block-not-available">Out of stock</div>
                            @else
                            <div class="body-text">{{ $product->stock }}</div>
                            @endif
                        </div>
                        <div class="body-text">{{ $product->created_at->format('d M Y') }}</div>
                        <div class="list-icon-function">
                            <div class="item eye">
                                <a href="{{ route('admin.product.show', $product->id) }}">
                                    <i class="icon-eye"></i>
                                </a>
                            </div>
                            <div class="item edit">
                                <a href="{{ route('admin.products.edit', $product->id) }}">
                                    <i class="icon-edit-3"></i>
                                </a>
                            </div>
                            <div class="item trash">
                                <form id="delete-form-{{ $product->id }}" action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();" class="btn-trash">
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
        {{-- <div class="flex items-center justify-between flex-wrap gap10">
            <div class="text-tiny">{{trans_lang('showing_10_entries')}}</div>
            <ul class="wg-pagination">
                Previous Page Link
                @if ($products->onFirstPage())
                <li class="disabled">
                    <span><i class="icon-chevron-left"></i></span>
                </li>
                @else
                <li>
                    <a href="{{ $products->previousPageUrl() }}"><i class="icon-chevron-left"></i></a>
                </li>
                @endif

                Pagination Elements
                @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                <li class="{{ $products->currentPage() == $page ? 'active' : '' }}">
                    <a href="{{ $url }}">{{ $page }}</a>
                </li>
                @endforeach

                Next Page Link
                @if ($products->hasMorePages())
                <li>
                    <a href="{{ $products->nextPageUrl() }}"><i class="icon-chevron-right"></i></a>
                </li>
                @else
                <li class="disabled">
                    <span><i class="icon-chevron-right"></i></span>
                </li>
                @endif
            </ul>

        </div> --}}
        {{-- pagination --}}
        @if ($products->hasPages())
        <div class="flex items-center justify-between flex-wrap gap10 mt-4">
            {{-- <div class="text-tiny">{{trans_lang('showing_10_entries')}}</div> --}}
            <ul class="wg-pagination">
                <!-- Previous Page -->
                <li class="{{ $products->onFirstPage() ? 'disabled' : '' }}">
                    <a href="{{ $products->previousPageUrl() }}">
                        <i class="icon-chevron-left"></i>
                    </a>
                </li>

                <!-- Page Numbers (Show 5 buttons) -->
                @php
                    $currentPage = $products->currentPage();
                    $lastPage = $products->lastPage();
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
                        <a href="{{ $products->url($page) }}">{{ $page }}</a>
                    </li>
                @endforeach

                <!-- Next Page -->
                <li class="{{ $products->hasMorePages() ? '' : 'disabled' }}">
                    <a href="{{ $products->nextPageUrl() }}">
                        <i class="icon-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    @endif
    {{-- pagination --}}
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

    // console.log('ready');

    $(document).ready(function() {
        
        $.ajaxSetup({
            headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.timesale').change(function(){
            $('#update_time_sale').removeAttr('disabled');
        });

        // $('.timesale').change(function() {
        //     var id = $(this).data('id');
        //     // console.log('change at = ' + id);
        //     var status = $(this).prop('checked') == true ? 1 : 0;
        //     var cur = $(this);
        //     $.ajax({
        //         type: "GET",
        //         dataType: "json",
        //         url: '/admin/products/add-time-sale',
        //         data: {
        //             'status': status,
        //             'product_id': id
        //         },
        //         success: function(response) {
        //             if(!response.success){
        //                 cur.prop('checked', !status);
        //                 console.log( response.message);
        //             }  
        //         }
        //     });
        // });
        

        $('#update_time_sale').click(function() {
            if($(this).attr('disabled')) return;

            console.log('update_time_sale');
            var time_sale_products = [];
            $('.timesale').each(function() {
                time_sale_products.push({
                    id: $(this).data('id'),
                    is_time_sale : $(this).prop('checked') == true ? 1 : 0
                });
            });

            $.ajax({
                type: "POST",
                dataType: "json",
                url: '/admin/products/update-time-sale',
                data: {
                    'time_sale_products': time_sale_products
                },
                success: function(response) {
                    console.log('response');
                    console.log( response.message);
                    if(!response.success){
                        console.log( response.message);
                    }  
                }
            });
        });
    });
</script>
@endsection