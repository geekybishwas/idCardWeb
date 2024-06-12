@extends('layouts.main')

@section('content')
    
<div class="container pt-3 mt-5 card-contianer">
    <a href="{{ route('idCard.index') }}" class="btn btn-outline-primary position-absolute absolute-button"></i>←Back</a>
    <div class="card m-auto position-relative print-me" style="width: 400px">
        
        
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="position-absolute top-0 start-0"><path fill="#0082ca" fill-opacity="1" d="M0,224L1440,32L1440,0L0,0Z"></path></svg>
        <div class="company-logo position-absolute-logo end-0 top-0">
            <img src="https://nipunasewa.com/wp-content/uploads/2020/01/nipuna-prabidhik-sewa.png" alt=""
                        class="nipunasewa-logo">
                </div>
                {{-- Image tag  --}}
                <img src="{{asset('storage/' . $idCard->photo)}}"
                alt="" class="small-rounded-image mt-5">
                {{-- This is where the card details starts --}}
                <div class="card-body text-center mt-0 py-0">
                <h5 class="card-title fs-3 fw-bold">{{ $idCard->full_name }}</h5>
                <h6 class="card-subtitle mb-2 text-primary">{{$idCard->college_name}}</h6>
                <div class="card-text px-4 mt-4">
                    <table class="table table-borderless fw-medium">
                        <tr>
                            <td class="text-start" style="width: 105px">Email</td>
                            <td>:</td>
                            <td class="text-start">{{ $idCard->email }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">Address</td>
                            <td>:</td>
                            <td class="text-start">{{ $idCard->address }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">DOB</td>
                            <td>:</td>
                            <td class="text-start">{{ $idCard->dob }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">Expiry</td>
                            <td>:</td>
                            <td class="text-start">{{ $idCard->expiry_date }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">Position</td>
                            <td>:</td>
                            <td class="text-start">{{ $idCard->position }}</td>
                        </tr>
                    </table>
                </div>

            </div>
            <!-- other things are below------------------------------------------------------------------------------------------ -->
            
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="position-absolute bottom-0 end-0">
                <path fill="#004c74" fill-opacity="1" d="M0,224L1440,32L1440,320L0,320Z"></path>
            </svg>

        </div>
        <div class="container mt-5 text-center">
            <div class="btn-group">
                <a href="{{route('idCard.edit',['idCard'=>$idCard->id])}}" class="btn btn-primary fs-5 px-4 mx-1"><i class='bx bx-edit-alt'></i> Edit</a>
                <form action="{{ route('idCard.destroy', ['idCard' => $idCard->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger fs-5 px-4 mx-1" type="submit" ><i class='bx bx-trash'></i> Delete</button>
                </form>
                <form action="{{route('print.pdf',['id'=>$idCard->id])}}">
                    <button type="submit" class="btn btn-success fs-5 px-4 mx-1"><i class='bx bx-printer'></i> Print</button>
                </form>
                {{-- <a href="{{route('print.pdf',['id'=>$idCard->id])}}" class="btn btn-success fs-5 px-4 mx-1" ><i class='bx bx-printer'></i> Print</a> --}}
            </div>
        </div>
    </div>
@endsection