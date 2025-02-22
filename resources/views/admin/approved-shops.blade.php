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
                <h3>FAQs</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="index.html">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-tiny">Shop Lists</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Approved Shops</div>
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
                        <div class="show">
                            <div class="text-tiny">Showing</div>
                            <div class="select">
                                <select class="">
                                    <option>10</option>
                                    <option>20</option>
                                    <option>30</option>
                                </select>
                            </div>
                            <div class="text-tiny">entries</div>
                        </div>
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." class="" name="name"
                                    tabindex="2" value="" aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    {{-- <a class="tf-button style-1 w208" href="/admin/faq/create"><i class="icon-plus"></i>Add new</a> --}}
                </div>
                <div class="wg-table table-product-list">
                    <ul class="table-title flex gap20 mb-14">
                        <li>
                            <div class="body-title">User Name</div>
                        </li>
                        <li>
                            <div class="body-title">Shop Name</div>
                        </li>
                        <li>
                            <div class="body-title">Email</div>
                        </li>
                        <li>
                            <div class="body-title">Status</div>
                        </li>
                        <li>
                            <div class="body-title">Action</div>
                        </li>
                    </ul>

                    @foreach ($approvedShops as $approvedShop)
                        <ul class="flex flex-column">
                            <li class="product-item gap14">

                                <div class="flex items-center justify-between gap20 flex-grow">

                                    <div class="body-text">{{ $approvedShop->username }}</div>
                                    <div class="body-text">{{ $approvedShop->shop_name }}</div>
                                    <div class="body-text">{{ $approvedShop->email }}</div>
                                    <div class="block-available">{{ $approvedShop->status }}</div>
                                </div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <a href="{{ route('admin.seller.shop.detail', $approvedShop->id) }}">
                                            <i class="icon-eye"></i>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#" class="btn-trash delete-shop text-danger" data-id="{{ $approvedShop->id }}">
                                            <i class="icon-trash-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>

            <div class="divider mb-20"></div>
            {{-- pagination --}}
            @if ($approvedShops->hasPages())
            <div class="flex items-center justify-between flex-wrap gap10">
                <div class="text-tiny">
                    Showing {{ $approvedShops->firstItem() }} to {{ $approvedShops->lastItem() }} of {{ $approvedShops->total() }} entries
                </div>
                <ul class="wg-pagination">
                    <!-- Previous Page -->
                    <li class="{{ $approvedShops->onFirstPage() ? 'disabled' : '' }}">
                        <a href="{{ $approvedShops->previousPageUrl() }}">
                            <i class="icon-chevron-left"></i>
                        </a>
                    </li>

                    <!-- Page Numbers -->
                    @foreach ($approvedShops->links()->elements[0] as $page => $url)
                        <li class="{{ $page == $approvedShops->currentPage() ? 'active' : '' }}">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <!-- Next Page -->
                    <li class="{{ $approvedShops->hasMorePages() ? '' : 'disabled' }}">
                        <a href="{{ $approvedShops->nextPageUrl() }}">
                            <i class="icon-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
            @endif
        </div>
        <!-- /product-list -->
    </div>
    <!-- /main-content-wrap -->
    </div>
    <!-- /main-content-wrap -->
    <!-- bottom-page -->
    <div class="bottom-page">
        <div class="body-text">Copyright © 2024 Remos. Design with</div>
        <i class="icon-heart"></i>
        <div class="body-text">by <a href="https://themeforest.net/user/themesflat/portfolio">Themesflat</a> All rights
            reserved.</div>
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

    <script>
        $(document).ready(function() {
            $('.delete-shop').click(function (e) {
            e.preventDefault();

            let shop_id = $(this).data('id');


            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.shops.delete') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            shop_id: shop_id
                        },
                        success: function (response) {
                            if(response.success) {
                                Swal.fire('Deleted!', response.message, 'success')
                                    .then(() => location.reload());
                            } else {
                                Swal.fire('Error!', response.message, 'error');
                            }
                        },
                        error: function () {
                            Swal.fire('Error!', 'Something went wrong!', 'error');
                        }
                    });
                }
            });
        });
        });
    </script>
@endsection
