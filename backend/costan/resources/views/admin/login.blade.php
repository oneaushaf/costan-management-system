<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin | Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="/test.css" rel="stylesheet">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
        <style>
            .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;
            
            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
            
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
            }
          </style>
    </head>
    <body>
        <main class="vh-100 gradient-custom">
            <form class="container py-5 h-100" method="post" action="/admin/login">
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
                                    <h2 class="fw-bold mb-2 text-uppercase">ADMIN LOGIN</h2>
                                    <p class="text-white-50 mb-5">Please enter your username and password!</p>
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
        {{-- <main class="form-signin w-100 m-auto">
            <form action="/admin/login" method="POST">
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
                <input class="w-100 btn btn-lg btn-primary" type="submit" value="Sign in"></button>
            </form>
        </main> --}}
    </body>
</html>