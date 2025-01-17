@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/sub_category.css') }}" />
@endsection
@section('contents')
<div class="m-x30 my-4">
  <div class="row justify-content-between">
    <div class="col-lg-4 col-md-6 d-none d-md-block">
      <ul class="sidebar-menu rounded h-100 txt-primary">
        <li>鮮魚 (1134)</li>
        <li>マグロ (188)</li>
        <li>貝類 (322)</li>
        <li>エビ・カニ (321)</li>
        <li>イカ・タコ (190)</li>
        <li>ウニ・イクラ・白子・魚卵 (119)</li>
        <li>海藻・干物・漬魚・ちりめん・練物類 (401)</li>
        <li>珍味・惣菜・漬物 (440)</li>
        <li>調味料・わさび・飾り物 (202)</li>
        <a href="" class="txt-primary mt-3"
          >&lt;&lt; See more Product &gt;&gt;</a
        >
      </ul>
    </div>
    <div class="col-lg-8 col-md-6">
      <div id="carouselExample" class="carousel slide">
        <!-- Carousel Items -->
        <div class="carousel-inner rounded">
          <div class="carousel-item active">
            <img
              src="{{asset('assets/images/bg/fisher-bg.jpg')}}"
              class="d-block w-100"
              alt="Slide 1"
            />
          </div>
          <div class="carousel-item">
            <img
              src="{{asset('assets/images/bg/fisher-bg.jpg')}}"
              class="d-block w-100"
              alt="Slide 2"
            />
          </div>
          <div class="carousel-item">
            <img
              src="{{asset('assets/images/bg/fisher-bg.jpg')}}"
              class="d-block w-100"
              alt="Slide 3"
            />
          </div>
        </div>

        <!-- Circle Indicators -->
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>

        <!-- Carousel Controls -->
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExample"
          data-bs-slide="prev"
        >
          <span
            class="carousel-control-prev-icon"
            aria-hidden="true"
          ></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExample"
          data-bs-slide="next"
        >
          <span
            class="carousel-control-next-icon"
            aria-hidden="true"
          ></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
