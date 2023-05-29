@extends('admin.layout')

@section('isle')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <h2>User</h2>
  <a href="/admin/roomtypes/create"><button type="button" class="btn btn-primary">+ create new roomtype</button></a>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Facilities</th>
          <th scope="col">Count</th>
          <th scope="col">Rooms</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($roomtypes as $roomtype)
        <tr>
            <td>{{$roomtype->id}}</td>
            <td>{{$roomtype->name}}</td>
            <td>{{$roomtype->price}}</td>
            <td>
              @foreach($roomtype->facilities as $facility)
                {{$facility->name." ,"}}
              @endforeach</td>
            <td>{{$roomtype->rooms->count()}}</td>
            <td>@foreach($roomtype->rooms as $room)
                <a href="/room/{{$room->name}}">{{$room->name." ,"}}</a>
            @endforeach</td>
            <td><a href="/admin/roomtypes/edit/{{$roomtype->id}}" class="badge bg-info">
              <span data-feather="edit" class="align-text-bottom"></span></a>
            <a href="/admin/roomtypes/image/{{$roomtype->id}}" class="badge bg-warning">
              <span data-feather="image" class="align-text-bottom"></span></a>
            {{-- <a href="/admin/roomtypes/delete/{{$roomtype->id}}" class="badge bg-danger">
              <span data-feather="x" class="align-text-bottom"></span></a> --}}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection