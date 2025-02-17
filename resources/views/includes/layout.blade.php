<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fisherman</title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}" />
  @yield('style')
  <link rel="icon" href="demo_icon.gif" type="image/gif" sizes="16x16">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}" />
  <!-- add jquery -->
  <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
  <!-- {{-- favicon --}} -->
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/images/favicon/apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/images/favicon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon/favicon-16x16.png')}}">
  <link rel="manifest" href="{{asset('assets/images/favicon/site.webmanifest')}}">

</head>

<body>

  <!-- header section start -->
  <header class="position-relative">
    <div class="container-custom">
      <div class="header">
        <div class="top-header">
          <div class="logo">
            <a href="{{url('/')}}">
              @if(file_exists(public_path('assets/logos/' . \App\Models\Setting::where('key', 'logo')->value('value'))))
              <img src="{{ asset('assets/logos/' . \App\Models\Setting::where('key', 'logo')->value('value')) }}" alt="logo">
              @else
                <img src="{{ asset('assets/images/' . \App\Models\Setting::where('key', 'logo')->value('value')) }}" alt="logo">  
              @endif
            </a>
          </div>
          <div class="input-group">
            <input type="text" class="form-control bg-second" placeholder="Search your Products">
            <button class="bg-main text-white magnifying-glass"><i class="fa-solid fa-magnifying-glass"></i></button>
          </div>
          <div class="d-flex gap-5">
            <a href="{{url('/cart')}}">
              <i class="fa-solid fa-cart-shopping icon"></i>
            </a>
            <a href="{{ route('white_list.index')}}">
              <i class="fa-solid fa-bookmark icon"></i>
            </a>
            <button class="btn-login">
              <i class="fa-solid fa-user icon"></i>
            </button>
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
              <li><a href="{{ url('/special-offer') }}" class="menu-header">Special Offer</a></li>
              @foreach($categories as $category)
                <li><a href="{{ url('/category') }}" class="menu-header">{{ $category->category_name }}</a></li>
              @endforeach
              <li><a href="{{ url('/support') }}" class="menu-header">Support</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <div class="dropdown w-100 position-absolute d-flex justify-content-end">
      <ul class="bg-white">
        <li class="py-3"><a href="{{ url('/profile') }}" class="px-3 d-flex gap-2 text-black text-center"><i class="fa-solid fa-address-card icon"></i>Profile</a></li>
        <li class="py-3"><a href="{{url('/login')}}" class="px-3 d-flex gap-2 text-black text-center"><i class="fas fa-door-open icon"></i>Logout</a></li>
      </ul>
    </div>
  </header>

  <div class="category-popup" id="category-popup">
    <ul>
      <li class="close-popup">
        <button id="close-popup">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </li>
        @foreach($subcategories as $subcategory)
          <li><a href="{{ route('sub-category.show', $subcategory->id) }}" class="menu-category">{{ $subcategory->name }}</a></li>
        @endforeach
    </ul>
  </div>
  <!-- header section end -->


  <!-- main section start -->
  <main>
    @yield('contents')
  </main>
  <!-- main section end -->

  <!-- footer start -->
  <!-- filepath: /C:/fisherman/laravel/fisherman/resources/views/includes/layout.blade.php -->
  <footer class="bg-main w-100">
        <div class="container-custom">
            <div class="row justify-content-around w-100 pb-3">
                    <div class="col-12 col-lg-2 d-flex flex-column align-items-center text-white">
                      @if(file_exists(public_path('assets/logos/' . \App\Models\Setting::where('key', 'logo')->value('value'))))
                      <img src="{{ asset('assets/logos/' . \App\Models\Setting::where('key', 'logo')->value('value')) }}" alt="logo">
                      @else
                        <img src="{{ asset('assets/images/' . \App\Models\Setting::where('key', 'logo')->value('value')) }}" alt="logo">  
                      @endif

                    {{-- <a href="{{route('home')}}"><img src="{{ asset('assets/images/Logo only.png') }}" class="logo" alt=""></a> --}}
                    <p class="text-center txt-18">Who We Are: Your Trusted Source for Fresh Seafood.</p>
                    <div class="social-icons d-flex justify-content-center gap-4">
                        <a href="">
                        <img class="icon_social" src="{{asset('assets/icons/custom/line.png')}}" alt="Line">
                        </a>
                        <a href=""><img class="icon_social" src="{{asset('assets/icons/custom/facebook.png')}}" alt="Line"></a>
                        <a href=""><img class="icon_social" src="{{asset('assets/icons/custom/wechat.png')}}" alt="Line"></a>
                        <a href=""><img class="icon_social" src="{{asset('assets/icons/custom/xcom.png')}}"></a>
                    </div>
                    </div>
                    <div class="col-12 col-lg-3 mt-3 d-flex flex-column justify-content-center">
                    <h6 class="text-center text-warning mb-2">Useful Links</h6>
                    <ul class="list-unstyled link-list txt-15 useful-link">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="#">Product</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="{{route('policy')}}">Terms & Privacy</a></li>
                        <li><a href="#">Customer Review</a></li>
                        <li><a href="#">Blogs</a></li>
                    </ul>
                    </div>
                    <div class="col-12 col-lg-2 mt-3 ">
                    <h6 class="text-center text-warning mb-2">Contact Us</h6>
                    <ul class="list-unstyled text-white txt-15 text-center">
                        <li><a href="#">Address : {{ App\Models\Setting::getValue('contact_address') }}</a></li>
                        <li><a href="#">Phone : {{ App\Models\Setting::getValue('contact_phone') }}</a></li>
                        <li><a href="#">Email : {{ App\Models\Setting::getValue('contact_email') }}</a></li>
                    </div>
              </div>
            </div>
            <div class="bg-dark m-0">
                  <div class="row justify-content-around container-custom">
                      <div class="col-lg-5 text-white text-center text-lg-start">
                          <p class="my-2 txt-13">&copy; Copyright 2024-fisherman Designed by Andfun</p>
                        </div>
                        <div class="col-lg-5 text-white text-lg-end text-center">
                          <p class="my-2 txt-13"><a href="{{route('policy')}}">Privacy | Terms</a></p>
                        </div>
                  </div>
            </div>
  </footer>
  <!-- footer end -->

  <!-- mobile nav start -->
  <div class="bottom-nav">
    <a href="#" class="menu-header"><i class="fa-solid fa-home"></i><br>Home</a>
    <a href="#" class="menu-header"><i class="fa-solid fa-tags" id="category-link"></i><br>Category</a>
    <div class="">
      <a href="#" class="menu-header mobile-shopping-card"><i class="fa-solid fa-cart-shopping shopping"></i><br>Cart (
        <span class="price">2</span> )
      </a>
    </div>
    <a href="#" class="menu-header"><i class="fa-solid fa-tags"></i><br>Offers</a>
    <a href="#" class="menu-header"><i class="fa-solid fa-user"></i><br>Profile</a>
  </div>

  <!-- mobile nav end -->

  <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
  {{-- <!-- <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> --> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/js/popup.js') }}"></script>
  <script src="{{ asset('assets/js/moving-text.js') }}"></script>
  <script src="{{ asset('assets/js/password.js') }}"></script>
  <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
  <script>
    $(document).ready(() => {

      $('.btn-login').click(()=> {

        $('.dropdown').toggleClass('active');
      })
    })
  </script>
</body>

</html>
