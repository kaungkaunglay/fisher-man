<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fisherman</title>
    <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}" />
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
        <nav class="navbar navbar-expand-lg bg-second shadow-sm pb-3">
            <div class="container-fluid">
                <div class="row justify-content-between w-100">
                    <div class="col-2 col-lg-2"><a class="navbar-brand" href="{{route('home')}}"><img
                                src="{{asset('assets/images/logo.png')}}" class="navbar-logo" alt=""></a></div>
                    <div class="col-9 col-lg-5 d-flex justify-content-center align-items-center">
                        <div class="input-group">
                            <input type="text" class="form-control bg-second " placeholder="Search your Products">
                            <button class="btn bg-main text-white"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                    <div class="col-2 d-none d-lg-flex justify-content-center align-items-center ">
                        <div class="w-100 d-flex justify-content-around icon-list">
                            <a href="{{route('cart')}}"><i class="fa-solid fa-cart-shopping fs-3 txt-primary"></i></a>
                            <a href="#"><i class="fa-solid fa-bookmark fs-3 txt-primary"></i></a>
                            <a href="{{route('profile')}}"><i class="fa-solid fa-circle-user fs-3 txt-primary"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </nav>
        <div class="container secnav">
            <div class="row second-navbar bg-main m-0 w-100">
                <div class="col-1 ">
                    <div class="menu-icon"><i class="fa-solid fa-bars"></i></div>
                </div>
                <div class="col-11 d-flex justify-content-center">
                    <ul class="text-nowrap nav-menu">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="#">Special Offer</a></li>
                        <li><a href="#">青物</a></li>
                        <li><a href="#">イカ</a></li>
                        <li><a href="#">白身魚</a></li>
                        <li><a href="#">魚介類</a></li>
                        <li><a href="#">エビ</a></li>
                        <li><a href="#">たこ</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="slideshow d-lg-none" style="height: 20px">
            <marquee behavior="scroll" direction="left" scrollamount="4">
                Scroll beside to see more menu &nbsp;&nbsp;&nbsp; Scroll beside to see more menu &nbsp;&nbsp;&nbsp;
                Scroll beside
                to see more menu
            </marquee>
        </div>
    </header>
    <!-- header section end -->

    <!-- main section start -->
    <main>
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
    <div class="mobile-nav shadow-lg sticky-bottom w-100 d-block d-md-none bg-main">
        <div class="row me-0">
            <div class="col">
                <a href="" class="nav-item d-flex flex-column justify-content-center align-items-center">
                    <i class="fa-solid fa-house"></i>
                    <p>Home</p>
                </a>
            </div>
            <div class="col">
                <a href="" class="nav-item home d-flex flex-column justify-content-center align-items-center">
                    <i class="fa-solid fa-list"></i>
                    <p>Categories</p>
                </a>
            </div>
            <div class="col">
                <a href="" class="nav-item home d-flex flex-column justify-content-center align-items-center">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <p class="cart">Cart (<span class="text-danger">0</span>)</p>
                </a>
            </div>
            <div class="col">
                <a href="" class="nav-item home d-flex flex-column justify-content-center align-items-center">
                    <i class="fa-solid fa-bookmark"></i>
                    <p>White List</p>
                </a>
            </div>
            <div class="col">
                <a href="" class="nav-item home d-flex flex-column justify-content-center align-items-center">
                    <i class="fa-solid fa-circle-user"></i>
                    <p>Profile</p>
                </a>
            </div>

        </div>
    </div>

    <!-- mobile nav end -->


    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
