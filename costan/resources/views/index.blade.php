@extends('template.layout')
@section('content')
<div class="text-center mt-5 container-fluid" style="font-family: sans-serif"><h1 > C O S T A N </h1>  <h6><br/><i>Temukan kamar terbaikmu!</i></h6></div>
<div class="row" style = "background-color:rgb(12,11,61);">
  <div class="fluid-container col-lg-7 col ms-5">
  <div id="carouselExampleIndicators" class="container carousel slide ms-2 mt-2 mb-2 py-5">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="asset/satu.jpeg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="asset/dua.jpeg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="asset/tiga.jpeg" class="d-block w-100" alt="...">
      </div>
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
  <div class="d-flex justify-content-center align-items-center py-3">
    <a href="/room"><button class="btn btn-secondary">Cari kamar sekarang!</button></a>
  </div>
</div>

  <div class="container mt- 5 p-3 text-white col-auto" style = "background-color:#333;width:18rem;font-family: sans-serif;" >
    {{-- <h3 class="text-center">Tipe {{auth()->user()->room->roomtype->name}}</h3>
    <h6 class="text-center">Rp. {{number_format(auth()->user()->room->roomtype->price, 0, '.', '.')}}/bulan</h5></h5> --}}
      <br>
    <p>Fasilitas yang tersedia: </p>
    <ul>
      @foreach ($facilities as $item)   
        <li>{{$item->name}}</li>
      @endforeach
    </ul>
    <p>Tipe Kamar : {{$roomtypes->count()}}</p>
    <ul>
      @foreach ($roomtypes as $item)   
        <li>{{$item->name}}</li>
      @endforeach
    </ul>
    <p>Lantai : {{env('floors')}}</p>
    {{-- <span>{{auth()->user()->room->desc}} </span> --}}
  </div>
</div>



<div class="row" style=" background: #998A65">
  <div class="col-auto">
    <img src="/asset/home2.png" alt="" style="max-width:20rem">
  </div>
  <div  class="col ">
  <div id="band" class="container text-start py-5 text-light" >
    <h1>About Us,</h1>
    <h4><em>Temukan Kamar Terbaik Untukmu!</em></h4>
    <p>Berdiri sejak 1995, Costan telah menjadi pilihan mahasiswa dan mahasiswi untuk menjadi kosan idaman.
      Dengan berbagai jenis kamar dan fasilitas, kamu tak perlu ragu untuk bergabung karena pasti akan ada kamar yang cocok dengan kebutuhan dan keinginanmu.
      Menjawab tantangan era teknologi, kami mengembangkan manajemen kosan kami dengan lebih baik menggunakan <b><i>Costan, your trusted kosan management system</i></b> 
      agar kalian lebih mudah untuk melakukan Permintaan. Bersama kita dapat menuju sistem kosan cerdas pertama diIndonesia. 
    </p>
    <br>
    
  </div>
  </div>
  
</div>
</div>



{{-- <div class="fluid-container py-3" style="background-color:#998A65 ">
  <h1 style="font-family: sans-serif" class="text-center">Take a Look </h1>
<div id="carouselExampleIndicators" class="container carousel slide mt-2 mb-2 col-lg-7 ">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="asset/tipe2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="asset/tipe22.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="asset/tipe222.jpg" class="d-block w-100" alt="...">
    </div>
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
<a class="text-center btn btn-secondary ">Get a Room Now!</a>  
</div> --}}

<div style="background: #333">
  <div id="band" class="container text-center py-5 text-light" style="font-family: sans-serif">
    <h1>FIND US</h1>
    <br>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.732992352536!2d106.73200667490786!3d-6.555353593437748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c58cd5e8f977%3A0x26ca66e553505369!2sWisma%20D&#39;%20CAMPUS!5e0!3m2!1sid!2sid!4v1685206268472!5m2!1sid!2sid" 
    width="1300" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  </div>
  {{-- @foreach ($floors as $floor)
  <div class="container-fluid">
    <h2>Lantai Sekian</h2>
    <img src="https://picsum.photos/1600/300" class="img-fluid" alt="...">
  </div>
  <div class="row gap-3 auto justify-content-center">
    @foreach ($floor as $room)
    <div class="card mx-2 my-3 text-center" style="width: 18rem;">
        <img src="https://picsum.photos/200/200" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $room['name'] }}</h5>
          <p class="card-text">Lantai :{{ $room->floor }}<br/>Tipe :{{ $room->roomtype['name'] }}<br/>
            <br/></p>
          <a href="{{ url('/room/' . $room->name) }}" class="btn btn-primary">Lihat kamar</a>
        </div>
    </div>
    @endforeach
  </div>
  <br><br><br><hr>
  @endforeach --}}
@endsection
