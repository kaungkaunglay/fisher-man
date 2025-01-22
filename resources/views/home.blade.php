@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
@endsection
@section('contents')
<section class="hero mt-5 container-custom">
    <div class="row justify-content-between">
        <div class="col-lg-4 col-md-6 d-none d-md-block">
            <ul class="sidebar-menu rounded fw-bold p-4 txt-primary">
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
        <div class="col-lg-8 col-md-6 ">
            <div id="carouselExample" class="carousel slide">
                <!-- Carousel Items -->
                <div class="carousel-inner rounded">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="d-block w-100" alt="Slide 1" />
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="d-block w-100" alt="Slide 2" />
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="d-block w-100" alt="Slide 3" />
                    </div>
                </div>

                <!-- Circle Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
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

<section class="popular_top_rate_shop_section mt-3  container-custom">
    <div class="">
        <h6 class="txt-primary fw-bold mb-3">Popular & Top Rating Shop</h6>
        <div class="row shop-carts">
            <div class="col-6 col-md-6 col-lg-3 mb-3">
                <div class="card rounded-4 overflow-hidden w-100" style="width: 15rem">
                    <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="card-img-top" alt="..." />
                    <div class="card-body bg-main">
                        <p class="card-text text-center text-white">Shop Name</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3 mb-3">
                <div class="card rounded-4 overflow-hidden w-100" style="width: 15rem">
                    <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="card-img-top" alt="..." />
                    <div class="card-body bg-main">
                        <p class="card-text text-center text-white">Shop Name</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3 mb-3">
                <div class="card rounded-4 overflow-hidden w-100" style="width: 15rem">
                    <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="card-img-top" alt="..." />
                    <div class="card-body bg-main">
                        <p class="card-text text-center text-white">Shop Name</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3 mb-3">
                <div class="card rounded-4 overflow-hidden w-100" style="width: 15rem">
                    <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="card-img-top" alt="..." />
                    <div class="card-body bg-main">
                        <p class="card-text text-center text-white">Shop Name</p>
                    </div>
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
    <div class="row" id="productContainer">

    </div>
    <div class="row justify-content-center">
        <div class="col-5 col-lg-3 text-center">
            <button class="btn btn-outline-primary see-more-btn mt-3" id="load-more">
                See More
            </button>
            <button class="btn btn-outline-primary see-less-btn mt-3" id="see-less" style="display: none;">
                See Less
            </button>
        </div>
    </div>
</section>

