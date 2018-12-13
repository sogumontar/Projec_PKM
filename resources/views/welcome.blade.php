

  @include('layouts.alerts')

<!doctype html>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js' type='text/javascript'/>
<script type='text/javascript'>
//<![CDATA[
$(document).ready(function() {
$('img').each(function(){
var $img = $(this);
var filename = $img.attr('src')
$img.attr('alt', filename.substring((filename.lastIndexOf('/'))+1, filename.lastIndexOf('.')));
});
});
//]]>
</script>
<script type='text/javascript'>
//<![CDATA[
$(document).ready(function() {
$('img').each(function(){
var $img = $(this);
var filename = $img.attr('src')
$img.attr('title', filename.substring((filename.lastIndexOf('/'))+1, filename.lastIndexOf('.')));
});
});
//]]>
</script>
<html lang="en">
  <head>
    <title>KingStay</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/carousel.css') }}">
    <link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
    <link rel="icon" type="image/png" href="/logokingstay.png">
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
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/logokingstay.png" style="width: 70px; height: 55px;">
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
          @if((Auth::user()))
            @if(Auth::user()->role='member')
             
              @else
               <li class="nav-item active">
                <a class="nav-link" href="{{route('homestay.create')}}">Daftar Penginapan</a>
              </li>
            @endif
          @endif
              <li class="nav-item active">
                <a class="nav-link" href="{{route('homestay.view')}}">Lihat Penginapaan</a>
              </li>

              <li class="nav-item active">
                <a class="nav-link" href="{{route('objekWisata.view')}}">Objek Wisataa</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{route('pengalaman.create')}}">Pengalaman</a>
              </li>
            
              <li class="nav-item active">
                <i class="fas fa-user"></i>


               
              </li>
                        @guest
                         <li class="nav-item active">
                <i class="fas fa-user"></i>


                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="modal" data-target="#exampleModal" >
                  login
                </a>
                
             
          
              
                            <li class="">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{route('register')}}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                        <li class="nav-item">
                                @if (Route::has('register'))
                                @endif
                            </li>
                        <li class="nav-item">
                                @if (Route::has('register'))
                                @endif
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><img alt="del" src="/Capture.PNG" style="width: 30px" class="rounded">
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
                    </ul>
                </div>
            </div>
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
        <main class="py-4">
            @yield('content')
        </main>
    </div>
          <nav class="navbar navbar-expand-sm" style="background-color:#F5F5F5;">
           <!-- <br><br <a class="navbar-brand" href="#" style="color:#F5F5F5;">jabukku</a> -->
           <br>
            </div>
          </nav>

        </header>

        <main role="main">

          <div class="jumbotron" style="background: url('/interior-design-ideas-bedroom-wallpaper-bedroom-wallpaper-ideas-with-added-design-bedroom-and-captivating-to-various-settings-layout-of-the-room-bedroom-captivating-2-interior-design-bedroom-wallpaper.jpg') ">
        <div class="container">
          <h3 class="display-3">KingStay</h3>
          <h3 class="display-3">HomeStay, StayHome</h3>
          <p style="color: #000000">Menyajikan homestay dengan suasana seperti rumah sendiri</p>
          <p>

                  <div class="card" style="background-color: transparent;">
                    
                      <form method="post" action="{{route('homestay.search')}}">
                      <div class="input-group-prepend">
                        {{ csrf_field() }}
                          </div>
                            <br>
                             <div class="row">
                             
                            
                            <div class="input-group-text">
                             <img src="/Location.png" style="width: 20px"></div>
                            <div class="col">
                              <input type="text"  class="form-control" name="lokasi" id="exampleInputPassword1" placeholder="Lokasi">
                            </div>
                            <div class="col">
                              
                            </div>
                          </div><br>
                          <div class="row">
                            <div class="input-group-text">
                              <img src="/jam.png" style="width: 20px"></div>
                            <div class="col">
                              <input type="date" class="form-control" name="waktu_awal">
                            </div>
                            <div class="col">
                              
                            </div>
                          </div>
                         <br>
                          <div class="row">
                            <div class="input-group-text">
                              <img src="/jam.png" style="width: 20px"></div>
                            <div class="col">
                              <input type="date"  class="form-control" name="waktu_akhir" placeholder="waktu_akhir">
                            </div>
                             <div class="col">
                              
                            </div>
                          </div><br>
                  <div class="col-md-6" align="right">
                    <a href=""><button class="btn btn-primary">Search</button></a>
                  </div>
                    </form>
                  </div>

                  </div>
                  
                </div>
              
      
      </div>
      </div>
      <?php 
      $pp=DB::SELECT("SELECT * FROM homestay order by pembooking ASC");
      ?>

    <div class="container">
      <hr>
      <h5 style="text-align:center;">Homestays Favorit</h5>
      <hr>
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <div class="card-body">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                   <img class="card-img-top" src="uploadgambar/{{$pp[0]->gambar}}" alt="Card image cap" style="width: 250px; height: 200px;">
                  <hr>
                  <p>{{$pp[0]->nama}}</p>
                  <textarea class="form-control" readonly=""><?php echo $pp[0]->keterangan?></textarea>
                </div>
                  <h5 class="card-header"> <a href="#" class="btn btn-primary">Detail</a></h5>
              </div>
            </div>
          </div>
         <div class="col-md-4">
            <div class="card-body">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                 <img class="card-img-top" src="uploadgambar/{{$pp[2]->gambar}}" alt="Card image cap" style="width: 250px; height: 200px;">
                  <hr>
                  <p>{{$pp[1]->nama}}</p>
                  <textarea class="form-control" readonly=""><?php echo $pp[1]->keterangan ?> </textarea>
                </div>
                  <h5 class="card-header"> <a href="#" class="btn btn-primary">Detail</a></h5>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-body">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                   <img class="card-img-top" src="uploadgambar/{{$pp[2]->gambar}}" alt="Card image cap" style="width: 250px; height: 200px;">
                  <hr>
                  <p>{{$pp[2]->nama}}</p>
                  <textarea class="form-control" readonly=""><?php echo $pp[2]->keterangan ?></textarea>
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
