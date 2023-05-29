{{-- @dd($new,$extend,$passed) --}}
@extends('admin.layout')

@section('isle')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <h2>Extension</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Username</th>
          <th scope="col">Room</th>
          <th scope="col">Payment</th>
          <th scope="col">Months</th>
          <th scope="col">Phone</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($extend as $contract)
        <tr>
            <td>{{$contract->id}}</td>
            <td>{{$contract->name}}</td>
            <td>{{$contract->username}}</td>
            <td>{{$contract->room->name}}</td>
            <td>Rp.{{number_format($contract->payment, 0, '.', '.')}}</td>
            <td>{{$contract->months}}</td>
            <td>{{$contract->phone}}</td>
            <td><a href="/admin/requests/extend/{{$contract->id}}" class="badge bg-success" onclick="return confirm('Apakah anda yakin akan menerima request ini?')">
              <span data-feather="check-square" class="align-text-bottom"></span></a>
            <a href="/admin/requests/decline/{{$contract->id}}" class="badge bg-danger" onclick="return confirm('Apakah anda yakin akan menolak dan menghapus request ini?')">
              <span data-feather="x-square" class="align-text-bottom"></span></a>
            {{-- <a href="/admin/roomtypes/delete/{{$roomtype->id}}" class="badge bg-danger">
              <span data-feather="x" class="align-text-bottom"></span></a> --}}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <h2>New</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Username</th>
          <th scope="col">Room</th>
          <th scope="col">Payment</th>
          <th scope="col">Months</th>
          <th scope="col">Phone</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($new as $contract)
        <tr>
            <td>{{$contract->id}}</td>
            <td>{{$contract->name}}</td>
            <td>{{$contract->username}}</td>
            <td>{{$contract->room->name}}</td>
            <td>Rp.{{number_format($contract->payment, 0, '.', '.')}}</td>
            <td>{{$contract->months}}</td>
            <td>{{$contract->phone}}</td>
            <td><a href="/admin/requests/accept/{{$contract->id}}" class="badge bg-success">
              <span data-feather="check-square" class="align-text-bottom"></span></a>
            <a href="/admin/requests/decline/{{$contract->id}}" class="badge bg-danger">
              <span data-feather="x-square" class="align-text-bottom"></span></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <h2>Passed</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Username</th>
          <th scope="col">Room</th>
          <th scope="col">Payment</th>
          <th scope="col">Paid at</th>
          <th scope="col">Phone</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($passed as $contract)
        <tr>
            <td>{{$contract->id}}</td>
            <td>{{$contract->user->name}}</td>
            <td>{{$contract->user->username}}</td>
            <td>{{$contract->room->name}}</td>
            <td>Rp.{{number_format($contract->payment, 0, '.', '.')}}</td>
            <td>{{$contract->until}}</td>
            <td>{{$contract->phone}}</td>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection