
<div class="container">
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
<div class="container-fluid">
  <div class="row mt-3">
    <div class="col-md-3" > 
      <h2 >Homestay Terdekat</h2><br><hr><br>
      <ol>

        @foreach($qq as $f)
        <font size="2" color="#000000" ><li><a style="color: #000000" href="{{route('objekWisata.view')}}"><img class="round" src="/uploadgambar/{{$f->gambar}}" style="width: 60px; height: 45px">&nbsp;&nbsp;&nbsp;{{$f->nama}}</a></li></font>
        <br>
        @endforeach

      </ol><br>  <br>  <br>  <br>  <br>  <br>  
      <br>  <br>  <br>  <br>  <br>  <br>  



    </div>
    <div class="col-md-9 " style="">

      <h2 class="text-center">{{$s->nama}}</h2>
      <br>  <br>  

      <center><a href="/objekWisata/{{$s->gambar}}"><img style="width: 490px; height: 390px;" src="/objekWisata/{{$s->gambar}}" class="img-thumbnail shadow" style="border-radius: 38px"></a>
       <div class="row">

        <div class="col-md-12" align="center">  
        </div>
        <div  class="col-md-1">

        </div>
      </div>
      <hr>  

      <p align="center">{{$s->keterangan}}</p>





      <?php?>

      <br><hr>  
      <p class="wrapper" readonly="" rows="4"></p>
      <br>  

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
<?php 
$qw=$db[0]->nama;
$test=DB::SELECT("SELECT * FROM pengalaman where objek_wisata='$qw'");

?>
<h4 class="container">List Pengalaman Di Objek Wisata Ini</h4>
@foreach($test as $rr)
<div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-6" >
    <div class="card" style="width:760px;height:220px;">
      <span class="border border-secondary" style="height:220px">
        <div class="card-body">
          <?php ?>
          <div class="col-md-2">
            <img src="/pengalaman/{{$rr->gambar}}" alt="" style="width:170px; height: 170px; float:left;">
          </div>
          <div style="float: left;" class="col-md-7">

            <h3 class=""><p  href="">{{$rr->judul}}</p></h3>

            <div class="row">
              <div class="col-lg-9">



              </div>
              <div class="col-md-12">


                <div class="col-md-12" align="left">
                 <p  class="" rows="5" ><?php echo $rr->keterangan ?></p>

               </div>
               <br><br>
               <a href="{{route('pengalaman.detail',$rr->id)}}" ><button class="btn" style="background-color:#FFA500; color: #ffffff;margin-left: 350px">Detail</button></a>

                              <!-- <div class="col-md-1" align="right" align="right">
                                <a href="{{route('homestay.detail',$rr->id)}}" "><button class="btn btn-primary">Detail</button></a>
                              </div> -->
                            </div>
                          </div>

                        </div>
                      </div>
                    </span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card" style="height:220px">
                    <span class="border border-secondary" style="height:220px;">
                      <div class="card-body">
                        <h4 class="card-title">Keterangan : </h4>

                        <?php $ttt=DB::SELECT("SELECT * FROM fasilitas where id_homestay=$rr->id"); ?>
                        @foreach($ttt as $t)   
                        <h3 class="card-text"><li>{{$t->nama}}</li></h3>
                        @endforeach
                        <br>
                        <h2 style="color:#e67e22;"><img style="width:25px;" src="/kalender.png">&nbsp;&nbsp;&nbsp;{{$rr->created_at}}(tgl post)</h2><br>  
                      </div>
                      <br><br><br><br><br><br><br><br>
                    </span>
                  </div>

                  <br>
                </div>
                <br><br>
                <div class="col-md-2">  
<br><br>
                  @endforeach        
                  <br><br><br>
                </div>
              </div>

                <br><br><br>