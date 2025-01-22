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
  <form id="register_form" name="register_seller_form" method="POST" class="input-container d-flex flex-column">
    <div class="input-box d-flex flex-column">
      <label for="user">Username</label>
      <input id="username" name="username" placeholder="John Doe" type="text" id="user" spellcheck="false" autofocus required>
    </div>
    <div class="input-box d-flex flex-column">
      <label for="email">Email</label>
      <input id="email" name="email" placeholder="example@domain.com" type="text" id="email" spellcheck="false" autofocus required>
    </div>
    <div class="input-box d-flex flex-column">
      <label for="pass">Password</label>
      <div class="input-group">
        <input name="password" placeholder="********" type="password" id="pass" class="form-control bg-second ">
        <button class="btn password" tabindex="-1"><i class="fa-solid fa-eye"></i></button>
      </div>
    </div>
    <div class="input-box d-flex flex-column">
      <label for="confirm_password">Confirm Password</label>
      <div class="input-group">
        <input id="confirm_password" name="confirm_password" placeholder="********" type="password" class="form-control bg-second">
        <button class="btn password" tabindex="-1" autocomplete="off"><i class="fa-solid fa-eye"></i></button>
      </div>
    </div>
    <div class="row ph-no">
      <div class="input-box col-md-6 col-xs-12 d-flex flex-column">
        <label for="primary-no">First Phone No</label>
        <div class="input-group">
          <select>
            <option value="">+81</option>
            <option value="">+95</option>
          </select>
          <input id="first_phone" name="first_phone" placeholder="90-1234-5678" type="number" id="primary-no" class="form-control bg-second" autocomplete="off">
        </div>
      </div>
      <div class="input-box col-md-6 col-xs-12 d-flex flex-column">
        <label for="secondory-no">Second Phone No</label>
        <div class="input-group">
          <select>
            <option value="">+81</option>
            <option value="">+95</option>
          </select>
          <input id="second_phone" name="second_phone" placeholder="90-1234-5678" type="number" id="secondory-no" class="form-control bg-second" autocomplete="off">
        </div>
      </div>
    </div>
    <div class="input-box d-flex flex-column">
      <label for="line">Line ID</label>
      <input id="line_id" name="line_id" placeholder="U8189cf6745fc0d808977bdb0b9f22995" type="string" id="line" autocomplete="off">
    </div>

    <input name="submit" type="submit" class="input-submit" value="Register">
    <div class="register">
      <p>Already have an account?
        <a href="{{ route('login') }}" class="ms-1">Login</a>
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
         $("#register_form").submit(function(e) {
             e.preventDefault();
             var formData = new FormData(this);
             $.ajax({
                 url: "{{ route('register_store') }}",
                 type: 'POST',
                 dataType: 'json',
                 data: formData,
                 contentType: false,
                 processData: false,
                 success: function(response) {
                        if (response.status == true) {
                            window.location.href = "{{ route('login') }}";
                        } else {
                          var errors = response.errors;
                          var fields = [
                              'username',
                              'email',
                              'password',
                              'confirm_password',
                              'first_phone',
                              'second_phone',
                              'line_id'
                          ];

                          fields.forEach(function(field) {
                              if (errors[field]) {
                                  $('#' + field).addClass('is-invalid')
                                      .siblings('p')
                                      .addClass('invalid-feedback')
                                      .html(errors[field]);
                              } else {
                                  $('#' + field).removeClass('is-invalid')
                                      .siblings('p')
                                      .removeClass('invalid-feedback')
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