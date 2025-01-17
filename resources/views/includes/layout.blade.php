<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fisherman</title>
    <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    @yield('style')
    <link rel="icon" href="demo_icon.gif" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}" />

    {{-- favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/images/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/images/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/images/favicon/site.webmanifest')}}">
</head>

<body>

    <!-- header section start -->
    <header>
        <div class="container-custom">
            <div class="header">
                <div class="top-header">
                    <div class="logo">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                    </div>
                    <div class="search">
                        <input type="text" placeholder="Search">
                        <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </div>
                    <div class="icon">
                        <a href="{{url('/cart')}}">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                        <a href="{{url('/white-list')}}">
                            <i class="fa-solid fa-bookmark"></i>
                        </a>
                        <a href="{{url('/login')}}">
                            <i class="fa-solid fa-user"></i>
                        </a>
                    </div>
                </div>
                <div class="bottom-header">
                    <nav>
                        <div class="hambuger-menu">
                            <a href="#" id="hamburger-menu">
                                <i class="fa-solid fa-bars"></i>
                            </a>
                        </div>
                        <ul>
                            <li><a href="{{ url('/') }}" class="menu-header">Home</a></li>
                            <li><a href="{{ url('/category') }}" class="menu-header">Special Offer</a></li>
                            <li><a href="{{ url('/category') }}" class="menu-header">青物</a></li>
                            <li><a href="{{ url('/category') }}" class="menu-header">イカ</a></li>
                            <li><a href="{{ url('/category') }}" class="menu-header">白身魚</a></li>
                            <li><a href="{{ url('/category') }}" class="menu-header">魚介類</a></li>
                            <li><a href="{{ url('/category') }}" class="menu-header">エビ</a></li>
                            <li><a href="{{ url('/category') }}" class="menu-header">たこ</a></li>
                            <li><a href="{{ url('/support') }}" class="menu-header">Support</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="category-popup" id="category-popup">
        <ul>
            <li class="close-popup"><a href="#" id="close-popup">
                    <i class="fa-solid fa-xmark"></i>
                </a></li>
            <li><a href="#" class="menu-category">鮮魚 (1134)</a></li>
            <li><a href="#" class="menu-category">マグロ (188)</a></li>
            <li><a href="#" class="menu-category">貝類 (322)</a></li>
            <li><a href="#" class="menu-category">イカ・タコ (190)</a></li>
            <li><a href="#" class="menu-category">ウニ・イクラ・白子・魚卵 (119)</a></li>
            <li><a href="#" class="menu-category">海藻・干物・漬魚・ちりめん・練物類 (401)</a></li>
            <li><a href="#" class="menu-category">珍味・惣菜・漬物 (440)</a></li>
            <li><a href="#" class="menu-category">調味料・わさび・飾り物 (202)</a></li>
        </ul>
    </div>
    <!-- header section end -->

    <!-- main section start -->
    <main class="m-t-40">
        @yield('contents')
    </main>
    <!-- main section end -->

    <!-- footer start -->
    <!-- filepath: /C:/fisherman/laravel/fisherman/resources/views/includes/layout.blade.php -->
    <footer class="bg-main w-100">
        <div class="row justify-content-around w-100 py-3">
            <div class="col-12 col-lg-2 d-flex flex-column align-items-center text-white">
                <a style="pt" href="{{route('home')}}"><img src="{{ asset('assets/images/logo.png') }}" class="logo" alt=""></a>
                <p class="text-center">Who We Are: Your Trusted Source for Fresh Seafood.</p>
                <div class="social-icons d-flex justify-content-center gap-4">
                    <i class="fa-brands fa-line fs-3"></i>
                    <i class="fa-brands fa-facebook fs-3"></i>
                    <i class="fa-brands fa-weixin fs-3"></i>
                    <i class="fa-brands fa-xing fs-3"></i>
                </div>
            </div>
            <div class="col-12 col-lg-3 mt-3">
                <h6 class="text-center text-color">Useful Links</h6>
                <ul class="list-unstyled link-list">
                    <li><a href="{{ route('home') }}">>>Home</a></li>
                    <li><a href="{{route('product_details')}}">>>Product</a></li>
                    <li><a href="#">>>FAQ</a></li>
                    <li><a href="{{route('policy')}}">>>Terms & Privacy</a></li>
                    <li><a href="#">>>Customer Review</a></li>
                    <li><a href="#">>>Blogs</a></li>
                </ul>
            </div>
            <div class="col-12 col-lg-2 mt-3 text-center">
                <h6 class="text-center text-color">Contact Us</h6>
                <ul class="list-unstyled text-white">
                    <li><a href="#">Address : address</a></li>
                    <li><a href="#">Phone : 098756292</a></li>
                    <li><a href="#">Email : user@email.com</a></li>
            </div>
        </div>
        <div class="row bg-dark m-0 justify-content-around">
            <div class="col-lg-5 text-white text-center text-lg-start">
                <p class="my-2">&copy; Copyright 2024-fisherman Designed by Andfun</p>
            </div>
            <div class="col-lg-5 text-white text-lg-end text-center">
                <p class="my-2">Privacy | Terms</p>
            </div>
        </div>
    </footer>
    <!-- footer end -->

    <!-- mobile nav start -->
    <div class="bottom-nav">
        <a href="#" class="menu-header"><i class="fa-solid fa-home"></i><br>Home</a>
        <a href="#" class="menu-header"><i class="fa-solid fa-tags" id="category-link"></i><br>Category</a>
        <div class="">
            <a href="#" class="menu-header mobile-shopping-card"><i class="fa-solid fa-cart-shopping shopping"><br></i>Cart ( <span class="price">2</span> )</a>
        </div>
        <a href="#" class="menu-header"><i class="fa-solid fa-tags"></i><br>Offers</a>
        <a href="#" class="menu-header"><i class="fa-solid fa-user"></i><br>Profile</a>
    </div>

    <!-- mobile nav end -->


    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/popup.js') }}"></script>
    <script src="{{ asset('assets/js/moving-text.js') }}"></script>
</body>

</html>