@extends('admin.layout')

@section('isle')
<main class=" ms-sm-auto col-lg-10 ">
    <div class="card bg-dark mt-3 px-3 py-3" >
        <span class="text-light">Previous image</span>
        <img src="/storage/{{$roomtype->image?$roomtype->image:"roomtype-image/temp.png"}}"
        class="rounded float-start" alt="{{$roomtype->name}}" style="width: 18rem;">
        <form action="/admin/roomtypes/image/{{$roomtype->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">Masukkan Gambar untuk file</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
            <button class="btn btn-outline-light px-5" type="submit" name="submit">Change image</button> 
        </form>
    </div>
</main>
    
@endsection