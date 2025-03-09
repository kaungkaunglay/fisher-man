{{-- @dd(check_role()) --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Fisher Man')</title>
    <meta name="keywords" content="fishing, fisherman, r-mekiki, sea, ocean">
    <meta name="author" content="AndFun">
    <meta property="og:title" content="{{ config('app.url') }}">
    <meta property="og:description" content="{{ config('settings.slogan') }}}}">
    <meta property="og:image" content="https://s6.imgcdn.dev/YhKH6e.png">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}" />
    @yield('style')
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/css/preloader.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/toastr-master/build/toastr.min.css')}}">
    <!-- add jquery -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

    <!-- {{-- favicon --}} -->

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="preloader">
        <div class="underwater-bg"></div>
        <div class="light-rays"></div>

        <!-- Seaweed decorations -->
        <svg class="seaweed seaweed-left" viewBox="0 0 50 200" xmlns="http://www.w3.org/2000/svg">
            <!-- Left seaweed -->
            <path d="M25,200 C35,180 15,160 25,140 C35,120 15,100 25,80 C35,60 15,40 25,20 C28,10 22,0 20,0"
                  fill="none" stroke="#0a7b3e" stroke-width="3">
                <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                    from="5 25 200" to="-5 25 200" dur="8s" repeatCount="indefinite" additive="sum" />
            </path>
            <path d="M15,200 C25,180 5,160 15,140 C25,120 5,100 15,80 C25,60 5,40 15,20 C18,10 12,0 10,0"
                  fill="none" stroke="#05552a" stroke-width="2">
                <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                    from="-5 15 200" to="5 15 200" dur="7s" repeatCount="indefinite" additive="sum" />
            </path>
            <path d="M35,200 C45,180 25,160 35,140 C45,120 25,100 35,80 C45,60 25,40 35,20 C38,10 32,0 30,0"
                  fill="none" stroke="#0d9148" stroke-width="2.5">
                <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                    from="5 35 200" to="-5 35 200" dur="9s" repeatCount="indefinite" additive="sum" />
            </path>
        </svg>

        <svg class="seaweed seaweed-right" viewBox="0 0 50 200" xmlns="http://www.w3.org/2000/svg">
            <!-- Right seaweed -->
            <path d="M25,200 C15,180 35,160 25,140 C15,120 35,100 25,80 C15,60 35,40 25,20 C22,10 28,0 30,0"
                  fill="none" stroke="#0a7b3e" stroke-width="3">
                <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                    from="-5 25 200" to="5 25 200" dur="8s" repeatCount="indefinite" additive="sum" />
            </path>
            <path d="M15,200 C5,180 25,160 15,140 C5,120 25,100 15,80 C5,60 25,40 15,20 C12,10 18,0 20,0"
                  fill="none" stroke="#0d9148" stroke-width="2.5">
                <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                    from="5 15 200" to="-5 15 200" dur="7s" repeatCount="indefinite" additive="sum" />
            </path>
            <path d="M35,200 C25,180 45,160 35,140 C25,120 45,100 35,80 C25,60 45,40 35,20 C32,10 38,0 40,0"
                  fill="none" stroke="#05552a" stroke-width="2">
                <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                    from="-5 35 200" to="5 35 200" dur="9s" repeatCount="indefinite" additive="sum" />
            </path>
        </svg>

        <div class="ripple"></div>
        <div class="ripple"></div>
        <div class="ripple"></div>

        <div class="fish-container">
            <svg class="fish" viewBox="0 0 200 100" xmlns="http://www.w3.org/2000/svg">
                <!-- Colorful fish body gradient -->
                <defs>
                    <linearGradient id="fishGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#4facfe" />
                        <stop offset="50%" stop-color="#00f2fe" />
                        <stop offset="100%" stop-color="#0072ff" />
                    </linearGradient>
                    <radialGradient id="eyeGradient" cx="50%" cy="50%" r="50%" fx="50%" fy="50%">
                        <stop offset="0%" stop-color="white" />
                        <stop offset="40%" stop-color="#f0f0f0" />
                        <stop offset="100%" stop-color="#e0e0e0" />
                    </radialGradient>
                </defs>

                <!-- Fish body with gradient -->
                <path d="M180,50 C180,30 160,10 120,10 C70,10 40,30 40,50 C40,70 70,90 120,90 C160,90 180,70 180,50 Z" fill="url(#fishGradient)" />

                <!-- Tail -->
                <path d="M40,50 C30,35 10,30 5,50 C10,70 30,65 40,50 Z" fill="url(#fishGradient)" />

                <!-- Fins -->
                <path d="M120,10 C130,0 140,5 130,15 Z" fill="#00f2fe" opacity="0.8" />
                <path d="M120,90 C130,100 140,95 130,85 Z" fill="#00f2fe" opacity="0.8" />

                <!-- Dorsal fin -->
                <path d="M100,10 C110,0 130,0 140,10" fill="none" stroke="#00f2fe" stroke-width="3" opacity="0.8" />

                <!-- Scales pattern -->
                <path d="M160,40 C150,30 140,30 130,40" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="2" />
                <path d="M160,60 C150,70 140,70 130,60" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="2" />
                <path d="M130,40 C120,30 110,30 100,40" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="2" />
                <path d="M130,60 C120,70 110,70 100,60" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="2" />

                <!-- Gills -->
                <path d="M140,40 C145,50 145,50 140,60" fill="none" stroke="rgba(0,0,0,0.2)" stroke-width="2" />

                <!-- Eye with gradient -->
                <circle cx="160" cy="40" r="7" fill="url(#eyeGradient)" stroke="#0072ff" stroke-width="1" />
                <circle cx="162" cy="38" r="3" fill="#0072ff" />
                <circle cx="159" cy="37" r="1.5" fill="white" />
            </svg>

            <div class="bubbles">
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
            </div>

            <div class="fish-shadow"></div>
        </div>

        <h4 class="loading-text">{{trans_lang('loading_preload')}}</h4>

        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"></div>
        </div>
    </div>
    @if (Request::routeIs(patterns: 'login') || Request::routeIs('register') || Request::routeIs('forgotpassword'))
    <div class="category-popup" id="category-popup">
    </div>
    @else
    <!-- Header Section -->
    <header id="main-content">
        <div class="container-custom">
            <div class="header">

                <!-- Top Header -->
                <div class="top-header d-flex flex-column flex-sm-row">

                    <!-- Head Logo -->
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            @if (file_exists(public_path('assets/logos/' . config('settings.logo'))))
                                <img src="{{ asset('assets/logos/' . config('settings.logo')) }}"
                                    class="logo" alt="logo">
                            @else
                                <img src="{{ asset('assets/images/' . config('settings.logo')) }}"
                                    class="logo" alt="logo">
                            @endif
                        </a>
                    </div>
                    <!-- /Head Logo -->


                    <!-- Search Bar -->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8 col-lg-8">
                                <div class="ms-2 position-relative mt-3 mt-md-0 main-search-bar w-100">
                                    <form action="{{ route('products.search') }}" method="get">
                                        <div class="input-group w-100">
                                            {{-- <input type="text" class="form-control bg-second search-bar" id="search"
                                            placeholder="{{ trans_lang('search_products') }}" name="search_key"
                                            oninput="this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '')"> --}}
                                            <input type="text" class="form-control bg-second search-bar" id="search"
                                                placeholder="{{ trans_lang('search_products') }}" name="search_key">
                                            <button type="submit" class="bg-main text-white magnifying-glass">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </button>
                                        </div>
                                    </form>

                                    <!-- Search Box -->
                                    <div class="search-result-list position-absolute border p-2 rounded-3 shadow" id="product-list">
                                        <!-- Content here -->
                                    </div>
                                    <!-- /Search Box -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Search Bar -->



                    {{-- icon counts --}}

                    <!-- Main Nav -->
                    <div class="d-none d-md-flex gap-5 ms-3">
                        <a href="{{ route('cart') }}" class="position-relative cart-fx">
                            <i class="fa-solid fa-cart-shopping icon"></i>
                            <span class="noti-animation nth-1 position-absolute rounded-circle"></span>
                            <span class="noti-animation nth-2 position-absolute rounded-circle cart-item-btn"></span>
                            <span id="cart_count" class="cart-noti position-absolute bg-danger text-white rounded-circle">0</span>
                        </a>
                        <a href="{{ route('white_list.index') }}" class="position-relative bookmark-btn white-list-fx">
                            <i class="fa-solid fa-bookmark icon" id="bookmark_btn"></i>
                            <span class="noti-animation nth-1 position-absolute rounded-circle"></span>
                            <span class="noti-animation nth-2 position-absolute rounded-circle"></span>
                            <span class="cart-noti position-absolute bg-danger text-white rounded-circle white_list_count">0</span>
                        </a>

                        @if (auth_helper()->check())
                            <button class="btn-login position-relative">
                                <i class="fa-solid fa-user icon"></i>
                                <div class="dropdown position-absolute overflow-hidden bg-white">
                                    <ul class="border">
                                        @if (!check_role(1))
                                            <li>
                                                <a href="{{ url('/profile') }}"
                                                    class="d-flex gap-2 text-black text-center">
                                                    <i
                                                        class="fa-solid fa-address-card icon"></i>{{ trans_lang('profile') }}
                                                </a>
                                            </li>
                                        @endif
                                        @if (check_role(2) || check_role(1))
                                            <li>
                                                <a href="{{ url('/admin') }}"
                                                    class="d-flex gap-2 text-black text-center">
                                                    <i
                                                        class="fa-solid fa-tachometer-alt icon"></i>{{ trans_lang('dashboard') }}
                                                </a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                class="px-3 d-flex gap-2 text-black text-center">
                                                <i class="fas fa-door-open icon"></i>{{ trans_lang('logout') }}
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
                            <a href="javascript:void(0);" id="hamburger-menu">
                                <i class="fa-solid fa-bars"></i>
                            </button>
                        </div>
                        <ul class="w-100">
                            <li><a href="{{ url('/') }}" class="menu-header">{{ trans_lang('home') }}</a></li>
                            <li><a href="{{ url('/special-offer') }}"
                                    class="menu-header">{{ trans_lang('special_offer') }}</a></li>
                            @foreach ($categories as $category)
                                <li><a href="{{ route('category', $category->id) }}"
                                        class="menu-header">{{ $category->category_name }}</a></li>
                            @endforeach
                            <li><a href="{{ url('/support') }}" class="menu-header">{{ trans_lang('support') }}</a>
                            </li>
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
    @endif
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

    @if (Request::routeIs('login') || Request::routeIs('register') || Request::routeIs('forgotpassword') )


    <div class="bottom-nav d-flex d-md-none">
    </div>
    @else
    <!-- Footer Section -->
    <!-- filepath: /C:/fisherman/laravel/fisherman/resources/views/includes/layout.blade.php -->
    <footer class="bg-main d-flex flex-column justify-content-between">
        <div class="">
            <div class="row justify-content-between w-100 pb-3 container-custom">

                {{-- Footer Logo --}}
                <div class="col-12 col-lg-2 d-flex flex-column align-items-center text-white">
                    @if (file_exists(public_path('assets/logos/' . config('settings.logo'))))
                        <img src="{{ asset('assets/logos/' . config('settings.logo')) }}"
                            class="logo" alt="logo">
                    @else
                        <img src="{{ asset('assets/images/' . config('settings.logo')) }}"
                            class="logo" alt="logo">
                    @endif

                    {{-- <a href="{{route('home')}}"><img src="{{ asset('assets/images/Logo only.png') }}" class="logo"
              alt=""></a> --}}
                    <p class="text-center txt-18">{{ config('settings.slogan')  }}</p>
                    <div class="social-icons d-flex justify-content-between gap-1">
                        <a href="https://www.line.me/en/">
                            <img loading="lazy" class="icon_social" src="{{ asset('assets/icons/custom/line.png') }}"
                                alt="Line">
                        </a>
                        <a href="https://www.facebook.com/"><img loading="lazy" class="icon_social"
                                src="{{ asset('assets/icons/custom/facebook.png') }}" alt="Facebook"></a>
                        <a href="https://www.wechat.com/"><img loading="lazy" class="icon_social"
                                src="{{ asset('assets/icons/custom/wechat.png') }}" alt="Wechat"></a>
                        <a href="https://x.com/"><img loading="lazy" class="icon_social"
                                src="{{ asset('assets/icons/custom/xcom.png') }}" alt="Xcom"></a>
                    </div>
                </div>
                {{-- /Footer Logo --}}

                {{-- Useful Link --}}
                <div class="col-12 col-lg-3 mt-3 d-flex flex-column justify-content-center">
                    <h6 class="text-center text-warning mb-2">{{ trans_lang('useful_links') }}</h6>
                    <ul class="list-unstyled link-list txt-15 useful-link">
                        <li><a href="{{ route('home') }}">{{ trans_lang('home') }}</a></li>
                        <li><a href="{{ route('special-offer') }}">{{ trans_lang('special_offer') }}</a></li>
                        <li><a href="{{ route('support') }}">{{ trans_lang('faqs') }}</a></li>
                        <li><a href="{{ route('terms') }}">{{ trans_lang('terms_privacy') }}</a></li>
                    </ul>
                </div>
                {{-- /Useful Link --}}

                {{-- Contact Us --}}
                <div class="col-12 col-lg-2 mt-3 ">
                    <h6 class="text-center text-warning mb-2">{{ trans_lang('contact_us') }}</h6>
                    <ul class="list-unstyled text-white txt-15 text-center">
                        <li>{{ trans_lang('address') }} :
                            {{config('settings.contact_address')}}

                        <li>{{ trans_lang('phone_number') }} :
                            {{config('settings.contact_phone')}}
                                </li>
                        <li>{{ trans_lang('email') }} :
                            {{config('settings.contact_email')}}
                                </li>
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
                <div class="col-lg-5 text-white text-lg-end text-center mb-2 mb-lg-0">
                    <p class="mb-4 my-lg-2 txt-13"><a href="{{ route('policy') }}">Privacy | </a><a
                            href="{{ route('terms') }}">Terms</a></p>
                </div>
            </div>
        </div>
        {{-- /Copy Right --}}

    </footer>
    <!-- /Footer Section -->

    {{-- Side Pannel --}}
    <div class="offcanvas offcanvas-end" tabindex="-1" id="side_pannel">
        <div class="offcanvas-header bg-primary fw-bold text-white">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul>
                @if (!check_role(1))
                    <li>
                        <a href="{{ url('/profile') }}"
                            class="p-2 d-flex gap-2 text-black text-center">
                            <i class="fa-solid fa-address-card icon"></i>{{ trans_lang('profile') }}
                        </a>
                    </li>
                @endif
                @if (check_role(2) || check_role(1))
                    <li>
                        <a href="{{ url('/admin') }}"
                            class="p-2 d-flex gap-2 text-black text-center">
                            <i class="fa-solid fa-tachometer-alt icon"></i>{{ trans_lang('dashboard') }}
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('logout') }}"
                        class="p-2 d-flex gap-2 text-black text-center">
                        <i class="fas fa-door-open icon"></i>{{ trans_lang('logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
    {{-- /Side Pannel --}}

    <!-- Mobile Bottom Nav -->
    <div class="bottom-nav d-flex d-md-none">
        <a href="{{ route('home') }}" class="bottom-menu hv-icon"><i class="fa-solid fa-home"></i><br>
            <p>{{ trans_lang('home') }}</p>
        </a>
        <a href="" class="bottom-menu hv-icon" id="category-link"><i class="fa-solid fa-tags"></i><br>
            <p>{{ trans_lang('category') }}</p>
        </a>
        <div class="">
            <a href="{{ route('cart') }}" class="bottom-menu mobile-shopping-card hv-icon cart-fx"><i class="fa-solid fa-cart-shopping shopping"></i><br>
                <p class="cart-txt">{{ trans_lang('cart') }}
                    <span class="noti-animation nth-1 position-absolute rounded-circle"></span>
                    <span class="noti-animation nth-2 position-absolute rounded-circle cart-item-btn"></span>
                    <span id="cart_count_bottom" class="mobile-cart-noti position-absolute bg-danger text-white rounded-circle">0</span>
                </p>
                {{-- <span class="text-danger" id="cart_count_bottom">0</span> --}}
            </a>
        </div>
        <a href="{{ route('white_list.index') }}" class="bottom-menu position-relative hv-icon white-list-fx"><i class="fa-solid fa-bookmark"></i><br>
            <p>{{ trans_lang('whitelist') }}
                <span class="noti-animation nth-1 position-absolute rounded-circle"></span>
                <span class="noti-animation nth-2 position-absolute rounded-circle cart-item-btn"></span>
                <span class="mobile-white-list-noti position-absolute bg-danger text-white rounded-circle white_list_count">0</span>
            </p>
        </a>
        @if(auth_helper()->check())
            <a class="bottom-menu hv-icon" data-bs-toggle="offcanvas" href="#side_pannel">
                <i class="fa-solid fa-user"></i><br>
                <p>{{ trans_lang('profile') }}</p>
            </a>
        @else
            <a href="{{ route('login') }}" class="bottom-menu hv-icon"><i class="fa-solid fa-sign-in-alt"></i><br>
                <p>{{ trans_lang('login') }}</p>
        @endif
    </div>
    <!-- /Mobile Bottom Nav -->
    @endif
    <!-- All Scripts -->
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
    {{-- <!-- <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> --> --}}
    <script defer src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script defer src="{{ asset('assets/js/popup.js') }}"></script>
    {{--
    <script src="{{asset('assets/js/preloader.js')}}"></script> --}}
    <script defer src="{{ asset('assets/js/moving-text.js') }}"></script>
    <script defer src="{{ asset('assets/js/password.js') }}"></script>
    <script src="{{ asset('assets\libs\toastr-master\build\toastr.min.js') }}"></script>
    <script>
        $(document).ready(() => {

            toastr.options = {
                "timeOut": "3000",
                "extendedTimeOut": "500",
                "progressBar": true,
                "onShown": function () {
                    var toast = $(this);
                    toast.hover(
                        function () {
                            toastr.clear()
                        }
                    );
                }
            };

            //dropdown trigger
            $('.btn-login').click(() => {
                $('.dropdown').toggleClass('active');
            });

            // close dropdown
            if(document.querySelector('.btn-login')) {
                $(document).click(ev => {

                        if (!document.querySelector('.btn-login').contains(ev.target)) {

                            $('.dropdown').removeClass('active');
                        }
                    })
                }

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

            sessionStorage.removeItem('cart_count');
            sessionStorage.removeItem('white_list_count');

            // Fetch latest counts from the server
            updateWhiteListCount();
            updateCartCount();

        });

        // Function to get count from sessionStorage
        function getStoredCount(key) {
            return parseInt(sessionStorage.getItem(key)) || 0;
        }

        // Function to update count in sessionStorage and UI
        function updateStoredCount(key, selector, value) {
            sessionStorage.setItem(key, value);
            $(selector).text(value);
        }

        // Function to update cart count
        function updateCartCount() {
            $.ajax({
                url: "{{ route('cart-count') }}",
                method: 'GET',
                success: function(response) {
                    let cartCount = response.cart_count;
                    updateStoredCount("cart_count", "#cart_count, #cart_count_bottom", cartCount);
                },
                error: function(xhr) {
                    console.error(xhr);
                },

            });
        }

        // Function to update whitelist count
        function updateWhiteListCount() {
            $.ajax({
                url: "{{ route('whitelist-count') }}",
                method: 'GET',
                success: function(response) {
                    let whiteListCount = response.white_lists_count;
                    updateStoredCount("white_list_count", ".white_list_count", whiteListCount);
                },
                error: function(xhr) {
                    console.error(xhr);
                }
            });
        }

        // Add to whitelist
        function addToWhiteList(product_id, btn) {
            $.ajax({
                url: `/white-list/${product_id}`,
                type: "POST",
                data: { id: product_id },
                beforeSend: () => {
                    btn.prop('disabled',true)
                },
                success: function(response) {
                    if (response.status === "redirect") {
                        window.location.href = response.url;
                    } else if (response.status) {
                        btn.addClass('active');
                        let count = getStoredCount("white_list_count") + 1;
                        updateStoredCount("white_list_count", ".white_list_count", count);
                    }

                    response.status ? toastr.success('',response.message) : toastr.info('',response.message);

                },
                complete: () => {
                    btn.prop('disabled',false)
                }
            });
        }

        // Handle add to whitelist button click
        function handleAddToWhiteListBtn(class_name) {
            $(`.${class_name}`).click(function(e) {
                e.preventDefault();
                const getid = $(this).data('id');
                const cur_btn = $(`.${class_name}[data-id="${getid}"]`);
                // console.log(cur_btn.prop('disabled'))
                // if(cur_btn.prop('disabled')){
                //     addToWhiteList(getid, cur_btn);
                // }
                addToWhiteList(getid, cur_btn);
            });
        }

        // Add to cart
        function addToCart(products, btn) {
            $.ajax({
                url: "{{ route('cart.add') }}",
                type: "POST",
                data: { products: products },
                beforeSend: () => {
                    btn.prop('disabled',true)
                },
                success: function(response) {
                    if (response.status) {
                        let count = getStoredCount("cart_count") + 1;
                        updateStoredCount("cart_count", "#cart_count, #cart_count_bottom", count);
                    }

                    response.status ? toastr.success('',response.message) : toastr.info('',response.message);

                    // btn.closest('#btn-message').find('span').html(response.message);
                },
                complete: () => {
                    btn.prop('disabled',false)
                }
            });
        }

        // Handle add to cart button click
        function handleAddToCartBtn(class_name) {

            $(`.${class_name}`).click(function(e) {
                e.preventDefault();
                const getid = $(this).data('id');
                const cur_btn = $(`.${class_name}[data-id="${getid}"]`);

                console.log(cur_btn.prop('disabled'))
                var products = [{ id: getid, quantity: 1 }];
                if(!cur_btn.prop('disabled')){
                    addToCart(products, cur_btn);
                }
            });
        }

        function formatPriceJapanese(price) {
        // Convert to number and handle potential non-number inputs
        const priceNum = Number(price);

        // Check if the input is a valid number
        if (isNaN(priceNum)) {
            return "Invalid input";
        }

        // Convert the number to a string with fixed decimal places (if any)
        const priceStr = priceNum.toFixed(2);

        // Split into integer and decimal parts
        const parts = priceStr.split('.');
        const integerPart = parts[0];
        const decimalPart = parts.length > 1 && parts[1] !== '00' ? '.' + parts[1] : '';

        // Format the integer part with commas every 3 digits
        const formattedInteger = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

        // Return the formatted price with the currency symbol
        return '¥' + formattedInteger + decimalPart;
    }
    document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.format').forEach(function(element) {
                let rawPrice = element.textContent.replace('¥', '').replace(/,/g, '').replace('.00','');
                let formattedPrice = formatPriceJapanese(rawPrice);
                element.textContent = formattedPrice;
            });
        });
    </script>
    <!-- /All Scripts -->
    @yield('script')

    <script src="{{asset('assets/js/preloader.js')}}"></script>
    <script src="{{ asset('assets/js/notify.js') }}"></script>
    <!-- Testing Scripts -->

    <!-- /Testing Scripts -->
</body>

</html>
