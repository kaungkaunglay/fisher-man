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
            <h3>{{trans_lang('special_offer')}}</h3>
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
                    <a href="">
                        <div class="text-tiny">{{trans_lang('ecommerce')}}</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">{{trans_lang('special_offer')}}</div>
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
                
                <a class="tf-button style-1 w208" id="toggle_time_sale" href="javascript:void(0);">{{ setting('is_time_sale') == 'active' ?trans_lang('実行しない'): trans_lang('実行する') }}</a>
                @endif
            </div>
            <div class="wg-table table-product-list">
                <ul class="table-title flex gap20 mb-14">
                    <li>
                        <div class="body-title">{{trans_lang('product')}}</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('product')}} ID</div>
                    </li>
                    <li>
                        <div class="body-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{trans_lang('price')}}</div>
                    </li>
                    <li>
                        <div class="body-title">リクエストステータス</div>
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
                            <div class="body-text">{{ $product->id }}</div>
                            <div class="body-text">¥{{ number_format($product->product_price - $product->discount, 0) }} <span style="text-decoration: line-through; opacity: 0.5;">¥{{ number_format($product->product_price)}}</span></div>
                            <div class="body-text">
                                @if($product->is_time_sale == 1)
                                    保留中
                                @else
                                    承認済み
                                @endif
                            </div>
                            @if($product->stock <= 0)
                                <div class="block-not-available">在庫切れ</div>
                            @else
                                <div class="body-text">{{ $product->stock }}</div>
                            @endif
                        </div>
                        <div class="body-text">{{ $product->created_at->locale('ja')->isoFormat('YYYY年MM月DD日') }}</div>
                        <div class="list-icon-function">
                            {{-- <div class="item eye">
                                <a href="{{ route('admin.product.show', $product->id) }}">
                                    <i class="icon-eye"></i>
                                </a>
                            </div>
                            <div class="item edit">
                                <a href="{{ route('admin.products.edit', $product->id) }}">
                                    <i class="icon-edit-3"></i>
                                </a>
                            </div> --}}
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
        <div class="flex items-center justify-between flex-wrap gap10">
            <div class="text-tiny">{{trans_lang('showing_10_entries')}}</div>
            @if(!$products->isEmpty())
                <ul class="wg-pagination">
                    {{-- Previous Page Link --}}
                    @if ($products->onFirstPage())
                    <li class="disabled">
                        <span><i class="icon-chevron-left"></i></span>
                    </li>
                    @else
                    <li>
                        <a href="{{ $products->previousPageUrl() }}"><i class="icon-chevron-left"></i></a>
                    </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                    <li class="{{ $products->currentPage() == $page ? 'active' : '' }}">
                        <a href="{{ $url }}">{{ $page }}</a>
                    </li>
                    @endforeach

                    {{-- Next Page Link --}}
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
            @endif

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
<script src="{{ asset('assets/admin/js/switcher.js') }}"></script>
<script src="{{ asset('assets/admin/js/theme-settings.js') }}"></script>
<script src="{{ asset('assets/admin/js/main.js') }}"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#toggle_time_sale').on('click', function() {
            var cur = $(this);
            $.ajax({
                url: "{{ route('admin.products.toggledTimeSale') }}",
                type: 'POST',
                data: {
                   
                },
                success: function(response) {
                    if (response.success) {
                        location.reload();
                    }
                }
            });
        });
    });
</script>
@endsection