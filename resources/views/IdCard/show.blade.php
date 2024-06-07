@extends('layouts.main')

@section('content')

<div class="container mt-5">
    <a href="{{ route('idCard.index') }}" class="btn btn-primary m-2"><i class="fas fa-arrow-left me-2"></i></a>
    {{-- Card Container --}}
    <div class="card m-1">
        <img src="{{ asset('storage/' . $idCard->photo) }}" class="card-img-top small-image" alt="User Photo">
        <div class="card-body text-center">
            <h5 class="card-title">{{ $idCard->full_name }}</h5>
            <p class="card-text">
                <strong>Email:</strong> {{ $idCard->email }}<br>
                <strong>Address:</strong> {{ $idCard->address }}<br>
                <strong>Date of Birth:</strong> {{ $idCard->dob }}<br>
                <strong>Card Expiry Date:</strong> {{ $idCard->expiry_date }}<br>
                <strong>Role:</strong> {{ $idCard->role }}
            </p>
            {{-- Edit button --}}
            <a href="{{ route('idCard.edit', ['idCard' => $idCard->id]) }}" class="btn btn-primary"><i class="fas fa-edit me-2"></i></a>
            {{--Delete Button--}}
            <form action="{{ route('idCard.destroy', ['idCard' => $idCard->id]) }}" method="POST" style="display: inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt me-2"></i></button>
            </form>
        </div>
    </div>
</div>
@endsection