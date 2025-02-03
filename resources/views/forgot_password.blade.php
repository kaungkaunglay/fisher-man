@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/forgot_password.css') }}" />
@endsection
@section('contents')
<div class="forgotpass rounded mx-auto overflow-hidden bg-white shadow">
  <h3 class="bg-primary text-white text-center py-2">Forgot Password</h3>
  <form method="post" name="forgot_password" id="forgot_password" class="d-flex flex-column p-5 gap-4">
    @csrf
    <div class="form-wpr">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" id="email" class="form-control" required autofocus>
      <span></span>
    </div>
    <div class="d-flex flex-column align-items-center">
      <button id="submit" name="submit" type="submit" class="common-btn btn btn-primar rounded-pill">Send Reset Link</button>
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
            if (response.message) {
              $('#message').html(response.message);
            }
            var errors = response.errors;

            var fields = [
              'email',
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