@extends('includes.layout')
@section('title', 'Shop Profile')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}" />
@endsection

@section('contents')
    {{-- <section class="shop-profile py-5">
        <div class="container-custom">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center">
                    <img src="{{ asset('assets/images/shop-logo.png') }}" class="shop-logo mb-3" alt="Shop Logo">
                    <h2 class="shop-name">Shop Name</h2>
                    <p class="shop-description">This is a short description of the shop, providing details about its offerings and specialties.</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6">
                    <h5>Contact Information</h5>
                    <p>Email: shop@example.com</p>
                    <p>Phone: +123 456 7890</p>
                    <p>Address: 123 Street, City, Country</p>
                </div>
                <div class="col-lg-6">
                    <h5>Social Media</h5>
                    <a href="#" class="btn btn-primary me-2">Facebook</a>
                    <a href="#" class="btn btn-info">Twitter</a>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section>
        <div class="container-custom">

            <div class="shop-banner">
                <div class="container">
                    <div class="position-absolute bottom-0 start-0 p-3 text-white">
                        <span class="badge bg-success mb-2">Verified Seller</span>
                        <h1 class="display-5 fw-bold text-shadow">Artisan Crafts</h1>
                    </div>
                </div>
            </div>

        </div>
    </section> --}}

    <!-- Breadcrumbs -->
    <section class="mt-5 mb-3 ">
        <div class="container-custom">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans_lang('home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans_lang('profile') }}</li>
                </ol>
            </nav>

        </div>
    </section>
    <!-- /Breadcrumbs -->

    <!-- Shop Info -->
    <section class="mt-4">
        <div class="container-custom">
            <div class="row">
        
                {{-- Shop Detail --}}
                <div class="col-md-3 text-center text-md-start">

                    <img src="{{ asset('ass') }}" class="rounded-circle shop-avatar" alt="Shop avatar">
                    <div class="mt-3">
                        <p class="rating-stars mb-1">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="ms-2 text-muted">4.5 (256 reviews)</span>
                        </p>
                        <p class="text-muted">Member since: Jan 2020</p>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary"><i class="fas fa-envelope me-2"></i>Contact Seller</button>
                            <button class="btn btn-outline-secondary"><i class="fas fa-heart me-2"></i>Follow Shop</button>
                        </div>
                    </div>
                </div>
                {{-- /Shop Detail --}}
        
                {{-- Tab Box --}}
                <div class="col-md-9 mt-4 mt-md-0">
                    <div class="card shadow-sm">
                        <div class="card-body">
        
                            {{-- Tab List --}}
                            <ul class="nav nav-tabs" id="shopTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                        role="tab">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="products-tab" data-bs-toggle="tab" href="#products"
                                        role="tab">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#reviews"
                                        role="tab">Reviews</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="policies-tab" data-bs-toggle="tab" href="#policies"
                                        role="tab">Policies</a>
                                </li>
                            </ul>
                            {{-- /Tab List --}}
        
                            {{--Tab Content  --}}
                            {{-- <div class="tab-content p-3" id="shopTabsContent"> --}}
        
                                {{-- About Tab --}}
                                {{-- <div class="tab-pane fade show active" id="home" role="tabpanel">
                                    <h4>About Artisan Crafts</h4>
                                    <p>Artisan Crafts specializes in handmade products created by local artisans using traditional
                                        techniques and sustainable materials. Each item is unique and tells a story of craftsmanship
                                        passed down through generations.</p>
        
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <h5>Shop Details</h5>
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-map-marker-alt me-2 text-primary"></i> Portland, Oregon</li>
                                                <li><i class="fas fa-globe me-2 text-primary"></i> Ships worldwide</li>
                                                <li><i class="fas fa-language me-2 text-primary"></i> English, Spanish</li>
                                                <li><i class="fas fa-certificate me-2 text-primary"></i> Certified Organic Materials
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Shop Stats</h5>
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-box me-2 text-primary"></i> 145 products</li>
                                                <li><i class="fas fa-truck me-2 text-primary"></i> 98% on-time shipping</li>
                                                <li><i class="fas fa-reply me-2 text-primary"></i> 24h average response time</li>
                                                <li><i class="fas fa-users me-2 text-primary"></i> 3500+ followers</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- /About Tab --}}
        
                                {{-- Product Tab --}}
                                {{-- <div class="tab-pane fade" id="products" role="tabpanel">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h4>Products (145)</h4>
                                        <div class="d-flex">
                                            <select class="form-select me-2">
                                                <option>All Categories</option>
                                                <option>Home Decor</option>
                                                <option>Jewelry</option>
                                                <option>Kitchen</option>
                                                <option>Accessories</option>
                                            </select>
                                            <select class="form-select">
                                                <option>Sort by: Featured</option>
                                                <option>Price: Low to High</option>
                                                <option>Price: High to Low</option>
                                                <option>Newest</option>
                                                <option>Top Rated</option>
                                            </select>
                                        </div>
                                    </div> --}}
        
                                {{-- tab content --}}
                                {{-- <div class="row g-4">
        
                                        <!-- Product 1 -->
                                        <div class="col-md-4 col-sm-6">
                                            <div class="card product-card h-100">
                                                <span class="badge bg-danger badge-sale">SALE</span>
                                                <img src="/api/placeholder/400/300" class="card-img-top" alt="Product image">
                                                <div class="card-body">
                                                    <h5 class="card-title">Handcrafted Ceramic Bowl</h5>
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <span class="text-danger fw-bold">$24.99</span>
                                                            <span class="text-decoration-line-through text-muted ms-2">$34.99</span>
                                                        </div>
                                                        <div class="rating-stars">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                        </div>
                                                    </div>
                                                    <p class="card-text mt-2">Hand-thrown ceramic bowl glazed with natural pigments.</p>
                                                </div>
                                                <div class="card-footer bg-white border-top-0">
                                                    <div class="d-grid gap-2">
                                                        <button class="btn btn-outline-primary">Add to Cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                        <!-- Product 2 -->
                                        <div class="col-md-4 col-sm-6">
                                            <div class="card product-card h-100">
                                                <img src="/api/placeholder/400/300" class="card-img-top" alt="Product image">
                                                <div class="card-body">
                                                    <h5 class="card-title">Woven Basket Set</h5>
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <span class="fw-bold">$49.99</span>
                                                        </div>
                                                        <div class="rating-stars">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p class="card-text mt-2">Set of 3 nesting baskets made from natural reed.</p>
                                                </div>
                                                <div class="card-footer bg-white border-top-0">
                                                    <div class="d-grid gap-2">
                                                        <button class="btn btn-outline-primary">Add to Cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                        <!-- Product 3 -->
                                        <div class="col-md-4 col-sm-6">
                                            <div class="card product-card h-100">
                                                <span class="badge bg-success badge-sale">NEW</span>
                                                <img src="/api/placeholder/400/300" class="card-img-top" alt="Product image">
                                                <div class="card-body">
                                                    <h5 class="card-title">Macramé Wall Hanging</h5>
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <span class="fw-bold">$38.50</span>
                                                        </div>
                                                        <div class="rating-stars">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p class="card-text mt-2">Handmade macramé wall art using organic cotton rope.</p>
                                                </div>
                                                <div class="card-footer bg-white border-top-0">
                                                    <div class="d-grid gap-2">
                                                        <button class="btn btn-outline-primary">Add to Cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                        <!-- Product 4 -->
                                        <div class="col-md-4 col-sm-6">
                                            <div class="card product-card h-100">
                                                <img src="/api/placeholder/400/300" class="card-img-top" alt="Product image">
                                                <div class="card-body">
                                                    <h5 class="card-title">Hand-Carved Wooden Spoons</h5>
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <span class="fw-bold">$29.99</span>
                                                        </div>
                                                        <div class="rating-stars">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                        </div>
                                                    </div>
                                                    <p class="card-text mt-2">Set of 4 hand-carved wooden cooking spoons.</p>
                                                </div>
                                                <div class="card-footer bg-white border-top-0">
                                                    <div class="d-grid gap-2">
                                                        <button class="btn btn-outline-primary">Add to Cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Product 5 -->
                                        <div class="col-md-4 col-sm-6">
                                            <div class="card product-card h-100">
                                                <span class="badge bg-warning text-dark badge-sale">BEST SELLER</span>
                                                <img src="/api/placeholder/400/300" class="card-img-top" alt="Product image">
                                                <div class="card-body">
                                                    <h5 class="card-title">Natural Beeswax Candles</h5>
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <span class="fw-bold">$19.99</span>
                                                        </div>
                                                        <div class="rating-stars">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p class="card-text mt-2">Set of 3 hand-dipped beeswax candles with cotton wicks.</p>
                                                </div>
                                                <div class="card-footer bg-white border-top-0">
                                                    <div class="d-grid gap-2">
                                                        <button class="btn btn-outline-primary">Add to Cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Product 6 -->
                                        <div class="col-md-4 col-sm-6">
                                        <div class="card product-card h-100">
                                            <img src="/api/placeholder/400/300" class="card-img-top" alt="Product image">
                                            <div class="card-body">
                                            <h5 class="card-title">Handwoven Wool Scarf</h5>
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                <span class="fw-bold">$64.00</span>
                                                </div>
                                                <div class="rating-stars">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                </div>
                                            </div>
                                            <p class="card-text mt-2">Naturally dyed merino wool scarf woven on a traditional loom.</p>
                                            </div>
                                            <div class="card-footer bg-white border-top-0">
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-outline-primary">Add to Cart</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div> --}}
        
                                {{-- pagination --}}
                                {{-- <div class="d-flex justify-content-center mt-4">
                                    <nav>
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                    </nav>
                                </div> --}}
                                {{-- </div> --}}
                                {{-- /Product Tab --}}
        
                                {{-- Review Tab --}}
                                {{-- <div class="tab-pane fade" id="reviews" role="tabpanel"> --}}
                                {{-- <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h4>Customer Reviews</h4>
                                        <div>
                                        <button class="btn btn-primary">Write a Review</button>
                                        </div>
                                    </div> --}}
        
        
                                {{-- <div class="row mb-4">
                                        <div class="col-md-4">
                                        <div class="text-center p-4 bg-light rounded">
                                            <h2 class="display-3 fw-bold">4.5</h2>
                                            <div class="rating-stars mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <p class="text-muted">Based on 256 reviews</p>
                                            
                                            <div class="d-flex align-items-center mt-3">
                                            <span class="me-2">5</span>
                                            <div class="progress flex-grow-1" style="height: 8px;">
                                                <div class="progress-bar bg-success" style="width: 75%"></div>
                                            </div>
                                            <span class="ms-2 text-muted small">75%</span>
                                            </div>
                                            
                                            <div class="d-flex align-items-center mt-2">
                                            <span class="me-2">4</span>
                                            <div class="progress flex-grow-1" style="height: 8px;">
                                                <div class="progress-bar bg-success" style="width: 15%"></div>
                                            </div>
                                            <span class="ms-2 text-muted small">15%</span>
                                            </div>
                                            
                                            <div class="d-flex align-items-center mt-2">
                                            <span class="me-2">3</span>
                                            <div class="progress flex-grow-1" style="height: 8px;">
                                                <div class="progress-bar bg-warning" style="width: 6%"></div>
                                            </div>
                                            <span class="ms-2 text-muted small">6%</span>
                                            </div>
                                            
                                            <div class="d-flex align-items-center mt-2">
                                            <span class="me-2">2</span>
                                            <div class="progress flex-grow-1" style="height: 8px;">
                                                <div class="progress-bar bg-danger" style="width: 3%"></div>
                                            </div>
                                            <span class="ms-2 text-muted small">3%</span>
                                            </div>
                                            
                                            <div class="d-flex align-items-center mt-2">
                                            <span class="me-2">1</span>
                                            <div class="progress flex-grow-1" style="height: 8px;">
                                                <div class="progress-bar bg-danger" style="width: 1%"></div>
                                            </div>
                                            <span class="ms-2 text-muted small">1%</span>
                                            </div>
                                        </div>
                                        </div>
                                        
                                        <div class="col-md-8">
                                        <!-- Review Item 1 -->
                                        <div class="card mb-3">
                                            <div class="card-body">
                                            <div class="d-flex justify-content-between mb-2">
                                                <div class="d-flex align-items-center">
                                                <img src="/api/placeholder/40/40" class="rounded-circle me-2" alt="User avatar">
                                                <div>
                                                    <h6 class="mb-0">Maria Johnson</h6>
                                                    <p class="text-muted small mb-0">Verified Purchase</p>
                                                </div>
                                                </div>
                                                <div class="text-end">
                                                <div class="rating-stars">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <p class="text-muted small mb-0">2 weeks ago</p>
                                                </div>
                                            </div>
                                            <h6>Beautiful craftsmanship!</h6>
                                            <p>The ceramic bowl I purchased is absolutely stunning. You can truly see the artistry and care that went into making it. The glaze colors are even more beautiful in person than in the photos.</p>
                                            <div class="d-flex mt-3">
                                                <img src="/api/placeholder/100/100" class="img-thumbnail me-2" alt="Review image">
                                                <img src="/api/placeholder/100/100" class="img-thumbnail" alt="Review image">
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center">
                                                <button class="btn btn-sm btn-outline-secondary me-2"><i class="fas fa-thumbs-up me-1"></i> Helpful (12)</button>
                                                <button class="btn btn-sm btn-link text-muted">Report</button>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Review Item 2 -->
                                        <div class="card mb-3">
                                            <div class="card-body">
                                            <div class="d-flex justify-content-between mb-2">
                                                <div class="d-flex align-items-center">
                                                <img src="/api/placeholder/40/40" class="rounded-circle me-2" alt="User avatar">
                                                <div>
                                                    <h6 class="mb-0">James Wilson</h6>
                                                    <p class="text-muted small mb-0">Verified Purchase</p>
                                                </div>
                                                </div>
                                                <div class="text-end">
                                                <div class="rating-stars">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <p class="text-muted small mb-0">1 month ago</p>
                                                </div>
                                            </div>
                                            <h6>High quality, but shipping took longer than expected</h6>
                                            <p>The wooden spoons are excellently crafted and feel sturdy in hand. My only complaint is that shipping took almost 2 weeks when the estimate was 5-7 days. Still, the product quality makes up for the wait.</p>
                                            <hr>
                                            <div class="d-flex align-items-center">
                                                <button class="btn btn-sm btn-outline-secondary me-2"><i class="fas fa-thumbs-up me-1"></i> Helpful (5)</button>
                                                <button class="btn btn-sm btn-link text-muted">Report</button>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Shop Response -->
                                        <div class="card mb-3 ms-5 border-start border-5 border-primary">
                                            <div class="card-body">
                                            <div class="d-flex align-items-center mb-2">
                                                <img src="/api/placeholder/40/40" class="rounded-circle me-2" alt="Shop avatar">
                                                <div>
                                                <h6 class="mb-0">Artisan Crafts <span class="badge bg-primary">Shop Owner</span></h6>
                                                <p class="text-muted small mb-0">Responded 3 weeks ago</p>
                                                </div>
                                            </div>
                                            <p>Thank you for your feedback, James! We apologize for the shipping delay. We had some unexpected issues with our carrier, but we've addressed them to ensure faster delivery times. We're glad you're enjoying the spoons!</p>
                                            </div>
                                        </div>
                                        
                                        <!-- Review Item 3 -->
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="d-flex justify-content-between mb-2">
                                                <div class="d-flex align-items-center">
                                                <img src="/api/placeholder/40/40" class="rounded-circle me-2" alt="User avatar">
                                                <div>
                                                    <h6 class="mb-0">Sarah Miller</h6>
                                                    <p class="text-muted small mb-0">Verified Purchase</p>
                                                </div>
                                                </div>
                                                <div class="text-end">
                                                <div class="rating-stars">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <p class="text-muted small mb-0">2 months ago</p>
                                                </div>
                                            </div>
                                            <h6>Perfect gift!</h6>
                                            <p>I purchased the macramé wall hanging as a housewarming gift for my sister, and she absolutely loves it! The craftsmanship is outstanding, and it looks exactly like the photos. I'll definitely be ordering more items from this shop.</p>
                                            <div class="d-flex mt-3">
                                                <img src="/api/placeholder/100/100" class="img-thumbnail" alt="Review image">
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center">
                                                <button class="btn btn-sm btn-outline-secondary me-2"><i class="fas fa-thumbs-up me-1"></i> Helpful (9)</button>
                                                <button class="btn btn-sm btn-link text-muted">Report</button>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex justify-content-center mt-4">
                                            <button class="btn btn-outline-primary">Load More Reviews</button>
                                        </div>
                                        </div>
                                    </div> --}}
                                {{-- </div> --}}
                                {{-- /Review Tab --}}
        
                                {{-- Policy Tab --}}
                                {{-- <div class="tab-pane fade" id="policies" role="tabpanel">
                                    <h4>Shop Policies</h4>
        
                                    <div class="accordion mt-3" id="policyAccordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseShipping">
                                                    Shipping
                                                </button>
                                            </h2>
                                            <div id="collapseShipping" class="accordion-collapse collapse show"
                                                data-bs-parent="#policyAccordion">
                                                <div class="accordion-body">
                                                    <p><strong>Processing Time:</strong> 1-3 business days</p>
                                                    <p><strong>Shipping Methods:</strong></p>
                                                    <ul>
                                                        <li>Standard Domestic Shipping: 3-5 business days</li>
                                                        <li>Express Domestic Shipping: 1-2 business days</li>
                                                        <li>International Shipping: 7-14 business days</li>
                                                    </ul>
                                                    <p>We ship all items with tracking and insurance. International buyers are
                                                        responsible for any customs fees that may apply.</p>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseReturns">
                                                    Returns & Exchanges
                                                </button>
                                            </h2>
                                            <div id="collapseReturns" class="accordion-collapse collapse"
                                                data-bs-parent="#policyAccordion">
                                                <div class="accordion-body">
                                                    <p>We accept returns and exchanges within 30 days of delivery for items in
                                                        original condition.</p>
                                                    <p><strong>To initiate a return:</strong></p>
                                                    <ol>
                                                        <li>Contact us within 7 days of receiving your item.</li>
                                                        <li>Ship items back within 14 days of approval.</li>
                                                        <li>Include order number and reason for return.</li>
                                                    </ol>
                                                    <p><strong>Non-returnable items:</strong> Custom orders, personalized items, and
                                                        sale items marked as final sale.</p>
                                                    <p>Refunds will be issued to the original payment method once we receive and
                                                        inspect the returned item.</p>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse">Button</button>
                                            </h2>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- /Policy Tab --}}
        
                            {{-- </div> --}}
                            {{-- /Tab Content --}}
        
                        </div>
                    </div>
                </div>
                {{-- /Tab Box --}}
        
            </div>
        </div>
    </section>


@endsection
