@extends('template.layout')

@section('content')
<div class="bg-dark text-light p-5">
<form method="POST" action="/user/change-pw">
    @csrf
    @error('old')
        <p class="my-3 text-danger">{{$message}}</p>
    @enderror
    @if(session('success'))
        <p class="my-3 text-success">{{session('success')}}</p>
    @endif
    <div class="form-group my-3">
        <label for="old">Old password</label>
        <input type="password" name="old" id="name" class="form-control" required>
    </div>

    <div class="form-group my-3">
        <label for="new">New Password</label>
        <input type="password" name="new" id="phone" class="form-control" required>
    </div>
    @error('confirm')
        <p class="my-3 text-danger">{{$message}}</p>
    @enderror
    <div class="form-group my-3">
        <label for="confirm">Confirm new password</label>
        <input type="password" name="confirm" id="username" class="form-control" >
    </div>
    <button type="submit" class="btn btn-outline-light px-5 my-3 my-3">Order</button>
</form>
</div>
@endsection