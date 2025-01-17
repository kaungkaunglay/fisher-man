@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/profile_seller.css') }}" />
@endsection
@section('contents')
<div class="m-x30">
  <div class="profile_seller">
      <div class="mt-3">
       <div class="breadcrumb d-none d-md-block">
           <a href="#home">Home</a>
           <a href="#profile">Profile</a>
       </div>
       <div class="row">
           <div class="col -12 col-lg-6">
               <div class="row">
                   <div class="col-12 col-lg-6">
                       <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" class="w-100" alt="">
                   </div>
                   <div class="col-12 col-lg-6 mt-2 mt-lg-0">
                       <span class="w-100 d-block text-end "><i class="fa-solid fa-pen-to-square fs-5 text-danger "></i></span>
                       <h6 class="text-primary fw-bold">Name or Organization name</h6>
                       <p class="mb-0 text-primary">email@gmail.com</p>
                       <p class="mb-0 text-primary">LineID</p>
                       <p class="mb-0 text-primary">Chat with name or Organization name</p>
                       <span><i class="fa-brands fa-line fs-2 mt-2 text-primary"></i></span>
                   </div>
               </div>
               <div class="row mt-3">
                   <!-- <h6 class="d-flex justify-content-between">Detail Personal Info<i class="fa-solid fa-pen-to-square fs-5 text-danger"></i></h6> -->
                    <div class="col-9">
                       <h6 class="text-primary fw-bold">Detail Personal Info</h6>
                       <div class="address d-flex">
                           <p class="w-25 text-primary fw-semibold">Address</p>
                           <p class="ms-5 ps-3 ps-lg-0">:house no street,sue distict,city</p>
                       </div>
                       <div class="address d-flex">
                           <p class="w-25 text-primary fw-semibold">Phone No</p>
                           <p class="ms-5">:09429523324,0966723634</p>
                       </div>
                    
                    </div>
                    <div class="col-3 text-end">
                       <i class="fa-solid fa-pen-to-square fs-5 text-danger"></i>
                    </div>
               </div>
               <div class="row">
              <div class="col-12 col-lg-9">
                  <div class="buttons d-flex">
                      <button class="btn btn-outline-primary px-4 w-50 py-1">Upload product</button>
                      <button class="btn btn-outline-primary px-4 ms-2 w-50">Check Order Status</button>
                  </div>
              </div>
               </div>
           </div>
           <div class="col-12 col-lg-1"></div>
           <div class="col-12 col-lg-5 mt-3 mt-lg-0">
               <h6 class="text-primary fw-bold">Selection Your Location</h6>
               <iframe class="w-100"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d250151.16276620553!2d104.72537013378734!3d11.579654014369655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109513dc76a6be3%3A0x9c010ee85ab525bb!2sPhnom%20Penh%2C%20Cambodia!5e0!3m2!1sen!2ssg!4v1736774811619!5m2!1sen!2ssg"  height="330" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
           </div>
       </div>
      </div>

      <section class="all-products my-3">
          <div class="bg-second p-3 rounded">
            <h6 class="txt-primary fw-bold mb-3">Your Products</h6>
            <div class="filter d-flex justify-content-between align-items-center mb-3">
              <!-- <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grid-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-grid-2 fa-lg"><path fill="currentColor" d="M224 80c0-26.5-21.5-48-48-48L80 32C53.5 32 32 53.5 32 80l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96zm0 256c0-26.5-21.5-48-48-48l-96 0c-26.5 0-48 21.5-48 48l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96zM288 80l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96c0-26.5-21.5-48-48-48l-96 0c-26.5 0-48 21.5-48 48zM480 336c0-26.5-21.5-48-48-48l-96 0c-26.5 0-48 21.5-48 48l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96z" class=""></path></svg> -->
              <div class="icon-buttons txt-primary d-flex gap-3 align-items-center">
                <i class="fa-solid fa-grip fs-2 fw-bold"></i>
                <i class="fa-solid fa-list fs-3 fw-bold"></i>
              </div>
    
              <div class="sort-container bg-second">
                <div class="arrows">
                  <i class="fa-solid fa-caret-up"></i>
                  <i class="fa-solid fa-caret-down"></i>
                </div>
                <button class="sort-button">Sort by</button>
              </div>
    
              <!-- <i class="fa-solid fa-grip"></i>
                  <i class="fa-solid fa-list"></i> -->
            </div>
            <div class="row mx-0 mx-lg-3">
              <div class="col-6 col-md-4 col-lg-2 mb-3">
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
                      A prized sea bream in Japanese cuisine, known for its firm,
                      white flesh and delicate, slightly sweet flavor. Commonly used
                      in sashimi, sushi, and grilled dishes .....
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-cart-shopping"></i>
                      </button>
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-bookmark"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-2 mb-3">
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
                      A prized sea bream in Japanese cuisine, known for its firm,
                      white flesh and delicate, slightly sweet flavor. Commonly used
                      in sashimi, sushi, and grilled dishes .....
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-cart-shopping"></i>
                      </button>
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-bookmark"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-2 mb-3">
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
                      A prized sea bream in Japanese cuisine, known for its firm,
                      white flesh and delicate, slightly sweet flavor. Commonly used
                      in sashimi, sushi, and grilled dishes .....
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-cart-shopping"></i>
                      </button>
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-bookmark"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-2 mb-3">
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
                      A prized sea bream in Japanese cuisine, known for its firm,
                      white flesh and delicate, slightly sweet flavor. Commonly used
                      in sashimi, sushi, and grilled dishes .....
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-cart-shopping"></i>
                      </button>
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-bookmark"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-2 mb-3">
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
                      A prized sea bream in Japanese cuisine, known for its firm,
                      white flesh and delicate, slightly sweet flavor. Commonly used
                      in sashimi, sushi, and grilled dishes .....
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-cart-shopping"></i>
                      </button>
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-bookmark"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-2 mb-3">
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
                      A prized sea bream in Japanese cuisine, known for its firm,
                      white flesh and delicate, slightly sweet flavor. Commonly used
                      in sashimi, sushi, and grilled dishes .....
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-cart-shopping"></i>
                      </button>
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-bookmark"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-2 mb-3">
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
                      A prized sea bream in Japanese cuisine, known for its firm,
                      white flesh and delicate, slightly sweet flavor. Commonly used
                      in sashimi, sushi, and grilled dishes .....
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-cart-shopping"></i>
                      </button>
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-bookmark"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-2 mb-3">
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
                      A prized sea bream in Japanese cuisine, known for its firm,
                      white flesh and delicate, slightly sweet flavor. Commonly used
                      in sashimi, sushi, and grilled dishes .....
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-cart-shopping"></i>
                      </button>
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-bookmark"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-2 mb-3">
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
                      A prized sea bream in Japanese cuisine, known for its firm,
                      white flesh and delicate, slightly sweet flavor. Commonly used
                      in sashimi, sushi, and grilled dishes .....
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-cart-shopping"></i>
                      </button>
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-bookmark"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-2 mb-3">
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
                      A prized sea bream in Japanese cuisine, known for its firm,
                      white flesh and delicate, slightly sweet flavor. Commonly used
                      in sashimi, sushi, and grilled dishes .....
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-cart-shopping"></i>
                      </button>
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-bookmark"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-2 mb-3">
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
                      A prized sea bream in Japanese cuisine, known for its firm,
                      white flesh and delicate, slightly sweet flavor. Commonly used
                      in sashimi, sushi, and grilled dishes .....
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-cart-shopping"></i>
                      </button>
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-bookmark"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-2 mb-3">
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
                      A prized sea bream in Japanese cuisine, known for its firm,
                      white flesh and delicate, slightly sweet flavor. Commonly used
                      in sashimi, sushi, and grilled dishes .....
                    </p>
                    <div class="d-flex gap-2 cart-btn">
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-cart-shopping"></i>
                      </button>
                      <button class="btn btn-outline-primary w-50" type="button">
                        <i class="fa-solid fa-bookmark"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
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

      
   </div>
</div>
@endsection