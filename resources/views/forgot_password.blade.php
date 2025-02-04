@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/forgot_password.css') }}" />
@endsection
@section('contents')
<div class="forgotpass mx-auto rounded-3 overflow-hidden shadow">
  @include('messages.index')
  <h3 class="bg-primary py-2 text-white text-center">Forgot Password</h3>
  <div class="bg-white px-4 py-lg-4 py-3">
    <form method="post" name="forgot_password" id="forgot_password">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control border-2" placeholder="email@gmail.com" autofocus>
        <span class="invalid-feedback"></span>
      </div>

      <!-- reset -->
       <!-- <div class="mb-3 password-wpr">
         <label for="password" class="form-label">Password</label>
         <div class="input-group border border-2 rounded overflow-hidden">
           <input id="password" name="password" type="password" placeholder="Enter New Password" class="form-control border-0 shadow-none" required autofocus>
           <button class="btn border-0 password" tabindex="-1"><i class="fa-solid fa-eye"></i></button>
         </div>
       </div> -->

       <!-- <div class="mb-3 password-wpr">
         <label for="confirm-password" class="form-label">Confirm Password</label>
         <div class="input-group border border-2 rounded overflow-hidden">
           <input id="confirm-password" name="confirm-password" type="password" placeholder="Re-Enter Password" class="form-control border-0 shadow-none @error('confirm-password') is-invalid @enderror" required autofocus>
           <button class="btn border-0 password" tabindex="-1"><i class="fa-solid fa-eye"></i></button>
         </div>
       </div> -->
      <!-- /rest -->

      <div class="d-flex flex-column align-items-center">
        <button id="submit" name="submit" type="submit" class="common-btn btn btn-primar rounded-pill">Send Reset a Link</button>
        <a href="{{url('/login')}}" class="mt-3">Back to Login</a>
      </div>
    </form>
  </div>
</div>
<script>
  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $("#forgot_password").submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        url: "{{ route('mail.reset') }}",
        type: 'POST',
        dataType: 'json',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          if (response.status == true) {
            window.location.href = "{{ route('forgotpassword') }}";
          } else {
            var errors = response.errors;
            if (errors.email) {
              $('#email').addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback')
                .html(errors.email);
            } else {
              $('#email').removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');
            }
          }
        }
      });
    });
  });
</script>
@endsection