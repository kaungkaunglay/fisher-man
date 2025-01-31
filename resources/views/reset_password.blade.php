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
                    <h3>Reset Password</h3>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autofocus>
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirm Password</label>
                            <input type="confirm-password" name="confirm-password" id="confirm-password" class="form-control @error('confirm-password') is-invalid @enderror" required autofocus>
                            @error('confirm-password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                    </form>
                </div>
        </div>
            </div>
      </div>
</div>

@endsection
