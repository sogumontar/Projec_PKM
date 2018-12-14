<br><br><?php 


  
?>
@extends('layouts.template')
@include('layouts.alerts')
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
</div>
<div class="container">
      @foreach($detail as $s)
      <?php
            $DB=DB::SELECT("SELECT * FROM member where id_akun=$s->id_member");
       ?>
  <div class="row mt-3">
    <div class="col-md-12">
      <h4 class="text-center">{{$s->judul}}</h4>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <center><img style="width: 350px; height: 290px;" src="/pengalaman/{{$s->gambar}}" class="img-thumbnail shadow" style="border-radius: 38px"></center>
    </div>
  </div><br>  
  <center>  
<div class="col-md-3">
      <h5>{{$DB[0]->nama}}</h5>
      <h6>{{$s->date}}</h6>
    </div>
  </center>
  <div class="row mt-5 mb-4">
    <div class="col-md-2"></div>
    
    <div class="col-md-8">
      <textarea class="form-control" rows="5" disabled="">{{$s->keterangan}}</textarea>
    </div>
  </div>
 @endforeach
</div>