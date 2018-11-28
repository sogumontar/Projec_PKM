



<!doctype html>
<html lang="en">
  <head>
    <title>KingStay</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/carousel.css') }}">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <style>
      /* Remove the navbar's default margin-bottom and rounded borders */
      .navbar {
        margin-bottom: 0;
        border-radius: 0;
      }

      /* Add a gray background color and some padding to the footer */
      footer {
        background-color: #f2f2f2;
        padding: 25px;
      }
    </style>
  </head>
  <body>

    <header>
      <div id="app">
        <nav  class="navbar navbar-expand-md navbar-dark fixed-top bg" style="background-color:#6CBAEC;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                         
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"> Login</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                        <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ URL('welcome') }}">Home</a>
                                @endif
                            </li>
                        <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('homestay.view') }}">View</a>
                                @endif
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Masukkan Akun Anda</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      
                    </div>
                    <div class="modal-footer">
                      <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Send message</button> -->
                    </div>
                  </div>
                </div>
              </div>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
          <nav class="navbar navbar-expand-sm" style="background-color:#F5F5F5;">
            <a class="navbar-brand" href="#" style="color:#F5F5F5;">jabukku</a>
            </div>
          </nav>

        </header>

        <main role="main">

          <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Hello, world!</h1>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
      </div>



      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container" style="margin-top:30px;" >
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
            <div class="card-header">Temukan Homestay mu</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Lokasi : </h5>
                      <div class="input-group-prepend">
                          <div class="input-group-text">@</div>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Lokasi"></div>
                          <h5>Check in : </h5>
                          <div class="row">
                            <div class="col">
                              <input type="date" class="form-control" placeholder="First name">
                            </div>
                            <div class="col">
                              <input type="time" class="form-control" placeholder="Last name">
                            </div>
                          </div>
                          <h5>Check in : </h5>
                          <div class="row">
                            <div class="col">
                              <input type="date" class="form-control" placeholder="First name">
                            </div>
                            <div class="col">
                              <input type="time" class="form-control" placeholder="Last name">
                            </div>
                          </div>


                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleFormControlSelect2">Tamu</label>
                        <select class="form-control" id="exampleFormControlSelect2">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect2">Kamar</label>
                        <select class="form-control" id="exampleFormControlSelect2">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                       <a href="#" class="btn btn-primary">Cari</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
        </div>
      </div>
      </div>


    <div class="container">
      <hr>
      <h5 style="text-align:center;">Homestay Favorit</h5>
      <hr>
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <div class="card-body">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <img class="card-img-top" src="3.jpg" alt="Card image cap">
                  <hr>
                  <p>Pemendangan di homestay ini sangat keren</p>
                </div>
                  <h5 class="card-header"> <a href="#" class="btn btn-primary">Detail</a></h5>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-body">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <img class="card-img-top" src="3.jpg" alt="Card image cap">
                  <hr>
                  <p>Pemendangan di homestay ini sangat keren</p>
                </div>
                  <h5 class="card-header"> <a href="#" class="btn btn-primary">Detail</a></h5>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-body">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <img class="card-img-top" src="3.jpg" alt="Card image cap">
                  <hr>
                  <p>Pemendangan di homestay ini sangat keren</p>
                </div>
                  <h5 class="card-header"> <a href="#" class="btn btn-primary">Detail</a></h5>
              </div>
            </div>
          </div>
        </div>

        <hr>

      </div>

      <div class="jumbotron text-center" style="background-color:grey;">
        <p>Footer</p>
      </div>
    </main>
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
      <!-- <script type="tex" href="{{ asset('vendor/bootstrap/carousel.css') }}"> -->
  </body>
</html>
