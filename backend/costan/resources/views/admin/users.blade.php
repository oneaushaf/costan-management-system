@extends('admin.layout')

@section('isle')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <h2>User</h2>
  <a href="/admin/users/create"><button type="button" class="btn btn-primary">+ add new user</button></a>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Username</th>
          <th scope="col">Phone</th>
          <th scope="col">Paydate</th>
          <th scope="col">Room</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->phone}}</td>
            <td @isset($user->until)
            @if ($user->until->isPast())
              class="fw-bold text-danger"
            @endif> 
            @endisset
                {{$user->until}}
            </td>
            <td>
              @if ($user->room!=null)
                <a href="/admin/users/{{$user->id}}/detach" class="badge bg-danger" onclick="return confirm('Apakah anda yakin akan mengeluarkan user dari kamarnya?')">
                <span data-feather="x-square" class="align-text-bottom"></span></a>    
              @else
              <a href="/admin/users/{{$user->id}}/attach" class="badge bg-info">
                <span data-feather="home" class="align-text-bottom"></span></a> 
              @endif
              {{$user->room!=NULL?$user->room->name:""}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection