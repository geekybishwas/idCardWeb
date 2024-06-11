<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification Sent</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert alert-success" role="alert">
                    <h1 class="alert-heading text-center mb-4 fw-bold">Success!</h1>
                    <p class="text-center fw-semibold">An email verification link has been sent to your email address.
                    </p>
                    <hr>
                    <p class="mb-0">Please check your email and click on the verification link to complete your
                        registration.</p>
                    <p class="mb-0">If you haven't received the email, please check your spam/junk folder.</p>
                </div>
                <div class="text-center">
                    <a href="{{ route('login.form') }}" class="btn btn-primary ">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
