@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/category.css') }}" />
@endsection
@section('contents')
<div class="wpr row">
  <!-- aside start -->
  <div class="side-menu col-4">
    @include('includes.aside')
  </div>
  <!-- aside end -->

  <!-- category list start -->
  <div class="category col-8">
    <ul class="list-group category-list">
      <li class="d-flex flex-column">
        <div class="card-head">
          <h2 class="title">Sub Categorie Name</h2>
          <div class="top-bar d-flex justify-content-between">
            <div>
              <button class="btn" id="card-list-btn"><i class="fa-solid fa-th-large"></i></button>
              <button class="btn" id="row-list-btn"><i class="fa-solid fa-list"></i></button>
            </div>
            <div>
              <button class="btn"><i class="fa-solid fa-sort"></i></button>
              <button class="btn btn-primary sort">Sort by</button>
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
        <!-- card items list end -->
        <div class="see-more-box d-flex m-t-b-20 justify-content-center justify-content-lg-end">
          <a href="{{ url('/sub-category') }}" class="common-btn">See More</a>
        </div>
      </li>

      <li class="d-flex flex-column">
        <div class="card-head">
          <h2 class="title">Sub Categorie Name</h2>
          <div class="top-bar d-flex justify-content-between">
            <div>
              <button class="btn" id="card-list-btn"><i class="fa-solid fa-th-large"></i></button>
              <button class="btn" id="row-list-btn"><i class="fa-solid fa-list"></i></button>
            </div>
            <div>
              <button class="btn"><i class="fa-solid fa-sort"></i></button>
              <button class="btn btn-primary sort">Sort by</button>
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
        <!-- card items list end -->
        <div class="see-more-box d-flex m-t-b-20 justify-content-center justify-content-lg-end">
          <a href="{{ url('/sub-category') }}" class="common-btn">See More</a>
        </div>
      </li>

      <li class="d-flex flex-column">
        <div class="card-head">
          <h2 class="title">Sub Categorie Name</h2>
          <div class="top-bar d-flex justify-content-between">
            <div>
              <button class="btn" id="card-list-btn"><i class="fa-solid fa-th-large"></i></button>
              <button class="btn" id="row-list-btn"><i class="fa-solid fa-list"></i></button>
            </div>
            <div>
              <button class="btn"><i class="fa-solid fa-sort"></i></button>
              <button class="btn btn-primary sort">Sort by</button>
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
        <!-- card items list end -->
        <div class="see-more-box d-flex m-t-b-20 justify-content-center justify-content-lg-end">
          <a href="{{ url('/sub-category') }}" class="common-btn">See More</a>
        </div>
      </li>

      <li class="d-flex flex-column">
        <div class="card-head">
          <h2 class="title">Sub Categorie Name</h2>
          <div class="top-bar d-flex justify-content-between">
            <div>
              <button class="btn" id="card-list-btn"><i class="fa-solid fa-th-large"></i></button>
              <button class="btn" id="row-list-btn"><i class="fa-solid fa-list"></i></button>
            </div>
            <div>
              <button class="btn"><i class="fa-solid fa-sort"></i></button>
              <button class="btn btn-primary sort">Sort by</button>
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
        <!-- card items list end -->
        <div class="see-more-box d-flex m-t-b-20 justify-content-center justify-content-lg-end">
          <a href="{{ url('/sub-category') }}" class="common-btn">See More</a>
        </div>
      </li>

    </ul>
  </div>
  <!-- category list end -->
</div>

<script src="{{ asset('assets/js/view-list.js') }}"></script>
@endsection