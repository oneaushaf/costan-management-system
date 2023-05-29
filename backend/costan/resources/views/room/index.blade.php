@extends('template.layout')

@section('content')
<div class="text-center text-white py-5" style="background-color: #333;">
    <h1 class="mb-4">Temukan kamar terbaikmu!</h1>
    <p class="lead">Kami menyediakan berbagai jenis kamar dengan fasilitas yang berbeda-beda, 
        temukan kamar yang paling cocok dengan kebutuhan dan budget anda!</p>
  </div>
  <div class="pt-5 pb-5" style="background: #998A65">
    <div class="container" >
            <div class="row gap-4">
                @foreach ($roomtypes as $roomtype)
                <div class="col card text-center" style="width: 18rem;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                margin: auto;
                text-align: center;
                font-family: arial;">
                    <img src="/storage/{{$roomtype->image}}" alt="John" style="width:100%">
                    <h1 class="mt-1">{{ $roomtype['name'] }}</h1>
                    <p class="title">
                        @foreach ($roomtype->facilities as $facility)
                            {{$facility['name'].", "}}
                        @endforeach
                    </p>
                    <div style="margin: 24px 0;"> 
                        <h5>Rp. {{number_format($roomtype->price, 0, '.', '.')}}/Bulan</h5>
                    </div>
                    <p><a href="roomtype/{{ $roomtype['name'] }} " target="_blank"><button class="btn btn-secondary">See more</button></p></a>
                </div>
                @endforeach
            </div>
    </div>
</div>
    <div class=" text-center py-5 bg-light" >
        <h1 class="mb-4">Segera pesan kamar!</h1>
        <p class="lead">Lihat ketersediaan kamar yang ada, pesan sekarang, jangan sampai kehabisan!</p>
    </div>
    <div style="background: #333">
    <div class="container pt-5 text-center" >
        <div class="row">
            @foreach ($rooms as $room)
            <div class="col-3 my-3">
                <div class="card">
                  <img class="card-img-top" src="/storage/{{!$room->pictures->isEmpty()?$room->pictures->first()->image:$room->roomtype->image}}" alt="Card image cap">
                  <div class="card-body" >
                    <h5 class="card-title">{{ $room['name'] }}</h5>
                    <p class="card-text">
                        Lantai :{{ $room->floor }}<br/> 
                        Tipe : {{ $room->roomtype['name'] }}<br/>
                        Price : Rp. {{number_format($room->roomtype->price, 0, '.', '.')}}/Bulan
                    </p>
                    <p class="card-text"></p>
                    <a href="{{ url('/room/' . $room->name) }}" class="btn btn-secondary" target="_blank">Lihat kamar</a>
                  </div>
                  <div class="card-footer">
                    <p class="text-muted">@if ($room->user==NULL && $room->maintenance==TRUE)
                        <b class="text-danger">Maintenance</b>
                    @elseif($room->user==NULL)
                        <b class="text-success">Available</b>
                    @else
                        @if (auth()->guard('web')->check())
                        <b> Occupied by: {{$room->user->name}}</b>
                        @else
                            <b> Occupied </b>
                        @endif
                        
                    @endif</p>
                  </div>
                </div>
                </div>
            @endforeach
            
          </div>
    </div>
</div>
    {{-- <div class="row gap-3 auto justify-content-center">
        @foreach ($rooms as $room)
        <div class="card mx-2 my-3 text-center col-3 md-6" style="width: 18rem;">
            <img src="/storage/{{$room->roomtype->image}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $room['name'] }}</h5>
              <p class="card-text">Lantai :{{ $room->floor }}<br/>Tipe :{{ $room->roomtype['name'] }}<br/>
                @if ($room->user==NULL && $room->maintenance==TRUE)
                    <b class="text-danger">Maintenance</b>
                @elseif($room->user==NULL)
                    <b class="">Tersedia</b>
                @else
                    Occupied by: {{$room->user->name}}
                @endif
                <br/></p>
              <a href="{{ url('/room/' . $room->name) }}" class="btn btn-primary">Lihat kamar</a>
            </div>
        </div>
        @endforeach
    </div> --}}
@endsection