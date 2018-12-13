<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
<!-- 
@include('layouts.alerts')
@foreach($db as $s)
<?php if(Auth::user()){ $test=Auth::user()->id;
 $ss= DB::select("select * from rating where id_member=$test AND id_homestay=$s->id");
 
 
}
$t=DB::select("select * from pemilik_homestay_kendaraan where id_akun=$s->id_pemilik ");

?>

</div>
<div class="container">
  <div class="row mt-3">
    <div class="col-md-">
      <h4 class="text-center">Detail Homestay</h4>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <center><a href="/uploadgambar/{{$s->gambar}}"><img style="width: 490px; height: 390px;" src="/uploadgambar/{{$s->gambar}}" class="img-thumbnail shadow" style="border-radius: 38px"></a>
      <h1 align="center"><?php echo $t[0]->nama;?></h1>
    
      <h2 align="center">{{$s->created_at}}</h2>
    </div>
  </div><center>
    
<div class="col-md-1">
      
    </div>
    <div class="col-md2">
      
    </div>

    <form method="post" action="{{route('homestay.rating',$s->id)}}">
{{ csrf_field() }}
@if(Auth::user())
    @if($ss)
    <div class=" col-md-10" align="left">
     <input value="<?php echo  $s->rating / $s->jumlah_booking?>" name="jumlah" type="number" class="rating" min=0 max=5 step=1 data-size="md" data-stars="5" productId="5" disabled="">

     <p>Anda Sudah Rating Homestay Ini</p>
     @else

     <input value="3" name="jumlah" type="number" class="rating" min=0 max=5 step=1 data-size="md" data-stars="5" productId="5">
     <input type="submit" class="btn btn-primary" value="save" name="">
   </div>
   </form>
     @endif
@else
 <input value="<?php echo  $s->rating / $s->jumlah_booking?>" name="jumlah" type="number" class="rating" min=0 max=5 step=1 data-size="md" data-stars="5" productId="5" disabled="">
</div>
  </center>
@endif
  <div class="row mt-5 mb-4">
    
    
    <div class="col-md-5" align="left">
      <textarea class="form-control" readonly=""><?php echo $s->keterangan ?></textarea>
    </div>
  </div>
    <div class="row">
      <div class="col-md-5" align="left">
        <a href="{{route('homestay.booking',$s->id)}}"><button class="btn btn-primary">Pesan</button></a>
      </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="{{asset('vendor/jss/css/test.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/jss/css/star-rating.min.css')}}">
<script type="text/javascript" src="{{asset('vendor/jss/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/jss/js/star-rating.min.js')}}"></script>
@endforeach -->


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
    <div class="col-md-6">
      <h2 class="text-center">Detail Homestay</h2>
    <br>  <br>  
  
      <center><a href="/uploadgambar/{{$s->gambar}}"><img style="width: 490px; height: 390px;" src="/uploadgambar/{{$s->gambar}}" class="img-thumbnail shadow" style="border-radius: 38px"></a>
      <h1 align="center"><?php echo $t[0]->nama;?></h1>
    
      <h2 align="center">{{$s->created_at}}</h2>
  
 

    <form method="post" action="{{route('homestay.rating',$s->id)}}">
{{ csrf_field() }}
@if(Auth::user())
    @if($ss)
     <input value="<?php echo  $s->rating / $s->jumlah_booking?>" name="jumlah" type="number" class="rating" min=0 max=5 step=1 data-size="md" data-stars="5" productId="5" disabled="">

     <p>Anda Sudah Rating Homestay Ini</p>
     @else

     <input value="3" name="jumlah" type="number" class="rating" min=0 max=5 step=1 data-size="md" data-stars="5" productId="5">
     <input type="submit" class="btn btn-primary" value="save" name="">
   
   </form>
     @endif
@else
 <input value="<?php echo  $s->rating / $s->jumlah_booking?>" name="jumlah" type="number" class="rating" min=0 max=5 step=1 data-size="md" data-stars="5" productId="5" disabled="">

@endif
  
    
    
      <textarea class="form-control" readonly="" rows="4"><?php echo $s->keterangan ?></textarea>
    <br>  
    <div class="row">
      <div class="col-md-12" align="right">
        <a href="{{route('homestay.booking',$s->id)}}"><button class="btn btn-primary">Pesan</button></a>
      </div>
    </div>
</div>
</center>

<div class="col-md-6" > 
  <?php $FF=DB::SELECT("SELECT * FROM objek_wisata where daerah ='$s->kecamatan'"); ?>
    <h2 align="center"> Daftar Objek Wisata yang Anda di sekitar homestay</h2>
    @foreach($FF as $f)
      <font size="5" color="black" ><li><a href="{{route('objekWisata.view')}}">{{$f->nama}}</a>  </li></font>
    @endforeach
</div>
</div>
</div>
</div>

<link rel="stylesheet" type="text/css" href="{{asset('vendor/jss/css/test.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/jss/css/star-rating.min.css')}}">
<script type="text/javascript" src="{{asset('vendor/jss/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/jss/js/star-rating.min.js')}}"></script>
@endforeach