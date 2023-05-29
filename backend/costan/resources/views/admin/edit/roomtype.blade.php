@extends('admin.layout')

@section('isle')
<main class=" ms-sm-auto col-lg-10 ">
    <div class="card bg-dark mt-3 px-3 py-3 text-light" >
    <h1>Edit {{$roomtype->name}}</h1>
        <form method="POST" action="/admin/roomtypes/edit/{{$roomtype->id}}">
            @csrf
            <div class="table-responsive text-light">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <th>
                            <div class="form-group text-light">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$roomtype->name}}"required>
                            </div>
                
                            <div class="form-group text-light">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" class="form-control" value="{{$roomtype->price}}" required>
                            </div>
                                {{-- <button type="submit" class="btn btn-primary">Create Facility</button> --}}
                            </form>
                        </th>
                        <th>
                            @foreach ($facilities as $facility)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="facilities[]" 
                                    value="{{$facility->id}}" id="facility{{$facility->id}}"
                                    @if($roomtype->facilities->contains($facility->id)) checked @endif>
                                    <label class="form-check-label text-light" for="facility{{$facility->id}}" >
                                        {{$facility->name}}
                                    </label>
                                </div> 
                            @endforeach
                        </th>
                    </tr>
                  </tbody>
                </table>
                <button type="submit" class="btn btn-outline-light">Edit</button>
              </div>
        </form>
    </div>
</main>
@endsection