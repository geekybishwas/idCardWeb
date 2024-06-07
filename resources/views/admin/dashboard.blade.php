@extends('layouts.main')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container mt-5">
    
    {{-- Back button --}}
    <a href="{{ route('idCard.create') }}" class="btn btn-primary mb-4">
        <i class="fas fa-plus"></i>
    </a>
    
    {{-- Search Bar --}}
    <form class="form-inline my-2 my-lg-0" action={{route('idCard.index')}} method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{$search}}">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    {{-- Container --}}
    <div class="row">
        @foreach ($idCards as $idCard)
            <div class="col-md-4 mb-4">
                    <a href="{{route('idCard.show',['idCard'=>$idCard->id])}}" class="card-link">
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
                    </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
