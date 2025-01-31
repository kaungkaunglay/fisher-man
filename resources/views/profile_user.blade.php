@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/profile_user.css') }}" />
@endsection
@section('contents')

<!-- Main Content -->
<div class="container-custom">
  <div class="row">
    <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb" class="py-4 mt-3">
          <ol class="breadcrumb mb-0 bg-transparent">
            <li class="breadcrumb-item"><a href="./home.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Porfile</li>
          </ol>
      </nav>  
    <!-- ./Breadcrumbs -->
    <div class="col -12 col-lg-6">
      <div class="row">
        <div class="col-12 col-lg-6">
          <img src="{{asset('assets/images/account1.svg')}}" class="w-100" alt="">
        </div>
        <div class="col-12 col-lg-6 mt-2 mt-lg-0">
          <button class="w-100 d-block text-end "><i class="fa-solid fa-pen-to-square fs-5 text-danger "></i></button>
          <h6 class="fw-bold">Name or Organization name</h6>
          <p class="mb-0">email@gmail.com</p>
          <p class="mb-0">LineID</p>
          <p class="mb-0">Chat with name or Organization name</p>
          <button><i class="fa-brands fa-line fs-2 mt-2"></i></button>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12">
          <h6 class="fw-bold mb-3 d-flex detail-title">
            Detail Personal Info
            <div class="col-3 text-end">
              <button>
                <i class="fa-solid fa-pen-to-square fs-5 text-danger"></i>
              </button>
            </div>
          </h6>
          <div class="address d-flex mb-1">
            <p class="w-25 fw-semibold">Address</p>
            <p class="ms-5 ps-3 ps-lg-0 text-black">:house no street,sue distict,city</p>
          </div>
          <div class="address d-flex mb-2">
            <p class="w-25 fw-semibold">Phone No</p>
            <p class="ms-5 text-black">:09429523324,0966723634</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-lg-9">
          <div class="buttons d-flex">
            <button class="btn btn-outline-primary px-4 w-50 py-1">Register as a seller</button>
            <button class="btn btn-outline-primary px-4 ms-2 w-50">Check order status</button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-1"></div>
    <div class="col-12 col-lg-5 mt-3 mt-lg-0">
      <h6 class="fw-bold">Select Your Location</h6>
      <iframe class="w-100"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d250151.16276620553!2d104.72537013378734!3d11.579654014369655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109513dc76a6be3%3A0x9c010ee85ab525bb!2sPhnom%20Penh%2C%20Cambodia!5e0!3m2!1sen!2ssg!4v1736774811619!5m2!1sen!2ssg"
        height="330" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>

  <!-- History Table -->
  <div class="history">
    <h2 class="title">History</h2>
    <ol class="history-list">
      <li>
        <div class="history-item row">
          <div class="col-md-8 col-sm-12">
            <h3 class="shop-name">Shop Name</h3>
            <p class="payment">Payment method & used card last no.</p>
          </div>
          <div class="col-md-4 col-sm-12">
            <span class="date">15/06/2024</span>
            <a class="download" download="">
              <i class="fa-solid fa-download"></i>
            </a>
          </div>
        </div>
      </li>

      <li>
        <div class="history-item row">
          <div class="col-md-8 col-sm-12">
            <h3 class="shop-name">Shop Name</h3>
            <p class="payment">Payment method & used card last no.</p>
          </div>
          <div class="col-md-4 col-sm-12">
            <span class="date">15/06/2024</span>
            <a class="download" download="">
              <i class="fa-solid fa-download"></i>
            </a>
          </div>
        </div>
      </li>

      <li>
        <div class="history-item row">
          <div class="col-md-8 col-sm-12">
            <h3 class="shop-name">Shop Name</h3>
            <p class="payment">Payment method & used card last no.</p>
          </div>
          <div class="col-md-4 col-sm-12">
            <span class="date">15/06/2024</span>
            <a class="download" download="">
              <i class="fa-solid fa-download"></i>
            </a>
          </div>
        </div>
      </li>

      <li>
        <div class="history-item row">
          <div class="col-md-8 col-sm-12">
            <h3 class="shop-name">Shop Name</h3>
            <p class="payment">Payment method & used card last no.</p>
          </div>
          <div class="col-md-4 col-sm-12">
            <span class="date">15/06/2024</span>
            <a class="download" download="">
              <i class="fa-solid fa-download"></i>
            </a>
          </div>
        </div>
      </li>

      <li>
        <div class="history-item row">
          <div class="col-md-8 col-sm-12">
            <h3 class="shop-name">Shop Name</h3>
            <p class="payment">Payment method & used card last no.</p>
          </div>
          <div class="col-md-4 col-sm-12">
            <span class="date">15/06/2024</span>
            <a class="download" download="">
              <i class="fa-solid fa-download"></i>
            </a>
          </div>
        </div>
      </li>
    </ol>
  </div>
  <!-- ./History Table -->
</div>
<!-- ./Main Content -->

@endsection