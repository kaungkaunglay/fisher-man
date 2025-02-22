@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/sub_category.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
@endsection

@section('contents')

<section class="hero mt-5 container-custom">
    <div class="row justify-content-between">
        <div class="col-lg-4 col-md-6 d-none d-lg-block">
            @include('includes.aside')
        </div>
        <div class="col-lg-8 col-md-12">
            @include('includes.slider')
        </div>
    </div>
</section>

<div class="container-custom">
    <nav aria-label="breadcrumb" class="py-4">
        <ol class="breadcrumb mb-0 bg-transparent">
            <li class="breadcrumb-item"><a href="./home.html">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="">Categories</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="">イカ</a></li>
        </ol>
    </nav>

    <div class="sub-category mb-3">
        <h3 class="title text-center m-b-20">{{ $subCategory->name }}</h3>

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
                <button class="sort-button dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{trans_lang('sortby')}}
                </button>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('sub-category.show', ['id' => $subCategory->id, 'sort_by' => 'price_asc']) }}">{{trans_lang('price_l_h')}}</a></li>
                <li><a class="dropdown-item" href="{{ route('sub-category.show', ['id' => $subCategory->id, 'sort_by' => 'price_desc']) }}">{{trans_lang('price_h_l')}}</a></li>
                <li><a class="dropdown-item" href="{{ route('sub-category.show', ['id' => $subCategory->id, 'sort_by' => 'name_asc']) }}">{{trans_lang('name_a_z')}}</a></li>
                <li><a class="dropdown-item" href="{{ route('sub-category.show', ['id' => $subCategory->id, 'sort_by' => 'name_desc']) }}">{{trans_lang('name_z_a')}}</a></li>
                <li><a class="dropdown-item" href="{{ route('sub-category.show', ['id' => $subCategory->id, 'sort_by' => 'latest']) }}">{{trans_lang('latest')}}</a></li>

                </ul>
              </div>
            </div>
        </div>

        <div class="range-slider mx-auto">
            <input type="number" class="min-price" value="1" min="1" max="100">
            <h3 class="txt">{{trans_lang('price_range')}}</h3>
            <input type="number" class="max-price" value="25" min="1" max="100">
            <div class="range-container position-relative mt-3 w-100">
                <div class="slider-track"></div>
                <input type="range" min="1" max="100" value="1" id="slider-1">
                <input type="range" min="1" max="100" value="25" id="slider-2">
            </div>
        </div>

        <div class="sub-category-item">
            <div class="card-list" id="view-list">
                @foreach ($products as $product)
                <div class="item-card">
                    <a href="{{ route('product.show', $product->id) }}" class="right">
                        <img src="{{ asset($product->product_image) }}" class="card-img-top" alt="{{ $product->name }}">
                    </a>
                    <div class="left">
                        <p class="price m-t-b-10">¥{{ number_format($product->product_price, 2) }}</p>
                        <div class="title-category">
                            <a href="{{ route('sub-category.show', $product->subCategory->id) }}" class="menu-category">{{ $product->subCategory->name }}</a>
                            <h3 class="title m-t-b-10">{{ $product->name }}</h3>
                        </div>
                        <a href="{{ route('product.show', $product->id) }}" class="txt m-b-10 description">
                            {{ $product->description }}
                        </a>
                        <div class="d-flex card-btn m-t-10">
                            <a href="javascript:void(0);" class="w-100 py-1 common-btn white-list-btn @if($product->inWhiteLists()) active @endif" data-id="{{ $product->id }}">
                                <i class="fa-solid fa-bookmark"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination mt-2" id="pagination"></div>
    </div>
</div>

<script src="{{asset('assets/js/slider.js')}}"></script>
<script src="{{asset('assets/js/price-range.js')}}"></script>
<script src="{{asset('assets/js/pagination.js')}}"></script>
<script src="{{ asset('assets/js/words-limit.js') }}"></script>
<script>
    const itemsPerPage = 24;
    const items = document.querySelectorAll(".item-card");
    const pagination = document.getElementById("pagination");

    const totalPages = Math.ceil(items.length / itemsPerPage);

    function showPage(page) {
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;

        items.forEach((item, index) => {
            item.style.display = index >= start && index < end ? "block" : "none";
        });

        // Update active pagination button
        document.querySelectorAll(".page-link").forEach((link) => {
            link.classList.remove("active");
        });
        document.getElementById('page-' + page).classList.add("active");
    }

    function createPagination() {
        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement("a");
            pageButton.href = "#";
            pageButton.id = 'page-' + i;
            pageButton.innerText = i;
            pageButton.className = "page-link";
            pageButton.addEventListener("click", (e) => {
                e.preventDefault();
                showPage(i);
            });
            pagination.appendChild(pageButton);
        }

        // Add navigation arrows
        const prev = document.createElement("a");
        prev.href = "#";
        prev.innerHTML = "&lt;";
        prev.addEventListener("click", (e) => {
            e.preventDefault();
            const activePage = document.querySelector(".page-link.active");
            const prevPage = Math.max(1, parseInt(activePage.id.split("-")[1]) - 1);
            showPage(prevPage);
        });
        pagination.insertBefore(prev, pagination.firstChild);

        const next = document.createElement("a");
        next.href = "#";
        next.innerHTML = "&gt;";
        next.addEventListener("click", (e) => {
            e.preventDefault();
            const activePage = document.querySelector(".page-link.active");
            const nextPage = Math.min(totalPages, parseInt(activePage.id.split("-")[1]) + 1);
            showPage(nextPage);
        });
        pagination.appendChild(next);
    }

    // Initialize
    createPagination();
    showPage(1);
</script>

<script src="{{ asset('assets/js/view-list.js') }}"></script>
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
            const cur = $(this);
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
                data: { id: getid },
                success: function(data) {
                    if (data.status) {
                        cur.toggleClass('active');
                    }
                    console.log(data.message);
                }
            });
        });
    });
</script>

@endsection
