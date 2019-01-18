


<!doctype html>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js' type='text/javascript'/>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
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

$("#sub").click(function() {
   $.post($("#myForm").attr("action"), $("#myForm :input").serializeArray(), function(info) { $("#result").html(info); });
   clearInput();
});

$("#myForm").submit(function(){
   return false;
});

function clearInput(){
   $("#myForm :input").each(function(){
      $(this).val('');
   });
};



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
        <img src="/logokingstay.png" style="width: 67px; height: 40px;">
     </a> 
     <form method="post" action="{{route('homestay.search')}}">
      {{ csrf_field() }}

      <div class="search-container">
         <div class="row"> 
            <div class="col-md-9" align="right">
               <input type="text" class="form-control" style="margin-left: 32px;" name="lokasi" placeholder="Cari  Penginapan.." name="search">
             
            </div>
            <div class="col-md-2"> 
                 <button type="submit" class="btn"><img src="/search.png" style="width: 20px;"></button>
            </div>

         </div>
      </div>
   </form>
</span>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <!-- Left Side Of Navbar -->

  <!-- Right Side Of Navbar -->

  <ul class="navbar-nav ml-auto">

 <li class="nav-item active">
    <a class="nav-link" href="{{route('homestay.view')}}">Penginapaan</a>
 </li>

 <li class="nav-item active">
    <a class="nav-link" href="{{route('objekWisata.view')}}">Objek Wisataa</a>
 </li>
 <li class="nav-item active">
    <a class="nav-link" href="{{route('pengalaman.view')}}">Pengalaman</a>
 </li>
 <li class="nav-item active">
            <a class="nav-link" style="font-size: 15px"href="{{route('kendaraan.view')}}">Kendaraan</a>
          </li>

 @guest
 <li class="nav-item active">
    <i class="fas fa-user"></i>


    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="modal" data-target="#exampleModal" >
      login
   </a>




   <li class="active">
     @if (Route::has('register'))
     <a   class="nav-link " href="{{route('user.register')}}"  >Register
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


  <li class="nav-item dropdown active">

     <a id="navbarDropdown"  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
      {{ Auth::user()->name }} <span class="caret"></span>
   </a>

   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

     <a class="dropdown-item" href="{{ route('member.booking') }}"
     >
     Request Booking
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
     @csrf
  </form>
  <a class="dropdown-item" href="{{ route('logout') }}"
  onclick="event.preventDefault();
  document.getElementById('logout-form').submit(); return confirm('Anda ingin keluar?')">
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
      
      @endif
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
     <div class="row">
      <div class="col-md-9">

      </div>
      <div class="col-md-1">
         <input style="margin-left: 30px;" align="right" type="submit" class="btn btn-info" name="" value="Login">
      </div>
   </div>
   <input type="hidden" class="btn btn-info" name="_token" value="{{csrf_token()}}"  class="hidden">
</form>
</div>                </div>
                         </div>
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

       <div class="container-fluid" style="background: url('/bggg.jpg'); background-size: cover; "> <br>  <br>  <br>  
        <div class="container">

          <b><h3 class="display-3">KingStay</h3></b>

          <br>
          <b><h3 class="display-3">HomeStay, <i>StayHome</i></h3></b>

          <p style="color: #000000">Menyajikan homestay dengan suasana seperti rumah sendiri</p>
          <p><br> <br>  <br>  <br>  
             
            <br><br><br><br><br><br><br>

         </div>

      </div>
      <div class=" " style="background-color:#F5F5F5;">
         <br><br>
         <div class="container">
               @if(Auth::user())
               @if(Auth::user()->role="member")
               <h3 style="color: #000000">Anda Punya Homestay /Kendaraan Yang Ingin di Promosikan?<br></h3>
               <h5>Daftar Jadi Owner Homestay </h5>
               <a href="{{route('member.daftar')}}"><button class="btn btn-primary" style="width: 150px;" >Daftar</button></a>
               @endif
               @endif
            </div>
            <br><br>
      </div>

   </div>
</div>
<?php 
$pp=DB::SELECT("SELECT * FROM homestay order by pembooking ASC");
?>
@include('layouts.alerts')

<div class="container">

   <hr>
   <h5 style="text-align:center;">Homestay Favorit</h5>
   <hr>
   <!-- Example row of columns -->
   <div class="row">
    <div class="col-md-4">
     <?php $kalimat=$pp[0]->keterangan;
     $jumlahkarakter=100;
     $cetak = substr($kalimat, 0, $jumlahkarakter);

     ?>
     <?php 
     $hasil_rupiah1 = "Rp " . number_format($pp[0]->harga,2,',','.');
     ?>
     <div class=" ">
        <div class="" style="width: 18rem;">
          <div class="card-header">
           <img class="card-img-top" src="uploadgambar/{{$pp[0]->gambar}}" alt="Card image cap" style="width: 250px; height: 200px;">
           <hr>
           <h5><i>{{$pp[0]->nama}}</i></h5>
           <p align="justify"><?php echo $cetak?>    &nbsp;&nbsp;&nbsp;...</p>
        </div>
        <p  class="card-header"style=" color: #FFA500;font-size: 15px"><?php echo $hasil_rupiah1 ?></p>
        <div align="right" class="col-md-12 card-header"><a href="{{route('homestay.detail',$pp[0]->id)}}"><button class="btn" style="color: #ffffff; background-color: #FFA500">Detail</button></a></div>
     </div>
  </div>
