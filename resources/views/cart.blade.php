@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}" />
@endsection
@section('contents')

<div class="container-custom py-5">

  <!-- Step List -->
  <ul class="step-list d-flex justify-content-between text-center mb-4">
    <li class="step active d-flex flex-md-row flex-column align-items-center">
      <span class="me-2">1</span>
      Order details
    </li>
    <li class="step d-flex flex-md-row flex-column align-items-center">
      <span class="me-2">2</span>
      Login
    </li>
    <li class="step d-flex flex-md-row flex-column align-items-center">
      <span class="me-2">3</span>
      Shopping address
    </li>
    <li class="step d-flex flex-md-row flex-column align-items-center">
      <span class="me-2">4</span>
      Payment
    </li>
    <li class="step d-flex flex-md-row flex-column align-items-center">
      <span class="me-2">5</span>
      Complete
    </li>
  </ul>
  <!-- ./Step List -->
  
  <!-- Step Content -->
  <div class="container-custom cart">

    <!-- Checkout -->
    <div class="checkout">
      <!-- Desktop Style -->
      <table class="table desktop text-center d-md-table d-none" id="table">
        <thead>
          <tr>
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
            <td class="col-img">
              <div class="table-img"><img src="{{asset('assets/images/account1.svg')}}" alt="product img"></div>
            </td>
            <td clas="col-name">Mark</td>
            <td class="col-price" id="price">$100</td>
            <td class="col-quantity">
              <div class="quanity">
                <button class="btn" id="decrement">-</button>
                <input type="text" value="1" id="quantity" readonly>
                <button class="btn" id="increment">+</button>
              </div>
            </td>
            <td class="col-cost" id="cost">$100</td>
            <td class="col-remove"><a href="#" class="mx-auto"><i class="fa-solid fa-trash-can"></i></a>
            </td>
          </tr>
          <tr id="row">
            <td class="col-img">
              <div class="table-img"><img src="{{asset('assets/images/account2.svg')}}" alt="product img"></div>
            </td>
            <td class="col-name">Mark</td>
            <td id="price">$100</td>
            <td class="col-quantity">
              <div class="quanity">
                <button class="btn" id="decrement">-</button>
                <input type="text" value="1" id="quantity" readonly>
                <button class="btn" id="increment">+</button>
              </div>
            </td>
            <td class="cost" id="cost">$100</td>
            <td class="remove"><a href="#"><i class="fa-solid fa-trash-can"></i></a>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="5" class="total">Total</td>
            <td>
              <span id="total"></span>
            </td>
          </tr>
        </tfoot>
      </table>
      <!-- ./Desktop Style -->
    
      <!-- Mobile Style -->
      <div class="mobile d-md-none d-flex flex-column gap-3" id="table">
        <div class="card">
          <div class="card-img">
            <img src="{{asset('assets/images/account1.svg')}}" alt="product img">
          </div>
          <div class="card-body">
            <div id="row">
              <p class="card-name">Mark</p>
              <div class="card-text">
                <span id="cost">$100</span>
                <span id="price">$100</span>
              </div>
              <div class="quanity">
                <button class="btn" id="decrement">-</button>
                <input type="text" value="1" id="quantity" readonly>
                <button class="btn" id="increment">+</button>
              </div>
            </div>
            <a href="#" class="btn del-btn">
              <i class="fa-solid fa-trash-can"></i>
            </a>
          </div>
        </div>

        <div class="card">
          <div class="card-img">
            <img src="{{asset('assets/images/account2.svg')}}" alt="product img">
          </div>
          <div class="card-body">
            <div id="row">
              <p class="card-name">Mark</p>
              <div class="card-text">
                <span id="cost">$100</span>
                <span id="price">$100</span>
              </div>
              <div class="quanity">
                <button class="btn" id="decrement">-</button>
                <input type="text" value="1" id="quantity" readonly>
                <button class="btn" id="increment">+</button>
              </div>
            </div>
            <a href="#" class="btn del-btn">
              <i class="fa-solid fa-trash-can"></i>
            </a>
          </div>
        </div>

        <div class="d-flex justify-content-between bg-primary text-white p-2 mt-3">
          <p>Total :</p>
          <p>
            <span id="total"></span>
          </p>
        </div>
      </div>
      <!-- ./Mobile Style -->
  
      <div class="text-end my-4">
        <a href="#" class="common-btn btn-next">Next</a>
      </div>
    </div>
    <!-- ./Checkout -->
  
    <!-- Payment -->
    <div class="payment">
      <h2 class="py-3 px-3 bg-primary text-white">Select Payment</h2>
      <div class="d-flex gap-3 py-3 px-3">
        <input type="checkbox">
        Credit Card
      </div>
    </div>
    <!-- ./Payment -->

    <!-- Address -->
    <div class="address">
      <h2 class="py-3 px-3 bg-primary text-white">Address</h2>
      <ul class="list-group gap-3 py-3 px-3">
        <li>
          <span>Name </span>
          : Customer Name
        </li>
        <li>
          <span>Phone Number </span>
          : 0988888888
        </li>
        <li>
          <span>Line ID </span>
          : Afasd-222
        </li>
        <li>
          <span>Postal Code </span>
          : 110001
        </li>
        <li>
          <span>Country </span>
          : Japan
          <button class="btn btn-outline-primary common-btn float-end">Edit</button>
        </li>
        <li>
          <span>Delivery Address </span>
          : Customer Address 
        </li>
      </ul>
      <div class="d-flex gap-3 my-4 justify-content-end">
        <button class="btn btn-outline-primary common-btn">Go Back</button>
        <button class="btn btn-outline-primary common-btn btn-next">Next</button>
      </div>
    </div>
    <!-- ./Address -->

    <!-- Complete -->
      <div class="complete">
        <p class="text-center">Your Payment is Successful. We will sent the invoice to your mail and Line ID Please check.</p>
        <div class="d-flex gap-3 py-5 justify-content-center">
          <button class="btn btn-outline-primary common-btn">Contact Us</button>
          <button class="btn btn-outline-primary common-btn">Home Page</button>
        </div>
      </div>
    <!-- ./Complete -->

  </div>
  <!-- ./Step Content -->

</div>

<script src="{{ asset('assets/js/cart.js') }}"></script>
<script src="{{ asset('assets/js/step.js') }}"></script>
@endsection