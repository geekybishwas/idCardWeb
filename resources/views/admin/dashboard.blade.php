@extends('layouts.main')

@section('content')
{{-- This is for to create a new card --}}
<div class="container mt-5">
    <a href="{{ route('id-card.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i>
    </a>
</div>
<div class="id-card">
    <img src="user_photo.jpg" alt="User Photo">
    <div class="details">
        <strong>Name:</strong> John Doe<br>
        <strong>Email</strong> John Doe<br>
        <strong>Address:</strong> 123 Main St, City<br>
        <strong>Date of Birth:</strong> 01/01/1990<br>
        <strong>Card Expiry Date:</strong> 12/31/2024<br>
        <strong>Role:</strong>
    </div>
</div>
@endsection