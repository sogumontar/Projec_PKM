<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">

@extends('layouts.template')
@include('layouts.alerts')
<?php
$lok= $db[0]->daerah;
  $qq=DB::SELECT("SELECT * FROM homestay where kecamatan like'$lok'")
  
 ?>
@foreach($db as $s)
<?php if(Auth::user()){ $test=Auth::user()->id;

}
//  $home=DB::SELECT("SELECT * FROM homestay where id=$id"); 
//   $FF=DB::SELECT("SELECT * FROM objek_wisata where daerah ='$s->kecamatan'"); 
//    $test=DB::SELECT("SELECT * FROM promo where id_homestay=$id"); 
// $t=DB::select("select * from pemilik_homestay_kendaraan where id_akun=$s->id_pemilik ");
//  $pp=DB::SELECT("SELECT * FROM fasilitas where id_homestay=$id");
?><br><br>
<br>  <br>  
</div>
<div class="container">
  <div class="row mt-3">
    <div class="col-md-3" > 
      <h2 >Homestay Terdekat</h2><br><hr><br>
      <ol>

        @foreach($qq as $f)
        <font size="2" color="#000000" ><li><b><a style="color: #000000" href="{{route('objekWisata.view')}}">{{$f->nama}}</a></b></li></font>

        @endforeach

      </ol><br>  <br>  <br>  <br>  <br>  <br>  
      <br>  <br>  <br>  <br>  <br>  <br>  



    </div>
    <div class="col-md-6 card" style="background-color: #FaFaFa">
      
      <h2 class="text-center">Detail Objek Wisata</h2>
      <br>  <br>  

      <center><a href="/objekWisata/{{$s->gambar}}"><img style="width: 490px; height: 390px;" src="/objekWisata/{{$s->gambar}}" class="img-thumbnail shadow" style="border-radius: 38px"></a>
       <div class="row">
        <div  class="col-md-1">
          <img src="/diskon.png" style="width: 35px;">
        </div>
        <div class="col-md-12" align="center">  
        </div>
        <div  class="col-md-1">

        </div>
      </div>
      <hr>  

      <h2 align="center">{{$s->created_at}}</h2>



        
        
        <?php?>
        <br><hr>  
       <p class="wrapper" readonly="" rows="4"></p>
       <br>  <hr>  
       <div class="row">
        <div class="col-md-12" align="right">
          <p> {{$s->id}}</p>
          <a href="{{route('homestay.booking',$s->id)}}" float="left"><button class="btn btn-primary">Booking</button></a>
        </div>
      </div>
    </div>
    <div class="col-md-3"> 
        
        <div class="container">
        <h2>Fasilitas yang tersedia</h2> <br> <hr>  
      
        </div>
    </div>
    
    </center>

<br>  
</div>
</div>

  <div class="container row">
    <div class="col-md-2">
    <br>   
    </div>
      <div class="col-md-8">
       
        <div class="col-md-1"> 
            <br>  
        </div>
        <br>  <br>  <br>  <br>  
       


      </div>
    </div>
</div>


@endforeach