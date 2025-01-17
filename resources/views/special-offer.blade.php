@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/category.css') }}" />
@endsection
@section('contents')
<div class="wpr row">
  <!-- aside start -->
  <div class="side-menu col-3">
    <ul class="list-group">
      <li><a href="">鮮魚 (1134)</a></li>
      <li><a href="">マグロ (188)</a></li>
      <li><a href="">貝類 (322)</a></li>
      <li><a href="">エビ・カニ (321)</a></li>
      <li><a href="">イカ・タコ (190)</a></li>
      <li><a href="">ウニ・イクラ・白子・魚卵 (119)</a></li>
      <li><a href="">海藻・干物・漬魚・ちりめん・練物類 (401)</a></li>
      <li><a href="">珍味・惣菜・漬物 (440)</a></li>
      <li><a href="">調味料・わさび・飾り物 (202)</a></li>
    </ul>
    <div class="d-flex">
      <a href="" class="see-product">See more Product</a>
    </div>
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
@endsection