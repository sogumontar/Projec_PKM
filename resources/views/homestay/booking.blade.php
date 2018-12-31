<br><br><link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">

@include('layouts.alerts')

<!-- <div  style="background: url('/interior-design-ideas-bedroom-wallpaper-bedroom-wallpaper-ideas-with-added-design-bedroom-and-captivating-to-various-settings-layout-of-the-room-bedroom-captivating-2-interior-design-bedroom-wallpaper.jpg')">
    <br>
<div class="container">
    
<font color="#000000" >
        <div class="row">
                <div class="col-md-2 col-offset-2">
                </div>
            <div class="col-md-8 col-offset-2">
               
                <form action="{{ route('homestay.booking.process',$homestay[0]->id) }}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="">
                        <div class="" align="center">
                            <img class="card" style="width: 450px; height: 250px;" src="/uploadgambar/{{$homestay[0]->gambar}}">
                        </div>
                        
                        
                        <div class="">
                            <label><b>Date</b></label>
                            <input type="date" class="form-control" name="date" value="" placeholder="date" accept="center">
                        </div>
                        <div class="form-group">
                            <label><b>Jumlah Kamar</b></label>
                            <input type="number" class="form-control" name="jumlah" value="" placeholder="Jumlah Kamar">
                        </div>
                        <div class="form-group">
                            <label><b>Jumlah Pengunjung</b></label>
                            <input type="number" class="form-control" name="jumlah_pengunjung" value="" placeholder="jumlah Pengunjung">
                        </div>
                        <div class="form-group">
                            <label><b>Lama Menginap</b></label>
                            <input type="number" class="form-control" name="lama" value="" placeholder="Lama Menginap /hari">
                        </div>
                    </div>
                   <div class="row">
                    <!-- <div class="col-md-6">
                        <input type="submit" class="btn btn-primary" value="Pesan Kendaraan"> 
                    </div> -->
<!--                 </form>
                    <div class="col-md-12" align="right">
                        <a href=""><button class="btn btn-primary">Pesan</button></a>
                    
                    </div>
                   </div>
                
            </div>
             <div class="col-md-2 col-offset-2">
                </div>
        </div>
    </font>
    </div>
</div>

 -->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php 
$test=$homestay[0]->id_pemilik;
$db=DB::SELECT("SELECT * FROM pemilik_homestay_kendaraan where id_akun = $test"); 
?>
@extends('layouts.template')
<div class="container" style="margin-top:30px;">

    <div class="col-sm-12">
      <!-- <br> -->
    <div class="row">
    <div class="col-md-6">
      <br>
      <h1>Pemesanan Homestay</h1>
      <br>
      <div class="container card" style="background-color:#f1f2f6;">
        <br>
         <div class="con">
              <form action="{{ route('homestay.booking.process',$homestay[0]->id) }}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                            <label><b>Date</b></label>
                            <input type="date" class="form-control" name="date" value="" placeholder="date" accept="center" required="">
                        </div>
                        <div class="form-group">
                            <label><b>Jumlah Kamar</b></label>
                            <input type="number" class="form-control" min="0" name="jumlah" value="" placeholder="Jumlah Kamar" required="">
                        </div>
                        <div class="form-group">
                            <label><b>Jumlah Pengunjung</b></label>
                            <input type="number" class="form-control" min="0" name="jumlah_pengunjung" value="" placeholder="jumlah Pengunjung" required="">
                        </div>
                        <div class="form-group">
                            <label><b>Lama Menginap</b></label>
                            <input required="" type="number" min="0" class="form-control" id="lama" name="lama" value="" placeholder="Lama Menginap /hari">
                        </div>
          <br>
          <hr>
          <h5 style="margin-left:20px">Rincian Harga</h5>
          <div class="row">
          <div class="col" style="margin-left:20px;">
          <h5>1 Malam</h5>
        
        </div>
        <div class="col">
          <!-- <h5 id="" style="color:#e67e22">Rp.{{$homestay[0]->harga}}</h5> -->
          <?php $test=DB::SELECT("SELECT * FROM promo where id_homestay=$id"); ?>
          @if($test)
              <input type="number" id="harga" class="form-control" min="0" style="color:#e67e22" value="{{$test[0]->harga}}" name="harga" readonly="">
          @else
            <input type="number" id="harga" class="form-control" min="0" style="color:#e67e22" value="{{$homestay[0]->harga}}" name="harga" readonly="">
          @endif
        </div>
          </div>
          <hr>
          <div class="row">
          <div class="col" style="margin-left:20px;">
          <h5>Total</h5>
        </div>
        <div class="col">
          <input type="number"  style="color:#e67e22"  name="total" id="total" style="color:#e67e22"  class="form-control" readonly="">
        </div><div align="right" class="col-md-12"><br>
         <input type="submit" class="btn btn-primary" name=""></div>
          </div><br>
        </div>
    </form>
    </div>
    <div class="col-md-6">
      <br>
      <h1>Rincian Pemesanan</h1>
      <br>
      <center><img src="/uploadgambar/{{$homestay[0]->gambar}}" alt="" class="card" style="width:350px; height: 280px"></center>
      <br>
      <h5 style="margin-left:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Pemilik:{{$db[0]->nama}}</h5>
      <h5 style="margin-left:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat Pemilik:{{$db[0]->alamat}}</h5>
      
      <br>
     
      <!-- <canvas id="canvas" width="300" height="300"></canvas> -->
    </div>
    </div>
    <br>
    <br>
  </div>
</div>
        <script type="text/javascript">
 $("#lama").keyup(function(){
 total = $("#lama").val()* $("#harga").val();
 $("#jumlah").val(total);
 });


$("#lama").keyup(function(){
 total = $("#lama").val()* $("#harga").val();
 $("#total").val(total);
 });

</script>

