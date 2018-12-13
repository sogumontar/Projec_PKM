@extends('layouts.template')
@include('layouts.alerts')
@section('content')
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
@endsection
<div class="jumbotron">
	<form action="{{route('homestay.store')}}" method="post" enctype="multipart/form-data">
		<div class="form-group">
				<div>
					{{ csrf_field() }}
					<input type="text" class="form-control" placeholder="nomor_kamar" name="nomor_kamar" id="nomor_kamar">
					<input type="text" class="form-control" placeholder="id_pemilik" name="id_pemilik" id="id_pemilik">
					<input type="text" class="form-control" placeholder="harga" name="harga" id="harga">
					<input type="text" class="form-control" placeholder="keterangan" name="keterangan" id="keterangan">
					<input type="text" class="form-control" placeholder="nama" name="nama" id="nama">
					<input type="file" class="form-control" placeholder="gambar" name="gambar" id="gambar"><br>
					<input type="submit" class="btn btn-primary" name="">
				</div>			
		</div>
	</form>
</div>