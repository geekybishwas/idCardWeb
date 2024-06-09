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
    <div class="id-card">
        <img src="{{ public_path('storage/' . $idCard->photo) }}" alt="{{ $idCard->name }}">
        <h1>{{ $idCard->name }}</h1>
        <p>Address: {{ $idCard->address }}</p>
        <p>Date of Birth: {{ $idCard->dob->format('d/m/Y') }}</p>
        <p>Expiry Date: {{ $idCard->expiry_date->format('d/m/Y') }}</p>
    </div>
</body>
</html>
