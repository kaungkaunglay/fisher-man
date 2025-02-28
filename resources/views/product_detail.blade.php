@extends('includes.layout')
@section('title', 'product detail')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/product_detail.css') }}" />
@endsection
@section('contents')
    <!-- Breadcrumbs -->
    <section class="mt-4 mb-3">
        <div class="container-custom">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans_lang('home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>

        </div>
    </section>
    <!-- ./Breadcrumbs -->

    <section class="container-custom m-b-45">
        <div class="row">
            <!-- Breadcrumbs -->
            {{-- <nav aria-label="breadcrumb" class="py-4">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans_lang('home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav> --}}
            <!-- ./Breadcrumbs -->
            <!-- aside start -->
            <div class="col-4 side-menu">
                @include('includes.aside')
            </div>
            <!-- aside end -->
            <!-- product start -->
            <div class="product-detail col-8">
                <div class="row justify-content-between product-mobile">
                    <div class="product-image-container col-6">
                        <div class="product-image-bigger d-flex flex-column mb-3">
                            <img src="{{ asset('assets/products/' . $product->product_image) }}" alt="{{ $product->name }}"
                                class="img-fluid">
                        </div>
                        <!-- <div class="product-image-smaller d-flex justify-content-between gap-3">
                    <div class="small-img">
                      <img src="{{ asset('assets/images/fishes/Red_sea_bream.svg') }}" alt="product image">
                    </div>
                    <div class="small-img">
                      <img src="{{ asset('assets/images/fishes/Red_sea_bream.svg') }}" alt="product image">
                    </div>
                    <div class="small-img">
                      <img src="{{ asset('assets/images/fishes/Red_sea_bream.svg') }}" alt="product image">
                    </div>
                    <div class="small-img">
                      <img src="{{ asset('assets/images/fishes/Red_sea_bream.svg') }}" alt="product image">
                    </div>
                  </div> -->
                    </div>
                    <div class="product-descraption col-6">
                        <div class="product-title&date d-flex justify-content-between align-items-center">
                            <h2 class="m-0 title">{{ $product->name }}</h2>
                            <p class="m-0">{{ $product->created_at->format('d M Y') }}</p>
                        </div>
                        <div class="product-price">
                            <p class="m-b-10 price ">¥ {{ $product->product_price }}</p>
                            <p class="m-0 category-txt"><a
                                    href="{{ route('sub-category.show', $product->subCategory->id) }}">{{ $product->subCategory->name }}</a>
                            </p>
                        </div>
                        <div class="m-b-20 m-t-10">
                            <div class="d-flex">
                                <div class="quantity d-flex">
                                    <button class="btn decrement"
                                        @if ($product->inCart()) disabled @endif>-</button>
                                    <input type="number" class="quantity-value"
                                        value="{{ $product->getCart()->quantity ?? 1 }}">
                                    <button class="btn increment"
                                        @if ($product->inCart()) disabled @endif>+</button>
                                </div>
                                <button class="common-btn ms-5 add-to-cart-btn cart-btn" data-id="{{ $product->id }}"
                                    @if ($product->inCart()) disabled @endif>
                                    @if ($product->inCart())
                                        {{ trans_lang('added_cart') }}
                                    @else
                                        {{ trans_lang('add_cart') }}
                                    @endif
                                </button>
                            </div>
                        </div>
                        <div class="detail">
                            <h3 class="m-b-20 title">{{ trans_lang('detail') }}</h3>
                            <ul>
                                <li class="txt mb-1">{{ trans_lang('quanity') }} : {{ $product->stock }}</li>
                                <li class="txt mb-1">{{ trans_lang('weight') }} : {{ $product->weight }}</li>
                                <li class="txt mb-1">{{ trans_lang('length') }} : {{ $product->size }}cm</li>
                                <li class="txt mb-1">{{ trans_lang('day_of_caught') }} : {{ $product->day_of_caught }}
                                </li>
                                <li class="txt mb-1">{{ trans_lang('expire_date') }} : {{ $product->expiration_date }}
                                </li>
                                <!-- <li class="txt mb-1">Delivery Fee : ¥ {{ $product->product_price }} (by buyer)</li> -->
                                <li class="txt mb-1">{{ trans_lang('description') }} : {{ $product->description }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- product end -->
            </div>
            <!-- product end -->
        </div>

    </section>
    <!-- Review start -->
    <!-- <div class="reviewer container-custom">
          <h3 class="m-t-b-20 fs-2 fw-bold txt-primary text-center">
            Review
            </h1>
            <div class="user-review-container w-md-100" id="reviewContainer">
              <div class="reviewer-card d-flex align-items-start gap-3 m-b-20">
                <div class="user-img">
                  <img src="{{ asset('assets/images/account.svg') }}" alt="user image">
                </div>
                <div class="user-descraption w-100">
                  <div class="d-flex flex-column flex-sm-row gap-sm-4 gap-2 m-b-10">
                    <h3 class="title m-0">User Name 1</h3>
                    <div class="user-rating">
                      <img src="{{ asset('assets/images/rating.svg') }}" alt="user rating">
                    </div>
                  </div>
                  <p class="txt">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam voluptate doloremque quidem reiciendis
                    repudiandae ducimus atque nulla maxime placeat deserunt iure deleniti eius consequatur aliquid, quibusdam
                    enim voluptatibus velit iste!
                  </p>
                </div>
              </div>

              <div>
                <div>
                  <img src="" alt="">
                </div>
              </div>

              <div class="reviewer-card d-flex align-items-start gap-3 m-b-20">
                <div class="user-img"">
                  <img src=" {{ asset('assets/images/account.svg') }}" alt="user image">
                </div>
                <div class="user-descraption w-100">
                  <div class="d-flex flex-column flex-sm-row gap-sm-4 gap-2 m-b-10">
                    <h3 class="title m-0">User Name 2</h3>
                    <div class="user-rating">
                      <img src="{{ asset('assets/images/rating.svg') }}" alt="user rating">
                    </div>
                  </div>
                  <p class="txt">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, nesciunt? Praesentium cum beatae quam
                    accusantium voluptates minima tempora id exercitationem! Qui perspiciatis exercitationem, ab doloribus ut
                    corporis quo cupiditate. Maiores.
                  </p>
                </div>
              </div>

              <div class="reviewer-card d-flex align-items-center gap-3 m-b-20">
                <div class="user-img"">
                  <img src=" {{ asset('assets/images/account2.svg') }}" alt="user image">
                </div>
                <div class="user-descraption w-100">
                  <div class="d-flex flex-column flex-sm-row gap-sm-4 gap-2 m-b-10">
                    <h3 class="title m-0">User Name 3</h3>
                    <div class="user-rating">
                      <img src="{{ asset('assets/images/rating.svg') }}" alt="user rating">
                    </div>
                  </div>
                  <p class="txt">Review text for User 3.</p>
                </div>
              </div>

              <div class="reviewer-card d-flex align-items-center gap-3 m-b-20">
                <div class="user-img"">
                  <img src=" {{ asset('assets/images/account2.svg') }}" alt="user image">
                </div>
                <div class="user-descraption w-100">
                  <div class="d-flex flex-column flex-sm-row gap-sm-4 gap-2 m-b-10">
                    <h3 class="title m-0">User Name 4</h3>
                    <div class="user-rating">
                      <img src="../../assets/images/rating.svg" alt="user rating">
                    </div>
                  </div>
                  <p class="txt">Review text for User 4.</p>
                </div>
              </div>
            </div>

            <div id="pagination-controls" class="pagination-controls text-center m-b-20"></div>
        </div> -->
    <!-- <div class="review-form container-custom mb-3 p-0">
          <h3 class="text-center m-b-20 fs-2 fw-bold txt-primary">Add a review</h3>
          <div class="row justify-content-center review-form-container">
            <div>
              <form>
                <div class="row mb-3 form-mobile">
                  <div class="col-md-6 mb-mobile-3">
                    <label for="name" class="form-label title">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                  </div>
                  <div class="col-md-6">
                    <label for="email" class="form-label title">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="rating" class="form-label title">Rating</label>
                  <select class="form-select" id="rating" name="rating" required>
                    <option value="">Choose a rating</option>
                    <option value="5">5 - Excellent</option>
                    <option value="4">4 - Good</option>
                    <option value="3">3 - Average</option>
                    <option value="2">2 - Poor</option>
                    <option value="1">1 - Very Poor</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label title">Description</label>
                  <textarea class="form-control" id="description" rows="3" placeholder="Enter your description" required></textarea>
                </div>

                <div class="text-center mb-mobile-3">
                  <button type="submit" class="common-btn">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div> -->
    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script src="{{ asset('assets/js/pagination.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('.add-to-cart-btn').click(function() {
                var selected_products = [];
                selected_products.push({
                    id: $(this).data('id'),
                    quantity: +($(this).siblings('.quantity').find('.quantity-value').val())
                });



                cur = $(this);

                $.ajax({
                    url: "{{ route('cart.add') }}",
                    type: "POST",
                    data: {
                        products: selected_products
                    },
                    success: function(response) {
                        if (response.status) {
                            // location.href="{{ route('cart') }}";
                            cur.prop('disabled', true); // Disable the button

                            cur.siblings('.quantity').find('.decrement, .increment').prop(
                                'disabled', true);

                            cur.html("{{ trans_lang('added_cart') }}");
                        }
                    }
                });
                updateCartCount();
            });

        });
    </script>
@endsection
