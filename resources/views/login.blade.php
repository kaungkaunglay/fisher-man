@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}" />
@endsection
@section('contents')
<div class="login-box d-flex flex-column">
      
  <div class="login-header">
    <h2> Login
      <p> Welcome to Fisherman Login Page</p>
    </h2>
  </div>

  <!-- form start -->
  <form action="#" get="" enctype="multipart/form-data" class="input-container d-flex flex-column">
    
    <div class="input-box  d-flex flex-column">
      <label for="user">Username</label>
      <div class="input-group">
        <input type="text" id="user" class="form-control bg-second ">
        <button class="btn text-white" tabindex="-1"><i class="fa-solid fa-user"></i></button>
      </div>
    </div>

    <div class="input-box  d-flex flex-column">
      <label for="pass">Password</label>
      <div class="input-group">
        <input type="password" id="pass" class="form-control bg-second ">
        <button class="btn text-white" tabindex="-1"><i class="fa-solid fa-eye"></i></button>
      </div>
    </div>

    <div class="pw-setting d-flex">
      <div class="remember">
        <input type="checkbox" id="remember">
        <label for="remember">Remember me</label>
      </div>
      <div class="forgot-pw">
        <a href="#">Forgot password</a>
      </div>
    </div>
    <input type="submit" class="input-submit" value="Login">

    <div class="register">
      <span>Don't have an account?
        <a href="{{ url('/register') }}" class="ms-1">Register</a>
      </span>
      <p class="">(or)</p> 
    </div>
    <div class="line-wpr green-bg">
      <a href="">
        <img class="icon" src="{{asset('assets/icons/custom/line.png')}}" alt="Line">
        Login with Line
      </a>
    </div>
    <div class="icon-wpr">
      <a href=""><img class="icon" src="{{asset('assets/icons/custom/google.png')}}" alt="Google"></a>
      <a href=""><img class="icon" src="{{asset('assets/icons/custom/facebook.png')}}" alt="Facebook"></a>
    </div>
  </form>
  <!-- form end -->
</div>
@endsection