<br><br>@extends('layouts.template')

  @include('layouts.alerts')
<br>  <br>  
<?php

	$p=DB::select('select * from pengalaman');
?><br>
@if(Auth::user())
<a href="{{route('pengalaman.create')}}" class="container"><button class="btn btn-primary" style="background-color: ">Tambah Pengalaman</button></a><br><br>
<h3 align="center">List Pengalaman</h3>
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
@endif
@if($p)
 <div class="row">
    <div class="col-sm-12">
@foreach($pengalaman as $s)
<hr>
<link rel="stylesheet" type="text/css" href="{{ asset('css/gita1.css')}}">

<div class="container">
  <div class="row " >
    

    <div class="row col-md-11 m-5 p-2" id="gita" style="background-color: #ffffff">
      <div class="col-md-4 card">
        <h5><i>{{$s->judul}}</i></h5>
        <img src="/pengalaman/{{$s->gambar}}" style="width: 250px; height: 230px;" class="card"><br>
      </div>
      <div class="card col-md-8 " >
        <br><br>
      <p><?php echo $s->keterangan?></p><br>
      <p>Lokasi Objek Wisata:<b>{{$s->objek_wisata}}</b></p><br>
        <u><a href="{{route('pengalaman.detail',$s->id)}}" class="btn btn-warning" style="float: right; ">Detail</a></u>
        
      </div>
    </div>
    
  </di//v>
</div>
@endforeach
 <br>
           <div class="col-md-12" align="center">
             {!! $pengalaman->render() !!}
           </div>
</div>
</div>
	@endif

	@if(!$p)
	<div class="container">
            <br>
            <br><br><br><br><br><br><br><center><h1>Tidak Ada Pengalaman yang terdaftar Saat ini</h1></center><br><br><br><br><br><br><br><br><br><br><br>            
           </div>
    @endif
	
</div>
<br><br><br>




@include('layouts.footer')