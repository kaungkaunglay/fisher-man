@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/forgot_password.css') }}" />
@endsection
@section('contents')
<div class="container-custom my-5 forgotpass">
      <div class="row justify-content-center h-100 align-items-center">
            <div class="col-12 col-md-8 col-lg-5">
        <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Forgot Password</h3>
                </div>
                <div class="card-body">
                    <form method="post" name="forgot_password" id="forgot_password">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required autofocus>
                            <span></span>
                        </div>
                        <button id="submit" name="submit" type="submit" class="btn btn-primary w-100">Send Reset Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
 
          $("#forgot_password").submit(function(e) {
              e.preventDefault();
              var formData = new FormData(this);
              $.ajax({
                  url: "{{ route('mail.reset') }}",
                  type: 'POST',
                  dataType: 'json',
                  data: formData,
                  contentType: false,
                  processData: false,
                  success: function(response) {
                      if (response.status == true) {
                         window.location.href = "{{ route('forgotpassword') }}";
                      } else{
                       if(response.message){
                            $('#message').html(response.message);
                       }
                       var errors = response.errors;
                       
                       var fields = [
                           'email',
                       ];
                       
                       fields.forEach(function(field) {
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
