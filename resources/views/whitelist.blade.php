@extends('includes.layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/whitelist.css') }}">
@endsection
@section('contents')
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb" class="py-4">
        <div class="container">
            <ol class="breadcrumb mb-0 bg-transparent">
                <li class="breadcrumb-item"><a href="./home.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">White List</li>
            </ol>
        </div>
    </nav>
    <!-- ./Breadcrumbs -->

    <!-- Main Content -->
    <div class="container cart m-b-20">

        @include('messages.index')

        <!-- Desktop Style -->
        <div class="desktop">
            <table class="table" id="table">
                <thead class="">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product address</th>
                        <th scope="col">Price</th>
                        <th scope="col">Remove</th>
                        <th scope="col">Select</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!$whitelist_products->isEmpty())
                        @foreach ($whitelist_products as $index=>$product)

                            <tr id="row">
                                <th class="number" scope="row">
                                    {{ $index+1 }}
                                </th>
                                <th>
                                    <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }}">
                                </th>
                                <td>{{ $product->name }}</td>
                                <td id="cost">{{ $product->product_price }}</td>
                                <td>
                                    <a href="javascript:void(0);" class="desktop-del-btn" data-id="{{ $product->id }}"><i class="fa-solid fa-trash-can"></i></a>
                                    {{-- for delete --}}

                                </td>
                                <td>
                                    <input type="checkbox" class="desktop-check-product" value="{{ $product->id }}"  />
                                </td>
                            </tr>

                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">No product in the whitelist</td>
                        </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">Total</td>
                        <td>
                            <span id="total">{{ $total }}</span>
                        </td>
                    </tr>
                </tfoot>
            </table>

            <div class="text-end d-flex gap-3 justify-content-end">
                <a href="/" class="common-btn">Shop more</a>
                <a href="javascript:void(0);" class="common-btn" id="dsk-add-to-cart-btn">Add to Cart</a>
            </div>
        </div>
        <!-- ./Desktop Style -->

        <!-- Mobile Style -->
        <div class="mobile" id="table">

            @if(!$whitelist_products->isEmpty())
                @foreach ($whitelist_products as $idx=>$product)
                    <div class="card d-flex flex-row">
                        <img src="{{ asset( $product->product_image ) }}" alt="product img">
                        <div class="card-body d-flex flex-row justify-content-between align-items-center">
                            <div id="row">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">
                                    <span id="cost">{{ $product->product_price }}</span>
                                </p>
                            </div>
                            <div class="d-flex gap-3">
                                <a href="javascript:void(0);" class="btn mobile-del-btn"  data-id="{{ $product->id }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>

                                <input type="checkbox" class="mobile-select mobile-check-product">
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center my-3">No product in the whitelist</div>
            @endif


            <div class="total">
                <p>Total :</p>
                <p>
                    <span id="total">{{ $total }}</span>
                </p>
            </div>

            <div class="text-end d-flex flex-column gap-3 mt-3">
                <a href="/" class="common-btn">Shop more</a>
                <a href="javascript:void(0);" class="common-btn" id="mb-add-to-cart-btn">Add to Card</a>
            </div>
        </div>
        <!-- ./Mobile Style -->


    </div>
    <!-- ./Main Content -->
    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // for desktop

            // desktop delete button
            $('.desktop-del-btn').click(function(){
                const getid = $(this).data('id');

                $.ajax({
                    url: `/white-list/delete/${getid}`,
                    type: "DELETE",
                    data: {
                        id: getid
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            });

            $('#dsk-add-to-cart-btn').click(function(){
                const selected_products = [];
                $('.desktop-check-product:checked').each(function(){
                    selected_products.push($(this).val());
                });

                $.ajax({
                    url: "{{ route('add_to_cart')}}",
                    type: "POST",
                    data: {
                        product_ids: selected_products
                    },
                    success: function(response) {
                        if(response.status){
                            window.location.href = "{{ route('cart') }}";
                        }

                        if(!response.status){
                            console.log(response.message);
                        }
                    }
                });
            });

            // mobile delete button
            $('.mobile-del-btn').click(function(){
                const getid = $(this).data('id');

                $.ajax({
                    url: `/white-list/delete/${getid}`,
                    type: "DELETE",
                    data: {
                        id: getid
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            });

            $('#mb-add-to-cart-btn').click(function(){
                const selected_products = [];
                $('.mobile-check-product:checked').each(function(){
                    selected_products.push($(this).val());
                });

                $.ajax({
                    url: "{{ route('add_to_cart')}}",
                    type: "POST",
                    data: {
                        product_ids: selected_products
                    },
                    success: function(response) {
                        if(response.status){
                            location.href = "{{ route('cart') }}";
                        }

                        if(response.status == false){
                            console.log(response.message);
                        }
                    }
                });
            });


        });
    </script>

@endsection
