@extends('includes.layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}" />
@endsection
@section('contents')
    <div class="container-custom mt-2 cart">

  <!-- Step List -->
   <div class="py-4 position-relative">
     <div class="progress-box w-100 h-100 position-absolute d-flex">
       <span class="progress-bar m-auto">
          <span class="progress"></span>
       </span>
     </div>
     <ul class="step-list d-flex text-center">
       <li class="step active d-flex flex-column align-items-center">
         <span class="me-2">1</span>
         <p class="d-none d-md-block">Order details</p>
       </li>
       <li class="step d-flex flex-column align-items-center">
         <span class="me-2">2</span>
         <p class="d-none d-md-block">Login</p>
       </li>
       <li class="step d-flex flex-column align-items-center">
         <span class="me-2">3</span>
         <p class="d-none d-md-block">Shopping address</p>
       </li>
       <li class="step d-flex flex-column align-items-center">
         <span class="me-2">4</span>
         <p class="d-none d-md-block">Payment</p>
       </li>
       <li class="step d-flex flex-column align-items-center">
         <span class="me-2">5</span>
         <p class="d-none d-md-block">Complete</p>
       </li>
     </ul>
   </div>
  <!-- ./Step List -->

  <!-- Checkout -->
  <div class="page" id="checkout">
    <!-- Desktop Style -->
    <table class="table desktop text-center d-md-table d-none table-item">
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
        <tr class="table-row">
          <td >
            <div class="table-img"><img src="{{asset('assets/images/account1.svg')}}" alt="product img"></div>
          </td>
          <td clas="col-name">Mark</td>
          <td class="price">¥422</td>
          <td>
            <div class="quantity d-flex">
              <button class="btn decrement">-</button>
              <input type="text" value="1" class="quantity-value" readonly>
              <button class="btn increment">+</button>
            </div>
          </td>
          <td  class="cost">¥100</td>
          <td class="col-remove"><a href="#" class="mx-auto"><i class="fa-solid fa-trash-can"></i></a>
          </td>
        </tr>
        <tr class="table-row">
          <td >
            <div class="table-img"><img src="{{asset('assets/images/account2.svg')}}" alt="product img"></div>
          </td>
          <td class="col-name">Mark</td>
          <td class="price">¥100</td>
          <td>
            <div class="quantity d-flex">
              <button class="btn decrement">-</button>
              <input type="text" value="1" class="quantity-value" readonly>
              <button class="btn increment">+</button>
            </div>
          </td>
          <td class="cost">¥100</td>
          <td class="remove"><a href="#"><i class="fa-solid fa-trash-can"></i></a>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4"></td>
          <td>Total</td>
          <td>
            <span class="total"></span>
          </td>
        </tr>
      </tfoot>
    </table>
    <!-- ./Desktop Style -->

            <!-- Mobile Style -->
            <div class="mobile d-md-none d-flex flex-column gap-3 table-item">
                @if (!$carts->isEmpty())
                    @foreach ($carts as $item )
                    <div class="card">
                        <div class="card-img align-content-center me-2">
                            <img src="{{ asset($item->product->product_image) }}" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="table-row">
                                <p class="card-name">{{ $item->product->name }}</p>
                                <div class="card-text">
                                    <span class="cost"></span>
                                    <span class="price">{{ $item->product->product_price }}</span>
                                </div>
                                <div class="quantity d-flex">
                                    <button class="btn decrement">-</button>
                                    <input type="text" value="{{ $item->quantity }}" class="quantity-value" readonly>
                                    <button class="btn increment">+</button>
                                </div>
                            </div>
                            <a href="#" class="btn del-btn">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </div>
                    </div>

                    @endforeach
                @else
                    <div class="text-center my-3">No product in the cart</div>
                @endif



                <div class="card">
                    <div class="card-img align-content-center me-2">
                        <img src="{{ asset('assets/images/account2.svg') }}" alt="product img">
                    </div>
                    <div class="card-body">
                        <div class="table-row">
                            <p class="card-name">Mark</p>
                            <div class="card-text">
                                <span class="cost">¥100</span>
                                <span class="price">¥100</span>
                            </div>
                            <div class="quantity d-flex">
                                <button class="btn decrement">-</button>
                                <input type="text" value="1" class="quantity-value" readonly>
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
                        <span class="total"></span>
                    </p>
                </div>
            </div>
            <!-- ./Mobile Style -->

            <div class="text-end my-4">
                <a href="#address" class="common-btn btn-next">Next</a>
            </div>
        </div>
        <!-- ./Checkout -->



    </div>


    <script src="{{ asset('assets/js/cart.js') }}"></script>
@endsection
