@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/register.css') }}" />
@endsection
@section('contents')
<div class="login-box d-flex flex-column">
  <div class="login-header">
    <h2> Customer Registeration
      <p>Register Account & Buy Our Products</p>
    </h2>
  </div>

  <!-- form start -->
  <form id="register_customer_form" name="register_seller_form" method="POST" class="input-container d-flex flex-column">
    <div class="input-box d-flex flex-column">
      <label for="user">Username</label>
      <input name="username" placeholder="John Doe" type="text" id="user" spellcheck="false" autofocus required>
    </div>
    <div class="input-box d-flex flex-column">
      <label for="email">Email</label>
      <input name="email" placeholder="example@domain.com" type="text" id="email" spellcheck="false" autofocus required>
    </div>
    <div class="input-box d-flex flex-column">
      <label for="pass">Password</label>
      <input name="password" placeholder="********" type="password" id="pass" autocomplete="off">
    </div>
    <div class="input-box d-flex flex-column">
      <label for="pass">Confirm Password</label>
      <input name="confirm_password" placeholder="********" type="password" id="pass" autocomplete="off">
    </div>
    <div class="row ph-no">
      <div class="input-box col-md-6 col-xs-12 d-flex flex-column">
        <label for="primary-no">First Phone No</label>
        <input name="first_phone" placeholder="+81 90-1234-5678" type="number" id="primary-no" autocomplete="off">
      </div>
      <div class="input-box col-md-6 col-xs-12 d-flex flex-column">
        <label for="secondory-no">Second Phone No</label>
        <input name="second_phone" placeholder="+81 90-1234-5678" type="number" id="secondory-no" autocomplete="off">
      </div>
    </div>
    <div class="input-box d-flex flex-column">
      <label for="line">Line ID</label>
      <input name="line_id" placeholder="U8189cf6745fc0d808977bdb0b9f22995" type="string" id="line" autocomplete="off">
    </div>

    <input name="submit" type="submit" class="input-submit" value="Register">
    <div class="register">
      <p>Already have an account?
        <a href="{{ route('login_customer') }}" class="ms-1">Login</a>
      </p>
      <p>Need to sell your products?
        <a href="{{ route('register_seller') }}" class="ms-1">Register For Free</a>
      </p>
    </div>
  </form>
  <!-- form end -->
</div>
<script>
  $(document).ready(function() {
     $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
         $("#register_customer_form").submit(function(e) {
             e.preventDefault();
             var formData = new FormData(this);
             $.ajax({
                 url: "{{ route('register_store_customer') }}",
                 type: 'POST',
                 dataType: 'json',
                 data: formData,
                 contentType: false,
                 processData: false,
                 success: function(response) {
                     if (response.status == true) {
                         window.location.href = "{{ route('login_customer') }}";
                     } else{
                         if(response.message){
                             alert(response.message);
                         }
                     }
                 }
             });
         });
  });
</script>
@endsection