<script>
    const products = [{
            id: 1,
            name: "Product 1",
            price: 10,
            originalPrice: 20,
            discount: "50%",
            image: "../../assets/images/bg/fisher-bg.jpg"
        },
        {
            id: 2,
            name: "Product 2",
            price: 10,
            originalPrice: 20,
            discount: "50%",
            image: "../../assets/images/fishes/Red_sea_bream.svg"
        },
        {
            id: 3,
            name: "Product 1",
            price: 10,
            originalPrice: 20,
            discount: "50%",
            image: "../../assets/images/fishes/Red_sea_bream.svg"
        },
        {
            id: 4,
            name: "Product 2",
            price: 10,
            originalPrice: 20,
            discount: "50%",
            image: "../../assets/images/fishes/Red_sea_bream.svg"
        },
        {
            id: 5,
            name: "Product 1",
            price: 10,
            originalPrice: 20,
            discount: "50%",
            image: "../../assets/images/fishes/Red_sea_bream.svg"
        },
        {
            id: 6,
            name: "Product 2",
            price: 10,
            originalPrice: 20,
            discount: "50%",
            image: "../../assets/images/fishes/Red_sea_bream.svg"
        },
        {
            id: 7,
            name: "Product 1",
            price: 10,
            originalPrice: 20,
            discount: "50%",
            image: "../../assets/images/fishes/Red_sea_bream.svg"
        },
        {
            id: 8,
            name: "Product 2",
            price: 10,
            originalPrice: 20,
            discount: "50%",
            image: "../../assets/images/fishes/Red_sea_bream.svg"
        },
        {
            id: 9,
            name: "Product 1",
            price: 10,
            originalPrice: 20,
            discount: "50%",
            image: "../../assets/images/fishes/Red_sea_bream.svg"
        },
        {
            id: 10,
            name: "Product 2",
            price: 10,
            originalPrice: 20,
            discount: "50%",
            image: "../../assets/images/fishes/Red_sea_bream.svg"
        },
        {
            id: 10,
            name: "Product 2",
            price: 10,
            originalPrice: 20,
            discount: "50%",
            image: "../../assets/images/fishes/Red_sea_bream.svg"
        },
        {
            id: 10,
            name: "Product 2",
            price: 10,
            originalPrice: 20,
            discount: "50%",
            image: "../../assets/images/fishes/Red_sea_bream.svg"
        },
        {
            id: 10,
            name: "Product 2",
            price: 10,
            originalPrice: 20,
            discount: "50%",
            image: "../../assets/images/fishes/Red_sea_bream.svg"
        },
        {
            id: 10,
            name: "Product 2",
            price: 10,
            originalPrice: 20,
            discount: "50%",
            image: "../../assets/images/fishes/Red_sea_bream.svg"
        },
        {
            id: 10,
            name: "Product 2",
            price: 10,
            originalPrice: 20,
            discount: "50%",
            image: "../../assets/images/fishes/Red_sea_bream.svg"
        },
        {
            id: 10,
            name: "Product 2",
            price: 10,
            originalPrice: 20,
            discount: "50%",
            image: "../../assets/images/fishes/Red_sea_bream.svg"
        },
        // Add more product data here
    ];

    let visibleCount = 5; // Number of items to display
    const container = document.getElementById('productContainer');
    const loadMoreBtn = document.getElementById('load-more');

    function renderProducts() {
        container.innerHTML = '';
        const visibleProducts = products.slice(0, visibleCount);

        visibleProducts.forEach(product => {
            const card = document.createElement('div');
            card.className = 'col-6 col-md-4 col-lg-2 mb-3 horizontal';
            card.innerHTML = `
               <div class="card product-card rounded-0">
              <div class="position-relative card-img">
                    <img
                    src="${product.image}"
                    class="card-img-top rounded-0"
                    alt="${product.name}"
                    />
                    <span class="discount-badge text-danger">${product.discount}</span>
              </div>
              <div class="card-body">
                <h5 class="card-title">
                  <span
                    class="text-decoration-line-through text-danger text-opacity-50"
                    >$${product.originalPrice}</span
                  >
                  <span class="text-danger fw-bold">$${product.price}</span>
                </h5>
                <p class="text-primary small mb-1">鮮魚 | 白身魚</p>
                <h6 class="txt-primary fw-bold">${product.name}</h6>
                <p class="card-text text-muted">
                  A prized sea bream in Japanese cuisine, known for its firm,
                  white flesh and delicate, slightly sweet flavor. Commonly used
                  in sashimi, sushi, and grilled dishes .....
                </p>
                <div class="d-flex gap-2 card-btn">
                  <button class="btn btn-outline-primary w-50" type="button">
                    <i class="fa-solid fa-cart-shopping"></i>
                  </button>
                  <button class="btn btn-outline-primary w-50" type="button">
                    <i class="fa-solid fa-bookmark"></i>
                  </button>
                </div>
              </div>
            </div>
            `;
            container.appendChild(card);
        });

        if (visibleCount >= products.length) {
            loadMoreBtn.style.display = 'none';
        }
    }

    loadMoreBtn.addEventListener('click', () => {
        visibleCount += 10; // Increase the number of visible items
        renderProducts();
    });

    document.getElementById('gridView').addEventListener('click', () => {
        container.classList.add('grid-view');
        container.classList.remove('list-view');
    });

    document.getElementById('listView').addEventListener('click', () => {
        container.classList.add('list-view');
        container.classList.remove('grid-view');
    });


    renderProducts();
</script>

<style>
    /* Product card general styling */
    .product-card {
        display: flex;
        flex-wrap: wrap;
        transition: all 0.3s;
        padding: 10px;
        /* border: 1px solid #ddd; */
        border-radius: 10px;
        margin-bottom: 15px;
        align-items: center;
    }

    /* Grid view layout */
    .list-view .product-card {
        flex-direction: row;
        /* width: 100%; */

    }

    .list-view .horizontal {
        width: 100%;
    }

    .list-view .horizontal .discount-badge {
        display: none;
    }

    .list-view .horizontal .card .card-img {
        width: 355px !important;
    }

    .list-view .horizontal .card img {
        width: 100% !important;
        height: 150px;
    }

    .list-view .horizontal .card .card-body {
        margin-left: 10px;
    }

    .list-view .horizontal .card .card-body .card-btn {
        width: 30%;
        margin-top: 20px;

    }

    /* .list-view .horizontal .card .card-body .card-btn button{width: 20%} */

    /* List view layout */
    .grid-view .product-card {
        flex-direction: row;
        align-items: center;
        text-align: left;
        width: 100%;
        /* Make the card take full width */
    }

    /* Image styling */
    .product-card img {
        /* max-width: 120px; */
        margin-right: 15px;
        /* Add spacing in list view */
        border-radius: 10px;
    }

    /* Product info section styling */
    .product-info h5 {
        font-size: 1.2rem;
        margin: 0;
    }

    .product-info p {
        margin: 0;
    }
