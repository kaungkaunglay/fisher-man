<div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- Carousel Items -->
    <div class="carousel-inner rounded">
        @foreach($bannerImages as $index => $image)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}"  data-bs-interval="2000">
                <img src="{{ asset('assets/banner-images/'.$image) }}" class="d-block w-100" alt="Banner Image {{ $index + 1 }}">
            </div>
        @endforeach
    </div>

    <!-- Circle Indicators -->
    <div class="carousel-indicators">
        @foreach($bannerImages as $index => $image)
        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $index + 1 }}"></button>
    @endforeach
    </div>

    <!-- Carousel Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

