<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Costan | Your kosan management system</title>
        <link href="/test.css" rel="stylesheet">
        <link href="/asset/icon.jpeg" rel="shortcut icon" type="image">
        {{-- <link rel = "stylesheet" href="/loginstyle.css"/> --}}
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
        <link rel="stylesheet" href="/layout.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
        {{-- @yield('style') --}}
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style = "background-color: rgb(12, 11, 61);">
        <div class="container-fluid">
          <img src = "\asset\Biru_Simpel_Terima_Kasih_Circle_Sticker__1_-removebg-preview.png" width = "40"  height = "40">
            <a class="navbar-brand ms-2" href="/">
              <b>Cost-an</b> 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link {{ Request::is('/home*')?"active":"" }}" aria-current="page" href="/home">  <b>About</b> </a>
              </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/room*')?"active":"" }}" aria-current="page" href="/room"><b>Room</b></a>
                </li>
                <li class="nav-item">
                  @auth
                    <a class="nav-link {{ Request::is('/user*')?"active":"" }}" href="/user"><b>{{Auth::user()->name}} </b></a>
                  @else 
                    <a class="nav-link {{ Request::is('/order*')?"active":"" }}" href="/order"><b>Order</b></a>
                  @endif
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                @auth
                  <form action="/logout" method="POST">
                    @csrf
                    <button  type="submit" class="btn btn-outline-info" class="dropdown-item">
                      <i class="">Logout</i>
                    </button>
                  </form>
                @else
                  <a class="btn btn-outline-info" href="{{url('/login')}}"><i class=""></i>Login</a>
                @endif
              </li>
            </ul>
          </div>
        </div>
      </nav>
        {{-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{url('/')}}">Costan</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/room')}}">Room</a>
                  </li>
                  <li class="nav-item">
                    @auth
                      <a class="nav-link" href="/user">{{Auth::user()->name}} </a>
                    @else 
                      <a class="nav-link" href="/order">Order</a>
                    @endif
                  </li>
                </ul> 
                  
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    @auth
                      <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">
                          <i class="bi bi-box-arrow-in-right">Logout</i>
                        </button>
                      </form>
                    @else
                      <a class="nav-link" href="{{url('/login')}}"><i class="bi bi-box-arrow-in-right"></i>Login</a>
                    @endif
                  </li>
                </ul>
              </div>
            </div>
          </nav> --}}
        {{-- <div class="fluid-container bg-info-subtle"> --}}
        @yield('content')
        {{-- </div> --}}

        {{-- <footer class="text-center text-white mt-5 col-lg p-3" style = "background-color:rgb(12, 11, 61);">
          <h4 class="mt-5">COST-AN</h4>
          <h6>Jalan babakan pinggir no 612 RT 02/08</h6>
          <H6>BABAKAN DRAMAGA</H6>
          <h6 class="mb-5"> Contact - Pak Herman</h6>
        </footer> --}}

        <!-- Remove the container if you want to extend the Footer to full width. -->
        <footer class="text-center text-white" style = "background-color:rgb(12, 11, 61);">
            <!-- Grid container -->
            <div class="container pt-4">
              <h4 class="mt-5">COST-AN</h4>
              <h6>Jalan Babakan Pinggir no 612 RT 02/08</h6>
              <H6>BABAKAN DRAMAGA</H6>
              <h6 class="mb-5"> Contact - Pak Herman</h6>
              <!-- Section: Social media -->
              {{-- <section class="mb-4">
                <!-- Facebook -->
                <a
                  class="btn btn-link btn-floating btn-lg text-dark m-1"
                  href="#!"
                  role="button"
                  data-mdb-ripple-color="dark"
                  ><i class="fab fa-facebook-f"></i
                ></a>
          
                <!-- Twitter -->
                <a
                  class="btn btn-link btn-floating btn-lg text-dark m-1"
                  href="#!"
                  role="button"
                  data-mdb-ripple-color="dark"
                  ><i class="fab fa-twitter"></i
                ></a>
          
                <!-- Google -->
                <a
                  class="btn btn-link btn-floating btn-lg text-dark m-1"
                  href="#!"
                  role="button"
                  data-mdb-ripple-color="dark"
                  ><i class="fab fa-google"></i
                ></a>
          
                <!-- Instagram -->
                <a
                  class="btn btn-link btn-floating btn-lg text-dark m-1"
                  href="#!"
                  role="button"
                  data-mdb-ripple-color="dark"
                  ><i class="fab fa-instagram"></i
                ></a>
          
                <!-- Linkedin -->
                <a
                  class="btn btn-link btn-floating btn-lg text-dark m-1"
                  href="#!"
                  role="button"
                  data-mdb-ripple-color="dark"
                  ><i class="fab fa-linkedin"></i
                ></a>
                <!-- Github -->
                <a
                  class="btn btn-link btn-floating btn-lg text-dark m-1"
                  href="#!"
                  role="button"
                  data-mdb-ripple-color="dark"
                  ><i class="fab fa-github"></i
                ></a>
              </section> --}}
              <!-- Section: Social media -->
            </div>
            <!-- Grid container -->
          
            <!-- Copyright -->
            <div class="text-center text-light p-3" style="background-color: rgba(0, 0, 0, 0.2);">
              © 2020 Copyright:
              <a class="text-light" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
          </footer>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="/dashboard.js"></script>
    </body>
</html>