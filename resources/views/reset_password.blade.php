@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/forgot_password.css') }}" />
@endsection
@section('contents')

@include('messages.index')

<div class="forgotpass mx-auto rounded-3 overflow-hidden shadow">
  <h3 class="bg-primary py-2 text-white text-center">Reset Password</h3>
  <div class="bg-white px-3 py-4">
    <form name="reset_password" id="reset_password" method="POST">
      @csrf

      <!-- Reset -->
      <div class="mb-3 password-wpr">
        <label for="password" class="form-label">Password</label>
        <div class="input-group border border-2 rounded overflow-hidden">
          <input id="password" name="password" type="password" placeholder="Enter New Password" class="form-control border-0 shadow-none @error('password') is-invalid @enderror" required autofocus>
          <span class="invalid-feedback"></span>
          <button class="btn border-0 password" tabindex="-1"><i class="fa-solid fa-eye"></i></button>
        </div>
      </div>

      <div class="mb-3 password-wpr">
        <label for="confirm-password" class="form-label">Confirm Password</label>
        <div class="input-group border border-2 rounded overflow-hidden">
          <input id="confirm-password" name="confirm_password" type="password" placeholder="Re-Enter Password" class="form-control border-0 shadow-none @error('confirm-password') is-invalid @enderror" required autofocus>
          <span class="invalid-feedback"></span>
          <button class="btn border-0 password" tabindex="-1"><i class="fa-solid fa-eye"></i></button>
        </div>
      </div>

      <div class="d-flex flex-column align-items-center">
        <input type="hidden" name="token" value="{{ $token }}">
        <button name="submit" id="submit" type="submit" class="common-btn btn btn-primar rounded-pill">Reset Password</button>
        <a href="{{url('/login')}}" class="mt-3">Back to Login</a>
      </div>
      <!-- /Rest -->

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

    $("#reset_password").submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        url: "{{ route('reset') }}",
        type: 'POST',
        dataType: 'json',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          if (response.status == true) {
            alert('Password Updated successfully');
            window.location.href = "{{ route('login') }}";
          } else {
            if (response.message) {
              $('#message').html(response.message);
            }
            var errors = response.errors ?? {};

            var fields = [
              'password',
              'confirm-password'
            ];

            fields.forEach(function (field) {
              if (errors[field]) {
                $('#' + field)
                  .closest('.input-box')
                  .find('span.invalid-feedback')
                  .addClass('d-block')
                  .html(errors[field]);
              } else {
                $('#' + field)
                  .closest('.input-box')
                  .find('span.invalid-feedback')
                  .removeClass('d-block')
                  .html('');
              }
            });

          }
        }
      });
    });
  });
</script>
@endsection
