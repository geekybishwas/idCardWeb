@extends('layouts.main')

@section('content') 
    <div class="container mt-5">
        <h2>Add ID Card Details</h2>
        <form action="{{route('idCard.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="photo">Upload Photo</label>
                <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*">
            </div>
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob">
            </div>
            <div class="form-group">
                <label for="expiry_date">Card Expiry Date</label>
                <input type="date" class="form-control" id="expiry_date" name="expiry_date">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role">
                    <option value="">Select Role</option>
                    <option value="Student">Student</option>
                    <option value="Staff">Staff</option>
                    <option value="Faculty">Faculty</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection