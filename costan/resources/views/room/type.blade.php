@extends('template.layout')

@section('content')
<div class="fluid-container row py-5 bg-secondary">
    <img src="/storage/{{$roomtype->image}}" class="col-lg-7 ps-5" alt="...">
    <div class="container col-auto card rounded" style="font-family: sans-serif">   
        <h1 class="mt-3"> Roomtype : {{$roomtype->name}}</h1>
        <h6 class="mt-3"><span data-feather="dollar-sign" class="align-text-bottom"></span> Rp. {{number_format($roomtype->price, 0, '.', '.')}}</h6>
        <h6><span data-feather="check-circle" class="align-text-bottom"></span> @foreach ($roomtype->facilities as $facility)
            {{$facility->name.", "}}
            @endforeach
        </h6>
    </div>
    
</div>
    
<div class=" text-center py-5 bg-light" >
    <h1 class="mb-4">Jangan sampai kehabisan!</h1>
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
                <a href="{{ url('/room/'.$room->name) }}" class="btn btn-secondary" target="_blank">Lihat kamar</a>
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
@endsection