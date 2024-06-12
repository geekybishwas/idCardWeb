<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College ID Card</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    {{-- Link css --}}
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

    {{-- <script src="{{ asset('frontend/js/script.js') }}" defer></script> --}}
</head>

<body>
    <div class="center-wrapper">
        <div class="form-container">
            @if(session('error'))
            <div class="alert alert-info text-center" style="color:red;">
                    Login to proceed
                </div>
            @endif
            <h2 class="text-center mb-4">Login</h2>
            <form method="POST" action="{{route('loggedin')}}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{old('email')}}">
                    @error('email')
                        <span class="form-error">{{$message}} </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                    @error('password')
                        <span class="form-error">{{$message}} </span>
                    @enderror
                </div>
                @if(@session('message'))
                    <span class="form-error">{{session('message')}} </span>
                @endsession
                <div class="text-center mt-3">
                    <label for="">Don't have an account?</label>
                    <a href="{{route('register.form')}}">Register here</a>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const alertMessage = document.querySelector('.alert-info');
    if (alertMessage) {
        setTimeout(function() {
            alertMessage.style.display = 'none';
        }, 3000);
    }
});
</script>
</html>
