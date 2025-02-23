{{-- @dd(check_role(1)) --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Fisher Man')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}" />
    @yield('style')
    <link rel="icon" href="demo_icon.gif" type="image/gif" sizes="16x16">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}" />
    <!-- add jquery -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <!-- {{-- favicon --}} -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/favicon/site.webmanifest') }}">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    {{-- preloader --}}
    <!-- <div class="preloader" id="preloader">
    <div class="fishing-scene">
      <div class="fisherman"></div>
      <div class="fishing-rod">
        <div class="fishing-line">
          <div class="hook"></div>
        </div>
      </div>
      <div class="fish fish1"></div>
      <div class="fish fish2"></div>
      <div class="water"></div>
      <div class="wave"></div>
    </div>
    <div class="loading-text">Catching some fish...</div>
    <div class="progress">
      <div class="progress-bar" id="progress-bar"></div>
    </div>
  </div> -->
    {{-- end preloader --}}

    <!-- Header Section -->
    <header id="main-content">
        <div class="container-custom">
            <div class="header">

        <!-- Top Header -->
        <div class="top-header">

          <!-- Head Logo -->
          <div class="logo">
            <a href="{{ url('/') }}">
              @if (file_exists(public_path('assets/logos/' . \App\Models\Setting::where('key', 'logo')->value('value'))))
              <img src="{{ asset('assets/logos/' . \App\Models\Setting::where('key', 'logo')->value('value')) }}" class="logo" alt="logo">
              @else
              <img src="{{ asset('assets/images/' . \App\Models\Setting::where('key', 'logo')->value('value')) }}" class="logo" alt="logo">
              @endif
            </a>
          </div>
          <!-- /Head Logo -->


                    <!-- Search Bar -->
                    <div class="ms-2 position-relative w-50">
                        <form action="{{ route('products.search') }}" method="get">
                            <div class="input-group w-100">
                                <input type="text" class="form-control bg-second search-bar" id="search"
                                    placeholder="{{trans_lang('search_products')}}" name="search_key">
                                <button type="submit" class="bg-main text-white magnifying-glass">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>

                        <!-- Search Box -->
                        <div class="search-result-list position-absolute border p-2 rounded-3 shadow" id="product-list">

                        </div>
                        <!-- /Search Box -->

                    </div>
                    <!-- /Search Bar -->


                    {{-- icon counts --}}

                    <!-- Main Nav -->
                    <div class="d-none d-md-flex gap-5  ms-3">
                        <a href="{{ route('cart') }}" class="position-relative ">
                            <i class="fa-solid fa-cart-shopping icon"></i>
                            <span id="cart_count"
                                class="cart-noti position-absolute bg-danger text-white rounded-circle">0</span>
                        </a>
                        <a href="{{ route('white_list.index') }}" class="position-relative">
                            <i class="fa-solid fa-bookmark icon" id="bookmark_btn"></i>
                            <span id="white_list_count"
                                class="cart-noti position-absolute bg-danger text-white rounded-circle">0</span>
                        </a>

                        @if(Auth::check() || session('user_id'))
                        <button class="btn-login position-relative">
                            <i class="fa-solid fa-user icon"></i>
                            <div class="dropdown position-absolute overflow-hidden bg-white">
                                <ul class="border">
                                    <li>
                                        <a href="{{ url('/profile') }}" class="d-flex gap-2 text-black text-center">
                                            <i class="fa-solid fa-address-card icon"></i>{{trans_lang('profile')}}
                                        </a>
                                    </li>
                                    @if(check_role(2))
                                    <li>
                                        <a href="{{ url('/admin') }}" class="d-flex gap-2 text-black text-center">
                                            <i class="fa-solid fa-tachometer-alt icon"></i>{{ trans_lang('dashboard') }}
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            class="px-3 d-flex gap-2 text-black text-center">
                                            <i class="fas fa-door-open icon"></i>{{trans_lang('logout')}}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </button>
                        @else
                            <a href="{{ route('login') }}" class="btn-login position-relative">
                                <i class="fa-solid fa-sign-in-alt icon"></i>
                            </a>
                        @endif
                    </div>
                    <!-- /Main Nav -->

                </div>
                <!-- /Top Header -->

                <!-- Bottom Header -->
                <div class="bottom-header">
                    <nav>
                        <div class="hambuger-menu">
                            <a href="#" id="hamburger-menu">
                                <i class="fa-solid fa-bars"></i>
                            </a>
                        </div>
                        <ul class="w-100">
                            <li><a href="{{ url('/') }}" class="menu-header">{{trans_lang('home')}}</a></li>
                            <li><a href="{{ url('/special-offer') }}" class="menu-header">{{trans_lang('special_offer')}}</a></li>
                            @foreach ($categories as $category)
                                <li><a href="{{ route('category', $category->id) }}"
                                        class="menu-header">{{ $category->category_name }}</a></li>
                            @endforeach
                            <li><a href="{{ url('/support') }}" class="menu-header">{{trans_lang('support')}}</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- /Bottom Header -->

            </div>
        </div>
    </header>

    <!-- /Search Menu -->
    <div class="category-popup" id="category-popup">
        <ul>
            <li class="close-popup">
                <button id="close-popup">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </li>
            @foreach ($subcategories as $subcategory)
                <li>
                    <a href="{{ route('sub-category.show', $subcategory->id) }}"
                        class="menu-category">{{ $subcategory->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <!-- /Search Menu -->
    <!-- /Header Section -->


    <!-- Main Section -->
    <main>
        @yield('contents')
    </main>
    <!-- /Main Section -->

    @php
        $socialLinks = \App\Models\Setting::getValue('social_links', []);
    @endphp

    <!-- Footer Section -->
    <!-- filepath: /C:/fisherman/laravel/fisherman/resources/views/includes/layout.blade.php -->
    <footer class="bg-main d-flex flex-column justify-content-between">
        <div class="">
            <div class="row justify-content-between w-100 pb-3 container-custom">

                {{-- Footer Logo --}}
                <div class="col-12 col-lg-2 d-flex flex-column align-items-center text-white">
                    @if (file_exists(public_path('assets/logos/' . \App\Models\Setting::where('key', 'logo')->value('value'))))
                        <img src="{{ asset('assets/logos/' . \App\Models\Setting::where('key', 'logo')->value('value')) }}"
                            class="logo" alt="logo">
                    @else
                        <img src="{{ asset('assets/images/' . \App\Models\Setting::where('key', 'logo')->value('value')) }}"
                            class="logo" alt="logo">
                    @endif

                    {{-- <a href="{{route('home')}}"><img src="{{ asset('assets/images/Logo only.png') }}" class="logo"
              alt=""></a> --}}
                    <p class="text-center txt-18">{{ App\Models\Setting::getValue('slogan') }}</p>
                    <div class="social-icons d-flex justify-content-between gap-1">
                        <a href="">
                            <img class="icon_social" src="{{ asset('assets/icons/custom/line.png') }}"
                                alt="Line">
                        </a>
                        <a href=""><img class="icon_social"
                                src="{{ asset('assets/icons/custom/facebook.png') }}" alt="Line"></a>
                        <a href=""><img class="icon_social"
                                src="{{ asset('assets/icons/custom/wechat.png') }}" alt="Line"></a>
                        <a href=""><img class="icon_social"
                                src="{{ asset('assets/icons/custom/xcom.png') }}"></a>
                    </div>
                </div>
                {{-- /Footer Logo --}}

                {{-- Useful Link --}}
                <div class="col-12 col-lg-3 mt-3 d-flex flex-column justify-content-center">
                    <h6 class="text-center text-warning mb-2">{{trans_lang('useful_links')}}</h6>
                    <ul class="list-unstyled link-list txt-15 useful-link">
                        <li><a href="{{ route('home') }}">{{trans_lang('home')}}</a></li>
                        <li><a href="#">{{trans_lang('product')}}</a></li>
                        <li><a href="#">{{trans_lang('faqs')}}</a></li>
                        <li><a href="{{ route('policy') }}">{{trans_lang('terms_privacy')}}</a></li>
                        <li><a href="#">{{trans_lang('customer_review')}}</a></li>
                        <li><a href="#">{{trans_lang('blogs')}}</a></li>
                    </ul>
                </div>
                {{-- /Useful Link --}}

                {{-- Contact Us --}}
                <div class="col-12 col-lg-2 mt-3 ">
                    <h6 class="text-center text-warning mb-2">{{trans_lang('contact_us')}}</h6>
                    <ul class="list-unstyled text-white txt-15 text-center">
                        <li><a href="#">{{trans_lang('address')}} : {{ App\Models\Setting::getValue('contact_address') }}</a></li>
                        <li><a href="#">{{trans_lang('phone_number')}} :  {{ App\Models\Setting::getValue('contact_phone') }}</a></li>
                        <li><a href="#">{{trans_lang('email')}} : {{ App\Models\Setting::getValue('contact_email') }}</a></li>
                    </ul>
                </div>
                {{-- /Contact Us --}}

            </div>
        </div>

        {{-- Copy Right --}}
        <div class="bg-dark m-0">
            <div class="row justify-content-around container-custom">
                <div class="col-lg-5 text-white text-center text-lg-start">
                    <p class="my-2 txt-13">&copy; Copyright 2024-fisherman Designed by Andfun</p>
                </div>
                <div class="col-lg-5 text-white text-lg-end text-center">
                    <p class="my-2 txt-13"><a href="{{ route('policy') }}">Privacy | Terms</a></p>
                </div>
            </div>
        </div>
        {{-- /Copy Right --}}

    </footer>
    <!-- /Footer Section -->

    <!-- Mobile Bottom Nav -->
    <div class="bottom-nav d-flex d-md-none">
        <a href="#" class="menu-header"><i class="fa-solid fa-home"></i><br>{{trans_lang('home')}}</a>
        <a href="#" class="menu-header"><i class="fa-solid fa-tags" id="category-link"></i><br>{{trans_lang('category')}}</a>
        <div class="">
            <a href="#" class="menu-header mobile-shopping-card"><i
                    class="fa-solid fa-cart-shopping shopping"></i><br>{{trans_lang('cart')}}(
                <span class="text-danger" id="cart_count_bottom">0</span> )
            </a>
        </div>
        <a href="#" class="menu-header"><i class="fa-solid fa-tags"></i><br>{{trans_lang('offer')}}</a>
        <a href="#" class="menu-header"><i class="fa-solid fa-user"></i><br>{{trans_lang('profile')}}</a>
    </div>
    <!-- /Mobile Bottom Nav -->

    <!-- All Scripts -->
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
    {{-- <!-- <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> --> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/popup.js') }}"></script>
    {{--
  <script src="{{asset('assets/js/preloader.js')}}"></script> --}}
  <script src="{{ asset('assets/js/moving-text.js') }}"></script>
  <script src="{{ asset('assets/js/password.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
  <script>
    $(document).ready(() => {
      //dropdown trigger
      $('.btn-login').click(() => {
        $('.dropdown').toggleClass('active');
      });

            // close dropdown
            $(document).click(ev => {
                if (!document.querySelector('.btn-login').contains(ev.target)) {

                    $('.dropdown').removeClass('active');
                }
            })

            //search-box open
            $('.search-bar').on('input', () => searchResultShow())
            $('.search-bar').click(() => searchResultShow())

            function searchResultShow() {
                if ($('.search-bar').val().length > 0) $('.search-result-list').addClass('d-block');
                else $('.search-result-list').removeClass('d-block');
            }


            //close search-box
            $(document).click(ev => {
                if (!document.querySelector('.search-bar').contains(ev.target)) {

                    $('.search-result-list').removeClass('d-block');
                }
            })
            $('#search').on('input', function() {
                let query = $(this).val();
                if (query.length > 0) {
                    $.ajax({
                        url: "{{ route('products.ajaxSearch') }}",
                        type: "GET",
                        data: {
                            query: query
                        },
                        success: function(response) {
                            $('#product-list').html('');
                            if (response.length > 0) {
                                $.each(response, function(index, product) {
                                    $('#product-list').append(`
                                        <div class="py-2">
                                            <a href="/product/${product.id}" class="d-flex rounded">
                                                <i class="fa-solid fa-magnifying-glass align-self-center me-2"></i>
                                                <p class="align-self-center">${product.name}</p>
                                            </a>
                                        </div>
                                    `);
                                });
                            } else {
                                $('#product-list').html('<p>No products found.</p>');
                            }
                        }
                    });
                } else {
                    $('#product-list').html('');
                }
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        function updateCartCount() {
            $.ajax({
                url: "{{ route('cart-count') }}",
                method: 'GET',
                success: function(response) {
                    // Assuming response contains the new count
                    $('#cart_count').text(response.cart_count);
                    $('#cart_count_bottom').text(response.cart_count);
                },
                error: function(xhr) {
                    // Handle error here
                    console.error(xhr);
                }
            });
        }

        function updateWhiteListCount() {
            $.ajax({
                url: "{{ route('whitelist-count') }}",
                method: 'GET',
                success: function(response) {
                    // Assuming response contains the new count
                    $('#white_list_count').text(response.white_lists_count);
                },
                error: function(xhr) {
                    // Handle error here
                    console.error(xhr);
                }
            });
        }
        updateWhiteListCount();
        updateCartCount();

        // add to whitelist
        function addToWhiteList(product_id, btn) {
            $.ajax({
                url: `/white-list/${product_id}`,
                type: "POST",
                data: {
                    id: product_id
                },
                success: function(response) {
                    if (response.status == "redirect") {
                        window.location.href = response.url;
                    } else if (response.status) {
                        // btn.toggleClass('active');
                        updateWhiteListCount();
                    }
                    console.log(response.message);
                }
            });
        }

        // handle add to whtite button
        function handleAddToWhiteListBtn(class_name) {
            $(`.${class_name}`).click(function(e) {
                e.preventDefault();
                const getid = $(this).data('id');
                const cur_btn = $(`.${class_name}[data-id="${getid}"]`);

                addToWhiteList(getid, cur_btn);

            });
        }

        // add to cart
        function addToCart(products, btn) {
            $.ajax({
                url: "{{ route('cart.add') }}",
                type: "POST",
                data: {
                    products: products
                },
                success: function(response) {
                    if (response.status) {
                        // btn.toggleClass('active');
                        updateCartCount();
                    }
                    console.log(response.message);
                }
            });
        }

        // handle add to cart button
        function handleAddToCartBtn(class_name) {
            $(`.${class_name}`).click(function(e) {
                e.preventDefault();
                const getid = $(this).data('id');
                const cur_btn = $(`.${class_name}[data-id="${getid}"]`);

                var products = [{
                    id: getid,
                    quantity: 1
                }];

                addToCart(products, cur_btn);
            });
        }
    </script>
    <!-- /All Scripts -->
    @yield('script')


    <!-- Testing Scripts -->
    <script src="{{ asset('assets/js/cloneNode.test.js') }}"></script>
    <!-- /Testing Scripts -->
</body>

</html>
