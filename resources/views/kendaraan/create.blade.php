@extends('layouts.template')
@include('layouts.alerts')
@section('content')
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
</div>
<br>
	<a href="{{route('kendaraan.view')}}">Lihat daftar Kendaraan</a>

<div class="jumbotron">
	<form action="{{route('kendaraan.store')}}" method="post" enctype="multipart/form-data">
		<div class="form-group">
				<div>
					{{ csrf_field() }}
					<select name="jenis" id="jenis" class="form-control" >

						<option value="mobil">Mobil</option>
						<option value="mobil">Motor</option>
					</select><br>

					<input type="text" class="form-control" placeholder="Merk Kendaraan" name="merk" id="merk"><br>
					<input type="text" class="form-control" placeholder="id_pemilik" name="id" id="id"><br>
					<input type="text" class="form-control" placeholder="Plat Nomor Kendaraan" name="plat" id="plat"><br>
					<input type="text" class="form-control" placeholder="Harga" name="harga" id="harga"><br>
					<input type="submit" class="btn btn-primary" name="">
				</div>			
		</div>
	</form>
</div>

@endsection