@extends('includes.layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/profile_seller.css') }}" />
@endsection
@section('contents')
    <!-- Breadcrumbs -->
    <section class="mt-2">
        <div class="container-custom">
            <nav aria-label="breadcrumb" class="py-4">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- /Breadcrumbs -->

    <!-- Profile Section -->
    <section>
        <div class="profile_seller container-custom">
            <div class="row">
                <!-- Profile Side -->
                <div class="col-12 col-lg-7 h-100 profile-side">
                    <div class="d-md-flex gap-3">
                        <!-- Profile Info -->
                        <form action="#" class="w-100 profile-form d-flex flex-column">
                            <!-- Form Headline -->
                            <div class="bg-primary text-white p-2">
                                <h2 class="fw-bold d-flex justify-content-between">Shop Info
                                    <div class="d-flex justify-content-end gap-4">
                                        <button type="submit" class="save">
                                            <i class="fa-solid fa-save fs-5 text-white"></i>
                                        </button>
                                        <button class="edit">
                                            <i class="fa-solid fa-pen-to-square fs-5 text-white"></i>
                                        </button>
                                        <button class="cancel">
                                            <i class="fa-solid fa-x fs-5 text-white"></i>
                                        </button>
                                    </div>
                                </h2>
                            </div>
                            <!-- /Form Headline -->

                            <!-- Form Content -->
                            <div class="px-2 py-3">
                                <!-- user name -->
                                <div class="d-flex align-items-center">
                                    <label class="w-25" for="name">Name</label>:
                                    <input type="text" class="p-1 mt-1 ms-1 rounded-1" id="name"
                                        value="{{ $user->username }}" readonly>
                                </div>

                                <!-- email link -->
                                <div class="d-flex align-items-center">
                                    <label class="w-25" for="email">Email</label>:
                                    <input type="email" class="p-1 mt-2 ms-1 rounded-1" id="email"
                                        value="{{ $user->email }}" readonly>
                                </div>

                                <!-- organization link -->
                                <div class="d-flex align-items-center">
                                    <label class="w-25" for="organize">Organize</label>:
                                    <input type="text" class="p-1 mt-2 ms-1 rounded-1" id="organize"
                                        value="Chat with name or Organization name" readonly>
                                </div>

                                <!-- account checkbox -->
                                <div class="mt-2">
                                    <ul class="d-flex gap-4 checkbox-list-on">
                                        <li>
                                            <div class="form-group d-flex flex-column gap-1">
                                                <label for="">
                                                    <i class="fa-brands fa-line fs-2 mt-1"></i>
                                                </label>
                                                <div class="form-check form-switch align-self-center">
                                                    <input type="checkbox" class="border form-check-input" role="switch" />
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-group d-flex flex-column gap-1">
                                                <label for="">
                                                    <i class="fa-brands fa-facebook fs-2 mt-1"></i>
                                                </label>
                                                <div class="form-check form-switch align-self-center">
                                                    <input type="checkbox" class="border form-check-input" role="switch" />
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-group d-flex flex-column gap-1">
                                                <label for="">
                                                    <i class="fa-brands fa-google fs-2 mt-1"></i>
                                                </label>
                                                <div class="form-check form-switch align-self-center">
                                                    <input type="checkbox" class="border form-check-input" role="switch" />
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Form Content -->

                            <!-- alert box -->
                            <button class="mt-auto" data-bs-toggle="modal" data-bs-target="#modal_dialog"
                                onclick="event.preventDefault()">
                                <div class="alert alert-warning d-flex mb-0" role="alert">
                                    <i class="fa-solid fa-triangle-exclamation bi flex-shrink-0 me-2 mt-1" role="img"
                                        aria-label="Warning:"></i>
                                    <div class="text-start">
                                        Your account has not been verified. Please complete the verification process.
                                    </div>
                                </div>
                            </button>
                        </form>
                        <!-- /Profile Info -->

                        <!-- Form Modal -->
                        <div class="modal fade" id="modal_dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content bg-white">
                                    <!-- Modal Header -->
                                    <div class="modal-header text-white bg-primary p-3">
                                        <h2>Verify Your Account</h2>
                                    </div>
                                    <!-- /Modal Header -->

                                    <!-- Modal Body -->
                                    <div class="row modal-body p-3">
                                        <div class="col-12 col-md-6">
                                            <form method="POST" name="shopRequestForm" id="shopRequestForm" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-2 row align-items-center">
                                                    <div class="col-lg-5 col-12">
                                                        <label for="exampleFormControlInput1" class="col-form-label">Shop
                                                            Name</label>
                                                    </div>
                                                    <div class="col-lg-7 col-12">
                                                        <input type="text" name="shop_name" class="form-control"
                                                            id="exampleFormControlInput1">
                                                    </div>
                                                </div>
                                                <div class="mb-2 row align-items-center">
                                                    <div class="col-lg-5 col-12">
                                                        <label for="exampleFormControlInput1" class="col-form-label">Trans
                                                            Management</label>
                                                    </div>
                                                    <div class="col-lg-7 col-12">
                                                        <input type="text" name="trans_management" class="form-control"
                                                            id="exampleFormControlInput1">
                                                    </div>
                                                </div>
                                                <div class="mb-2 row align-items-center">
                                                    <div class="col-lg-5 col-12">
                                                        <label for="exampleFormControlInput1"
                                                            class="col-form-label">Email</label>
                                                    </div>
                                                    <div class="col-lg-7 col-12">
                                                        <input type="email" name="email" class="form-control"
                                                            id="exampleFormControlInput1">
                                                    </div>
                                                </div>
                                                <div class="mb-2 row align-items-center">
                                                    <div class="col-lg-5 col-12">
                                                        <label for="exampleFormControlInput1"  class="col-form-label">Phone
                                                            Number</label>
                                                    </div>
                                                    <div class="col-lg-7 col-12">
                                                        <input type="tel" name="phone" class="form-control"
                                                            id="exampleFormControlInput1">
                                                    </div>
                                                </div>
                                                <div class="mb-2 row align-items-center">
                                                    <div class="col-lg-5 col-12">
                                                        <label for="exampleFormControlInput1"
                                                            class="col-form-label">Upload Your Shop</label>
                                                    </div>
                                                    <div class="col-lg-7 col-12">
                                                        <input type="file" name="avatar" class="form-control"
                                                            id="exampleFormControlInput1">
                                                    </div>
                                                </div>

                                        </div>

                                        <!-- Qr -->
                                        <div class="col-12 col-md-6">
                                            <div class="border h-100 d-flex flex-column justify-content-between">
                                                <div class="w-100 qr-box mx-auto">
                                                    <img src="{{ asset('assets/images/QR.svg') }}" alt="">
                                                </div>
                                                <p class="w-auto px-2 py-3 bg-primary text-center text-white">
                                                    Scan QR Code.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Modal Body -->

                                    <!-- Modal Footer -->
                                    <div class="modal-footer">
                                        <button class="common-btn" data-bs-dismiss="modal">Close</button>
                                        <button class="common-btn">Request</button>
                                    </div>
                                </form>
                                    <!-- /Modal Footer -->
                                </div>
                            </div>
                        </div>
                        <!-- /Form Modal -->
                    </div>

                    <!-- Detail Info -->
                    <form action="#" class="w-100 mt-3 profile-form">
                        <!-- Form Headline -->
                        <div>
                            <h2 class="fw-bold d-flex justify-content-between bg-primary text-white p-2">
                                Detail Personal Info
                                <!-- button group -->
                                <div class="d-flex justify-content-end gap-4">
                                    <button type="submit" class="save">
                                        <i class="fa-solid fa-save fs-5 text-white"></i>
                                    </button>
                                    <button class="edit">
                                        <i class="fa-solid fa-pen-to-square fs-5 text-white"></i>
                                    </button>
                                    <button class="cancel">
                                        <i class="fa-solid fa-x fs-5 text-white"></i>
                                    </button>
                                </div>
                            </h2>
                        </div>
                        <!-- /Form Headline -->

                        <!-- Form Content -->
                        <div class="px-2 py-3">

                            <!-- address -->
                            <div class="d-flex align-items-center">
                                <label class="w-25" for="address">Address</label>:
                                <input type="text" class="p-1 mt-2 ms-1 rounded-1" id="address"
                                    value="house no street,sue distict,city" readonly>
                                <span class="invalid-feedback"></span>
                            </div>

                            <!-- phone-number link -->
                            <div class="d-flex align-items-start">
                                <label class="w-25" for="tel">Phone No.</label>:
                                <div class="ms-1 d-flex phone-no-container">
                                    <!-- <a href="tel:"> -->
                                    <input type="tel" class="p-1 mt-2 rounded-1" id="first_phone"
                                        value="{{ $user->first_phone }}" readonly>

                                    <!-- </a> -->
                                    <b class="cor align-content-end">, </b>
                                    <!-- <a href="tel:"> -->
                                    <input type="tel" class="p-1 mt-2 rounded-1" value="{{ $user->second_phone }}"
                                        id="second_phone" readonly>
                                    <span class="invalid-feedback"></span>
                                    <!-- </a> -->
                                </div>
                            </div>

                        </div>
                        <!-- /Form Content -->

                    </form>
                    <!-- /Detail Info -->

                    <!-- button group -->
                    <div class="buttons d-flex gap-2 mt-3">
                        <button class="common-btn">Upload product</button>
                        <button class="common-btn">Check Order Status</button>
                    </div>

                </div>
                <!-- /Profile Side -->

                <!-- Map Side -->
                <div class="col-12 col-lg-5 mt-3 mt-lg-0 map-side">

                    <!-- Map Side -->
                    <div class="h-100 d-flex flex-column gap-4">
                        <h2 class="fw-bold bg-primary text-white p-2">Shop Location</h2>
                        <iframe class="w-100 border-0 h-100 shop-location"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d250151.16276620553!2d104.72537013378734!3d11.579654014369655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109513dc76a6be3%3A0x9c010ee85ab525bb!2sPhnom%20Penh%2C%20Cambodia!5e0!3m2!1sen!2ssg!4v1736774811619!5m2!1sen!2ssg"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <!-- /Map-->

                </div>
                <!-- /Map Side -->

            </div>

        </div>
    </section>
    <!-- /Profile Section -->

    <!-- Product Section -->
    <section class="discount-products bg-second py-4 mt-5">
        <div class="container-custom">
            <div>

                <h6 class="txt-primary fw-bold mb-3">Discount Products</h6>
                <div class="filter d-flex justify-content-between align-items-center mb-3">

                    <!-- display -->
                    <div class="icon-buttons txt-primary d-flex gap-3 align-items-center">
                        <i class="fa-solid fa-grip fs-2 fw-bold" id="card-list-btn"></i>
                        <i class="fa-solid fa-list fs-3 fw-bold" id="row-list-btn"></i>
                    </div>

                    <!-- sorting -->
                    <div class="sort-container">
                        <div class="arrows">
                            <button><i class="fa-solid fa-caret-up"></i></button>
                            <button><i class="fa-solid fa-caret-down"></i></button>
                        </div>
                        <div class="dropdown">
                            <button class="sort-button dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Sort by</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
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

    <!-- All Scripts -->
    <script src="{{ asset('assets/js/view-list.js') }}"></script>
    <script src="{{ asset('assets/js/words-limit.js') }}"></script>
    <script src="{{ asset('assets/js/profile-seller.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#shopRequestForm').on('submit', function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                console.log(formData);
                $.ajax({
                    url: "{{ route('seller.request-shop') }}",
                    type: "POST",
                    data: formData,
                    // processData: false,
                    // contentType: false,
                    // beforeSend: function () {
                    //     $('.common-btn[type="submit"]').text('Submitting...').prop('disabled', true);
                    // },
                    success: function (response) {
                        // alert(response.message);
                        // $('#shopRequestForm')[0].reset(); // Reset form after successful submission
                        // $('.common-btn[type="submit"]').text('Request').prop('disabled', false);
                    },
                    error: function (xhr) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';

                        $.each(errors, function (key, value) {
                            errorMessage += value[0] + '\n';
                        });

                        alert(errorMessage);
                        // $('.common-btn[type="submit"]').text('Request').prop('disabled', false);
                    }
                });
            });
        });
    </script>
    <!-- /All Scripts -->
@endsection
