@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/sub_category.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
@endsection
@section('contents')

<section class="hero mt-5 container-custom">
    <div class="row justify-content-between">
        <div class="col-lg-4 col-md-6 d-none d-lg-block">
            @include('includes.aside')
        </div>
        <div class="col-lg-8 col-md-12">
            @include('includes.slider')
        </div>
    </div>
</section>
<div class="container-custom">
  <nav aria-label="breadcrumb" class="py-4">
      <ol class="breadcrumb mb-0 bg-transparent">
        <li class="breadcrumb-item"><a href="./home.html">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="">Categories</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="">イカ</a></li>
      </ol>
  </nav>
  <div class="sub-category mb-3">
    <h3 class="title text-center m-b-20">Category Name</h3>
    <div class="filter d-flex justify-content-between align-items-center mb-3">
        <div class="icon-buttons txt-primary d-flex gap-3 align-items-center">
            <i class="fa-solid fa-grip fs-2 fw-bold" id="card-list-btn"></i>
            <i class="fa-solid fa-list fs-3 fw-bold" id="row-list-btn"></i>
        </div>
        <div class="range-slider">
          <input type="number" class="min-price" value="1" min="1" max="100">
          <h3 class="txt">Price Range</h3>
          <input type="number" class="max-price" value="25" min="1" max="100">
          <div class="range">
            <input type="range" class="min-input" value="1" min="1" max="100">
            <input type="range" class="max-input" value="25" min="1" max="100">

            <div class="price-slider">
              <div class="prograss"></div>
            </div>
          </div>
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
  
    <div class="sub-category-item">
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
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
            <a href="{{ url('/product') }}" class="txt m-b-10">
              たい科の代表的な魚。大形、桜色で緑色の斑点(はんてん)がある.....
            </a>
            <div class="d-flex card-btn m-t-10">
              <a href="#" class="product-btn"><i class="fa-solid fa-cart-shopping"></i></a>
              <a href="#" class="product-btn"><i class="fa-solid fa-bookmark"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Pagination -->
      <div class="pagination mt-2" id="pagination"></div>
      <!-- <div id="pagination-controls" class="pagination-controls text-center m-b-20"></div> -->
  </div>
</div>

<script src="{{asset('assets/js/slider.js')}}"></script>
<script src="{{asset('assets/js/price-range.js')}}"></script>
<script src="{{asset('assets/js/pagination.js')}}"></script>
<script>
 const itemsPerPage = 24;
  const items = document.querySelectorAll(".item-card");
  const pagination = document.getElementById("pagination");

  const totalPages = Math.ceil(items.length / itemsPerPage);

  function showPage(page) {
    const start = (page - 1) * itemsPerPage;
    const end = start + itemsPerPage;

    items.forEach((item, index) => {
      item.style.display = index >= start && index < end ? "block" : "none";
    });

    // Update active pagination button
    document.querySelectorAll(".page-link").forEach((link) => {
      link.classList.remove("active");
    });
    document.getElementById(`page-${page}`).classList.add("active");
  }

  function createPagination() {
    for (let i = 1; i <= totalPages; i++) {
      const pageButton = document.createElement("a");
      pageButton.href = "#";
      pageButton.id = `page-${i}`;
      pageButton.innerText = i;
      pageButton.className = "page-link";
      pageButton.addEventListener("click", (e) => {
        e.preventDefault();
        showPage(i);
      });
      pagination.appendChild(pageButton);
    }

    // Add navigation arrows
    const prev = document.createElement("a");
    prev.href = "#";
    prev.innerHTML = "&lt;";
    prev.addEventListener("click", (e) => {
      e.preventDefault();
      const activePage = document.querySelector(".page-link.active");
      const prevPage = Math.max(1, parseInt(activePage.id.split("-")[1]) - 1);
      showPage(prevPage);
    });
    pagination.insertBefore(prev, pagination.firstChild);

    const next = document.createElement("a");
    next.href = "#";
    next.innerHTML = "&gt;";
    next.addEventListener("click", (e) => {
      e.preventDefault();
      const activePage = document.querySelector(".page-link.active");
      const nextPage = Math.min(totalPages, parseInt(activePage.id.split("-")[1]) + 1);
      showPage(nextPage);
    });
    pagination.appendChild(next);
  }

  // Initialize
  createPagination();
  showPage(1);
</script>

<script src="{{ asset('assets/js/view-list.js') }}"></script>

@endsection