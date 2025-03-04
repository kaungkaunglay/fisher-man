{{-- @dd(check_role(1)) --}}
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
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/css/preloader.css')}}">
    <!-- add jquery -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <!-- {{-- favicon --}} -->

    {{-- <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}"> --}}
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
    <header id="main-content">
    </header>

    <div class="category-popup" id="category-popup">
    </div>
    <!-- /Header Section -->


    <!-- Main Section -->
    <main>
        @yield('contents')
    </main>
    <!-- /Main Section -->

    <footer class="">
    </footer>

    <div class="bottom-nav d-flex d-md-none">
    </div>
    <!-- All Scripts -->
    <script defer src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script defer src="{{ asset('assets/js/password.js') }}"></script>

    <!-- /All Scripts -->
    @yield('script')

    <script src="{{asset('assets/js/preloader.js')}}"></script>
    <!-- Testing Scripts -->

    <!-- /Testing Scripts -->
</body>

</html>
