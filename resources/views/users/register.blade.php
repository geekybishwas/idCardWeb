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
        <h2 class="text-center mb-4">Register</h2>
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="{{old('username')}}">
                @error('username')
                    <span class="form-error">{{$message}} </span>
                @enderror
            </div>
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
            <div class="text-center mt-3">
                <label for="">Already have an account?</label>
                <a href="{{route('loggedin')}}">Login Here</a>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
    </div>
</div>
</body>
</html>