</style>

{{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const gridView = document.getElementById('grid-view');
            const listView = document.getElementById('list-view');
            const productContainer = document.getElementById('product-container');
            const loadMoreButton = document.getElementById('load-more');
            const seeLessButton = document.getElementById('see-less');
            let currentView = 'grid';
            let itemsToShow = 10;

            function toggleView(view) {
                currentView = view;
                productContainer.classList.toggle('list-view', view === 'list');
                productContainer.classList.toggle('grid-view', view === 'grid');
                const allProducts = productContainer.querySelectorAll('.product-card');
                allProducts.forEach((product, index) => {
                    if (view === 'list') {
                        product.innerHTML = `
                            <div class="col-12">
                                <div class="card mb-3 border-0 horizontal-product-card">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="img-fluid" alt="..." />
</div>
<div class="col-md-8">
    <div class="card-body ps-0 pt-2 pt-md-0 ps-md-3">
        <div class="header d-flex flex-column-reverse flex-md-row">
            <h5 class="card-title txt-primary fw-bold w-25">真鯛</h5>
            <div class="price-category d-flex flex-column flex-md-row w-100 justify-content-between">
                <span class="text-danger fw-bold">$10</span>
                <p class="text-primary small mb-1">鮮魚 | 白身魚</p>
            </div>
        </div>
        <p class="card-text">
            This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
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
</div>`;
} else {
product.innerHTML = `
<div class="card product-card rounded-0">
    <div class="position-relative">
        <img src="{{ asset('assets/images/fishes/Red_sea_bream.svg') }}" class="card-img-top rounded-0" alt="Fish Image" />
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
            A prized sea bream in Japanese cuisine, known for its firm, white flesh and delicate, slightly sweet flavor. Commonly used in sashimi, sushi, and grilled dishes .....
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
</div>`;
}
});
}

gridView.addEventListener('click', function() {
toggleView('grid');
});

listView.addEventListener('click', function() {
toggleView('list');
});

loadMoreButton.addEventListener('click', function() {
itemsToShow += 10;
const allProducts = productContainer.querySelectorAll('.product-card');
allProducts.forEach((product, index) => {
if (index < itemsToShow) {
    product.style.display='block' ;
    }
    });
    if (itemsToShow>= allProducts.length) {
    loadMoreButton.style.display = 'none';
    seeLessButton.style.display = 'block';
    }
    });

    seeLessButton.addEventListener('click', function() {
    itemsToShow = 10;
    const allProducts = productContainer.querySelectorAll('.product-card');
    allProducts.forEach((product, index) => {
    if (index >= itemsToShow) {
    product.style.display = 'none';
    }
    });
    loadMoreButton.style.display = 'block';
    seeLessButton.style.display = 'none';
    });

    toggleView(currentView);
    });
    </script> --}}

    {{-- <style>
        .list-view .product-card {
            display: flex;
            flex-direction: row;
            width: 100%;
        }

        .list-view .product-card .card {
            flex-direction: row;
        }

        .list-view .product-card .card img {
            width: 150px;
            height: auto;
        }

        .list-view .product-card .card-body {
            flex: 1;
            padding-left: 20px;
        }

        .grid-view .product-card {
            display: block;
        }

        .grid-view .product-card .card {
            flex-direction: column;
        }

        .grid-view .product-card .card img {
            width: 100%;
            height: auto;
        }

        .grid-view .product-card .card-body {
            padding-left: 0;
        }
    </style> --}}

    <section class="all-products container-custom my-3">
        <div class="">
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
            <div class="row">
                <div class="col-6 col-md-12">
                    <div class="card mb-3 border-0 horizontal-product-card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('assets/images/bg/fisher-bg.jpg') }}" class="img-fluid"
                                    alt="..." />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body ps-0 pt-2 pt-md-0 ps-md-3 py-lg-2 d-lg-flex flex-lg-column justify-content-between h-100">
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
                                <div class="card-body ps-0 pt-2 pt-md-0 ps-md-3 py-lg-2 d-lg-flex flex-lg-column justify-content-between h-100">
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
                                <div class="card-body ps-0 pt-2 pt-md-0 ps-md-3 py-lg-2 d-lg-flex flex-lg-column justify-content-between h-100">
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