@extends('layouts.template')
@section('content')
@endsection
<div>
<br>
<?php

	$p=DB::select('select * from pengalaman');
?>
@if($p)
@foreach($pengalaman as $s)
<div class="" style="background:URL('/Capture.png')">
<br>
	<div class="row col-md-10 m-5 p-2 card" id="gita" style="background-color:transparent;" >
		
			<h5>{{$s->judul}}</h5>
			
		
		<div class="col-md-10 mt-4 text-justify card" style="background-color:#fff;">
			<p class="card-body">{{$s->keterangan}}</p>
			<u><a href="#" style="float: right;">Selengkapnya..</a></u>
		</div>

	</div>
	<br><br><br>
@endforeach
	
	@endif
	@if(!$p)
	<div class="container">
            <br>
            <br><br><br><br><br><br><br><center><h1>Tidak Ada Pengalaman yang terdaftar Saat ini</h1></center><br><br><br><br><br><br><br><br><br><br><br>            
           </div>
    @endif
	
</div>




