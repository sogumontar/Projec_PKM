<br><br><link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">

@extends('layouts.template')
@include('layouts.alerts')
@foreach($db as $s)
<?php if(Auth::user()){ $test=Auth::user()->id;
 $ss= DB::select("select * from rating where id_member=$test AND id_homestay=$s->id");
 
 
}
$t=DB::select("select * from pemilik_homestay_kendaraan where id_akun=$s->id_pemilik ");

?>
<br>  <br>  
</div>
<div class="container">
  <div class="row mt-3">
    <div class="col-md-6 card" style="background-color: #FaFaFa">
      <h2 class="text-center">Detail Homestay</h2>
    <br>  <br>  
  
      <center><a href="/uploadgambar/{{$s->gambar}}"><img style="width: 490px; height: 390px;" src="/uploadgambar/{{$s->gambar}}" class="img-thumbnail shadow" style="border-radius: 38px"></a>
       <div class="row">
        <div  class="col-md-1">
          <img src="/diskon.png" style="width: 35px;">
        </div>
        <div class="col-md-8" align="center">  
          <h1 align="center"><?php echo $t[0]->nama;?></h1>
        </div>
         <div  class="col-md-1">
         
        </div>
        </div>
      <hr>  
    
      <h2 align="center">{{$s->created_at}}</h2>
  
 

    <form method="post" action="{{route('homestay.rating',$s->id)}}">
{{ csrf_field() }}
@if(Auth::user())
    @if($ss)
     <input value="<?php echo  $s->rating / $s->jumlah_booking?>"   name="jumlah" type="number" class="rating" min=0 max=5 step=1 data-size="md" data-stars="5" productId="5" disabled="">

     <p>Anda Sudah Rating Homestay Ini</p>
     @else

     <input value="3" name="jumlah" type="number" class="rating" required="" min=0 max=5 step=1 data-size="md" data-stars="5" productId="5"><br>
     <textarea rows="3" class="form-control" name="review" required=""></textarea><br>  
     <input type="submit" class="btn btn-primary" value="save" name="">
   
  
     @endif
@else
 <input value="<?php echo  $s->rating / $s->jumlah_booking?>" data-target="#exampleModal" name="jumlah" type="number" class="rating" min=0 max=5 step=1 data-size="md" data-stars="5" productId="5"  data-toggle="modal"><br>
 <input type="submit" class="btn btn-primary" value="save" name="" data-toggle="modal" data-target="#exampleModal"><br>
 </form>
@endif
    
    <?php $test=DB::SELECT("SELECT * FROM promo where id_homestay=$id"); ?>
    @if($test)
    <div class="row">
      <div class="col-md-6">
        <?php $harga= $s->harga;?>
      <h2><strike>Rp.<?php echo number_format($harga,2,',','.') ?></strike></h2>
    </div>
    <div class="col-md-6">
       <h2 style="color: #EFB417">Rp.{{$test[0]->harga}},00</h2>
    </div>
  </div>
       
    @else
     <?php $harga= $s->harga;?>
    <h2>Rp.<?php echo number_format($harga,2,',','.') ?></h2>


    @endif
    <br><hr>  
      <p class="wrapper" readonly="" rows="4"><?php echo $s->keterangan ?></p>
    <br>  <hr>  
    <div class="row">
      <div class="col-md-12" align="right">
        <p> {{$s->id}}</p>
        <a href="{{route('homestay.booking',$s->id)}}" float="left"><button class="btn btn-primary">Booking</button></a>
      </div>
    </div>
</div>
</center>

<div class="col-md-6" > 
  <?php $FF=DB::SELECT("SELECT * FROM objek_wisata where daerah ='$s->kecamatan'"); ?>
    <h2 > Daftar Objek Wisata yang Anda di sekitar homestay</h2>
    <font size="5" color="black" ><li><a href="">del</a>  </li></font>
    @foreach($FF as $f)
      <font size="5" color="black" ><li><a href="{{route('objekWisata.view')}}">{{$f->nama}}</a>  </li></font>
    @endforeach
<br>  <br>  <br>  <br>  <br>  <br>  
<br>  <br>  <br>  <br>  <br>  <br>  
<div class="card">
  <div class="container">
    <?php $FF=DB::SELECT("SELECT *  FROM rating where id_homestay =$id"); $oo=0; ?>
    @foreach($FF as $del)
        <?php $oo++;?>
    @endforeach
     <h2 align="center"> Komentar tentang homestay ini</h2><br>  <br>  
    @if($oo>5)
    <?php $FG=DB::SELECT("SELECT 5 FROM rating where id_homestay =$id"); $oo=0; ?>
      @foreach($FG as $f)
    <div class="row"> 
      <div class="col-md-8">
        <font size="5" color="black" ><p >{{$f->review}}</p>   </font>
      </div>
      <div class="col-md-2"> 
          <input value="<?php echo  $s->rating / $s->jumlah_booking?>" style="width: 50px;"   name="jumlah" type="number" class="rating" min=0 max=5 step=1 data-size="sm" data-stars="5" productId="5" disabled="">
      </div>
    </div>
    @endforeach
    <br>  <br>  <br>  <br>  
    @else
      @foreach($FF as $f)

    <div class="row"> 
      <div class="col-md-8">
        <font size="5" color="black" ><p >{{$f->review}}</p>   </font>
      </div>
      <div class="col-md-2"> 
          <input value="<?php echo  $s->rating / $s->jumlah_booking?>" style="width: 50px;"   name="jumlah" type="number" class="rating" min=0 max=5 step=1 data-size="sm" data-stars="5" productId="5" disabled="">
      </div>
    </div>
    @endforeach
    <br>  <br>  <br>  <br>  
    @endif
   
  
  </div>
</div>


</div>
</div>
</div>
</div>

<link rel="stylesheet" type="text/css" href="{{asset('vendor/jss/css/test.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/jss/css/star-rating.min.css')}}">
<script type="text/javascript" src="{{asset('vendor/jss/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/jss/js/star-rating.min.js')}}"></script>
@endforeach