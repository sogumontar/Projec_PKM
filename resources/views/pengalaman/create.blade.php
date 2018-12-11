@include('layouts.alerts')
@extends('layouts.template')
</div>
<br>
<div class="container-fluid">
	<a href="{{route('pengalaman.view')}}">Lihat daftar Pengalaman</a>
</div>
<div class="jumbotron">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
				<div>
					{{ csrf_field() }}

					<input type="text" class="form-control" placeholder="Judul Pengalaman" name="judul" id="judul"><br>
					<textarea rows="5" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan Pengalaman"></textarea>
					<br>
					<input type="date" name="date" placeholder="date" class="form-control">
					<input type="file" class="form-control" placeholder="Gambar" name="gambar" id="gambar"><br>
					<input type="submit" class="btn btn-primary" name="">
				</div>			
		</div>
	</form>
</div>