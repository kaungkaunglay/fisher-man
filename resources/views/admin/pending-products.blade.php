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
            <h3>未承認の商品</h3>
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
                    <div class="text-tiny">{{trans_lang('request_product')}}</div>
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
                {{-- <a class="tf-button style-1 w208" href="/admin/faq/create"><i class="icon-plus"></i>Add new</a> --}}
            </div>
            <div class="wg-table table-product-list">
                <ul class="table-title flex gap20 mb-14">
                    <li>
                        <div class="body-title">{{trans_lang('product')}}</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('product')}}ID</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('price')}}</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('quanity')}}</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('sale')}}</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('uploaded_date')}}</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('expire_date')}}</div>
                    </li>
                    <li>
                        <div class="body-title">{{trans_lang('status')}}</div>
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

                            <div class="body-text">{{ $product->name }}</div>
                            <div class="body-text">{{ $product->id }}</div>
                            <div class="body-text">¥{{ number_format($product->product_price) }}</div>
                            <div class="body-text">{{ $product->stock }}</div>
                            <div class="body-text">{{ $product->sale_percentage ?? 'N/A' }}</div>
                            <div class="body-text">{{ $product->created_at->format('d M Y') }}</div>
                            <div class="body-text">{{ $product->expiration_date }}</div>
                            <div class="dropdown">
                                {{-- <div class="block-pending">Pending</div> --}}
                                <button class="btn
                                    @if($product->status == 'accepted') block-available
                                    @elseif($product->status == 'pending') block-pending
                                    @else block-not-available @endif
                                    dropdown-toggle"
                                    type="button"
                                    id="statusDropdown{{ $product->id }}"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    @if($product->status == 'pending')
                                        保留
                                    @elseif($product->status == 'accepted')
                                        承認
                                    @else
                                        非認証
                                    @endif
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="statusDropdown{{ $product->id }}">
                                    <li><a class="dropdown-item change-status" href="#" data-id="{{ $product->id }}" data-status="approved">✅ 承認</a></li>
                                    <li><a class="dropdown-item change-status" href="#" data-id="{{ $product->id }}" data-status="pending">⏳ 保留</a></li>
                                    <li><a class="dropdown-item change-status" href="#" data-id="{{ $product->id }}" data-status="rejected">❌ 非認証</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="list-icon-function">
                            <!-- <div class="item eye">
                                <a href="{{route('admin.product.show',$product->id)}}">
                                    <i class="icon-eye"></i>
                                </a>
                            </div> -->
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
    </div>

    <div class="divider mb-20"></div>
    {{-- pagination --}}
    @if ($products->hasPages())
    <div class="flex items-center justify-between flex-wrap gap10">
        <!-- <div class="text-tiny">
                Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} entries
            </div> -->
        <ul class="wg-pagination">
            <!-- Previous Page -->
            <li class="{{ $products->onFirstPage() ? 'disabled' : '' }}">
                <a href="{{ $products->previousPageUrl() }}">
                    <i class="icon-chevron-left"></i>
                </a>
            </li>

            <!-- Page Numbers -->
            @foreach ($products->links()->elements[0] as $page => $url)
            <li class="{{ $page == $products->currentPage() ? 'active' : '' }}">
                <a href="{{ $url }}">{{ $page }}</a>
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
</div>
<!-- /product-list -->
<!-- /main-content-wrap -->

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
        $(".change-status").on("click", function (e) {
            e.preventDefault();

            let productId = $(this).data("id");
            let status = $(this).data("status");

            $.ajax({
                url: "{{ route('admin.products.updateStatus') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: productId,
                    status: status
                },
                success: function (response) {
                    if (response.success) {
                        $("#statusDropdown" + productId).text(status.charAt(0).toUpperCase() + status.slice(1));
                        $("#statusDropdown" + productId)
                            .removeClass("btn-success btn-warning btn-danger")
                            .addClass(status === "approved" ? "btn-success" : status === "pending" ? "btn-warning" : "btn-danger");
                            window.location.reload();
                    } else {
                        alert("Failed to update status.");
                    }
                },
                error: function () {
                    alert("Error updating status.");
                }
            });
        });
    });
</script>
@endsection
