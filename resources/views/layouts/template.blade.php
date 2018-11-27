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
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Bahasa Indonesia
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Bahasa Indonesia</a>
              <a class="dropdown-item" href="#">English</a>

          </div>
          </form>
        </div>
      </nav>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg" style="background-color:#6CBAEC;">
        <a class="navbar-brand" href="#">
        </a>
      </nav>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

          </ul>
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{route('homestay.create')}}">Daftar Penginapan</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{route('homestay.view')}}">Lihat Penginapan</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">Objek Wisata</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">Pengalaman</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{route('kendaraan.create')}}">Transportasi</a>
              </li>
              <li class="nav-item active">
                <i class="fas fa-user"></i>


                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                  login
                </a>
              </li>
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

                      <form action="{{route('user.login')}}" method="post">
                          <input class="form-control" type="email" name="email" placeholder="email" id="email"><br>
                          <input class="form-control" type="password" name="password" placeholder="password" id="password"><br>
                          <input type="submit" class="btn btn-info" name="" value="enter">
                          <input type="hidden" class="btn btn-info" name="_token" value="{{csrf_token()}}"  class="hidden">
                      </form>
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
      </nav>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg" style="background-color:#6CBAEC;">
        <a class="navbar-brand" href="#">

        </a>
      </nav>

  </div>
   </div>
    </ul>
      </nav>
          <nav class="navbar navbar-expand-sm" style="background-color:#F5F5F5;">
            <a class="navbar-brand" href="#" style="color:#F5F5F5;">jabukku</a>
            </div>
          </nav>

        </header>

        <main role="main">

        


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
@yield('content')
