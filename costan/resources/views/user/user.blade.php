@extends('template.layout')

@section('content')
@if(auth()->user()->room)
<div class="container card my-5"> 
  <h5 class="container p-3 mb-2 text-white text-center col-6 mt-5 rounded" style = background-color:rgb(12,11,61);>
    Kamar Saya : {{auth()->user()->room->name}}</h5>
  <h5 class="container mt-5 mb-3 text-center">Status Anda Sekarang : </h5>

  @if ($date->isPast())
    <h6 class="container p-3 col-4 text-white text-center rounded mb-5" style="background-color: red;"> Belum membayar tagihan</h6>
  @else
    <h6 class="container p-3 col-4 text-white text-center rounded mb-5" style="background-color: green;"> Penyewa Kost Aktif</h6>
  @endif
</div>
  
  <div class="fluid-container row" style = background-color:rgb(12,11,61);>
    <div class="container p-3 text-white col-md-auto" style = background-color:rgb(46,46,46);>
      <h3 class="text-center">{{auth()->user()->room->name}} : Tipe {{auth()->user()->room->roomtype->name}}</h3>
      <h6 class="text-center">Rp. {{number_format(auth()->user()->room->roomtype->price, 0, '.', '.')}}/bulan</h5></h5>
        <br>
      <p>Fasilitas : </p>
      <ul>
        @foreach (auth()->user()->room->roomtype->facilities as $item)   
          <li>{{$item->name}}</li>
        @endforeach
      </ul>
      <p>Keterangan tambahan : </p>
      <span>{{auth()->user()->room->desc}} </span>
    </div>
    @php
      $idx = 0;    
    @endphp
    <div id="carouselExampleIndicators" class="container carousel slide mt-2 mb-2 col-lg-7 ">
      <div class="carousel-indicators">
        @foreach (auth()->user()->room->pictures as $item)
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$idx}}" aria-label="Slide {{$idx}}" 
          {{ $loop->first ? "class=active aria-current=true" : '' }} ></button>
          @php
              $idx++;
          @endphp
        @endforeach
      </div>
      <div class="carousel-inner">
        @foreach (auth()->user()->room->pictures as $item)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="/storage/{{$item->image}}" class="d-block w-100" alt="...">
          </div>
        @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>  
  </div>


  {{-- <div class="p-2 text-white text-left col-6 mt-5 container rounded-top" style = "background-color:rgb(12, 11, 61);">
    Dashboard</div>
  <div class ="p-3 text-black text-left col-6 container border rounded-bottom">
    <p class="fw-bold"> Welocome {{ auth()->user()->name }}!   *^_^*</p>
    <p>Your username is <strong>{{ auth()->user()->username }}</strong></p>
    <p>Your room is <strong> 
      <a href="/room/{{auth()->user()->room['name']}}">{{ auth()->user()->room['name'] }}</a> type 
      <a href="/roomtype/{{auth()->user()->room->roomtype['name']}}">{{ auth()->user()->room->roomtype['name'] }}</a></strong></p>
  </div> --}}




  {{-- <div class="container ">
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
  <br><br> --}}
  </div>
  <section class="p-5">
    <div class="container">
      <div class="row text-center">
        {{-- <div class="col-md">
          <div class="card text-light" style="background-color: rgb(12, 11, 61);">
            <div class="card-body text-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-house-heart" viewBox="0 0 16 16">
                <path d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.309 8 6.982Z"/>
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
              </svg>
              <h6 class="mt-3 card-tittle mb-3">KAMAR SAYA</h6>
              <a href="" class="btn btn-light"> Klik Disini</a>
            </div>
          </div>
        </div> --}}
        <div class="col-md">
          <div class="card text-light rounded-pill" style="background-color: rgb(12, 11, 61);">
            <div class="card-body text-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
              </svg>
              <h6 class="mt-3 card-tittle mb-3">TAGIHAN SAYA</h6>
              <a href="/user/bill" class="btn btn-light"> Klik Disini</a>
            </div>
          </div>
        </div>
        <div class="col-md">
          <div class="card text-light rounded-pill" style="background-color: rgb(12, 11, 61);">
            <div class="card-body text-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
              </svg>
              <h6 class="mt-3 card-tittle mb-3">GANTI PASSWORD</h6>
              <a href="/user/change-pw" class="btn btn-light"> Klik Disini</a>
            </div>
          </div>
        </div>
        {{-- <div class="col-md">
          <div class="card text-light rounded-pill" style="background-color: rgb(12, 11, 61);">
            <div class="card-body text-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
              </svg>
              <h6 class="mt-3 card-tittle mb-3">STATUS</h6>
              <a href="/user/status" class="btn btn-light"> Klik Disini</a>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </section>
  {{-- <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Dashboard') }}</div>
                      <div class="card-body">
                          <p>Welcome,<b> {{ auth()->user()->name }}!</b></p>
                          <p>Your username is: {{ auth()->user()->username }}</p>
                          <p>Your Room is:<a href="/room/{{auth()->user()->room['name']}}">{{ auth()->user()->room['name'] }}</a></p>
                      </div>
              </div>
          </div>
      </div>
      <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Paid</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($contracts as $contract)
              <tr>
                  <td>temp</td>
                  <td>temp</td>
                  <td>temp</td>
                  <td><a href="/admin/facilities/delete/temp" class="badge bg-danger">
                    <span data-feather="x-square" class="align-text-bottom"></span></a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
  </div> --}}
  <br>
  <p class="text-center container"><i><b>"Jika ada permintaan untuk berganti kamar, berhenti, pindah tangan, keluhan fasilitas, dan lain-lain mohon untuk langsung menghubingi admin kami"</b></i></p>
  <div class="text-center">
      <a class="text-white btn btn-success" href="#"> <i class="fab fa-whatsapp"></i> Hubungi admin</a>
  </div>
  <br><br>
@else
  <div class="row d-flex justify-content-center align-items-center h-100 bg-info-subtle">
    <br>
    <div class="col-12 col-md-8 col-lg-6 card">
    <h5 class="container mt-5 mb-3 text-center">Status Anda Sekarang : </h5>
    <h6 class="container p-3 col-4 text-white text-center rounded bg-secondary" >Anda telah keluar dari kos</h6>
    <br>
    <p class="text-center"><i><b>
    "Dari sistem kami mencatat bahwa anda pernah menjadi bagian dari kosan kami. 
    Namun, anda dinyatakan telah keluar dari kosan ini entah karena pelanggaran aturan, 
    masalah pembayaran, pindah tangan, berhenti, ataupun hal lainnya"<br>
    Jika anda berniat untuk bergabung kembali dengan kami menggunakan akun yang sama, 
    silahkan hubungi admin kami untuk proses lebih lanjut. 
    Jika ingin menggunakan akun baru, pesan kamar seperti 
    saat pertama kali kita bertemu UwU"</b></i></p>
    <br>
    <div class="text-center">
        <a class="text-white btn btn-success" href="#"> <i class="fab fa-whatsapp"></i> Hubungi admin</a>
    </div>
    <br>
    <div class="text-center">
        <a class="text-white btn btn-dark" href="/order"> Kita mulai lagi dari 0 OwO <3 </a>
    </div>
    <br>
  </div>
  <br><br>
  </div>
@endif
@endsection







