@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/product_detail.css') }}" />
@endsection
@section('contents')
<div class="wpr row gap-4 p-0">
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
    <!-- product start -->
    <div class="product-detail col-lg-8">
        <div class="row justify-content-between product-mobile">
            <div class="product-image-container col-6">
                <div class="product-image-bigger d-flex flex-direction-column m-b-10">
                    <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" alt="product image">
                </div>
                <div class="product-image-smaller d-flex justify-content-between gap-3">
                    <div class="small-img">
                        <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" alt="product image">
                    </div>
                    <div class="small-img">
                        <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" alt="product image">
                    </div>
                    <div class="small-img">
                        <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" alt="product image">
                    </div>
                    <div class="small-img">
                        <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" alt="product image">
                    </div>
                </div>
            </div>
            <div class="product-descraption col-6">
                <div class="product-title&date d-flex justify-content-between align-items-center m-b-20">
                    <h2 class="m-0 title">Product Title</h2>
                    <p class="m-0">20/02/2025</p>
                </div>
                <div class="product-price">
                    <p class="m-b-10 price ">$200</p>
                    <p class="m-0 category-txt"><a href="#">鮮魚</a> | <a href="#">白身魚</a></p>
                </div>
                <div class="d-flex justify-content-between m-t-b-20 product-btn-container">
                    <div class="quanity">
                        <button class="btn" id="decrement">-</button>
                        <input type="text" value="1" id="quantity" readonly>
                        <button class="btn" id="increment">+</button>
                    </div>
                    <button class="common-btn">Add to Cart</button>
                </div>
                <div class="detail">
                    <h3 class="m-b-20 title">Detail</h3>
                    <ul>
                        <li class="m-b-10 txt">Stock : 20</li>
                        <li class="m-b-10 txt">Weight : 20kg</li>
                        <li class="m-b-10 txt">Size : 20cm</li>
                        <li class="m-b-10 txt">Day of Caught : 12/10/2024</li>
                        <li class="m-b-10 txt">Expiration Date : 12/10/2024</li>
                        <li class="m-b-10 txt">Delivery Fee : 20$ (by buyer)</li>
                        <li class="m-b-10 txt">How can cook : Sashimi, Broil, Boil, Fry, Miced for Hotpot</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- product end -->
    </div>
    <!-- product end -->
</div>
<!-- Review start -->
<div class="reviewer wpr p-0">
    <h3 class="m-t-b-20 title">
        Review
    </h3>
    <div class="user-review-container" id="reviewContainer">
        <!-- Reviewer Cards -->
        <div class="reviewer-card d-flex align-items-center gap-3 m-b-20">
            <div class="user-img col-4">
                <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" alt="user image">
            </div>
            <div class="user-descraption col-8">
                <div class="d-flex gap-4 align-items-center m-b-10">
                    <h3 class="title m-0">User Name 1</h3>
                    <div class="user-rating">
                        <img src="../../assets/images/rating.svg" alt="user rating">
                    </div>
                </div>
                <p class="txt">Review text for User 1.</p>
            </div>
        </div>

        <div class="reviewer-card d-flex align-items-center gap-3 m-b-20">
            <div class="user-img col-4">
                <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" alt="user image">
            </div>
            <div class="user-descraption col-8">
                <div class="d-flex gap-4 align-items-center m-b-10">
                    <h3 class="title m-0">User Name 2</h3>
                    <div class="user-rating">
                        <img src="../../assets/images/rating.svg" alt="user rating">
                    </div>
                </div>
                <p class="txt">Review text for User 2.</p>
            </div>
        </div>

        <div class="reviewer-card d-flex align-items-center gap-3 m-b-20">
            <div class="user-img col-4">
                <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" alt="user image">
            </div>
            <div class="user-descraption col-8">
                <div class="d-flex gap-4 align-items-center m-b-10">
                    <h3 class="title m-0">User Name 3</h3>
                    <div class="user-rating">
                        <img src="../../assets/images/rating.svg" alt="user rating">
                    </div>
                </div>
                <p class="txt">Review text for User 3.</p>
            </div>
        </div>

        <div class="reviewer-card d-flex align-items-center gap-3 m-b-20">
            <div class="user-img col-4">
                <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" alt="user image">
            </div>
            <div class="user-descraption col-8">
                <div class="d-flex gap-4 align-items-center m-b-10">
                    <h3 class="title m-0">User Name 4</h3>
                    <div class="user-rating">
                        <img src="../../assets/images/rating.svg" alt="user rating">
                    </div>
                </div>
                <p class="txt">Review text for User 4.</p>
            </div>
        </div>
    </div>

    <!-- Pagination Controls -->
    <div id="pagination-controls" class="pagination-controls text-center m-b-20"></div>
</div>
<div class="review-form wpr p-0">
    <h3 class="title text-center m-b-20">Add a review</h3>
    <div class="row justify-content-center review-form-container">
        <div class="col-6">
            <form>
                <div class="row mb-3 form-mobile">
                    <div class="col-md-6 mb-mobile-3">
                        <label for="name" class="form-label title">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name"
                            required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label title">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email"
                            required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label title">Rating</label>
                    <select class="form-select" id="rating" name="rating" required>
                        <option value="">Choose a rating</option>
                        <option value="5">5 - Excellent</option>
                        <option value="4">4 - Good</option>
                        <option value="3">3 - Average</option>
                        <option value="2">2 - Poor</option>
                        <option value="1">1 - Very Poor</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label title">Description</label>
                    <textarea class="form-control" id="description" rows="3"
                        placeholder="Enter your description" required></textarea>
                </div>

                <div class="text-center mb-mobile-3">
                    <button type="submit" class="common-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection