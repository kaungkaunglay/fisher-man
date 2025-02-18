@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/profile_user.css') }}" />
@endsection
@section('contents')
<!-- Main Content -->
<div class="container-custom mt-2">
  <!-- Breadcrumbs -->
  <nav aria-label="breadcrumb" class="py-4">
    <ol class="breadcrumb mb-0 bg-transparent">
      <li class="breadcrumb-item"><a href="./home.html">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Porfile</li>
    </ol>
  </nav>
  <!-- ./Breadcrumbs -->


    <!-- Profile Section -->
    <div class="profile_seller">

    <div class="row">

      <!-- Profile Side -->
      <div class="col-12 col-lg-7">

      <div class="row">

        <!-- profile img -->
        <div class="col-12 col-lg-6">
        <img src="{{ asset('assets/images/account1.svg') }}" class="w-100" alt="">
        </div>

        <!-- profile info -->
        <form action="#" class="col-12 col-lg-6 mt-2 mt-lg-0 profile-form">

          <div class="d-flex justify-content-end gap-4">
            <button type="submit" class="save">
              <i class="fa-solid fa-save fs-5 text-danger"></i>
            </button>
            <button class="edit">
              <i class="fa-solid fa-pen-to-square fs-5 text-danger"></i>
            </button>
            <button class="cancel">
              <i class="fa-solid fa-x fs-5 text-danger"></i>
            </button>
          </div>

          <!-- user name -->
          <div class="d-flex align-items-center mt-1">
            <label class="w-25" for="name">Name</label>:
            <input type="text" class="p-1 ms-1 rounded-1" id="name" value="{{ $user->username }}" readonly>
          </div>

          <!-- email link -->
          <div class="d-flex align-items-center link-contain mt-2">
            <label class="w-25" for="email">Email</label>:
            <a href="mailto:{{ $user->email }}" class="p-1">{{ $user->email }}</a>
            <input type="email" class="p-1 ms-1 rounded-1" id="email" value="{{ $user->email }}" readonly>
          </div>

          <!-- line link -->
          <div class="d-flex align-items-center link-contain mt-2">
            <label class="w-25" for="line">Line</label>:
            <a href="#" class="p-1">{{ $user->line_id}}</a>
            <input type="text" class="p-1 ms-1 rounded-1" id="line" value="{{ $user->line_id}}" readonly>
          </div>

          <!-- organization link -->
          <div class="d-flex align-items-center mt-2">
            <label class="w-25" for="organize">Organize</label>:
            <input type="text" class="p-1 ms-1 rounded-1" id="organize" value="Chat with name or Organization name" readonly>
          </div>

          <div>
            <i class="fa-brands fa-line fs-2 mt-1"></i>
          </div>

        </form>
        <!-- /profile info -->

        <!-- detail info -->
        <form action="#" class="col-12 col-lg-12 mt-4 profile-form">

          <h2 class="fw-bold d-flex justify-content-between">
            Detail Personal Info
            <div class="d-flex justify-content-end gap-4">
              <button type="submit" class="save">
                <i class="fa-solid fa-save fs-5 text-danger"></i>
              </button>
              <button class="edit">
                <i class="fa-solid fa-pen-to-square fs-5 text-danger"></i>
              </button>
              <button class="cancel">
                <i class="fa-solid fa-x fs-5 text-danger"></i>
              </button>
            </div>
          </h2>
    
          <!-- address -->
          <div class="d-flex align-items-center mt-2">
            <label class="w-25" for="address">Address</label>:
            <input type="text" class="p-1 ms-1 rounded-1" id="address" value="house no street,sue distict,city" readonly>
          </div>

          <!-- phone-number link -->
          <div class="d-flex align-items-start link-contain">
            <label class="w-25" for="tel">Phone No.</label>:
            <div class="ms-1 d-flex phone-no-container">
              <a href="tel:{{ $user->first_phone}}" class="p-1">{{ $user->first_phone}}</a>
              <input type="tel" class="p-1 mt-2 rounded-1" id="tel" value="{{ $user->first_phone}}" readonly>
               <b class="cor align-content-end">, </b>
              <a href="tel:{{ $user->second_phone }}" class="p-1">{{ $user->second_phone }}</a>
              <input type="tel" class="p-1 mt-2 rounded-1 sec-phone" value="{{ $user->second_phone }}" readonly>
            </div>
          </div>

        </form>
        <!-- /detail info -->

        <!-- button group -->
        <div class="buttons d-flex gap-2 mt-3">
          <button class="btn btn-outline-primary px-4 w-50 py-1">Register as a seller</button>
          <button class="btn btn-outline-primary px-4 ms-2 w-50">Check order status</button>
        </div>

      </div>

      </div>
      <!-- /Profile Side -->

      <!-- Map Side -->
      <div class="col-12 col-lg-5 mt-3 mt-lg-0">
      <h6 class="fw-bold">Selection Your Location</h6>
      <iframe class="w-100"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d250151.16276620553!2d104.72537013378734!3d11.579654014369655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109513dc76a6be3%3A0x9c010ee85ab525bb!2sPhnom%20Penh%2C%20Cambodia!5e0!3m2!1sen!2ssg!4v1736774811619!5m2!1sen!2ssg"
        height="330" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <!-- /Map Side -->

    </div>

    </div>
    <!-- /Profile Section -->

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
<script src="{{ asset('assets/js/profile-seller.js') }}"></script>
<script>
    $(document).ready(function() {
        if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function(position) {
            console.log("Found your location \nLat : "+position.coords.latitude+" \nLang :"+ position.coords.longitude);
        }, function(error) {
            console.error("Error getting location:", error);
        });
    }
    });
</script>

@endsection
