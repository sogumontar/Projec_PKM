@extends('layouts.template')
@section('content')

</div>
<br>
<?php
	$p=DB::select('select id from objek_wisata ');
?>
@if($p)
@foreach($test as $s)
<div class="row" style="background :#ffffff">

	<div class="row col-md-7 m-5 p-2 card" id="gita" style="background-color:#dbdbdb;" >
		<div class="col-md-4">
			<h5>{{$s->nama}}</h5>
			 <img class="card-img-top" src="/objekwisata/{{$s->gambar}}" alt="Card image cap">
		</div>
		<div class="col-md-8 mt-4 text-justify" >
			<p class="card-body">{{$s->keterangan}}</p>
			<u><a href="#" style="float: right;">Selengkapnya..</a></u>
		</div>

	</div>
@endforeach
	<div class="col-md-3 mt-gita-event">
		<br>
		<br>
		<br>
		<div class="card" style="background-color: #DBDBAA">
		<h5 class="ml-3">Event dalam waktu dekat</h5>
		<ul>
			<li>Lorem ipsum dolor sit amet, consectetur adipiscing</li>
			<li>Lorem ipsum dolor sit amet, consectetur adipiscing</li>
			<li>Lorem ipsum dolor sit amet, consectetur adipiscing</li>
		</ul>
	</div>
	</div>
	@endif
	@if(!$p)
	<div class="container">
            <br>
            <br><br><br><br><br><br><br><center><h1>Tidak Ada Objek Wisata yang terdaftar Saat ini</h1></center><br><br><br><br><br><br><br><br><br><br><br>            
           </div>
    @endif
	
</div>



