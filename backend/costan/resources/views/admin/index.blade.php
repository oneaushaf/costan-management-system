@extends('admin.layout')

@section('isle')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <p>Welcome,<b> {{ auth()->guard('admin')->user()->name }}!</b></p>
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection