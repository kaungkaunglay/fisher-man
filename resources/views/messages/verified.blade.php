<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification Success</title>
    <!-- Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <style>
        .verification-card {
            max-width: 500px;
            margin: 100px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .success-icon-container {
            height: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .success-icon {
            font-size: 4rem;
            color: #28a745;
            animation: scaleIn 0.5s ease-in-out, bounce 1s ease-in-out 0.5s;
        }

        .card-header {
            background-color: #f8f9fa;
        }

        @keyframes scaleIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            80% {
                transform: scale(1.2);
                opacity: 1;
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-20px);
            }

            60% {
                transform: translateY(-10px);
            }
        }

        .pop-in {
            animation: popIn 0.8s ease-in-out 0.3s both;
            opacity: 0;
        }

        @keyframes popIn {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 1s ease-in-out 0.6s both;
            opacity: 0;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card verification-card">
            <div class="card-header text-center py-3">
                <h4 class="mb-0">Email Verification</h4>
            </div>
            <div class="card-body text-center py-5">
                <div class="success-icon-container mb-2">
                    <div class="success-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    </div>
                </div>
                <h2 class="card-title mb-3 pop-in">Success!</h2>
                <p class="card-text mb-3 pop-in" style="animation-delay: 0.4s;">Your email has been successfully
                    verified.</p>
                <p class="text-muted mb-4 fade-in">You can now enjoy all the features of your account.</p>
                <a href="" class="btn btn-primary px-4 py-2 fade-in" style="animation-delay: 0.8s;">Continue to
                    {{trans_lang('home')}}</a>
            </div>
            <div class="card-footer text-center py-3 text-muted">
                <small>Thank you for completing the verification process.</small>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS from CDN (optional, only needed if you want to use Bootstrap's JavaScript features) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
