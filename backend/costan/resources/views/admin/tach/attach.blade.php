@extends('admin.layout')

@section('isle')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>attach an empty room</h1>
        <form method="POST" action="/admin/users/{{$user->id}}/attach">
            @csrf
            <div class="form-group">
                <label for="room" name="room">Select room</label>
                <select name="room" class="form-control" id="room" >
                  @foreach ($rooms as $room)
                    <option value="{{$room->id}}">{{$room->name}}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="months" name="months">Select months</label>
                <select name="months" class="form-control" id="months" >
                    <option value="1">1 Bulan</option>
                    <option value="3">3 Bulan</option>
                    <option value="6">6 Bulan</option>
                    <option value="12">12 Bulan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin?')">attach</button>
        </form>
</main>
@endsection