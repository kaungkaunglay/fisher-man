@extends('includes.layout')
@section('style')
  <link rel="stylesheet" href="{{ asset('assets/css/profile_seller.css') }}" />
@endsection
@section('contents')

  <!-- Main Content -->
  <section class="container-custom mt-2">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb" class="py-4">
    <ol class="breadcrumb mb-0 bg-transparent">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </ol>
    </nav>
    <!-- ./Breadcrumbs -->

    <!-- Profile Section -->
    <div class="profile_seller">

    <div class="row">

      <!-- Profile Side -->
      <div class="col-12 col-lg-7">

      <div class="row">

        <!-- profile img -->
        <div class="col-12 col-lg-6">
        <img src="{{ asset('assets/images/account1.svg') }}" class="w-100" alt="">
        </div>

        <!-- profile info -->
        <form action="#" class="col-12 col-lg-6 mt-2 mt-lg-0 profile-form">

          <div class="d-flex justify-content-end gap-4">
            <button type="submit" class="save">
              <i class="fa-solid fa-save fs-5 text-danger"></i>
            </button>
            <button class="edit">
              <i class="fa-solid fa-pen-to-square fs-5 text-danger"></i>
            </button>
            <button class="cancel">
              <i class="fa-solid fa-x fs-5 text-danger"></i>
            </button>
          </div>

          <!-- user name -->
          <div class="d-flex align-items-center">
            <label class="w-25" for="name">Name</label>:
            <input type="text" class="p-1 mt-1 ms-1 rounded-1" id="name" value="{{ $user->username }}" readonly>
          </div>

          <!-- email link -->
          <div class="d-flex align-items-center">
            <label class="w-25" for="email">Email</label>:
            <!-- <a href="mailto:{{ $user->email }}"> -->
            <input type="email" class="p-1 mt-2 ms-1 rounded-1" id="email" value="{{ $user->email }}" readonly>
            <!-- </a> -->
          </div>

          <!-- organization link -->
          <div class="d-flex align-items-center">
            <label class="w-25" for="organize">Organize</label>:
            <!-- <a href="#"> -->
            <input type="text" class="p-1 mt-2 ms-1 rounded-1" id="organize" value="Chat with name or Organization name" readonly>
            <!-- </a> -->
          </div>

          <div>
            <i class="fa-brands fa-line fs-2 mt-1"></i>
          </div>

        </form>
        <!-- /profile info -->

        <!-- detail info -->
        <form action="#" class="col-12 col-lg-12 mt-4 profile-form">

          <h2 class="fw-bold d-flex justify-content-between">
            Detail Personal Info
            <div class="d-flex justify-content-end gap-4">
              <button type="submit" class="save">
                <i class="fa-solid fa-save fs-5 text-danger"></i>
              </button>
              <button class="edit">
                <i class="fa-solid fa-pen-to-square fs-5 text-danger"></i>
              </button>
              <button class="cancel">
                <i class="fa-solid fa-x fs-5 text-danger"></i>
              </button>
            </div>
          </h2>
    
          <!-- address -->
          <div class="d-flex align-items-center">
            <label class="w-25" for="address">Address</label>:
            <input type="text" class="p-1 mt-2 ms-1 rounded-1" id="address" value="house no street,sue distict,city" readonly>
          </div>

          <!-- phone-number link -->
          <div class="d-flex align-items-start">
            <label class="w-25" for="tel">Phone No.</label>:
            <div class="ms-1 d-flex phone-no-container">
              <!-- <a href="tel:"> -->
              <input type="tel" class="p-1 mt-2 rounded-1" id="tel" value="{{ $user->first_phone}}" readonly>
              <!-- </a> -->
               <b class="cor align-content-end">, </b>
                <!-- <a href="tel:"> -->
              <input type="tel" class="p-1 mt-2 rounded-1" value="{{ $user->secone_phone }}" readonly>
              <!-- </a> -->
            </div>
          </div>

        </form>
        <!-- /detail info -->

        <!-- button group -->
        <div class="buttons d-flex gap-2 mt-3">
          <button class="common-btn">Upload product</button>
          <button class="common-btn">Check Order Status</button>
        </div>
      </div>
      </div>
      <!-- /Profile Side -->

      <!-- Map Side -->
      <div class="col-12 col-lg-5 mt-3 mt-lg-0">
      <h6 class="fw-bold">Shop Location</h6>
      <iframe class="w-100"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d250151.16276620553!2d104.72537013378734!3d11.579654014369655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109513dc76a6be3%3A0x9c010ee85ab525bb!2sPhnom%20Penh%2C%20Cambodia!5e0!3m2!1sen!2ssg!4v1736774811619!5m2!1sen!2ssg"
        height="330" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <!-- /Map Side -->

    </div>

    </div>
    <!-- /Profile Section -->

  </section>
  <!-- /Main Content -->

  <!-- Product Section -->
  <section class="discount-products bg-second py-4 mt-3">
    <div class="container-custom">
    <h6 class="txt-primary fw-bold mb-3">Discount Products</h6>
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
        Sort by
        </button>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </div>
      </div>
    </div>

    <div class="card-list" id="view-list">
      <div class="item-card">
      <a href="{{ url('/product') }}" class="right">
        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
      </a>
      <div class="left">
        <p class="price m-t-b-10">¥1000</p>
        <div class="title-category">
        <a href="" class="menu-category ">鮮魚 | 白身魚</a>
        <h3 class="title m-t-b-10">真鯛</h3>
        </div>
        <a href="{{ url('/product') }}" class="txt m-b-10 description">
        たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
        </a>
        <div class="d-flex card-btn m-t-10">
        <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
        <a href="#" class="product-btn w-100"><i class="fa-solid fa-bookmark"></i></a>
        </div>
      </div>
      </div>
      <div class="item-card">
      <a href="{{ url('/product') }}" class="right">
        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
      </a>
      <div class="left">
        <p class="price m-t-b-10">¥1000</p>
        <div class="title-category">
        <a href="" class="menu-category ">鮮魚 | 白身魚</a>
        <h3 class="title m-t-b-10">真鯛</h3>
        </div>
        <a href="{{ url('/product') }}" class="txt m-b-10 description">
        たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
        </a>
        <div class="d-flex card-btn m-t-10">
        <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
        <a href="#" class="product-btn w-100"><i class="fa-solid fa-bookmark"></i></a>
        </div>
      </div>
      </div>
      <div class="item-card">
      <a href="{{ url('/product') }}" class="right">
        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
      </a>
      <div class="left">
        <p class="price m-t-b-10">¥1000</p>
        <div class="title-category">
        <a href="" class="menu-category ">鮮魚 | 白身魚</a>
        <h3 class="title m-t-b-10">真鯛</h3>
        </div>
        <a href="{{ url('/product') }}" class="txt m-b-10 description">
        たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
        </a>
        <div class="d-flex card-btn m-t-10">
        <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
        <a href="#" class="product-btn w-100"><i class="fa-solid fa-bookmark"></i></a>
        </div>
      </div>
      </div>
      <div class="item-card">
      <a href="{{ url('/product') }}" class="right">
        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
      </a>
      <div class="left">
        <p class="price m-t-b-10">¥1000</p>
        <div class="title-category">
        <a href="" class="menu-category ">鮮魚 | 白身魚</a>
        <h3 class="title m-t-b-10">真鯛</h3>
        </div>
        <a href="{{ url('/product') }}" class="txt m-b-10 description">
        たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
        </a>
        <div class="d-flex card-btn m-t-10">
        <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
        <a href="#" class="product-btn w-100"><i class="fa-solid fa-bookmark"></i></a>
        </div>
      </div>
      </div>
      <div class="item-card">
      <a href="{{ url('/product') }}" class="right">
        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
      </a>
      <div class="left">
        <p class="price m-t-b-10">¥1000</p>
        <div class="title-category">
        <a href="" class="menu-category ">鮮魚 | 白身魚</a>
        <h3 class="title m-t-b-10">真鯛</h3>
        </div>
        <a href="{{ url('/product') }}" class="txt m-b-10 description">
        たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
        </a>
        <div class="d-flex card-btn m-t-10">
        <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
        <a href="#" class="product-btn w-100"><i class="fa-solid fa-bookmark"></i></a>
        </div>
      </div>
      </div>
      <div class="item-card">
      <a href="{{ url('/product') }}" class="right">
        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
      </a>
      <div class="left">
        <p class="price m-t-b-10">¥1000</p>
        <div class="title-category">
        <a href="" class="menu-category ">鮮魚 | 白身魚</a>
        <h3 class="title m-t-b-10">真鯛</h3>
        </div>
        <a href="{{ url('/product') }}" class="txt m-b-10 description">
        たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
        </a>
        <div class="d-flex card-btn m-t-10">
        <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
        <a href="#" class="product-btn w-100"><i class="fa-solid fa-bookmark"></i></a>
        </div>
      </div>
      </div>
      <div class="item-card">
      <a href="{{ url('/product') }}" class="right">
        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
      </a>
      <div class="left">
        <p class="price m-t-b-10">¥1000</p>
        <div class="title-category">
        <a href="" class="menu-category ">鮮魚 | 白身魚</a>
        <h3 class="title m-t-b-10">真鯛</h3>
        </div>
        <a href="{{ url('/product') }}" class="txt m-b-10 description">
        たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
        </a>
        <div class="d-flex card-btn m-t-10">
        <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
        <a href="#" class="product-btn w-100"><i class="fa-solid fa-bookmark"></i></a>
        </div>
      </div>
      </div>
      <div class="item-card">
      <a href="{{ url('/product') }}" class="right">
        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
      </a>
      <div class="left">
        <p class="price m-t-b-10">¥1000</p>
        <div class="title-category">
        <a href="" class="menu-category ">鮮魚 | 白身魚</a>
        <h3 class="title m-t-b-10">真鯛</h3>
        </div>
        <a href="{{ url('/product') }}" class="txt m-b-10 description">
        たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
        </a>
        <div class="d-flex card-btn m-t-10">
        <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
        <a href="#" class="product-btn w-100"><i class="fa-solid fa-bookmark"></i></a>
        </div>
      </div>
      </div>
      <div class="item-card">
      <a href="{{ url('/product') }}" class="right">
        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
      </a>
      <div class="left">
        <p class="price m-t-b-10">¥1000</p>
        <div class="title-category">
        <a href="" class="menu-category ">鮮魚 | 白身魚</a>
        <h3 class="title m-t-b-10">真鯛</h3>
        </div>
        <a href="{{ url('/product') }}" class="txt m-b-10 description">
        たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
        </a>
        <div class="d-flex card-btn m-t-10">
        <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
        <a href="#" class="product-btn w-100"><i class="fa-solid fa-bookmark"></i></a>
        </div>
      </div>
      </div>
      <div class="item-card">
      <a href="{{ url('/product') }}" class="right">
        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
      </a>
      <div class="left">
        <p class="price m-t-b-10">¥1000</p>
        <div class="title-category">
        <a href="" class="menu-category ">鮮魚 | 白身魚</a>
        <h3 class="title m-t-b-10">真鯛</h3>
        </div>
        <a href="{{ url('/product') }}" class="txt m-b-10 description">
        たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
        </a>
        <div class="d-flex card-btn m-t-10">
        <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
        <a href="#" class="product-btn w-100"><i class="fa-solid fa-bookmark"></i></a>
        </div>
      </div>
      </div>
      <div class="item-card">
      <a href="{{ url('/product') }}" class="right">
        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
      </a>
      <div class="left">
        <p class="price m-t-b-10">¥1000</p>
        <div class="title-category">
        <a href="" class="menu-category ">鮮魚 | 白身魚</a>
        <h3 class="title m-t-b-10">真鯛</h3>
        </div>
        <a href="{{ url('/product') }}" class="txt m-b-10 description">
        たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
        </a>
        <div class="d-flex card-btn m-t-10">
        <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
        <a href="#" class="product-btn w-100"><i class="fa-solid fa-bookmark"></i></a>
        </div>
      </div>
      </div>
      <div class="item-card">
      <a href="{{ url('/product') }}" class="right">
        <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
      </a>
      <div class="left">
        <p class="price m-t-b-10">¥1000</p>
        <div class="title-category">
        <a href="" class="menu-category ">鮮魚 | 白身魚</a>
        <h3 class="title m-t-b-10">真鯛</h3>
        </div>
        <a href="{{ url('/product') }}" class="txt m-b-10 description">
        たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
        </a>
        <div class="d-flex card-btn m-t-10">
        <!-- <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a> -->
        <a href="#" class="product-btn w-100"><i class="fa-solid fa-bookmark"></i></a>
        </div>
      </div>
      </div>
    </div>

    <div class="row mt-4">
      <ul class="pagination">
      <li>&lt;</li>
      <li>1</li>
      <li class="active">2</li>
      <li>3</li>
      <li>4</li>
      <li>&gt;</li>
      </ul>
    </div>
    </div>
  </section>
  <!-- /Product Section -->

  <script src="{{ asset('assets/js/view-list.js') }}"></script>
  <script src="{{ asset('assets/js/words-limit.js') }}"></script>
  <script src="{{ asset('assets/js/profile-seller.js') }}"></script>
@endsection