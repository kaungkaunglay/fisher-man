@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/profile_user.css') }}" />
@endsection
@section('contents')
<div class="breadcrumb">
  <a href="#home">Home</a>
  <a href="#profile">Profile</a>
</div>
<div class="row">
  <!-- profile start -->
  <div class="profile col-md-6 col-sm-12">
    <!-- profile status start -->
    <div class="profile-status row">
      <div class="profile-img col-md-6 col-sm-12">
        <img src="{{asset('assets/images/profile.jpg')}}" alt="">
      </div>
      <div class="profile-detail col-md-6 col-sm-12 d-flex flex-column">
        <p>Danny</p>
        <a href="mailto:#" class="mail" id="email">email@gmail.com</a>
        <p class="line-acc">LineID</p>
        <p>Chat with name or Organization name</p>
        <div class="media-list list-group">
          <a href=""><i class="fab fa-line"></i></a>
        </div>
      </div>
    </div>
    <!-- profile status end -->

    <!-- address start -->
    <address class="address">
      <h2 class="title">Detail Personal Info</h2>
      <div class="row">
        <h3 class="title col-4">Address</h3>
        <p class="profile-address col-8">: house no, street, sub-district, district, city</p>
      </div>
      <div class="row">
        <h3 class="title col-4">Phone No</h3>
        <ul class="profile-tele-list d-flex col-8">
          <li>
            <a href="tele:#">: <i class="tele" id="tel1">+959848499834</i></a>
          </li>
          <li>
            <a href="tele:#">, <i class="tele" id="tel2">+959998199834</i></a>
          </li>
        </ul>
      </div>
    </address>
    <!-- address end -->

    <div class="btn-container d-flex">
      <a href="" class="btn btn-outline-primary">Register as a seller</a>
      <a href="" class="btn btn-outline-primary">check order status</a>
    </div>

  </div>
  <!-- profile end -->

  <div class="map col-md-6 col-sm-12">
    <h2 class="title">Select Your Location</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27815390.40349121!2d115.72585034042068!3d31.676717858944855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34674e0fd77f192f%3A0xf54275d47c665244!2z5pel5pys!5e0!3m2!1sja!2sjp!4v1736909758335!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>

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
@endsection