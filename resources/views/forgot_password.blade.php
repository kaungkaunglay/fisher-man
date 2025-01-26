@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/forgot_password.css') }}" />
@endsection
@section('contents')
<div class="container-custom my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Forgot Password</h3>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    <form method="POST" action="">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required autofocus>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
//    $(document).ready(function() {
//      $.ajaxSetup({
//              headers: {
//                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//              }
//          });

//          $("#login_form").submit(function(e) {
//              e.preventDefault();
//              var formData = new FormData(this);
//              $.ajax({
//                  url: "{{ route('login_store') }}",
//                  type: 'POST',
//                  dataType: 'json',
//                  data: formData,
//                  contentType: false,
//                  processData: false,
//                  success: function(response) {
//                      if (response.status == true) {
//                         window.location.href = "{{ route('home') }}";
//                      } else{
//                       if(response.message){
//                         $('#message').html(response.message);
//                       }
//                       var errors = response.errors;

//                       var fields = [
//                           'username',
//                           'password'
//                       ];

//                       fields.forEach(function(field) {
//                           if (errors[field]) {
//                               $('#' + field)
//                                   .closest('.input-box')
//                                   .find('span.invalid-feedback')
//                                   .addClass('d-block')
//                                   .html(errors[field]);
//                           } else {
//                               $('#' + field)
//                                   .closest('.input-box')
//                                   .find('span.invalid-feedback')
//                                   .removeClass('d-block')
//                                   .html('');
//                           }
//                       });

//                     }
//                  }
//              });
//          });
//   });
</script>
@endsection
