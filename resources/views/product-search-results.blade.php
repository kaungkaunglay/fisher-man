@extends('includes.layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/category.css') }}"> -->
@endsection

@section('contents')

    <section class="all-products container-custom mb-3 mt-5">
        <h6 class="txt-primary fw-bold mb-3">Searched Products</h6>
        <div class="filter d-flex justify-content-between align-items-center mb-3">
            <div class="icon-buttons txt-primary d-flex gap-3 align-items-center">
                <i class="fa-solid fa-grip fs-2 fw-bold" id="card-list-btn"></i>
                <i class="fa-solid fa-list fs-3 fw-bold" id="row-list-btn"></i>
            </div>
            <div class="sort-container">
                <div class="arrows">
                    <button><i class="fa-solid fa-caret-up"></i></button>
                    <button><i class="fa-solid fa-caret-down"></i></button>
                </div>
                <div class="dropdown">
                    <button class="sort-button dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Sort by
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-list" id="view-list">
            @foreach ($products as $product)
                <div class="item-card">
                    <a href="{{ route('product.show', $product->id) }}" class="right">
                        <img src="{{ asset($product->product_image) }}" class="card-img-top"
                            alt="{{ $product->name }}">
                    </a>
                    <div class="left">
                        <p class="price m-t-b-10">
            @if ($product->discount > 0)
            ¥{{ number_format($product->product_price - $product->discount, 2) }}
            <span class="original-price">¥{{ number_format($product->product_price, 2) }}</span>
            @else
            <span class="">¥{{ number_format($product->product_price, 2) }}</span>
            @endif
          </p>
                        <div class="title-category">
                            <a href="" class="menu-category ">鮮魚 | 白身魚</a>
                            <h3 class="title m-t-b-10">{{ $product->name }}</h3>
                        </div>
                        <a href="{{ route('product.show', $product->id) }}" class="txt m-b-10 description">
                            {{ $product->description }}
                        </a>
                        <div class="d-flex card-btn m-t-10">
                            <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
                            <a href="javascript:void(0);" class="w-100 py-1 common-btn white-list-btn" data-id="{{ $product->id }}"><i class="fa-solid fa-bookmark"></i></a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="col-5 col-lg-3 text-center">
                <button class="btn btn-outline-primary px-5 py-2  mt-5" id="load-more" title="Load More Items">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets/js/loadmore.js') }}"></script>
    <script src="{{ asset('assets/js/view-list.js') }}"></script>
    <script src="{{ asset('assets/js/words-limit.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('.white-list-btn').click(function(e) {
                e.preventDefault();
                const getid = $(this).data('id');
                $.ajax({
                        url: "{{ route('whitelist-count') }}",
                        method: 'GET',
                        success: function(response) {
                            $('#white_list_count').text(response.white_lists_count);
                        },
                        error: function(xhr) {
                            console.error(xhr);
                        }
                    });
                $.ajax({
                    url: `/white-list/${getid}`,
                    type: "POST",
                    data: {
                        id: getid
                    },
                    success: function(data) {
                        if (data.status) {

                        }
                        console.log(data.message);
                    }
                });

            });

            // disable btn
            $('.white-list-btn').click((ev)=> {
                ev.preventDefault();
                const target = ev.currentTarget;
                $(target).addClass('disable');
            })
        });

    </script>

@endsection
