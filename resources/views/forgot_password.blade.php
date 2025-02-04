@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/forgot_password.css') }}" />
@endsection
@section('contents')
<div class="forgotpass mx-auto rounded-3 overflow-hidden shadow">
  @include('messages.index')
  <h3 class="bg-primary py-2 text-white text-center">Forgot Password</h3>
  <div class="bg-white px-3 py-4">
    <form method="post" name="forgot_password" id="forgot_password">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" autofocus>
        <span class="invalid-feedback"></span>
      </div>
      <div class="d-flex flex-column align-items-center">
        <button id="submit" name="submit" type="submit" class="common-btn btn btn-primar rounded-pill">Send Reset a
          Link</button>
        <a href="{{url('/login')}}" class="mt-3">Back to Login</a>
      </div>
    </form>
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