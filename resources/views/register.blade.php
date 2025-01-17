@extends('includes.layout')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/register.css') }}" />
@endsection
@section('contents')
<div class="login-box d-flex flex-column">
  <div class="login-header">
    <h2> Registeration
      <p> Welcome to Fisherman Register Page</p>
    </h2>
  </div>

  <!-- form start -->
  <form action="#" get="" enctype="multipart/form-data" class="input-container d-flex flex-column">
    <div class="input-box d-flex flex-column">
      <label for="user">Username</label>
      <input type="text" id="user" spellcheck="false" autofocus required>
    </div>
    <div class="input-box d-flex flex-column">
      <label for="pass">Password</label>
      <input type="password" id="pass" autocomplete="off">
    </div>
    <div class="input-box d-flex flex-column">
      <label for="pass">Confirm Password</label>
      <input type="password" id="pass" autocomplete="off">
    </div>
    <div class="row ph-no">
      <div class="input-box col-md-6 col-xs-12 d-flex flex-column">
        <label for="primary-no">First Phone No</label>
        <input type="number" id="primary-no" autocomplete="off">
      </div>
      <div class="input-box col-md-6 col-xs-12 d-flex flex-column">
        <label for="secondory-no">Second Phone No</label>
        <input type="number" id="secondory-no" autocomplete="off">
      </div>
    </div>
    <div class="input-box d-flex flex-column">
      <label for="line">Line ID</label>
      <input type="number" id="line" autocomplete="off">
    </div>
    <div class="input-box d-flex flex-column">
      <label for="ship">Ship Name</label>
      <input type="text" id="ship" spellcheck="false" autocomplete="off">
    </div>
    <div class="input-box d-flex flex-column">
      <label for="org">First Org Name</label>
      <input type="text" id="org" spellcheck="false" autocomplete="off">
    </div>
    <div class="input-box d-flex flex-column">
      <label for="trans">Trans Management</label>
      <input type="text" id="trans" spellcheck="false" autocomplete="off">
    </div>
    <input type="submit" class="input-submit" value="Register">
    <div class="register">
      <p>Already have an account?
        <a href="{{ url('/login') }}" class="ms-1">Login</a>
      </p>
    </div>
  </form>
  <!-- form end -->
</div>
@endsection