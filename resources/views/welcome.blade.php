
<br>
  @include('layouts.alerts')
<br>
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
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/logokingstay.png" style="width: 67px; height: 40px;">
                </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                  <form method="post" action="{{route('homestay.search')}}">
     {{ csrf_field() }}
              <div class="row">
                <div class="col-md-1" style="margin-top: 5px;"><br>
                    <img src="/search.png" style="width: 29px">
                  </div><br>
                  <div class="col-md-6" style="margin-top: 20px;">
                    <input src="/search.png" type="text"  class="form-control" style="width: 250px;" id="exampleInputPassword1" placeholder="Cari">
                  </div>
              </div>
              </form>
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
                
             
          
              
                            <li class="active">
                                @if (Route::has('register'))
                                      <a id="navbarDropdown" data-target="#signup" data-toggle="modal" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Register
                                 </a>
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
                            <li class="nav-item">
                                 <a id="navbarDropdown" data-target="#notif" data-toggle="modal" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><img alt="del" src="/Capture.PNG" style="width: 30px" class="rounded">
                                          <!-- <img alt="del" src="/Capture.PNG" style="width: 30px" class="rounded"> -->
                                 </a>
                            </li>
                            <li class="nav-item dropdown">
                             
                                <a id="navbarDropdown"  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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


 <div class="modal fade" id="notif" tabindex="-1" role="dialog" aria-labelledby="notifLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Notif Anda <img src="/notif.PNG" style="width: 30px;"></h5><br>
                      @if(Auth::user())

                      <?php
                        $test=Auth::user()->id;
                        if(Auth::user()->role='member'){
                       $DB=DB::SELECT("SELECT * FROM member where id_akun=$test");
                       }else{
                        $DB=DB::SELECT("SELECT * FROM pemilik_homestay_kendaraan where id_akun=$test");
                       } 
                        $rr=DB::SELECT("SELECT * FROM notifikasi where id_penerima=$test  ");

                       ?>
                       <br>
                      <h6>{{$DB[0]->nama}}</h6>
                      @endif
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @if(Auth::user())
                   
                    <div class="modal-body">
                    <li>
                     <p>{{$rr[0]->nama}}</p>
                    </li>
                     <input type="text" value="{{$rr[0]->isi}}" class="form-control" name="">
                    </div>
                    <div class="modal-body">
                    <li>
                     <p>{{$rr[1]->nama}}</p>
                    </li>
                     <input type="text" value="{{$rr[1]->isi}}" class="form-control" name="">
                    </div>
                    
                    
                 
                    @endif
                    <div class="modal-footer">
                      <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Send message</button> -->
                    </div>
                  </div>
                </div>
              </div>
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
              <div class="modal fade" id="signup" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Anda</h5>
                        
                      </button>
                    </div>
                    <div class="modal-body">
                         <form action="{{route('reg')}}" method="post">
                          <label>Nama:</label>
                          <input class="form-control" type="text" name="nama"  id="nama" required="">
                          <label>Alamat:</label>
                          <input class="form-control" type="text" name="alamat"  id="alamat" required="">
                          <label>Nomor Telepon:</label>
                          <input class="form-control" type="text" name="notelp"  id="notelp" required="">
                          <label>Email</label>
                          <input class="form-control" type="email" name="mail"  id="nama" required="">
                          <label>Password:</label>
                          <input class="form-control" type="password" name="password"  required="">
                          <label>Confirm Password:</label>
                          <input class="form-control" type="password" name="confirmpassword"  required="" id="password"><br>
                          <div class="row"> 
                            <div class="col-md-1" align="left">
                              <input type="submit" class="btn btn-danger" name="" value="cancel" align="right">
                            </div>
                            <div class="col-md-11" align="right">
                              <input type="submit" class="btn btn-info" name="" value="save" align="right">
                            </div>
                          </div>
                          <input type="hidden" class="btn btn-info" name="_token" value="{{csrf_token()}}"  class="hidden">
                      </form>
                   
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
        </header>

        <main role="main">

          <div class="jumbotron" style="background: url('/interior-design-ideas-bedroom-wallpaper-bedroom-wallpaper-ideas-with-added-design-bedroom-and-captivating-to-various-settings-layout-of-the-room-bedroom-captivating-2-interior-design-bedroom-wallpaper.jpg') ">
        <div class="container">
          <h3 class="display-3">KingStay</h3>
          <h3 class="display-3">HomeStay, StayHome</h3>
          <p style="color: #000000">Menyajikan homestay dengan suasana seperti rumah sendiri</p>
          <p>
