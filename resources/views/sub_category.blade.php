@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/sub_category.css') }}" />
@endsection
@section('contents')
<div class="container-custom">
  <div class="hero-section d-flex justify-content-center">
    <div class="side-menu col-3">
      @include('includes.aside')
    </div>
    <div class="slider-hero col-9">
      @include('includes.slider')
    </div>
  </div>
  <nav aria-label="breadcrumb" class="py-4">
    <div class="container">
      <ol class="breadcrumb mb-0 bg-transparent">
        <li class="breadcrumb-item"><a href="./home.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Support</li>
      </ol>
    </div>
  </nav>
  <div class="sub-category">
    <h3 class="title text-center m-b-20">Category Name</h3>
    <div class="top-bar d-flex justify-content-between">
      <div>
        <button class="btn" id="card-list-btn"><i class="fa-solid fa-th-large"></i></button>
        <button class="btn" id="row-list-btn"><i class="fa-solid fa-list"></i></button>
      </div>
      <div class="m-b-20">
        <div class="range-slider">
          <input type="number" class="min-price" value="25" min="1" max="100">
          <h3 class="txt">Price Range</h3>
          <input type="number" class="max-price" value="75" min="1" max="100">
          <div class="range">
            <input type="range" class="min-input" value="25" min="1" max="100">
            <input type="range" class="max-input" value="75" min="1" max="100">

            <div class="price-slider">
              <div class="prograss"></div>
            </div>
          </div>
        </div>
        <button class="btn"><i class="fa-solid fa-sort"></i></button>
        <button class="btn btn-primary sort">Sort by</button>
      </div>
    </div>
    <div class="sub-category-item">
      <div class="card-list" id="view-list">
        <div class="item-card">
          <a href="{{ url('/product') }}" class="right">
            <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
          </a>
          <div class="left">
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
            <p class="price m-t-b-10">$10</p>
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
      <div class="pagination" id="pagination"></div>
  </div>
</div>

<script src="{{asset('assets/js/slider.js')}}"></script>
<script src="{{asset('assets/js/price-range.js')}}"></script>
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

@endsection