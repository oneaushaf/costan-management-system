@extends('admin.layout')

@section('isle')
<main class=" ms-sm-auto col-lg-10 ">
  <div class="card bg-dark mt-3 px-3 py-3 text-light" >
    <h1 class="text-light">Edit Room {{$room->name}}</h1>
        <form method="POST" action="/admin/rooms/edit/{{$room->id}}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required value="{{$room->name}}">
            </div>

            <div class="form-group">
                <label for="desc">Desc</label>
                <input type="text" name="desc" id="desc" class="form-control" required value="{{$room->desc}}">
            </div>

            <div class="form-group">
                <label for="floor" name="floor">Select floor</label>
                <select name="floor" class="form-control" id="floor" >
                  @for ($i = 1; $i <= env('FLOORS'); $i++)
                    <option value="{{$i}}" {{$room->floor==$i?"selected":""}}>Floor {{$i}}</option>
                  @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="roomtype" name="roomtype">Select roomtype</label>
                <select name="roomtype" class="form-control" id="roomtype" >
                  @foreach ($roomtypes as $type)
                    <option value="{{$type->id}}" {{$room->roomtype->name==$type->name?"selected":""}} name="roomtype">{{$type->name}}</option>
                  @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-outline-light px-5 my-3">update</button>
        </form>
      </div>
</main>
@endsection