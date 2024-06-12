<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Id Card Web</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">
        <style>
            @media print {
                body {
                    background-color: rgb(234, 234, 234);
                    font-family: 'Poppins', sans-serif;
                }
    
                .small-rounded-image {
                    width: 150px;
                    height: 150px;
                    object-fit: cover;
                    border-radius: 50%;
                    margin: 20px auto;
                }
    
                .info-row {
                    color: #333;
                }
    
                table tr td {
                    padding: 4px 6px !important;
                }
    
                .card {
                    border: none !important;
                    padding-bottom: 45px;
                }
    
                .nipunasewa-logo {
                    width: 120px;
                    object-fit: contain;
                }
    
                .position-absolute-logo {
                    position: absolute;
                    top: 15px !important;
                    right: 10px !important;
                }
            }
        </style>
</head>

<body>
<div class="container pt-3 mt-5 card-container">
    <div class="card m-auto position-relative print-me" style="width: 400px">
        {{-- <div class="company-logo position-absolute-logo end-0 top-0">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/logo/nipuna-prabidhik-sewa.png'))) }}">
        </div> --}}
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/' . $idCard->photo))) }}"
             alt="" class="small-rounded-image mt-5">
        <div class="card-body text-center mt-0 py-0">
            <h5 class="card-title fs-3 fw-bold">{{ $idCard->full_name }}</h5>
            <h6 class="card-subtitle mb-2 text-primary">{{ $idCard->college_name }}</h6>
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
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="position-absolute bottom-0 end-0">
            <path fill="#004c74" fill-opacity="1" d="M0,224L1440,32L1440,320L0,320Z"></path>
        </svg>
    </div>
</div>
@include('layouts.footer')
</body>

</html>
