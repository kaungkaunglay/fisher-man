@extends('includes.layout')
@section('title', 'white list')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/whitelist.css') }}">
@endsection
@section('contents')
    <!-- Breadcrumbs -->
    <section class="mt-4 mb-3">
        <div class="container-custom">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="/">{{ trans_lang('home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">タグ付けされた商品</li>
                </ol>
            </nav>

        </div>
    </section>
    <!-- ./Breadcrumbs -->

    <!-- Main Content -->
    <section>
        <div class="container-custom">

            <!-- Desktop Style -->
            <div class="scroller">
                <table class="table desktop text-center d-md-table d-none table-item">
                    <thead>
                        <tr>
                            <th scope="col">{{ trans_lang('image') }}</th>
                            <th scope="col">{{ trans_lang('product_name') }}</th>
                            <th scope="col">{{ trans_lang('price') }}</th>
                            <th scope="col">{{ trans_lang('remove') }}</th>
                            <th scope="col">{{ trans_lang('select') }}</th>
                        </tr>
                    </thead>
                    <tbody class="dsk-white-list-body">
                        @foreach ($whitelist_products as $index => $product)
                            <tr class="table-row white-list-{{ $product->id }}">
                                <td>
                                    <div class="table-img"><img src="{{ asset('assets/products/'.$product->product_image) }}"
                                            alt="{{ $product->name }}"></div>
                                </td>
                                <td class="col-name">{{ $product->name }}</td>
                                <td class="price format">¥{{ $product->getSellPrice() }}</td>
                                <td class="d-none">
                                    <input type="number" value="1" class="quantity-value">
                                </td>
                                <td class="cost d-none format">{{ $product->getSellPrice() }}</td>
                                <td class="col-remove">
                                    <a href="javascript:void(0);" class="mx-auto desktop-del-btn"
                                        data-id="{{ $product->id }}">
                                        <i class="fa-solid fa-trash-can"></i>
                                        {{-- for delete --}}
                                    </a>
                                </td>
                                <td>
                                    <input type="checkbox" class="desktop-check-product" value="{{ $product->id }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td>{{ trans_lang('total') }}</td>
                            <td>
                                <span class="total">{{ $total }}</span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- ./Desktop Style -->

            <!-- Mobile Style -->
            <div class="mobile d-md-none d-flex flex-column gap-3 table-item mb-white-list-body">
                @foreach ($whitelist_products as $idx => $product)
                    <div class="card white-list-{{ $product->id }}">
                        <div class="card-img me-2">
                            <img src="{{ asset('assets/products/'.$product->product_image) }}" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="table-row">
                                <p class="card-name">{{ $product->name }}</p>
                                <div class="card-text">
                                    <span class="cost d-none"></span>
                                    <span class="price format">¥{{ $product->getSellPrice() }}</span>
                                </div>
                                <div class="quantity d-flex">
                                    <input type="number" value="1" class="quantity-value d-none">
                                </div>
                            </div>
                            <div class="d-flex gap-3">
                                <a href="javascript:void(0);" class="btn mobile-del-btn" data-id="{{ $product->id }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                                <input type="checkbox" class="desktop-check-product"
                                    value="{{ $product->id }}">
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="no-cart"></div>
                <div class="d-flex justify-content-between bg-primary text-white p-2 mt-3">
                    <p>{{ trans_lang('total') }} :</p>
                    <p>
                        <span class="total">{{ $total }}</span>
                    </p>
                </div>
            </div>
            <!-- ./Mobile Style -->

            <div class="text-end d-flex gap-3 justify-content-end my-4">
                <a href="/" class="common-btn">{{ trans_lang('shop_more') }}</a>
                <a href="javascript:void(0);" class="common-btn cart-btn" id="dsk-add-to-cart-btn">{{ trans_lang('add_cart') }}</a>
            </div>

        </div>
    </section>
    <!-- /Main Content -->

    {{-- All Scripts --}}
    <script src="{{ asset('assets/js/caculate.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function checkIfEmpty() {
                var dskbody = $('.dsk-white-list-body');
                if (dskbody.find('tr').length === 0) {
                    dskbody.html(
                        `<tr><td colspan="6" class="text-center">{{ trans_lang('no_product') }}</td></tr>`);
                }
                var mbbody = $('.mb-white-list-body');
                if (mbbody.find('.card').length === 0) {
                    mbbody.find('.no-cart').html(
                        `<div class="text-center my-3">{{ trans_lang('no_product') }}</div>`)
                }
            }

            checkIfEmpty();

            function removeCart(id) {


                $('.mb-white-list-body').find(`.white-list-${id}`).remove();
                $('.dsk-white-list-body').find(`.white-list-${id}`).remove();
                checkIfEmpty();
            }

            //delet cart
            function deleteWhiteList(product_id) {
                $.ajax({
                    url: `/white-list/delete/${product_id}`,
                    type: "DELETE",
                    data: {
                        id: product_id
                    },
                    success: function(response) {
                        if (response.status) {
                            // toastr.warning(response.message,'')
                            removeCart(product_id);
                            netTotal();
                        } else {
                            // toastr.error(response.message,'')
                        }
                    }
                });
            }

            function handleDeleteBtn(class_name) {
                $(`.${class_name}`).click(function() {
                    const getid = $(this).data('id');
                    deleteWhiteList(getid);
                    // updateWhiteListCount();
                        let count = Math.max(0,getStoredCount("white_list_count") - 1);
                        updateStoredCount("white_list_count", ".white_list_count", count);
                });
            }

            // for desktop delete
            handleDeleteBtn('desktop-del-btn');

            // for mobile delete
            handleDeleteBtn('mobile-del-btn')

            function addToCart(products) {
                $.ajax({
                    url: "{{ route('cart.add') }}",
                    type: "POST",
                    data: {
                        products: products
                    },
                    success: function(response) {
                        if (response.status) {
                            // $('.desktop-check-product:checked').each(function() {
                            //     // console.log($(this).val())
                            //     removeCart($(this).val())
                            // });
                            toastr.success(response.message,'')
                            updateCartCount();
                        } else {
                            toastr.info(response.message,'')
                        }


                    }
                });
            }



            $('#dsk-add-to-cart-btn').click(function() {

                var selected_products = [];
                $('.desktop-check-product:checked').each(function() {
                    selected_products.push({
                        id: $(this).val(),
                        quantity: 1
                    });

                    $(this).prop('checked', false);
                });


                if(selected_products.length > 0){
                    addToCart(selected_products);
                }
                // updateCartCount();
            });



            $('#mb-add-to-cart-btn').click(function() {

                var selected_products = [];
                $('.mobile-check-product:checked').each(function() {
                    selected_products.push({
                        id: $(this).val(),
                        quantity: 1
                    });
                });

                addToCart(selected_products);
                updateCartCount();

            });

        });
    </script>
    {{-- /All Scripts --}}
@endsection
