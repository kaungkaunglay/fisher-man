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
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" required autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
@endsection
