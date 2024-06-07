@extends('layouts.main')

@section('content') 
<div class="container mt-5">
    {{-- Checking if the idCard exists or not,if exists the form route will be idCard.update --}}
    <div class="mb-4">
        <button class="btn btn-secondary" onclick="history.back()">
            <i class="bi bi-arrow-left-circle"></i> Back
        </button>
    </div>
    @if($idCard->exists)
        <h2>Edit ID Card Details</h2>
        <form action="{{route('idCard.update',['idCard'=>$idCard->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    @else
    {{-- If idcard don't exists,the form route will be idCard.store route which shows the form for adding idCard details --}}
        <h2>Add Id Card Details</h2>
        <form action="{{route('idCard.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
    @endif  
            <div class="form-group">
                <label for="photo">Upload Photo</label>
                {{-- @if($idCard->exists)
                    <img src="{{ asset('storage/' . $idCard->photo) }}" class="img-thumbnail" style="width:120px">
                @endif --}}
                <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*" value="{{old('photo',$idCard->photo ?? '')}}>
            </div>
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="{{old('full_name',$idCard->full_name ?? '')}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email',$idCard->email ?? '')}}">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{old('address',$idCard->address ?? '')}}">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" value="{{old('dob',$idCard->dob ?? '')}}">
            </div>
            <div class="form-group">
                <label for="expiry_date">Card Expiry Date</label>
                <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{old('expiry_date',$idCard->expiry_date ?? '')}}">
            </div>
            <div class="form-group">
                <label for="role">Position</label>
                <select class="form-control" id="position" name="position">
                    <option value="">Select Position</option>
                    <option value="Student">Student</option>
                    <option value="Staff">Staff</option>
                    <option value="Faculty">Faculty</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">{{$idCard->exists?'Update':'Create'}}</button>
        </form>
    </div>
@endsection