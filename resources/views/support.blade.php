@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/support.css') }}" />
@endsection
@section('contents')
<div class="container m-t-20">

    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb" class="py-4">
        <div class="container">
            <ol class="breadcrumb mb-0 bg-transparent">
                <li class="breadcrumb-item"><a href="./home.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Support</li>
            </ol>
        </div>
    </nav>

    <!-- Help -->
    <div class="accordion w-100" id="basicAccordion">
        @foreach($faqs as $faq)
        <div class="accordion-item">
            <h2 class="accordion-header " id="heading{{ $faq->id }}">
                <button class="accordion-button collapsed title" type="button"
                    data-mdb-toggle="collapse" data-mdb-target="#basicAccordionCollapse{{ $faq->id }}"
                    aria-expanded="false" aria-controls="basicAccordionCollapseOne">
                    {{ $faq->question }}
                </button>
            </h2>
            <div id="basicAccordionCollapse{{ $faq->id }}" class="accordion-collapse collapse"
                aria-labelledby="heading{{ $faq->id }}" data-mdb-parent="#basicAccordion">
                <div class="accordion-body">
                    <strong>{{ $faq->answer }}</strong>
                </div>
            </div>
        </div>
        @endforeach
    <!-- support form  -->
    <div class="container support-form">
        <div class="row ">
            <!-- Left Column -->
            <div class="col-md-6">
                <div class="contact-form">
                    <h2 class="title m-b-45">Contact form</h2>
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('contact') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 mb-mobile-3">
                                        <label for="line-id" class="form-label">Line ID</label>
                                        <input type="text" name="line_id" class="form-control" id="line-id" placeholder="Enter your Line ID">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" name="phone" class="form-control" id="phone" placeholder="Enter your phone number">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter your description"></textarea>
                                </div>

                                <div class="text-center mb-mobile-3">
                                    <button type="submit" class="common-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <div class="wish-list-form">
                    <h2 class="title m-b-45">Wish List form</h2>
                    <div class="row ">
                        <div class="col-12">
                            <form>
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter your name">
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 mb-mobile-3">
                                        <label for="line-id" class="form-label">Line ID</label>
                                        <input type="text" class="form-control" id="line-id" placeholder="Enter your Line ID">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" rows="3" placeholder="Enter your description"></textarea>
                                </div>
                                <div class="text-center mb-mobile-3">
                                    <button type="submit" class="common-btn">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- location & contact -->
    <div class="row">
        <div class="col-md-6">
            <div class="p-3">
                <h2 class="title m-b-20">Our Location & Contact</h2>
                <div class="support-icon">
                    <i class="fa-brands fa-line"></i>
                    <i class="fa-brands fa-square-facebook"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                    <i class="fa-brands fa-square-instagram"></i>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="txt m-b-10">Address: 1234 Main Street, Anytown, Japan</p>
                        <p class="txt m-b-10">Phone: 1234567890</p>
                        <p class="txt m-b-10">Email:user@email.com</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/support.js') }}"></script>

@endsection