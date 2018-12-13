@include('layouts.alerts')
@extends('layouts.template')
<?php $DB=DB::SELECT("SELECT * FROM objek_wisata");?>
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
</div>
<br>
<div class="container">
	<a href="{{route('pengalaman.view')}}">Lihat daftar Pengalaman</a>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-2">	
		</div>
		<div class="col-md-8" align=>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
						<div>
							{{ csrf_field() }}
							<label><b>Judul</b></label>
							<input type="text" class="form-control" placeholder="Judul Pengalaman" name="judul" id="judul"><br>
							
							<label><b>Objek Wisata</b></label>
							<select class="form-control" name="objek_wisata">
								<option>Objek Wisata</option>
								@foreach($DB as $s)
								<option value="{{$s->nama}}">{{$s->nama}}</option>
								@endforeach
							</select><br>
							<label><b>Keterangan</b></label>
							<textarea rows="5" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan Pengalaman"></textarea>
							<br>
							<label><b>Gambar</b></label>
							<input type="file" class="form-control" placeholder="Gambar" name="gambar" id="gambar"><br>
							<input type="submit" class="btn btn-primary" name="">
						</div>			
				</div>
			</form>
		</div>
		<div class="col-md-2">	
		</div>
	</div>
</div>