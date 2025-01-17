@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/support.css') }}" />
@endsection
@section('contents')
<div class="container">
    <!-- Help -->
    <div class="accordion w-100" id="basicAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header " id="headingOne">
                <button class="accordion-button collapsed title" type="button"
                    data-mdb-toggle="collapse" data-mdb-target="#basicAccordionCollapseOne" 
                    aria-expanded="false" aria-controls="basicAccordionCollapseOne">
                    Question #1
                </button>
            </h2>
            <div id="basicAccordionCollapseOne" class="accordion-collapse collapse"
                aria-labelledby="headingOne" data-mdb-parent="#basicAccordion">
                <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by default,
                    until the collapse plugin adds the appropriate classes that we use to style each
                    element. These classes control the overall appearance, as well as the showing and
                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                    our default variables. It's also worth noting that just about any HTML can go within
                    the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
        <div class="accordion-item ">
            <h2 class="accordion-header " id="headingTwo">
                <button class="accordion-button collapsed title" type="button"
                    data-mdb-toggle="collapse" data-mdb-target="#basicAccordionCollapseTwo" 
                    aria-expanded="false" aria-controls="basicAccordionCollapseTwo">
                    Question #2
                </button>
            </h2>
            <div id="basicAccordionCollapseTwo" class="accordion-collapse collapse"
                aria-labelledby="headingTwo" data-mdb-parent="#basicAccordion">
                <div class="accordion-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                    until the collapse plugin adds the appropriate classes that we use to style each
                    element. These classes control the overall appearance, as well as the showing and
                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                    our default variables. It's also worth noting that just about any HTML can go within
                    the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
        <div class="accordion-item ">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed title" type="button"
                    data-mdb-toggle="collapse" data-mdb-target="#basicAccordionCollapseThree" 
                    aria-expanded="false" aria-controls="basicAccordionCollapseThree">
                    Question #3
                </button>
            </h2>
            <div id="basicAccordionCollapseThree" class="accordion-collapse collapse"
                aria-labelledby="headingThree" data-mdb-parent="#basicAccordion">
                <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default,
                    until the collapse plugin adds the appropriate classes that we use to style each
                    element. These classes control the overall appearance, as well as the showing and
                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                    our default variables. It's also worth noting that just about any HTML can go within
                    the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
        <div class="accordion-item ">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed title" type="button"
                    data-mdb-toggle="collapse" data-mdb-target="#basicAccordionCollapseFour" 
                    aria-expanded="false" aria-controls="basicAccordionCollapseFour">
                    Question #4
                </button>
            </h2>
            <div id="basicAccordionCollapseFour" class="accordion-collapse collapse"
                aria-labelledby="headingFour" data-mdb-parent="#basicAccordion">
                <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default,
                    until the collapse plugin adds the appropriate classes that we use to style each
                    element. These classes control the overall appearance, as well as the showing and
                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                    our default variables. It's also worth noting that just about any HTML can go within
                    the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
    </div>
    <!-- support form  -->
    <div class="container support-form">
        <div class="row ">
            <!-- Left Column -->
            <div class="col-md-6">
                <div class="contact-form">
                    <h2 class="title m-b-45">Contact form</h2>
                    <div class="row">
                        <div class="col-12">
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label title">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter your name">
                                </div>
            
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-mobile-3">
                                        <label for="line-id" class="form-label title">Line ID</label>
                                        <input type="text" class="form-control" id="line-id" placeholder="Enter your Line ID">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label title">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number">
                                    </div>
                                </div>
            
                                <div class="mb-3">
                                    <label for="email" class="form-label title">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                                </div>
            
                                <div class="mb-3">
                                    <label for="description" class="form-label title">Description</label>
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

            <!-- Right Column -->
            <div class="col-md-6">
                <div class="wish-list-form">
                    <h2 class="title m-b-45">Wish List form</h2>
                    <div class="row ">
                        <div class="col-12">
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label title">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter your name">
                                </div>
            
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-mobile-3">
                                        <label for="line-id" class="form-label title">Line ID</label>
                                        <input type="text" class="form-control" id="line-id" placeholder="Enter your Line ID">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label title">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number">
                                    </div>
                                </div>
            
                                <div class="mb-3">
                                    <label for="email" class="form-label title">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                                </div>
            
                                <div class="mb-3">
                                    <label for="description" class="form-label title">Description</label>
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
                    <div class="icon">
                        <img src="/assets/icons/fontawesome-free-5.15.4-web/svgs/brands/facebook-square.svg" alt="facebook-f">
                        <img src="/assets/icons/fontawesome-free-5.15.4-web/svgs/brands/line.svg" alt="facebook-f">
                        <img src="/assets/icons/fontawesome-free-5.15.4-web/svgs/brands/twitter-square.svg" alt="facebook-f">
                        <img src="/assets/icons/fontawesome-free-5.15.4-web/svgs/brands/whatsapp.svg" alt="facebook-f">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="txt">Address: 1234 Main Street, Anytown, Japan</p>
                            <p class="txt">Phone: 1234567890</p>
                            <p class="txt">Email:user@email.com</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection