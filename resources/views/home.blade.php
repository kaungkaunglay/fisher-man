@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
@endsection
@section('contents')
  <section class="hero mt-3 pt-3">
    <div class="m-x30">
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
                    <a href="" class="txt-primary mt-3">&lt;&lt; See more Product &gt;&gt;</a>
                </ul>
            </div>
            <div class="col-lg-8 col-md-6">
                <div id="carouselExample" class="carousel slide">
                    <!-- Carousel Items -->
                    <div class="carousel-inner rounded">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="d-block w-100"
                                alt="Slide 1" />
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="d-block w-100"
                                alt="Slide 2" />
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="d-block w-100"
                                alt="Slide 3" />
                        </div>
                    </div>

                    <!-- Circle Indicators -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>

                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

  </section>
  <section class="m-t-b-20 moving-discount">
        <div id="moving-text">
            <p class="title">Discount Products</p>
            <p class="title">Discount Products</p>
            <p class="title">Discount Products</p>
            <p class="title">Discount Products</p>
            <p class="title">Discount Products</p>
        </div>
    </section>

  <section class="popular_top_rate_shop_section mt-3">
    <div class="m-x30 px-4">
        <h6 class="txt-primary fw-bold mb-3">Popular & Top Rating Shop</h6>
        <div class="row shop-carts">
            <div class="col-6 col-md-6 col-lg-3 mb-3">
                <div class="card rounded-4 overflow-hidden w-100" style="width: 15rem">
                    <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="card-img-top"
                        alt="..." />
                    <div class="card-body bg-main">
                        <p class="card-text text-center text-white">Shop Name</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3 mb-3">
                <div class="card rounded-4 overflow-hidden w-100" style="width: 15rem">
                    <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="card-img-top"
                        alt="..." />
                    <div class="card-body bg-main">
                        <p class="card-text text-center text-white">Shop Name</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3 mb-3">
                <div class="card rounded-4 overflow-hidden w-100" style="width: 15rem">
                    <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="card-img-top"
                        alt="..." />
                    <div class="card-body bg-main">
                        <p class="card-text text-center text-white">Shop Name</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3 mb-3">
                <div class="card rounded-4 overflow-hidden w-100" style="width: 15rem">
                    <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="card-img-top"
                        alt="..." />
                    <div class="card-body bg-main">
                        <p class="card-text text-center text-white">Shop Name</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
  </section>


  <section class="discount-products bg-second my-3 py-4">
    <div class="m-x30 px-4">
        <h6 class="txt-primary fw-bold mb-3">Discount Products</h6>
        <div class="filter d-flex justify-content-between align-items-center mb-3">
            <!-- <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grid-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-grid-2 fa-lg"><path fill="currentColor" d="M224 80c0-26.5-21.5-48-48-48L80 32C53.5 32 32 53.5 32 80l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96zm0 256c0-26.5-21.5-48-48-48l-96 0c-26.5 0-48 21.5-48 48l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96zM288 80l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96c0-26.5-21.5-48-48-48l-96 0c-26.5 0-48 21.5-48 48zM480 336c0-26.5-21.5-48-48-48l-96 0c-26.5 0-48 21.5-48 48l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96z" class=""></path></svg> -->
            <div class="icon-buttons txt-primary d-flex gap-3 align-items-center">
                <i class="fa-solid fa-grip fs-2 fw-bold"></i>
                <i class="fa-solid fa-list fs-3 fw-bold"></i>
            </div>

            <div class="sort-container">
                <div class="arrows">
                    <i class="fa-solid fa-caret-up"></i>
                    <i class="fa-solid fa-caret-down"></i>
                </div>
                <button class="sort-button">Sort by</button>
            </div>

            <!-- <i class="fa-solid fa-grip"></i>
    <i class="fa-solid fa-list"></i> -->
        </div>
        <div class="row">
            <div class="col-6 col-md-4 col-lg-2 mb-3">
                <div class="card product-card rounded-0">
                    <div class="position-relative">
                        <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="card-img-top rounded-0"
                            alt="Fish Image" />
                        <span class="discount-badge text-danger">-50%</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="text-decoration-line-through text-danger text-opacity-50">$20</span>
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
                        <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="card-img-top rounded-0"
                            alt="Fish Image" />
                        <span class="discount-badge text-danger">-50%</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="text-decoration-line-through text-danger text-opacity-50">$20</span>
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
                        <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="card-img-top rounded-0"
                            alt="Fish Image" />
                        <span class="discount-badge text-danger">-50%</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="text-decoration-line-through text-danger text-opacity-50">$20</span>
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
                        <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="card-img-top rounded-0"
                            alt="Fish Image" />
                        <span class="discount-badge text-danger">-50%</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="text-decoration-line-through text-danger text-opacity-50">$20</span>
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
        <div class="row justify-content-center">
            <div class="col-5 col-lg-3 text-center">
                <button class="btn btn-outline-primary seemore-btn mt-3">
                    See More
                </button>
            </div>
        </div>
    </div>
    </div>
  </section>

  <section class="all-products my-3">
    <div class="m-x30 px-4">
        <h6 class="txt-primary fw-bold mb-3">All Products</h6>
        <div class="filter d-flex justify-content-between align-items-center mb-3">
            <!-- <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grid-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-grid-2 fa-lg"><path fill="currentColor" d="M224 80c0-26.5-21.5-48-48-48L80 32C53.5 32 32 53.5 32 80l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96zm0 256c0-26.5-21.5-48-48-48l-96 0c-26.5 0-48 21.5-48 48l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96zM288 80l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96c0-26.5-21.5-48-48-48l-96 0c-26.5 0-48 21.5-48 48zM480 336c0-26.5-21.5-48-48-48l-96 0c-26.5 0-48 21.5-48 48l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96z" class=""></path></svg> -->
            <div class="icon-buttons txt-primary d-flex gap-3 align-items-center">
                <!-- <i class="fa-solid fa-grip fs-2 fw-bold"></i> -->
                <i class="fa fa-th-large fs-2 fw-bold" aria-hidden="true"></i>
                <i class="fa fa-th-list fs-2 fw-bold" aria-hidden="true"></i>
                <!-- <i class="fa-solid fa-list fs-3 fw-bold"></i> -->
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
        <div class="row">
            <div class="col-6 col-md-12">
                <div class="card mb-3 border-0 horizontal-product-card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="img-fluid"
                                alt="..." />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body ps-0 pt-2 pt-md-0 ps-md-3">
                                <div class="header d-flex flex-column-reverse flex-md-row">
                                    <h5 class="card-title txt-primary fw-bold w-25">
                                        真鯛
                                    </h5>
                                    <div
                                        class="price-category d-flex flex-column flex-md-row w-100 justify-content-between">
                                        <span class="text-danger fw-bold">$10</span>
                                        <p class="text-primary small mb-1">鮮魚 | 白身魚</p>
                                    </div>
                                </div>
                                <p class="card-text">
                                    This is a wider card with supporting text below as a
                                    natural lead-in to additional content. This content is a
                                    little bit longer.
                                </p>
                                <div class="row">
                                    <div class="col-12 col-md-4">
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
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-12">
                <div class="card mb-3 border-0 horizontal-product-card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="img-fluid"
                                alt="..." />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body ps-0 pt-2 pt-md-0 ps-md-3">
                                <div class="header d-flex flex-column-reverse flex-md-row">
                                    <h5 class="card-title txt-primary fw-bold w-25">
                                        真鯛
                                    </h5>
                                    <div
                                        class="price-category d-flex flex-column flex-md-row w-100 justify-content-between">
                                        <span class="text-danger fw-bold">$10</span>
                                        <p class="text-primary small mb-1">鮮魚 | 白身魚</p>
                                    </div>
                                </div>
                                <p class="card-text">
                                    This is a wider card with supporting text below as a
                                    natural lead-in to additional content. This content is a
                                    little bit longer.
                                </p>
                                <div class="row">
                                    <div class="col-12 col-md-4">
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
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5 col-lg-3 text-center">
                    <button class="btn btn-outline-primary seemore-btn mt-3">
                        Load More
                    </button>
                </div>
            </div>
        </div>
    </div>

    </div>
  </section>
@endsection