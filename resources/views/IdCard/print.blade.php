<!DOCTYPE html>
<html>
<head>
    <title>IdCard Print</title>
</head>
<body>
    <img src="{{asset('storage/' . $idCard->photo)}}"
    alt="" class="small-rounded-image mt-5">


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
</body>
</html>

