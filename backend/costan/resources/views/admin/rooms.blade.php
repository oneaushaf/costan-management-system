
@extends('admin.layout')

@section('isle')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <h2>Room</h2>
  <a href="/admin/rooms/create"><button type="button" class="btn btn-primary">+ create new room</button></a>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Floor</th>
          <th scope="col">Roomtype</th>
          <th scope="col">Desc</th>
          <th scope="col">Ocupied</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($rooms as $room)
        <tr>
            <td>{{$room->id}}</td>
            <td>{{$room->name}}</td>
            <td>{{$room->floor}}</td>
            <td>{{$room->roomtype->name}}</td>
            <td>{{$room->desc}}</td>
            <td>
              @if ($room->user!=NULL)
                {{$room->user->name}}
              @elseif($room->maintenance) 
                <b class="text-danger">Under maintenance</b>
              @else
                <b>Tersedia</b>
              @endif
            </td>
            <td><a href="/admin/rooms/edit/{{$room->id}}" class="badge bg-info">
              <span data-feather="edit" class="align-text-bottom"></span></a>
            <a href="/admin/rooms/image/{{$room->id}}" class="badge bg-warning">
              <span data-feather="image" class="align-text-bottom"></span></a>
            @if ($room->user==NULL && $room->maintenance==FALSE)
              <a href="/admin/rooms/maintain/{{$room->id}}" class="badge bg-secondary" onclick="return confirm('Apakah anda yakin akan melakukan maintenance?')">
              <span data-feather="tool" class="align-text-bottom"></span></a>
            @elseif($room->user==NULL && $room->maintenance==TRUE)
              <a href="/admin/rooms/finish/{{$room->id}}" class="badge bg-success" onclick="return confirm('Apakah anda yakin akan mengakhiri maintenance?')">
              <span data-feather="check-square" class="align-text-bottom"></span></a>
            @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection