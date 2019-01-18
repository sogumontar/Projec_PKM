    <br><br><link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">

    @extends('layouts.homestay')
    @include('layouts.alerts')
    @foreach($db as $s)
    <?php if(Auth::user()){ $test=Auth::user()->id;
     $ss= DB::select("select * from rating where id_member=$test AND id_homestay=$s->id");

   }
   $home=DB::SELECT("SELECT * FROM homestay where id=$id"); 
   $FF=DB::SELECT("SELECT * FROM objek_wisata where daerah ='$s->kecamatan'"); 
   $test=DB::SELECT("SELECT * FROM promo where id_homestay=$id"); 
   $t=DB::select("select * from pemilik_homestay_kendaraan where id_akun=$s->id_pemilik ");
   $pp=DB::SELECT("SELECT * FROM fasilitas where id_homestay=$id");
   ?><br><br>
   <br>  <br>  
 </div>
 <div class="container">
  <div class="row mt-3">
    <div class="col-md-3" > 
      <h2 >Tempat Wisata Terdekat</h2><br><hr><br>
      <ol>
<?php $a=0;?>
        @foreach($FF as $f)
        <?php $a++;?>
        <font size="2" color="#000000" ><li>&nbsp;&nbsp;&nbsp;<a style="color: #000000" href="{{route('objekWisata.detail',$f->id)}}"><img src="/objekwisata/{{$f->gambar}}" style="width: 60px; height: 45px">{{$f->nama}}</a></li></font>
<br> 
        @endforeach
        @if($a==0)
        <h4>Tidak ada tempat wisata yang dekat dengan homestay ini</h4>
        @endif
      </ol><br>  <br>  <br>  <br>  <br>  <br>  
      <br>  <br>  <br>  <br>  <br>  <br>  



    </div>
    <div class="col-md-6 card" style="background-color: #FaFaFa">

      <h2 class="text-center">Detail Homestay</h2>
      <br>  <br>  

      <center><a href="/uploadgambar/{{$s->gambar}}"><img style="width: 490px; height: 390px;" src="/uploadgambar/{{$s->gambar}}" class="img-thumbnail shadow" style="border-radius: 38px"></a>
       <div class="row">
        <?php
          $tei=DB::SELECT("SELECT * FROM promo where id_homestay=$s->id And status !='finish'");
        ?>
        @if($tei)
        <div  class="col-md-1">
          <img src="/diskon.png" style="width: 35px;">
        </div>
        @endif  
        <div class="col-md-12" align="center">  
          <center> <h1 align="center"><?php echo $home[0]->nama;?></h1></center>
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

        <input value="<?php echo $s->rating ?>" name="jumlah" type="number" class="rating" required="" min=0 max=5 step=1 data-size="md" data-stars="5" productId="5"><br>
        <input type="text" rows="3" class="form-control" name="review" ><br>  
        <input type="submit" class="btn btn-primary" value="Simpan" name="">


        @endif
        @else
        <input value="<?php echo  $s->rating / $s->jumlah_booking?>" data-target="#exampleModal" name="jumlah" type="number" class="rating" min=0 max=5 step=1 data-size="md" data-stars="5" productId="5"  data-toggle="modal"><br>
        <input type="submit" class="btn btn-primary" value="Simpan" name="" data-toggle="modal" data-target="#exampleModal"><br>
      
       @endif
       </form>
      <?php?>
      @if($test)
      <div class="row">
        <div class="col-md-6">
          <?php $harga= $s->harga;?>
          <h2><strike>Rp.<?php echo number_format($harga,2,',','.') ?></strike></h2>
        </div>
        <div class="col-md-6">
         <h2 style="color: ##FFA500">Rp.{{$test[0]->harga}},00</h2>
       </div>
     </div>

     @else
     <?php $harga= $s->harga;?>
     <h2 style="color: #FFA500">Rp.<?php echo number_format($harga,2,',','.') ?></h2>


     @endif
     <br><hr>  
     <p class="wrapper" readonly="" rows="4"><?php echo $s->keterangan ?></p>
     <br>  <hr>  
     <div class="row">
      <div class="col-md-12" align="right">
        
        <!-- <a href="{{route('homestay.booking',$s->id)}}" float="left"><button class="btn btn-primary">Booking</button></a> -->
        <a href="{{route('homestay.booking',$s->id)}}"><button class="btn btn-primary" >Booking</button></a>
      </div>
    </div>
    <br>
  </div>
  <div class="col-md-3"> 

    <div class="container">
      <h2>Fasilitas yang tersedia</h2> <br> <hr>  
      @foreach($pp as $p)
      <ul>  
        <font size="3">  <li><p>{{$p->nama}}</p></li></font>
      </ul>
      @endforeach
    </div>
  </div>

</center>

<br>  
</div>
</div>

<div class="container row">
  <div class="col-md-4">
    <br>   
  </div>
  <div class="col-md-6">
    <?php $FF=DB::SELECT("SELECT *  FROM rating where id_homestay =$id"); $oo=0; 

    ?>
    @foreach($FF as $del)
    <?php $oo++;

    ?>
    @endforeach
    <br><br><hr>
    <h2 align="center">Ulasan tentang homestay ini</h2><br>  <br> 

    @foreach($FF as $f)
    <?php
    $ind=0;
    $oop=$del->id_member;
    $dol=DB::SELECT("SELECT * from users where id=$oop");
    ?>
    
    <div class="container card"> 
      <h2>{{$dol[$ind]->name}}</h2>
      <p>{{$dol[$ind]->created_at}}</p>
      <hr>  
      <ol>
        <div>
          <p class="" rows="5"> <?php echo $f->review ?></p>
        </div>


        <font size="0" style="size: 1px;"> <input value="<?php echo  $s->rating / $s->jumlah_booking?>" style="width: 20px;"   name="jumlah" type="number" class="rating" min=0 max=5 step=1 data-size="sm" data-stars="5" productId="5" disabled=""></font>
        <hr>
      </ol>
    </div>
  </div>
  <?php $ind++; ?>
  @endforeach
  <br><br>
  <div class="col-md-2"> 
    <br>  
  </div>

  <br>  <br>  <br>  <br> <br><br> 



</div>
</div>
</div>
<br><br><br>
<br><br>
<link rel="stylesheet" type="text/css" href="{{asset('vendor/jss/css/test.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/jss/css/star-rating.min.css')}}">
<script type="text/javascript" src="{{asset('vendor/jss/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/jss/js/star-rating.min.js')}}"></script>
@endforeach