</div><br>
<div class="col-md-4">
  <?php $kalimat1=$pp[1]->keterangan;
  $jumlahkarakter1=100;
  $cetak1 = substr($kalimat1, 0, $jumlahkarakter1);

  ?>
  <?php 
  $hasil_rupiah2 = "Rp " . number_format($pp[1]->harga,2,',','.');
  ?>
  <div class="">
     <div class="" style="width: 18rem;">
       <div class="card-header">
        <img class="card-img-top" src="uploadgambar/{{$pp[1]->gambar}}" alt="Card image cap" style="width: 250px; height: 200px;">
        <hr>
        <h5><i>{{$pp[1]->nama}}</i></h5>
        <p class="" align="justify"><?php echo $cetak1?>  &nbsp;&nbsp; ...</p>
     </div>
     <p  class="card-header"style="font-size: 15px; color: #FFA500"><?php echo $hasil_rupiah2 ?></p>
     <div align="right" class="col-md-12 card-header"><a href="{{route('homestay.detail',$pp[1]->id)}}"><button class="btn " style="color: #ffffff; background-color: #FFA500">Detail</button></a></div>
  </div>
</div>
</div><br>
<div class="col-md-4">
   <?php $kalimat2=$pp[2]->keterangan;
   $jumlahkarakter2=100;
   $cetak2 = substr($kalimat2, 0, $jumlahkarakter2);

   ?>
   <?php 
   $hasil_rupiah3 = "Rp " . number_format($pp[2]->harga,2,',','.');
   ?>
   <div class=" ">
     <div class="" style="width: 18rem;">
       <div class="card-header">
        <img class="card-img-top" src="uploadgambar/{{$pp[2]->gambar}}" alt="Card image cap" style="width: 250px; height: 200px;">
        <hr>
        <h5><i>{{$pp[2]->nama}}</i></h5>
        <p align="justify" style=""><?php echo $cetak2?>  &nbsp;&nbsp;&nbsp;...</p>
     </div>
     <p  class="card-header"style="font-size: 15px;  color: #FFA500""><?php echo $hasil_rupiah3 ?></p>
     <div align="right" class="col-md-12 card-header"><a href="{{route('homestay.detail',$pp[2]->id)}}"><button class="btn " style="color: #ffffff; background-color: #FFA500">Detail</button></a></div>
  </div>
</div>
</div>

<hr>

</div>
</div><br><br><br><br><br>
<br><hr><center><h1><i>Daftar Objek Wisata</i></h1></center><hr><br><br>
<div class="container">
	<div class="form-group">
		<center>
			<div class="row" align="right">
				<div class="col-sm-4 container-fluid">
					<form method="post" action="{{route('homestay.search')}}">
						{{ csrf_field() }}
						<a  value='balige' type="submit"><img class="card" src="/balige.jpg" style="width: 350px; height: 300px;"></a>
						<center><input type="submit" class="form-control" value="Balige" name="lokasi"></center>
					</form>
				</div>

           <div class="col-sm-4 container-fluid">
             <form method="post" action="{{route('homestay.search')}}">
               {{ csrf_field() }}
               <a  value='ajibata' type="submit"><img class="card" src="/ajibata.jpg" style="width: 350px; height: 300px;"></a>
               <center><input type="submit" class="form-control" value="Ajibata" name="lokasi"></center>
            </form>
         </div>

         <div class="col-sm-4 container-fluid">
           <form method="post" action="{{route('homestay.search')}}">
            {{ csrf_field() }}
            <a  value='borbor' type="submit"><img class="card" src="/borbor.png" style="width: 350px; height: 300px;"></a>
            <center><input type="submit" class="form-control" value="Borbor" name="lokasi"></center>
         </form>
      </div>

   </div>
   <br><br>
   <div class="row" align="right">
     <div class="col-sm-4 container-fluid">
       <form method="post" action="{{route('homestay.search')}}">
         {{ csrf_field() }}
         <a  value='habinsaran' type="submit"><img class="card" src="/habinsaran.jpg" style="width: 350px; height: 300px;"></a>
         <center><input type="submit" class="form-control" value="Habinsaran" name="lokasi"></center>
      </form>
   </div>

   <div class="col-sm-4 container-fluid">
     <form method="post" action="{{route('homestay.search')}}">
      {{ csrf_field() }}
      <a  value='lumbanjulu' type="submit"><img class="card" src="/lumbanjulu.jpg" style="width: 350px; height: 300px;"></a>
      <center><input type="submit" class="form-control" value="Lumbanjulu" name="lokasi"></center>
   </form>
