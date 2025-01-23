<div class="col-lg-8 col-md-6 ">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <!-- Carousel Items -->
        <div class="carousel-inner rounded">
            <div class="carousel-item active" data-bs-interval="500">
                <img src="{{ asset('assets/images/Rectangle_90.jpg') }}" class="d-block w-100" alt="Slide 1" />
            </div>
            <div class="carousel-item" data-bs-interval="500">
                <img src="{{ asset('assets/images/Rectangle_90.jpg') }}" class="d-block w-100" alt="Slide 2" />
            </div>
            <div class="carousel-item" data-bs-interval="500">
                <img src="{{ asset('assets/images/Rectangle_90.jpg') }}" class="d-block w-100" alt="Slide 3" />
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
