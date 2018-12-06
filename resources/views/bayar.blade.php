@include('layouts.alerts')
@extends('layouts.template')
</div>
<br>

<div class="container">
	@foreach($d as $a)
		<form method="post" action="{{route('member.bayarProcess',$a->id)}}" enctype="multipart/form-data">
			 {{csrf_field()}}
                    {{ method_field('PATCH') }}
				<label>Nama Homestay :</label>
			<div>
				<input type="" name=""value="{{$a->nama}}" class="form-control"></p>
			</div>

				<label>Jadwal Pemesanan :</label>
			<div>
				<input type="" name=""value="{{$a->date}}" class="form-control"></p>
			</div>

				<label>Jumlah Kamar :</label>
			<div>
				<input type="" name=""value="{{$a->jumlah_kamar}}" class="form-control"></p>
			</div>

				<label>Jumlah Pengunjung :</label>
			<div>
				<input type="" name=""value="{{$a->jumlah_pengunjung}}" class="form-control"></p>
			</div>
				<label>No Rek Tujuan :</label>
			<div>
				<input type="" name=""value="99873211417010" class="form-control"></p>
			</div>
				<label>Atas Nama :</label>
			<div>
				<input type="" name=""value="Sogumontar" class="form-control"></p>
			</div>
				<label>Bukti Pengiriman/ Struk :</label>
			<div>
				<input type="file" name="gambar"value=""  class="form-control"></p>
			</div>
			<div>
				<input type="submit" name="submit"value="Submit"  class="btn btn-success"></p>
			</div>
		</form>
		
		
	@endforeach
	
</div>