@extends('template.layout')
@section('content')
    <h5 class="container p-3 mb-2 text-white text-center col-6 mt-5 rounded" style = background-color:rgb(12,11,61);>
        Status
    </h5>

    <h5 class="container mt-5 mb-3 text-center">Status Anda Sekarang : </h5>

    @if ($date->isPast())
        <h6 class="container p-3 col-4 text-white text-center rounded" style="background-color: red;"> Belum membayar tagihan</h6>
    @else
        <h6 class="container p-3 col-4 text-white text-center rounded" style="background-color: green;"> Penyewa Kost Aktif</h6>
    @endif
    

    <div class="container ">
      <div class="text-center">
        <a href="/user/bill" class="container btn btn-success mt-5 col-2 text-start"> 
            <span data-feather="plus-circle" class="align-text-center "></span>  Lanjutkan Sewa</a>
      </div>
    </div>
    <div class="container">
      <div class="text-center">
        <a href="https://www.whatsapp.com/" class="container btn btn-danger mt-2 col-2 text-start">  
            <span data-feather="x-circle" class="align-text-center "></span>  Berhenti Sewa</a>
      </div>
    </div>
    <br><br>
    </div>
@endsection