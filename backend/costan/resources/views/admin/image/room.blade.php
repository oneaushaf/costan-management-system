@extends('admin.layout')

@section('isle')
<main class=" ms-sm-auto col-lg-10 ">
<div class="card bg-dark mt-3 px-3 py-3" >
    <h6 class="text-light">Images</h6>
    @if (!$room->pictures)
    <br>
        <p class="text-light"><b>Kamar belum memiliki gambar</b></p>
    @else
    <div class="row gap-3 auto justify-content-left">
    @foreach ($room->pictures as $image) 
        <div class="card mx-2 my-3 text-center" style="width: 18rem;">
        <img src="/storage/{{$image->image}}"
        class="rounded float-start my-2" alt="{{$image->alter}}">
        <a href="/admin/rooms/image/delete/{{$image->id}}" class="badge bg-danger my-2">
            <span data-feather="trash" class="align-text-bottom"></span>
        </a>
        </div>
    @endforeach
    </div>
    @endif
    
    <form action="/admin/rooms/image/{{$room->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Masukkan Gambar untuk file</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <button class="btn btn-outline-light px-5" type="submit" name="submit">Add Image</button> 
    </form>
</div>
</main>
@endsection