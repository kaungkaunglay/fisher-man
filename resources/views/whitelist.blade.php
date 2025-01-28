@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/whitelist.css') }}">
@endsection
@section('contents')
<!-- Breadcrumbs -->
<nav aria-label="breadcrumb" class="py-4">
  <div class="container">
    <ol class="breadcrumb mb-0 bg-transparent">
      <li class="breadcrumb-item"><a href="./home.html">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">White List</li>
    </ol>
  </div>
</nav>
<!-- ./Breadcrumbs -->

<!-- Main Content -->
<div class="container cart m-b-20">

  <!-- Desktop Style -->
  <table class="table desktop" id="table">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Image</th>
        <th scope="col">Product address</th>
        <th scope="col">Price</th>
        <th scope="col">Remove</th>
        <th scope="col">Select</th>
      </tr>
    </thead>
    <tbody>
      <tr id="row">
        <th class="number" scope="row">
          1
        </th>
        <th>
          <img src="{{asset('assets/images/account1.svg')}}" alt="product img">
        </th>
        <td>Mark</td>
        <td id="cost">$100</td>
        <td>
          <i class="fa-solid fa-trash-can"></i>
        </td>
        <td>
          <input type="checkbox">
        </td>
      </tr>
      <tr id="row">
        <th class="number" scope="row">
          2
        </th>
        <th>
          <img src="{{asset('assets/images/account2.svg')}}" alt="product img">
        </th>
        <td>Mark</td>
        <td id="cost">$100</td>
        <td>
          <i class="fa-solid fa-trash-can"></i>
        </td>
        <td>
          <input type="checkbox">
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5">Total</td>
        <td>
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
          </p>
        </div>
        <div class="d-flex gap-3">
          <a href="#" class="btn mobile-del-btn">
            <i class="fa-solid fa-trash-can"></i>
          </a>
          <input type="checkbox" class="mobile-select">
        </div>
      </div>
    </div>
    <div class="card d-flex flex-row">
      <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" alt="product img">
      <div class="card-body d-flex flex-row justify-content-between align-items-center">
        <div id="row">
          <h5 class="card-title">Mark</h5>
          <p class="card-text">
            <span id="cost">$100</span>
          </p>
        </div>
        <div class="d-flex gap-3">
          <a href="#" class="btn mobile-del-btn">
            <i class="fa-solid fa-trash-can"></i>
          </a>
          <input type="checkbox" class="mobile-select">
        </div>
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

  <div class="text-end d-flex flex-column flex-lg-row gap-3 justify-content-end">
    <a href="#" class="common-btn">Shop more</a>
    <a href="#" class="common-btn">Add to Card</a>
  </div>
</div>
<!-- ./Main Content -->
<script src="{{ asset('assets/js/cart.js') }}"></script>
@endsection