</div>
<div class="m-x30 px-3">
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Categories</a></li>
        <li class="breadcrumb-item"><a href="#">Data</a></li>
      </ol>
    </nav>
    <h5 class="text-center txt-primary fw-bold">Category Name</h5>
     
    <!-- product section start -->
    <section class="all-products my-4">
      
      <!-- filter section start -->
        <div class="filter d-flex justify-content-between align-items-center mb-4">
          <!-- <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grid-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-grid-2 fa-lg"><path fill="currentColor" d="M224 80c0-26.5-21.5-48-48-48L80 32C53.5 32 32 53.5 32 80l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96zm0 256c0-26.5-21.5-48-48-48l-96 0c-26.5 0-48 21.5-48 48l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96zM288 80l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96c0-26.5-21.5-48-48-48l-96 0c-26.5 0-48 21.5-48 48zM480 336c0-26.5-21.5-48-48-48l-96 0c-26.5 0-48 21.5-48 48l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96z" class=""></path></svg> -->
           <!-- list style start -->
          <div class="icon-buttons txt-primary d-flex gap-3 align-items-center">
            <i class="fa-solid fa-grip fs-2 fw-bold"></i>
            <i class="fa-solid fa-list fs-3 fw-bold"></i>
          </div>
          <!-- list style end -->


              <!-- price range start -->
            <div class="pr-container w-100 d-flex flex-column align-items-end  me-3 ">
              <div class="">
                  <label for="" class="txt-primary">Price Range</label>
                  <div class="price-range">
                     <div class="bar">
                         <div class="selected-range" style="left: 0%; width: 50%;"></div>
                         <div class="handle" id="minHandle" style="left: 0%;"></div>
                         <div class="handle" id="maxHandle" style="left: 50%;"></div>
                     </div>
                     <div class="price-labels">
                         <span class="min-price" id="minPrice">$100</span>
                         <span class="max-price" id="maxPrice">$1000</span>
                     </div>
                 </div>
              </div>
            </div>

           <!-- price range end -->

          <!-- sort button start -->
          <div class="sort-container bg-second ">
            <div class="arrows">
              <i class="fa-solid fa-caret-up"></i>
              <i class="fa-solid fa-caret-down"></i>
            </div>
            <button class="sort-button">Sort by</button>
          </div>   
      </div>
      <!-- filter section end -->

        <div class="row">
          <div class="col-6 col-md-4 col-lg-2">
            <div class="card-border-animate">
              <div class="card product-card rounded-0">
                  <div class="position-relative">
                    <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" class="card-img-top rounded-0" alt="Fish Image">
                    <!-- <span class="discount-badge text-danger">-50%</span> -->
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <!-- <span class="text-decoration-line-through text-danger text-opacity-50 ">$20</span> -->
                      <span class="text-danger fw-bold">$10</span>
                    </h5>
                    <p class="text-primary small mb-1">鮮魚 | 白身魚</p>
                    <h6 class="txt-primary fw-bold">真鯛</h6>
                    <p class="card-text text-muted">
                      A prized sea bream in Japanese cuisine, known for its firm, white flesh and delicate, slightly sweet flavor. Commonly used in sashimi, sushi, and grilled dishes ..... 
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button"><i class="fa-solid fa-cart-shopping"></i></button>
                      <button class="btn btn-outline-primary w-50" type="button"><i class="fa-solid fa-bookmark"></i></button>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-2">
            <div class="card-border-animate">
              <div class="card product-card rounded-0">
                  <div class="position-relative">
                    <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" class="card-img-top rounded-0" alt="Fish Image">
                    <!-- <span class="discount-badge text-danger">-50%</span> -->
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <!-- <span class="text-decoration-line-through text-danger text-opacity-50 ">$20</span> -->
                      <span class="text-danger fw-bold">$10</span>
                    </h5>
                    <p class="text-primary small mb-1">鮮魚 | 白身魚</p>
                    <h6 class="txt-primary fw-bold">真鯛</h6>
                    <p class="card-text text-muted">
                      A prized sea bream in Japanese cuisine, known for its firm, white flesh and delicate, slightly sweet flavor. Commonly used in sashimi, sushi, and grilled dishes ..... 
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button"><i class="fa-solid fa-cart-shopping"></i></button>
                      <button class="btn btn-outline-primary w-50" type="button"><i class="fa-solid fa-bookmark"></i></button>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-2">
            <div class="card-border-animate">
              <div class="card product-card rounded-0">
                  <div class="position-relative">
                    <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" class="card-img-top rounded-0" alt="Fish Image">
                    <!-- <span class="discount-badge text-danger">-50%</span> -->
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <!-- <span class="text-decoration-line-through text-danger text-opacity-50 ">$20</span> -->
                      <span class="text-danger fw-bold">$10</span>
                    </h5>
                    <p class="text-primary small mb-1">鮮魚 | 白身魚</p>
                    <h6 class="txt-primary fw-bold">真鯛</h6>
                    <p class="card-text text-muted">
                      A prized sea bream in Japanese cuisine, known for its firm, white flesh and delicate, slightly sweet flavor. Commonly used in sashimi, sushi, and grilled dishes ..... 
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button"><i class="fa-solid fa-cart-shopping"></i></button>
                      <button class="btn btn-outline-primary w-50" type="button"><i class="fa-solid fa-bookmark"></i></button>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-2">
            <div class="card-border-animate">
              <div class="card product-card rounded-0">
                  <div class="position-relative">
                    <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" class="card-img-top rounded-0" alt="Fish Image">
                    <!-- <span class="discount-badge text-danger">-50%</span> -->
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <!-- <span class="text-decoration-line-through text-danger text-opacity-50 ">$20</span> -->
                      <span class="text-danger fw-bold">$10</span>
                    </h5>
                    <p class="text-primary small mb-1">鮮魚 | 白身魚</p>
                    <h6 class="txt-primary fw-bold">真鯛</h6>
                    <p class="card-text text-muted">
                      A prized sea bream in Japanese cuisine, known for its firm, white flesh and delicate, slightly sweet flavor. Commonly used in sashimi, sushi, and grilled dishes ..... 
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button"><i class="fa-solid fa-cart-shopping"></i></button>
                      <button class="btn btn-outline-primary w-50" type="button"><i class="fa-solid fa-bookmark"></i></button>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-2">
            <div class="card-border-animate">
              <div class="card product-card rounded-0">
                  <div class="position-relative">
                    <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" class="card-img-top rounded-0" alt="Fish Image">
                    <!-- <span class="discount-badge text-danger">-50%</span> -->
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <!-- <span class="text-decoration-line-through text-danger text-opacity-50 ">$20</span> -->
                      <span class="text-danger fw-bold">$10</span>
                    </h5>
                    <p class="text-primary small mb-1">鮮魚 | 白身魚</p>
                    <h6 class="txt-primary fw-bold">真鯛</h6>
                    <p class="card-text text-muted">
                      A prized sea bream in Japanese cuisine, known for its firm, white flesh and delicate, slightly sweet flavor. Commonly used in sashimi, sushi, and grilled dishes ..... 
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button"><i class="fa-solid fa-cart-shopping"></i></button>
                      <button class="btn btn-outline-primary w-50" type="button"><i class="fa-solid fa-bookmark"></i></button>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-2">
            <div class="card-border-animate">
              <div class="card product-card rounded-0">
                  <div class="position-relative">
                    <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" class="card-img-top rounded-0" alt="Fish Image">
                    <!-- <span class="discount-badge text-danger">-50%</span> -->
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <!-- <span class="text-decoration-line-through text-danger text-opacity-50 ">$20</span> -->
                      <span class="text-danger fw-bold">$10</span>
                    </h5>
                    <p class="text-primary small mb-1">鮮魚 | 白身魚</p>
                    <h6 class="txt-primary fw-bold">真鯛</h6>
                    <p class="card-text text-muted">
                      A prized sea bream in Japanese cuisine, known for its firm, white flesh and delicate, slightly sweet flavor. Commonly used in sashimi, sushi, and grilled dishes ..... 
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button"><i class="fa-solid fa-cart-shopping"></i></button>
                      <button class="btn btn-outline-primary w-50" type="button"><i class="fa-solid fa-bookmark"></i></button>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          
          
        </div>
        <div class="row mt-3">
          <ul class="pagination">
              <li>&lt;</li>
              <li>1</li>
              <li class="active">2</li>
              <li>3</li>
              <li>4</li>
              <li>&gt;</li>
          </ul>
        </div>
     
    </section>
    <!-- product section end -->
</div>
@endsection