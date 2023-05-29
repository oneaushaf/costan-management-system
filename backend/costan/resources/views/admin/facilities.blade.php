@extends('admin.layout')

@section('isle')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <h2>User</h2>
  <a href="/admin/facilities/create"><button type="button" class="btn btn-primary">+ create new facility</button></a>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($facilities as $facility)
        <tr>
            <td>{{$facility->id}}</td>
            <td>{{$facility->name}}</td>
            <td><a href="/admin/facilities/delete/{{$facility->id}}" class="badge bg-danger" onclick="return confirm('Apakah anda yakin akan menghapus fasilitas ini?')">
              <span data-feather="x-square" class="align-text-bottom"></span></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection