@extends('includes.layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/forgot_password.css') }}" />
@endsection
@section('contents')
    <div class="forgotpass mx-auto rounded-3 overflow-hidden shadow">
        <h3 class="bg-primary py-2 text-white text-center">Forgot Password</h3>
        <div class="bg-white px-4 py-lg-4 py-3">
            @include('messages.index')
            <form method="POST" name="resent_form" id="resent_form">
                @csrf
                <div class="d-flex flex-column align-items-center">
                    <input type="hidden" name="email" id="email" value="{{ $email }}">
                    <button id="resent_btn" name="submit" type="submit" class="common-btn btn btn-primar rounded-pill">Resend
                        Reset a Link</button>
                    <a href="{{ url('/login') }}" class="mt-3">Back to Login</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#resent_form").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('resend.email') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == true) {
                            window.location.href = `/email_success/${$('#email').val()}`;
                        } else {
                            $('#message').html(response.message ?? '');
                        }
                    }
                });
            });
        });
    </script>
@endsection
