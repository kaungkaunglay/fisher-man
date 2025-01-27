@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/category.css') }}" />
@endsection
@section('contents')
<div class="container-custom">
<nav aria-label="breadcrumb" class="py-4">
        <div class="container">
            <ol class="breadcrumb mb-0 bg-transparent">
                <li class="breadcrumb-item"><a href="./home.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Support</li>
            </ol>
        </div>
    </nav>
<div class="row">
  <!-- aside start -->
  <div class="side-menu col-4">
    @include('includes.aside')
  </div>
  <!-- aside end -->

  <!-- category list start -->
  <div class="category col-9">
    <ul class="list-group category-list">
      <li class="d-flex flex-column">
        <div class="card-head">
          <h2 class="title">Sub Categorie Name</h2>
          <div class="top-bar d-flex justify-content-between">
            <div>
              <button class="btn"><i class="fa-solid fa-th-large"></i></button>
              <button class="btn"><i class="fa-solid fa-list"></i></button>
            </div>
            <div>
              <button class="btn"><i class="fa-solid fa-sort"></i></button>
              <button class="btn btn-primary sort">Sort by</button>
            </div>
          </div>
        </div>

        <!-- card itmes list start -->
        <div class="card-list d-flex">
          <div class="card">
            <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
            <div class="card-body">
              <p class="fish-price">$10</p>
              <p class="fish-category">鮮魚|白身魚</p>
              <h3 class="fish-name">真鯛</h3>
              <p class="fish-text">
                A prized sea bream in Japanese cuisine, known for its firm, white flesh and delicate, slightly sweet
                flavor. Commonly used in sashimi, sushi, and grilled dishes .....
              </p>
              <div class="d-flex card-btn">
                <button class="btn btn-outline-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                <button class="btn btn-outline-primary"><i class="fa-solid fa-bookmark"></i></button>
              </div>
            </div>
          </div>

          <div class="card">
            <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
            <div class="card-body">
              <p class="fish-price">$10</p>
              <p class="fish-category">鮮魚|白身魚</p>
              <h3 class="fish-name">真鯛</h3>
              <p class="fish-text">
                A prized sea bream in Japanese cuisine, known for its firm, white flesh and delicate, slightly sweet
                flavor. Commonly used in sashimi, sushi, and grilled dishes .....
              </p>
              <div class="d-flex card-btn">
                <button class="btn btn-outline-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                <button class="btn btn-outline-primary"><i class="fa-solid fa-bookmark"></i></button>
              </div>
            </div>
          </div>

          <div class="card">
            <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
            <div class="card-body">
              <p class="fish-price">$10</p>
              <p class="fish-category">鮮魚|白身魚</p>
              <h3 class="fish-name">真鯛</h3>
              <p class="fish-text">
                A prized sea bream in Japanese cuisine, known for its firm, white flesh and delicate, slightly sweet
                flavor. Commonly used in sashimi, sushi, and grilled dishes .....
              </p>
              <div class="d-flex card-btn">
                <button class="btn btn-outline-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                <button class="btn btn-outline-primary"><i class="fa-solid fa-bookmark"></i></button>
              </div>
            </div>
          </div>

          <div class="card">
            <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
            <div class="card-body">
              <p class="fish-price">$10</p>
              <p class="fish-category">鮮魚|白身魚</p>
              <h3 class="fish-name">真鯛</h3>
              <p class="fish-text">
                A prized sea bream in Japanese cuisine, known for its firm, white flesh and delicate, slightly sweet
                flavor. Commonly used in sashimi, sushi, and grilled dishes .....
              </p>
              <div class="d-flex card-btn">
                <button class="btn btn-outline-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                <button class="btn btn-outline-primary"><i class="fa-solid fa-bookmark"></i></button>
              </div>
            </div>
          </div>

          <div class="card">
            <img src="../../assets/images/fishes/Red_sea_bream.svg" class="card-img-top" alt="Red_sea_bream">
            <div class="card-body">
              <p class="fish-price">$10</p>
              <p class="fish-category">鮮魚|白身魚</p>
              <h3 class="fish-name">真鯛</h3>
              <p class="fish-text">
                A prized sea bream in Japanese cuisine, known for its firm, white flesh and delicate, slightly sweet
                flavor. Commonly used in sashimi, sushi, and grilled dishes .....
              </p>
              <div class="d-flex card-btn">
                <button class="btn btn-outline-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                <button class="btn btn-outline-primary"><i class="fa-solid fa-bookmark"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- card items list end -->
        <div class="see-more-box d-flex">
          <button class="see-more btn btn-outline-primary">See more</button>
        </div>
      </li>
    </ul>
  </div>
  <!-- category list end -->
</div>
</div>

@endsection