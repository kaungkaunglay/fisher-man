@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}" />
@endsection
@section('contents')

<div class="container-custom py-5">

  <!-- Step List -->
  <ul class="step-list d-flex justify-content-between text-center mb-4">
    <li class="step active d-flex flex-row align-items-center">
      <span class="me-2">1</span>
      <p class="d-none d-md-block">Order details</p>
    </li>
    <li class="step d-flex flex-row align-items-center">
      <span class="me-2">2</span>
      <p class="d-none d-md-block">Login</p>
    </li>
    <li class="step d-flex flex-row align-items-center">
      <span class="me-2">3</span>
      <p class="d-none d-md-block">Shopping address</p>
    </li>
    <li class="step d-flex flex-row align-items-center">
      <span class="me-2">4</span>
      <p class="d-none d-md-block">Payment</p>
    </li>
    <li class="step d-flex flex-row align-items-center">
      <span class="me-2">5</span>
      <p class="d-none d-md-block">Complete</p>
    </li>
  </ul>
  <!-- ./Step List -->

  <!-- Step Content -->
  <div class="container cart">

    <!-- Checkout -->
    <div class="page" id="checkout">
      <!-- Desktop Style -->
      <table class="table desktop text-center d-md-table d-none" id="table">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Product address</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
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
              <div class="quantity d-flex">
                <button class="btn decrement">-</button>
                <input type="text" value="1" id="quantity" readonly>
                <button class="btn increment">+</button>
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
              <div class="quantity d-flex">
                <button class="btn decrement">-</button>
                <input type="text" value="1" id="quantity" readonly>
                <button class="btn increment">+</button>
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
          <div class="card-img align-content-center me-2">
            <img src="{{asset('assets/images/account1.svg')}}" alt="product img">
          </div>
          <div class="card-body">
            <div id="row">
              <p class="card-name">Mark</p>
              <div class="card-text">
                <span id="cost">$100</span>
                <span id="price">$100</span>
              </div>
              <div class="quantity d-flex">
                <button class="btn decrement">-</button>
                <input type="text" value="1" id="quantity" readonly>
                <button class="btn increment">+</button>
              </div>
            </div>
            <a href="#" class="btn del-btn">
              <i class="fa-solid fa-trash-can"></i>
            </a>
          </div>
        </div>

        <div class="card">
          <div class="card-img align-content-center me-2">
            <img src="{{asset('assets/images/account2.svg')}}" alt="product img">
          </div>
          <div class="card-body">
            <div id="row">
              <p class="card-name">Mark</p>
              <div class="card-text">
                <span id="cost">$100</span>
                <span id="price">$100</span>
              </div>
              <div class="quantity d-flex">
                <button class="btn decrement">-</button>
                <input type="text" value="1" id="quantity" readonly>
                <button class="btn increment">+</button>
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
        <a href="#address" class="common-btn btn-next">Next</a>
      </div>
    </div>
    <!-- ./Checkout -->

    <!-- Address -->
    <div class="page" id="address">
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
        </li>
        <li>
          <span>Delivery Address </span>
          : Customer Address
        </li>
      </ul>
      <div class="d-flex gap-3 my-4 justify-content-end">
        <a href="#checkout" class="btn btn-outline-primary common-btn btn-back">Go Back</a>
        <a href="#payment" class="btn btn-outline-primary common-btn btn-next">Next</a>
      </div>
    </div>
    <!-- ./Address -->

    <!-- Payment -->
    <div class="page" id="payment">

      <!-- Payment Method Form -->
      <div class="popup">
        <div class="bg-white rounded-3 border text-black mx-auto" id="payment-form">
          <h2 class="title">Add Payment Method</h2>
          <form class="d-flex flex-column" action="">
            <div>
              <label for="card-number">Card number</label>
              <div class="input-container d-flex border bg-white pe-2 rounded-2">
                <input type="number" name="" id="card-number" class="w-100 p-2 border-0 align-items-center" placeholder="1234 1234 1234 1234">
                <div class="card-bank-img d-flex gap-1">
                  <img src="{{asset('assets/icons/custom/visa.svg')}}" alt="visa.svg">
                  <img src="{{asset('assets/icons/custom/mastercard.svg')}}" alt="visa.svg">
                  <img src="{{asset('assets/icons/custom/amex.svg')}}" alt="visa.svg">
                  <img src="{{asset('assets/icons/custom/discover.svg')}}" alt="visa.svg">
                </div>
              </div>
            </div>

            <div class="d-flex flex-column flex-sm-row input-wpr">
              <div class="w-100">
                <label for="expire">Expiration</label>
                <input type="date" name="" id="expire" class="w-100 p-2 border rounded">
              </div>
              <div class="w-100">
                <label for="cvc">CVC</label>
                <div class="input-container d-flex border bg-white pe-2 rounded-2 align-items-center">
                  <input type="number" name="" id="cvc" class="w-100 p-2 border-0" placeholder="CVC">
                  <div class="cvc-bank-img">
                    <img src="{{asset('assets/icons/custom/discover.svg')}}" alt="visa.svg">
                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex flex-column flex-sm-row input-wpr">
              <div class="w-100">
                <label for="country">Country</label>
                <select name="" id="country" class="w-100 p-2 border rounded">
                  <option value="jpn" selected>Japan</option>
                  // card.css >> country-list func
                </select>
              </div>
              <div class="w-100">
                <label for="zip">ZIP</label>
                <input type="number" id="zip" class="w-100 p-2 border rounded" placeholder="104-0044">
              </div>
            </div>

            <p class="content">
              By providing your card information, you allow Awardco, Inc. to charge your card for future payments in
              accordance with their terms.
            </p>
            <div class="d-flex align-items-start gap-2">
              <input type="checkbox" class=" mt-2">
              <p>
                I agree that by saving this payment method it will be available for use to all who have access to this
                page or to processing funding deposits.
              </p>
            </div>

            <div class="d-flex gap-3 text-center justify-content-center">
              <button class="common-btn btn btn-outline-primary" id="cancel">Cancel</button>
              <a href="#complete" class="common-btn btn btn-outline-primary btn-next">Save</a>
            </div>
          </form>
        </div>
      </div>
      <!-- ./Payment Method Form -->

      <!-- Desktop Style -->
      <table class="table desktop text-center d-md-table d-none" id="table">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Product address</th>
            <th scope="col">Price</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
          <tr id="row">
            <td class="col-img">
              <div class="table-img"><img src="{{asset('assets/images/account1.svg')}}" alt="product img"></div>
            </td>
            <td clas="col-name">Mark</td>
            <td class="col-price" id="price">$100</td>
            <td class="col-cost" id="cost">$100</td>
            </td>
          </tr>
          <tr id="row">
            <td class="col-img">
              <div class="table-img"><img src="{{asset('assets/images/account2.svg')}}" alt="product img"></div>
            </td>
            <td class="col-name">Mark</td>
            <td id="price">$100</td>
            <td class="cost" id="cost">$100</td>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3" class="total">Total</td>
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
          <div class="card-img align-content-center me-2">
            <img src="{{asset('assets/images/account1.svg')}}" alt="product img">
          </div>
          <div class="card-body">
            <div id="row">
              <p class="card-name">Mark</p>
              <div class="card-text">
                <span id="cost">$100</span>
                <span id="price">$100</span>
              </div>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-img align-content-center me-2">
            <img src="{{asset('assets/images/account2.svg')}}" alt="product img">
          </div>
          <div class="card-body">
            <div id="row">
              <p class="card-name">Mark</p>
              <div class="card-text">
                <span id="cost">$100</span>
                <span id="price">$100</span>
              </div>
            </div>
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

      <h2 class="py-3 px-3 mt-5 bg-primary text-white" id="payment-check-sec">Select Payment</h2>
      <div class="d-flex gap-3 py-3 px-3">
        <input type="checkbox" id="select-payment">
        Credit Card
        <div class="ms-auto text-danger" id="warning-msg">Please Check the mark</div>
      </div>

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
        </li>
        <li>
          <span>Delivery Address </span>
          : Customer Address
        </li>
      </ul>
      <div class="d-flex gap-3 my-4 justify-content-end">
        <a href="#address" class="btn btn-outline-primary common-btn btn-back">Go Back</a>
        <button class="btn btn-outline-primary common-btn btn-payment">Check Out</button>
      </div>
    </div>
    <!-- ./Payment -->

    <!-- Complete -->
    <div class="page" id="complete">
      <p class="text-center">Your Payment is Successful. We will sent the invoice to your mail and Line ID Please check.
      </p>
      <div class="d-flex gap-3 py-5 justify-content-center">
        <a href="{{ url(path: '/') }}" class="btn btn-outline-primary common-btn">Contact Us</a>
        <a href="{{ url('/') }}" class="btn btn-outline-primary common-btn">Home Page</a>
      </div>
    </div>
    <!-- ./Complete -->

  </div>
  <!-- ./Step Content -->

</div>

<script src="{{ asset('assets/js/cart.js') }}"></script>
<script src="{{ asset('assets/js/step.js') }}"></script>
<script src="{{ asset('assets/js/cart.test.js') }}"></script>
@endsection