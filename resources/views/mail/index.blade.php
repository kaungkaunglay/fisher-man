<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #2d3748;
        }
        .wrapper {
            width: 100%;
            background-color: #f8f9fa;
            padding: 40px 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        .header {
            text-align: center;
            padding: 30px;
            border-bottom: 1px solid #edf2f7;
        }
        .logo {
            max-width: 200px;
            height: auto;
        }
        .content {
            padding: 40px;
        }
        .button {
            display: inline-block;
            padding: 14px 32px;
            background-color: #4f46e5;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            margin: 25px 0;
            text-align: center;
            transition: background-color 0.2s;
        }
        .button:hover {
            background-color: #4338ca;
        }
        .footer {
            padding: 30px 40px;
            border-top: 1px solid #edf2f7;
            background-color: #fafafa;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        .footer-text {
            font-size: 13px;
            color: #6b7280;
            margin: 0;
        }
        .divider {
            height: 1px;
            background-color: #edf2f7;
            margin: 20px 0;
        }
        h1 {
            color: #1a202c;
            font-size: 24px;
            font-weight: 600;
            margin: 0 0 20px;
        }
        p {
            margin: 0 0 15px;
            color: #4a5568;
        }
        .alternative-link {
            word-break: break-all;
            color: #6b7280;
            font-size: 14px;
        }
        .security-notice {
            background-color: #f7fafc;
            border-left: 4px solid #4f46e5;
            padding: 15px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <img src="https://r-mekiki.com/assets/images/logo.png" alt="Company Logo" class="logo">
            </div>

            <div class="content">
                <h1>Reset Your Password</h1>
                <p>Hello,</p>
                <p>We received a request to reset the password for your account. To proceed with the password reset, please click the button below:</p>

                <a href="{{}}" class="button">Reset Password</a>

                <div class="security-notice">
                    <p style="margin-bottom: 0;">
                        <strong>Security Notice:</strong> This link will expire in 60 minutes for your security.
                    </p>
                </div>

                <p>If you didn't request this password reset, please disregard this email or contact our support team if you have concerns about your account security.</p>
            </div>

            <div class="footer">
                <p class="footer-text">If you're having trouble with the button above, copy and paste the URL below into your web browser:</p>
                <p class="alternative-link">{{route('password.reset',)}}</p>
                <div class="divider"></div>
                <p class="footer-text">This is an automated message, please do not reply to this email. For assistance, please contact our support team.</p>
                <p class="footer-text">© 2025 <a href="https://{{env('APP_NAME')}}">{{env('APP_NAME')}}</a> . All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
