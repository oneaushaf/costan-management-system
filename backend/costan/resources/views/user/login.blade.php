@extends('template.layout')
@section('content')
    {{-- <main class="form-signin w-100 m-auto"> --}}
    
        <main class="vh-100 gradient-custom">
            <form class="container py-5 h-100" method="post" action="/login">
                @csrf
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <div class="text-danger">
                                    @error('mismatch')
                                        {{$message}}
                                    @enderror
                                </div>
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h2 class="fw-bold mb-2">Costan Log In</h2>
                                    <p class="text-white-50 mb-5">only if you are already part of us!</p>
                                    <div class="form-outline mb-4">
                                        <input type="text" id="typeEmailX-2" class="form-control form-control-lg" name="username" value="{{@old('username')}}">
                                        <label class="form-label" for="typeEmailX-2" >Username</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password"/>
                                        <label class="form-label" for="typePasswordX-2">Password</label>
                                    </div>
                                        <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Sign In</button>
                                </div>          
                            </div>
                        </div>
                    </div>
                </div>
            </form>
          </main>
        {{-- <form action="/login" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <div class="form-floating">
                <input name="username" type="text" class="form-control" id="username">
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="password">
                <label for="password">Password</label>
            </div>
            <input class="w-100 btn btn-lg btn-primary" type="submit" name="submit" value="Sign in"></button>
        </form> --}}
    </main>
@endsection