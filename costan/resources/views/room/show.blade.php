@extends('template.layout')

@section('content')
<div class="fluid-container row pt-5 pb-5 bg-secondary">
  <div class="fluid-container row" style = background-color:rgb(12,11,61);>
    @php
      $idx = 0;    
    @endphp
    <div id="carouselExampleIndicators" class="container carousel slide mt-2 mb-2 py-5 col-lg-6 ">
      <div class="carousel-indicators">
        @foreach ($room->pictures as $item)
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$idx}}" aria-label="Slide {{$idx}}" 
          {{ $loop->first ? "class=active aria-current=true" : '' }} ></button>
          @php
              $idx++;
          @endphp
        @endforeach
      </div>
      <div class="carousel-inner">
        @foreach ($room->pictures as $item)
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
    <div class="fluid-container col-md-auto bg-light text-dark">
      <h1 class="text-start">{{$room->name}} : {{$room->roomtype->name}}</h1>
          <p class="text-start"><em>Tipe {{$room->roomtype->name}} dengan fasilitas dan harga tertera</em></p>
              <p><span data-feather="dollar-sign" class="align-text-bottom"></span> Rp. {{number_format($room->roomtype->price, 0, '.', '.')}}/Bulan</p>
              <p><span data-feather="check-circle" class="align-text-bottom"></span> 
                @foreach ($room->roomtype->facilities as $facility)
                  {{$facility['name'].", "}}
                @endforeach
              </p>
              <p><span data-feather="info" class="align-text-bottom"></span> {{$room->desc}}</p>
              <div class="row">
                <div class="col-md-12 form-group">
                  @if ($room->user == NULL && $room->maintenance==FALSE)
                    <form action="/order" method="post">
                        @csrf
                        <input type="hidden" value="{{$room->id}}" name="chosed">
                        <button class="btn btn-secondary" type="submit" >Pesan Sekarang</button>
                      </form>
                      <a href="https://api.whatsapp.com/send?phone=6281275608909"><button class="btn btn-success mt-3 mb-3" type="submit"> <i class="fab fa-whatsapp"></i> Hubungi admin</button></a><br>
                      <i class="pt-3">Hubungi admin untuk melakukan konfirmasi pembayaran</i>
                  @elseif($room->user != NULL)
                    <p><b><span data-feather="user" class="align-text-bottom"></span> Occupied {{auth()->guard('web')->check()?"by : ".$room->user->name:""}}</b></p>
                  @else
                    <p class="text-danger"><b><span data-feather="alert-triangle" class="align-text-bottom"></span> Under Maintenance </b></p>
                  @endif                
                </div>
              </div>
    </div>
  </div>
  {{-- <div class="fluid-container col-lg-7 card rounded" style="width: 50rem">
    <img src="/storage/{{$room->pictures->first()->image}}" alt="" class="container col ">
  </div> --}}
  
</div>


        {{-- <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/asset/tipe2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="tipe22.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="tipe222.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="tipe3.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button> --}}
    {{-- <div class="container-fluid">
        <img src="https://picsum.photos/1600/300" class="img-fluid" alt="...">
    </div>
    <div class="container-fluid">   
        <h2>{{$room->name}}</h2>
        @if ($user!=NULL )
            <h4>Occupied by : {{$user->name}}</h4> 
        @endif
        <h4>type : <a href="{{ url('/roomtype/'. $roomtype->name) }}">{{$roomtype->name}}</a></h4>
        <h4>facilities : @foreach ($facilities as $facility)
            {{$facility->name.", "}}
            @endforeach
        </h4>
        <h4>{{"price : ".$roomtype->price}}</h4>
    </div>
    @if ($room->user == NULL && $room->maintenance==FALSE)
        <form action="/order" method="post">
            @csrf
            <input type="hidden" value="{{$room->id}}" name="chosed">
            <button class="btn btn-primary" type="submit">Order</button>
        </form>
    @endif
    
    <div class="container-fluid">
        <img src="https://picsum.photos/200/200" class="img-thumbnail" alt="...">
        <img src="https://picsum.photos/200/200" class="img-thumbnail" alt="...">
        <img src="https://picsum.photos/200/200" class="img-thumbnail" alt="...">
    </div> --}}
@endsection