<br><br><br><br><br><br><br>

                  </div>
                  
                </div>
                <div class=" " style="background-color:#F5F5F5;">
                  <br><br><br>
                </div>
                <div class="container">
                 <h3 style="color: #000000">Daftarkan Homestay/Kendaraan anda</h3>
                    <a href="{{route('member.daftar')}}"><button class="btn btn-info" style="width: 150px;" >Di sini</button></a>
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
            <div class=" ">
              <div class="" style="width: 18rem;">
                <div class="card-header">
                   <img class="card-img-top" src="uploadgambar/{{$pp[0]->gambar}}" alt="Card image cap" style="width: 250px; height: 200px;">
                  <hr>
                  <h5><i>{{$pp[0]->nama}}</i></h5>
                  <textarea class="form-control" readonly=""><?php echo $pp[0]->keterangan?></textarea>
                </div>
                  <p style="color: blue" class="card-header">Rp.{{$pp[0]->harga}},00</p>
                  <div align="right" class="col-md-12 card-header"><a href="{{route('homestay.detail',$pp[0]->id)}}"><button class="btn btn-info">Detail</button></a></div>
              </div>
            </div>
          </div><br>
        <div class="col-md-4">
            <div class="">
              <div class="" style="width: 18rem;">
                <div class="card-header">
                   <img class="card-img-top" src="uploadgambar/{{$pp[1]->gambar}}" alt="Card image cap" style="width: 250px; height: 200px;">
                  <hr>
                  <h5><i>{{$pp[1]->nama}}</i></h5>
                  <textarea class="form-control" readonly=""><?php echo $pp[1]->keterangan?></textarea>
                </div>
                  <p style="color: blue" class="card-header">Rp.{{$pp[1]->harga}},00</p>
                  <div align="right" class="col-md-12 card-header"><a href="{{route('homestay.detail',$pp[1]->id)}}"><button class="btn btn-info">Detail</button></a></div>
              </div>
            </div>
          </div><br>
        <div class="col-md-4">
            <div class=" ">
              <div class="" style="width: 18rem;">
                <div class="card-header">
                   <img class="card-img-top" src="uploadgambar/{{$pp[2]->gambar}}" alt="Card image cap" style="width: 250px; height: 200px;">
                  <hr>
                  <h5><i>{{$pp[2]->nama}}</i></h5>
                  <textarea class="form-control" readonly=""><?php echo $pp[2]->keterangan?></textarea>
                </div>
                  <p style="color: blue" class="card-header">Rp.{{$pp[2]->harga}},00</p>
                  <div align="right" class="col-md-12 card-header"><a href="{{route('homestay.detail',$pp[2]->id)}}"><button class="btn btn-info">Detail</button></a></div>
              </div>
            </div>
          </div>

        <hr>

      </div>
</div>
<br>
 </body>
    <font color="#ffffff">
      <center>
      <div class="container-fluid" align="" style="background-color:grey;">
        <div class="row">
          <div class="col-md-1">
            
          </div>
         <div class="col-md-3" align="left">
          <br>
    <center><a align="center"><b>Contact us</b></a><br></center>
            <a>Created at&nbsp;:&nbsp;15-Dec-2018</a><br>
            <a>Loaction&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Institut Teknologi Del</a><br>
            <a>Owner&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Sogumontar Hendra Simangunsong</a><br>
            <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kristopel Lumbantoruan</a><br>
            <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gita Nadapdap</a>
         </div>
         <div class="col-md-4">
           <h3 align="center">KingStay</h3>
           <p align="center">Website ini di bangun dengan sepenuh hati oleh tim project KREN/PAP, dengan harapan bisa membantu masyarakat dalam mencari tempat penginapan di daerah Toba Samosir.</p>
         </div>
         <div class="col-md-3" align="left"><br>
           <center><a align="center"><b>Contact us</b></a><br></center>
           <img src="/wa.png" style="width: 40px;">
           <a align="left">081282480790(Sogumontar Simangunsong)</a>
           <a align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;081282480799(Gita Nadapdap)</a><br>
           <a align="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;081282480799(Kristopel Lumabntoruan)</a><br>
         </div> 
         <div class="col-md-1">
           
         </div>
        </div>
        <br><br><br>
      </div>
    </center>
    </font>
    </main>
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
      <!-- <script type="tex" href="{{ asset('vendor/bootstrap/carousel.css') }}"> -->
 
</html>
