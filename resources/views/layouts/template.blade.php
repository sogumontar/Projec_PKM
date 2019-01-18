@include('layouts.alerts')
<!doctype html>
<html lang="en">
<head>
  <title>KingStay</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
  <!-- <link rel="stylesheet" href="{{ asset('vendor/bootstrap/carousel.css') }}"> -->
  <link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <!-- <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
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
      <nav   class="navbar navbar-expand-md navbar-dark fixed-top " style="background-color:#6CBAEC;">
        <div class="container">
          <a class="navbar-brand" style="font-size: 15px" href="{{ url('/') }}">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/logokingstay.png" style="width: 70px; height: 50px;">
          </a>
          <form method="post" action="{{route('homestay.search')}}">
            {{ csrf_field() }}

            <div class="search-container">
             <div class="row"> 
              <div class="col-md-9" align="right">
                <br>
               <input type="text" class="form-control" style="margin-left: 32px;" name="lokasi" placeholder="Cari  Penginapan.." name="search">

             </div>
             <div class="col-md-2"> 
              <br>
               <button type="submit" class="btn"><img src="/search.png" style="width: 23px;"></button>
             </div>

           </div>
         </div>
       </form>

       <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          <li><br>


          </li>
          <li class="nav-item active"><br>
            <a class="nav-link"style="font-size: 15px"  href="{{route('homestay.view')}}">Lihat Penginapan</a>

          </li>
          <li class="nav-item active"><br>
            <a class="nav-link" style="font-size: 15px" href="{{route('objekWisata.view')}}">Objek Wisata</a>
          </li>
          <li class="nav-item active"><br>
            <a class="nav-link"style="font-size: 15px" href="{{route('pengalaman.view')}}">Pengalaman</a>
          </li>
          <li class="nav-item active"><br>
            <a class="nav-link" style="font-size: 15px"href="{{route('kendaraan.view')}}">Kendaraan</a>
          </li>
              <!-- <li class="nav-item active">
                <a class="nav-link" href="{{route('listBook')}}">List Booking</a>
              </li> -->
              <li class="nav-item active"><br>
                <i class="fas fa-user"></i>


                
              </li>
              @guest
              <li class="nav-item active"><br>
                <i class="fas fa-user"></i>


                <a class="nav-link" href="#"style="font-size: 15px" id="navbarDropdown" role="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                  login
                </a>

              </li>


              
              
              <li class=""><br>
                @if (Route::has('register'))
                <a style="font-size: 15px" class="nav-link" href="{{route('user.register')}}">{{ __('Register') }}</a>
                @endif
              </li>
              @else
              <li class="nav-item"><br>
                @if (Route::has('register'))
                @endif
              </li>
              <li class="nav-item"><br>
                @if (Route::has('register'))
                @endif
              </li>
              <li class="nav-item dropdown"><br>
                <a id="navbarDropdown" style="font-size: 15px" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                 <a style="font-size: 15px" class="dropdown-item" href="{{ route('member.booking') }}"
                 >
                 Request Booking
               </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
              <a class="dropdown-item" style="font-size: 15px" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit(); return confirm('Anda ingin keluar?')"">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
           </form>
         </div>
       </li>

       @endguest
     </ul>
   </div>
 </div>

</font>

<main class="py-4">
  @yield('content')
</main>
</div>
</nav>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg" style="background-color:#6CBAEC;">
  <a class="navbar-brand" href="#">
  </a>
</nav>
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

        <form action="{{route('login')}}" method="post">
          <input class="form-control" type="email" name="email" placeholder="email" id="email"><br>
          <input class="form-control" type="password" name="password" placeholder="password" id="password"><br>
          <div class="row">
            <div class="col-md-9">

            </div>
            <div class="col-md-2">
             <input align="right" type="submit" class="btn btn-info" name="" value="Login">
           </div>
         </div>
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
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg" style="background-color:#6CBAEC;">
                  <a class="navbar-brand" href="#">

                  </a>
                </nav>

              </div>
            </div>
          </ul>
        </nav>


      </header>

      <main role="main">





      </main>
      <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.slim.min.js')}}"></script>
      <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></script>
      <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
      <!-- <script type="tex" href="{{ asset('vendor/bootstrap/carousel.css') }}"> -->
      </body>
      </html>

      @yield('content')
