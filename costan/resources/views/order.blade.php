@extends('template.layout')

@section('content')
<div class="px-5 py-5" style="background-color: #333;">
<div class="card bg-dark text-light p-5" style="max-width: 40rem">
<h1>Pesan Ruangan</h1>
    <form method="POST" action="/order/send">
        @csrf
        <div class="form-group my-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group my-3">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>
        <div class="form-group my-3">
            <label for="username">Username (akan digunakan untuk membuat akun-mu)</label>
            <input type="text" name="username" id="username" class="form-control" >
        </div>
        <div class="form-group my-3">
            <label for="room" name="room">Select Room</label>
            <select name="room" class="form-control" id="room" >
                @foreach ($rooms as $room)
                <option value="{{$room->id}}" @isset($chosed)
                    {{$room->id==$chosed?"selected":""}}
                @endisset>
                    {{$room->name}} Type {{$room->roomtype->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group my-3">
            <label for="months" name="months">Select durasi</label>
            <select name="months" class="form-control" id="months" >
                <option value="1">1 Bulan</option>
                <option value="3">3 Bulan</option>
                <option value="6">6 Bulan</option>
                <option value="12">12 Bulan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-outline-light px-5 my-3 my-3">Order</button>
    </form>
</div>
</div>
@endsection