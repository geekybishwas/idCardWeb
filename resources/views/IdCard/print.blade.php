<!DOCTYPE html>
<html>
<head>
    <style>
        .id-card {
            border: 1px solid #000;
            padding: 20px;
            width: 300px;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .id-card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
    <div class="card m-1">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/' . $idCard->photo))) }}" class="card-img-top small-image" alt="User Photo" style="max-width: 100px;">
        <div class="card-body text-center">
            <h5 class="card-title">{{ $idCard->full_name }}</h5>
            <p class="card-text">
                <strong>Email:</strong> {{ $idCard->email }}<br>
                <strong>Address:</strong> {{ $idCard->address }}<br>
                <strong>Date of Birth:</strong> {{ $idCard->dob }}<br>
                <strong>Card Expiry Date:</strong> {{ $idCard->expiry_date }}<br>
                <strong>Position:</strong> {{ $idCard->position }}
            </p>
        </div>
    </div>
    </div>
</body>
</html>