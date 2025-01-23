@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
<link rel="stylesheet" href="{{asset('assets/css/category.css')}}">
@endsection

@section('contents')

@include('includes.aside')

<section class="m-t-b-20 moving-discount">
    <div id="moving-text">
        <p class="title">Discount Products</p>
        <p class="title">Discount Products</p>
        <p class="title">Discount Products</p>
        <p class="title">Discount Products</p>
        <p class="title">Discount Products</p>
    </div>
</section>

<section class="popular_top_rate_shop_section mt-3 container-custom">
        <h6 class="txt-primary fw-bold mb-3">Popular & Top Rating Shop</h6>
        <div class="row shop-carts">
            <div class="col-6 col-md-6 col-lg-3 mb-3">
                <div class="card rounded-4 overflow-hidden w-100" style="width: 15rem">
                    <img src="{{ asset('assets/images/fishes/Rectangle 92 (3).png') }}" class="card-img-top" alt="..." />
                    <div class="card-body bg-main">
                        <p class="card-text text-center text-white">Shop Name</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3 mb-3">
                <div class="card rounded-4 overflow-hidden w-100" style="width: 15rem">
                    <img src="{{ asset('assets/images/fishes/Rectangle 92 (2).png') }}" class="card-img-top" alt="..." />
                    <div class="card-body bg-main">
                        <p class="card-text text-center text-white">Shop Name</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3 mb-3">
                <div class="card rounded-4 overflow-hidden w-100" style="width: 15rem">
                    <img src="{{ asset('assets/images/fishes/Rectangle 92 (1).png') }}" class="card-img-top" alt="..." />
                    <div class="card-body bg-main">
                        <p class="card-text text-center text-white">Shop Name</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3 mb-3">
                <div class="card rounded-4 overflow-hidden w-100" style="width: 15rem">
                    <img src="{{ asset('assets/images/fishes/Rectangle 92.png') }}" class="card-img-top" alt="..." />
                    <div class="card-body bg-main">
                        <p class="card-text text-center text-white">Shop Name</p>
                    </div>
                </div>
            </div>
        </div>
</section>


<section class="discount-products bg-second py-4 container-custom">
    <h6 class="txt-primary fw-bold mb-3">Discount Products</h6>
    <div class="filter d-flex justify-content-between align-items-center mb-3">
        <div class="icon-buttons txt-primary d-flex gap-3 align-items-center">
            <i class="fa-solid fa-grip fs-2 fw-bold" id="gridView"></i>
            <i class="fa-solid fa-list fs-3 fw-bold" id="listView"></i>
        </div>
        <div class="sort-container">
            <div class="arrows">
                <i class="fa-solid fa-caret-up"></i>
                <i class="fa-solid fa-caret-down"></i>
            </div>
            <button class="sort-button">Sort by</button>
        </div>
    </div>

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
            <!-- <div class="item-card">
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
            </div> -->
    </div>

    <div class="row justify-content-center">
        <div class="col-5 col-lg-3 text-center">
            <button class="btn btn-outline-primary see-more-btn mt-3" id="load-more">
                See More
            </button>
        </div>
    </div>
</section>

<script>
    document.getElementById('gridView').addEventListener('click', function() {
        
        
    });

    document.getElementById('listView').addEventListener('click', function() {
       
    });
</script>

<style>
    /* .grid-view .item-card {
        display: inline-block;
        width: 48%;
        margin: 1%;
    }

    .list-view .item-card {
        display: block;
        width: 100%;
    } */
</style>





    <section class="all-products container-custom my-3">
            <h6 class="txt-primary fw-bold mb-3">All Products</h6>
            <div class="filter d-flex justify-content-between align-items-center mb-3">
                <div class="icon-buttons txt-primary d-flex gap-3 align-items-center">
                    <i class="fa-solid fa-grip fs-2 fw-bold" id="gridView"></i>
                    <i class="fa-solid fa-list fs-3 fw-bold" id="listView"></i>
                </div>
                <div class="sort-container">
                    <div class="arrows">
                        <i class="fa-solid fa-caret-up"></i>
                        <i class="fa-solid fa-caret-down"></i>
                    </div>
                    <button class="sort-button">Sort by</button>
                </div>
            </div>
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
            </div>
            <div class="row justify-content-center">
        <div class="col-5 col-lg-3 text-center">
            <button class="btn btn-outline-primary see-more-btn mt-3" id="load-more">
                Load More
            </button>
        </div>
    </div>
    </section>
    @endsection
