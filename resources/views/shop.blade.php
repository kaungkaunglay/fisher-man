@extends('includes.layout')
@section('title', 'Shop Profile')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/shop-profile.css') }}" />
@endsection

@section('contents')
    <section class="shop-profile py-5">
        <div class="container-custom">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center">
                    <img src="{{ asset('assets/images/shop-logo.png') }}" class="shop-logo mb-3" alt="Shop Logo">
                    <h2 class="shop-name">Shop Name</h2>
                    <p class="shop-description">This is a short description of the shop, providing details about its offerings and specialties.</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6">
                    <h5>Contact Information</h5>
                    <p>Email: shop@example.com</p>
                    <p>Phone: +123 456 7890</p>
                    <p>Address: 123 Street, City, Country</p>
                </div>
                <div class="col-lg-6">
                    <h5>Social Media</h5>
                    <a href="#" class="btn btn-primary me-2">Facebook</a>
                    <a href="#" class="btn btn-info">Twitter</a>
                </div>
            </div>
        </div>
    </section>
@endsection
   <!-- #region -->