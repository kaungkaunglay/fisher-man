@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/forgot_password.css') }}" />
@endsection
@section('contents')
<div class="container-custom my-5 forgotpass">
      <div class="row justify-content-center h-100 align-items-center">
            <div class="col-12 col-md-8 col-lg-5">
                @include('messages.index')
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Reset Password</h3>
                </div>
                <div class="card-body">
                    <form name="reset_password" id="reset_password" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm-password" class="form-control @error('confirm-password') is-invalid @enderror" required autofocus>
                        </div>
                        <input type="hidden" name="userid" value="{{ $user_id }}">
                        <button name="submit" id="submit" type="submit" class="btn btn-primary w-100">Reset Password</button>
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
          
          $("#reset_password").submit(function(e) {
              e.preventDefault();
              var formData = new FormData(this);
              $.ajax({
                  url: "{{ route('password.update') }}",
                  type: 'POST',
                  dataType: 'json',
                  data: formData,
                  contentType: false,
                  processData: false,
                  success: function(response) {
                      if (response.status == true) {
                        alert('Password Updated successfully');
                        window.location.href = "{{ route('login') }}";
                      }else{
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
