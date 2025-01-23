@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('assets/css/template.css') }}"> -->
@endsection
@section('contents')
<!-- Breadcrumbs -->
<nav aria-label="breadcrumb" class="py-4">
    <div class="container">
        <ol class="breadcrumb mb-0 bg-transparent">
            <li class="breadcrumb-item"><a href="./home.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Support</li>
        </ol>
    </div>
</nav>

<main>
    <div class="container cart m-b-20">
        <table class="table desktop">
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
                <tr>
                    <th scope="row">
                        1
                    </th>
                    <th>
                        <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" alt="product img">
                    </th>
                    <td>Mark</td>
                    <td>
                        100$
                    </td>
                    <td>
                        <i class="fa-solid fa-trash-can"></i>
                    </td>
                    <td>
                        <input type="checkbox">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        1
                    </th>
                    <th>
                        <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" alt="product img">
                    </th>
                    <td>Mark</td>
                    <td>
                        100$
                    </td>
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
                    <td colspan="3">Total</td>
                    <td colspan="3">200$</td>
                </tr>
            </tfoot>
        </table>
        <div class="mobile">
            <div class="card d-flex flex-row">
                <img src="{{asset('assets/images/bg/fisher-bg.jpg')}}" alt="product img">
                <div class="card-body d-flex flex-row justify-content-between align-items-center">
                    <div class="">
                        <h5 class="card-title">Mark</h5>
                        <p class="card-text">100$</p>
                        <div class="quanity">
                            <button class="btn" id="decrement">-</button>
                            <input type="text" value="1" id="quantity" readonly>
                            <button class="btn" id="increment">+</button>
                        </div>
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
                    <div class="">
                        <h5 class="card-title">Mark</h5>
                        <p class="card-text">100$</p>
                        <div class="quanity">
                            <button class="btn" id="decrement">-</button>
                            <input type="text" value="1" id="quantity" readonly>
                            <button class="btn" id="increment">+</button>
                        </div>
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
                <p>$200</p>
            </div>

        </div>

        <div class="text-end d-flex flex-column flex-lg-row gap-3 justify-content-end">
            <a href="#" class="common-btn">Shop more</a>
            <a href="#" class="common-btn">Add to Card</a>
        </div>

    </div>
</main>
<script src="{{ asset('assets/js/cart.js') }}"></script>
@endsection