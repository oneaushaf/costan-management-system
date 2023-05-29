@extends('admin.layout')

@section('isle')
<main class=" ms-sm-auto col-lg-10 ">
    <div class="card bg-dark mt-3 px-3 py-3 text-light" >
    <h1>Create a new Facility</h1>
        <form method="POST" action="/admin/facilities/create">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-outline-light px-5 my-3">Create Facility</button>
        </form>
        </div>
</main>
@endsection