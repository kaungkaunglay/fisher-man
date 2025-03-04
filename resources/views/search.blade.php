@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/category.css') }}" />
@endsection
@section('contents')
<div class="wpr row">
  <!-- Breadcrumbs -->
  <nav aria-label="breadcrumb" class="py-4">
    <ol class="breadcrumb mb-0 bg-transparent">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Search</li>
    </ol>
  </nav>
  <!-- ./Breadcrumbs -->
  <!-- aside start -->
  <div class="side-menu col-4">
    @include('includes.aside')
  </div>
  <!-- aside end -->

  <!-- category list start -->
  <div class="category col-8 mb-3">
    <ul class="list-group category-list">
      <li class="d-flex flex-column">
        <div class="card-head">
          <h2 class="title">Search</h2>
          <div class="filter d-flex justify-content-between align-items-center">
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
                <button class="sort-button dropdown-toggle" type="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
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
        </div>

        <!-- card itmes list start -->

        <div class="card-list" id="view-list">
          <div class="item-card">
            <a href="{{ url('/product') }}" class="right">
              <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
            </a>
            <div class="left">
              <p class="price m-t-b-10">¥1000</p>
              <div class="title-category">
                <a href="{{ route('sub-category.show', $product->subCategory->id) }}" class="menu-category">{{ $product->subCategory->name }}</a>
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
                <a href="{{ route('sub-category.show', $product->subCategory->id) }}" class="menu-category">{{ $product->subCategory->name }}</a>
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
                <a href="{{ route('sub-category.show', $product->subCategory->id) }}" class="menu-category">{{ $product->subCategory->name }}</a>
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
                <a href="{{ route('sub-category.show', $product->subCategory->id) }}" class="menu-category">{{ $product->subCategory->name }}</a>
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
                <a href="{{ route('sub-category.show', $product->subCategory->id) }}" class="menu-category">{{ $product->subCategory->name }}</a>
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
                <a href="{{ route('sub-category.show', $product->subCategory->id) }}" class="menu-category">{{ $product->subCategory->name }}</a>
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
                <a href="{{ route('sub-category.show', $product->subCategory->id) }}" class="menu-category">{{ $product->subCategory->name }}</a>
                <h3 class="title m-t-b-10">真鯛</h3>
              </div>
              <a href="{{ url('/product') }}" class="txt m-b-10 description description">
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
                <a href="{{ route('sub-category.show', $product->subCategory->id) }}" class="menu-category">{{ $product->subCategory->name }}</a>
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
                <a href="{{ route('sub-category.show', $product->subCategory->id) }}" class="menu-category">{{ $product->subCategory->name }}</a>
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
                <a href="{{ route('sub-category.show', $product->subCategory->id) }}" class="menu-category">{{ $product->subCategory->name }}</a>
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
                <a href="{{ route('sub-category.show', $product->subCategory->id) }}" class="menu-category">{{ $product->subCategory->name }}</a>
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
                <a href="{{ route('sub-category.show', $product->subCategory->id) }}" class="menu-category">{{ $product->subCategory->name }}</a>
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
  </div>

  <!-- card items list end -->
  <!-- <div class="see-more-box d-flex m-t-b-20 justify-content-center justify-content-lg-end">
          <a href="{{ url('/sub-category') }}" class="common-btn">See More</a>
        </div> -->
  </li>
  </ul>
</div>
<!-- category list end -->
</div>
<!-- category list end -->
</div>

<script defer src="{{ asset('assets/js/view-list.js') }}"></script>
<script defer src="{{ asset('assets/js/words-limit.js') }}"></script>
@endsection