<br><br>@include('layouts.alerts')
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php 
$test=$kendaraan->id_pemilik;
$db=DB::SELECT("SELECT * FROM pemilik_homestay_kendaraan where id_akun = $test"); 
?>
@extends('layouts.template')
<div class="container" style="margin-top:30px;">

    <div class="col-sm-12">
      <!-- <br> -->
    <div class="row">
    <div class="col-md-6">
      <br>
      <h1>Pemesanan Kendaraan</h1>
      <br>
      <div class="container card" style="background-color:#f1f2f6;">
        <br>
         <div class="con">
              <form action="{{ route('kendaraan.booking.process',$kendaraan->id) }}"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                            <label><b>Tanggal Peminjaman</b></label>
                            <input type="date" class="form-control" name="date" value="" accept="center" required="">
                        </div>
                          <div class="form-group">
                            <label><b>Tanggal Pengembalian</b></label>
                            <input type="date" class="form-control"  name="date_akhir" value="" placeholder="" required="">
                        </div>
                        
                       
                        
          <br>
          <hr>
          <h5 style="margin-left:20px">Rincian Harga</h5>
          <div class="row">
          <div class="col" style="margin-left:20px;">
          <h5>1 Hari</h5>
        
        </div>
        <div class="col">
         
          <input type="number" id="harga" class="form-control" min="0" style="color:#e67e22" value="{{$kendaraan->harga}}" name="harga" readonly="">
        </div>
          </div>
          <hr>
          <div class="row">
          <div class="col" style="margin-left:20px;">
                  </div>
        <div class="col">
          <input type="number" hidden=""  style="color:#e67e22"  name="total" id="total" style="color:#e67e22"  class="form-control" readonly="">
        </div><div align="right" class="col-md-12"><br>
         <input type="submit" class="btn btn-primary" name=""></div>
          </div><br>
        </div>
    </form>
    </div>
    <div class="col-md-6">
      <br>
      <br>
      <center><img src="/kendaraan/{{$kendaraan->gambar}}" alt="" class="card" style="width:350px; height: 280px"></center>
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
@section('content')
@endsection
