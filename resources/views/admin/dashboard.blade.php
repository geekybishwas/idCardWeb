@extends('layouts.main')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container mt-5">
    <a href="{{ route('idCard.create') }}" class="btn btn-primary mb-4">
        <i class="fas fa-plus"></i>
    </a>
    
    <div class="row">
        @foreach ($idCards as $idCard)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $idCard->photo) }}" class="card-img-top img-fluid small-image" alt="User Photo">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $idCard->full_name }}</h5>
                        <p class="card-text">
                            <strong>Email:</strong> {{ $idCard->email }}<br>
                            <strong>Address:</strong> {{ $idCard->address }}<br>
                            <strong>Date of Birth:</strong> {{ $idCard->dob }}<br>
                            <strong>Card Expiry Date:</strong> {{ $idCard->expiry_date }}<br>
                            <strong>Role:</strong> {{ $idCard->role }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
