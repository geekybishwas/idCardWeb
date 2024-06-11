<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Platform</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            padding: 20px 0;
        }
        .header img {
            width: 100px;
        }
        .content {
            padding: 20px;
        }
        .content h1 {
            color: #007bff;
        }
        .content p {
            line-height: 1.6;
        }
        .content a {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('logo.png') }}" alt="Company Logo">
        </div>
        <div class="content">
            <h1>Welcome to Card Generator Web, {{ $user['username'] }}!</h1>
            <p>We're excited to have you on board. To complete your registration, please verify your email address by clicking the button below:</p>
            <a href="{{route('email.verify',$user['token'])}}">Click</a>
            {{-- <a href="{{url('/verifyRegister' . "/" . $validation['token'])}}"></a> --}}
            {{-- <a href="{{ route('verify', ['token' => $validation['token']]) }}">Click here to register</a> --}}

            <p>If you did not sign up for this account, please disregard this email.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Tuder. All rights reserved.
        </div>
    </div>
</body>
</html>
