@extends('includes.layout')
@section('style')
<!-- <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}" /> -->
<link rel="stylesheet" href="{{ asset('assets/css/whitelist.css') }}" />
@endsection
@section('contents')
<!-- Breadcrumbs -->
<nav aria-label="breadcrumb" class="py-4">
    <div class="container">
        <ol class="breadcrumb mb-0 bg-transparent">
            <li class="breadcrumb-item"><a href="./home.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </div>
</nav>
<!-- ./Breadcrumbs -->

<!-- Main Content -->
<div class="container cart">

    <!-- Desktop Style -->
    <table class="table desktop" id="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Image</th>
                <th scope="col">Product address</th>
                <th scope="col">Price</th>
                <th scope="col">Quanity</th>
                <th scope="col">Total</th>
                <th scope="col">Remove</th>
            </tr>
        </thead>
        <tbody>
            <tr id="row">
                <th scope="row">
                    1
                </th>
                <th>
                    <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" alt="product img">
                </th>
                <td>Mark</td>
                <td id="price">$100</td>
                <td>
                    <div class="quanity">
                        <button class="btn" id="decrement">-</button>
                        <input type="text" value="1" id="quantity" readonly>
                        <button class="btn" id="increment">+</button>
                    </div>

                </td>
                <td id="cost">$100</td>
                <td>
                    <a href="#">
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
                </td>
            </tr>
            <tr id="row">
                <th scope="row">
                    2
                </th>
                <th>
                    <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" alt="product img">
                </th>
                <td>Mark</td>
                <td id="price">$100</td>
                <td>
                    <div class="quanity">
                        <button class="btn" id="decrement">-</button>
                        <input type="text" value="1" id="quantity" readonly>
                        <button class="btn" id="increment">+</button>
                    </div>

                </td>
                <td id="cost">$100</td>
                <td>
                    <a href="#">
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">Total</td>
                <td colspan="2">
                    <span id="total"></span>
                </td>
            </tr>
        </tfoot>
    </table>
    <!-- ./Desktop Style -->

    <!-- Mobile Style -->
    <div class="mobile" id="table">
        <div class="card d-flex flex-row">
            <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" alt="product img">
            <div class="card-body d-flex flex-row justify-content-between align-items-center">
                <div id="row">
                    <h5 class="card-title">Mark</h5>
                    <p class="card-text">
                        <span id="cost">$100</span>
                        <span id="price">$100</span>
                    </p>
                    <div class="quanity">
                        <button class="btn" id="decrement">-</button>
                        <input type="text" value="1" id="quantity" readonly>
                        <button class="btn" id="increment">+</button>
                    </div>
                </div>
                
                <a href="#" class="btn mobile-del-btn">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
            </div>
        </div>
        <div class="card d-flex flex-row">
            <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" alt="product img">
            <div class="card-body d-flex flex-row justify-content-between align-items-center">
                <div id="row">
                    <h5 class="card-title">Mark</h5>
                    <p class="card-text">
                        <span id="cost">$100</span>
                        <span id="price">$100</span>
                    </p>
                    <div class="quanity">
                        <button class="btn" id="decrement">-</button>
                        <input type="text" value="1" id="quantity" readonly>
                        <button class="btn" id="increment">+</button>
                    </div>
                </div>
                
                <a href="#" class="btn mobile-del-btn">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
            </div>
        </div>
        <div class="total">
            <p>Total :</p>
            <p>
                <span id="total"></span>
            </p>
        </div>
        
    </div>
    <!-- ./Mobile Style -->

    <div class="text-end">
        <a href="#" class="common-btn">Checkout</a>
    </div>
    
    <div class="checkout d-md-flex align-items-center">

        <!-- Form Section -->
        <div class="checkout-form col-md-5">
            <form>
                <div class="mb-3">
                    <label for="address" class="form-label title">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter your address">
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="phone" class="form-label title">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number">
                    </div>
                    <div class="col-md-6 mb-mobile-3">
                        <label for="postal" class="form-label title">Postal code</label>
                        <input type="number" class="form-control" id="postal" placeholder="Enter your Postal code">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="payment" class="form-label title">Payment</label>
                    <select class="form-control" id="payment">
                        <option value="" disabled selected>Select your payment method</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="bank_transfer">Bank Transfer</option>
                        <option value="cash">Cash</option>
                    </select>
                </div>
            
                <div class="text-center mb-mobile-3">
                    <button type="submit" class="common-btn">Submit</button>
                </div>
            </form>
        </div>
        <!-- ./Form Section -->

        <div class="col-md-2"></div>

        <div class="map col-md-5">
            <h3 class="title m-b-20">
                Select your address on the map
            </h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15635.942969457286!2d104.94809415!3d11.5528796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310957427939910d%3A0xbfc58c8bcfc56e39!2sKart%20Station%20by%20DIB%20Club!5e0!3m2!1sen!2skh!4v1736398726990!5m2!1sen!2skh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </div>

</div>
<!-- ./Main Content -->

<script src="{{ asset('assets/js/cart.js') }}"></script>
@endsection