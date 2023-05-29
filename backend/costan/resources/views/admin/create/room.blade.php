@extends('admin.layout')

@section('isle')
<main class=" ms-sm-auto col-lg-10 ">
  <div class="card bg-dark mt-3 px-3 py-3 text-light" >
    <h1 class="text-light">Create a new room</h1>
        <form method="POST" action="/admin/rooms/create">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="desc">Desc</label>
                <input type="text" name="desc" id="desc" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="floor" name="floor">Select floor</label>
                <select name="floor" class="form-control" id="floor" >
                  @for($i=1;$i<=env('FLOORS');$i++)
                  <option value="{{$i}}">Floor {{$i}}</option>
                  @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="roomtype_id" name="roomtype_id">Select roomtype</label>
                <select name="roomtype_id" class="form-control" id="roomtype_id" >
                  @foreach ($roomtypes as $type)
                    <option value="{{$type->id}}" name="roomtype">{{$type->name}}</option>
                  @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-outline-light px-5 my-3">Create Facility</button>
        </form>
        </div>
</main>
@endsection