</div>

<div class="col-sm-4 container-fluid">
 <form method="post" action="{{route('homestay.search')}}">
   {{ csrf_field() }}
   <a  value='nassau' type="submit"><img class="card" src="/nassau.jpg" style="width: 350px; height: 300px;"></a>
   <center><input type="submit" class="form-control" value="Nassau" name="lokasi"></center>
</form>
</div>

</div>
<br><br>
<div class="row" align="right">
  <div class="col-sm-4 container-fluid">
    <form method="post" action="{{route('homestay.search')}}">
      {{ csrf_field() }}
      <a  value='meranti' type="submit"><img class="card" src="/meranti.png" style="width: 350px; height: 300px;"></a>
      <center><input type="submit" class="form-control" value="Meranti" name="lokasi"></center>
   </form>
</div>

<div class="col-sm-4 container-fluid">
  <form method="post" action="{{route('homestay.search')}}">
   {{ csrf_field() }}
   <a  value='Siantar Narumonda' type="submit"><img class="card" src="/narumonda.jpg" style="width: 350px; height: 300px;"></a>
   <center><input type="submit" class="form-control" value="Siantar Narumonda" name="lokasi"></center>
</form>
</div>

<div class="col-sm-4 container-fluid">
   <form method="post" action="{{route('homestay.search')}}">
      {{ csrf_field() }}
      <a  value='sigumparr' type="submit"><img class="card" src="/sigumpar.jpeg" style="width: 350px; height: 300px;"></a>
      <center><input type="submit" class="form-control" value="Sigumpar" name="lokasi"></center>
   </form>
</div>

</div>
<br><br>
<div class="row" align="right">
  <div class="col-sm-4 container-fluid">
     <form method="post" action="{{route('homestay.search')}}">
      {{ csrf_field() }}
      <a  value='Silaen' type="submit"><img class="card" src="/silaen.jpg" style="width: 350px; height: 300px;"></a>
      <center><input type="submit" class="form-control" value="Silaen" name="lokasi"></center>
   </form>
</div>

<div class="col-sm-4 container-fluid">
  <form method="post" action="{{route('homestay.search')}}">
   {{ csrf_field() }}
   <a  value='Porsea' type="submit"><img class="card" src="/porsea.jpeg" style="width: 350px; height: 300px;"></a>
   <center><input type="submit" class="form-control" value="Porsea" name="lokasi"></center>
</form>
</div>

<div class="col-sm-4 container-fluid">
  <form method="post" action="{{route('homestay.search')}}">
   {{ csrf_field() }}
   <a  value='laguboti' type="submit"><img class="card" src="/laguboti.jpeg" style="width: 350px; height: 300px;"></a>
   <center><input type="submit" class="form-control" value="Laguboti" name="lokasi"></center>
</form>
</div>

</div>
<br><br>
<div class="row" align="right">

  <div class="col-sm-4 container-fluid">
    <form method="post" action="{{route('homestay.search')}}">
      {{ csrf_field() }}
      <a  value='Tampahan' type="submit"><img class="card" src="/tampahan.jpg" style="width: 350px; height: 300px;"></a>
      <center><input type="submit" class="form-control" value="Tampahan" name="lokasi"></center>
   </form>
</div>


<div class="col-sm-4 container-fluid">
 <form method="post" action="{{route('homestay.search')}}">
   {{ csrf_field() }}
   <a  value='Uluan' type="submit"><img class="card" src="/uluan.jpeg" style="width: 350px; height: 300px;"></a>
   <center><a href="" class=""><button class="form-control">Uluan</button></a></center>
</form>
</div>
<div class="col-sm-4 container-fluid">

</div>

</div>
</center>
</div>
</div>
<br>
</body>
<!-- <font color="#ffffff">
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
           <a>Owner&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Sogumontar Simangunsong</a><br>
           <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kristopel Lumbantoruan</a><br>
           <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gita Nadapdap</a>
        </div>
        <div class="col-md-4">
         <h3 align="center">KingStay</h3>
         <p align="center">Website ini di bangun dengan sepenuh hati oleh tim project KREN/PAP, dengan harapan bisa membantu masyarakat dalam mencari tempat penginapan di daerah Toba Samosir.</p>
      </div>
      <div class="col-md-4" align="left"><br>
         <center><a align="center"><b>Contact us</b></a><br></center>
         <img src="/wa.png" style="width: 40px;">
         <a align="left">081282480790(Sogumontar Simangunsong)</a>
         <a align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;081282480799(Gita Nadapdap)</a><br>
         <a align="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;081282480799(Kristopel Lumabntoruan)</a><br>
      </div> 

   </div>
   <br><br><br>
</div>
</center>
</font>
-->
@extends('layouts.footer')
</main>
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.slim.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- <script type="tex" href="{{ asset('vendor/bootstrap/carousel.css') }}"> -->

   </html>
