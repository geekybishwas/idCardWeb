@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row">
            <div class="container-fluid  d-flex flex-row justify-content-between bg-light p-2 rounded">
                <form class="d-flex" role="search" action="{{route('idCard.index')}}" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name='search'> <button
                    class="btn btn-outline-success" type="submit">Search</button>
                </form>
                {{-- <button class="btn btn-primary">+ Add</button> --}}
                <a href="{{ route('idCard.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>Add
                </a>
            </div>
    </div>
    <br>       
    <div class="row gx-5 gy-4">
        @foreach($idCards as $idCard)  
            <div class="col lg-col-4">
                <div class="card m-auto position-relative print-me" style="width: 400px">        
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="position-absolute top-0 start-0"><path fill="#0082ca" fill-opacity="1" d="M0,224L1440,32L1440,0L0,0Z"></path></svg>
                    <div class="company-logo position-absolute-logo end-0 top-0">
                        <img src="https://nipunasewa.com/wp-content/uploads/2020/01/nipuna-prabidhik-sewa.png" alt=""
                        class="nipunasewa-logo">
                    </div>                    
                    <img src="{{asset('storage/' . $idCard->photo)}}"
                    alt="card-photo" class="small-rounded-image mt-5">        
                    <a href="{{route('idCard.show',['idCard'=>$idCard->id])}}" style="text-decoration: none;">
                        <div class="card-body text-center mt-0 py-0">
                            <h5 class="card-title fs-3 fw-bold">{{$idCard->full_name}}</h5>
                            <h6 class="card-subtitle mb-2 text-primary">{{$idCard->college_name}}</h6>
                            <div class="card-text px-4 mt-4">
                                <table class="table table-borderless fw-medium">
                                    <tr>
                                        <td class="text-start" style="width: 105px">Email</td>
                                        <td>:</td>
                                        <td class="text-start">{{$idCard->email}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Address</td>
                                        <td>:</td>
                                        <td class="text-start">{{$idCard->address}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">DOB</td>
                                        <td>:</td>
                                        <td class="text-start">{{$idCard->dob}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Expiry</td>
                                        <td>:</td>
                                        <td class="text-start">{{$idCard->expiry_date}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Position</td>
                                        <td>:</td>
                                        <td class="text-start">{{$idCard->position}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="position-absolute bottom-0 end-0">
                            <path fill="#004c74" fill-opacity="1" d="M0,224L1440,32L1440,320L0,320Z"></path>
                        </svg>    
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection