@extends('admin.layout')

@section('isle')
<main class=" ms-sm-auto col-lg-10 ">
    <div class="card bg-dark mt-3 px-3 py-3 text-light" >
    <h1 class="text-light">Add a new user</h1>
        <form method="POST" action="/admin/users/create">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-outline-light px-5 my-3">Add User</button>
        </form>
        </div>
</main>
@endsection