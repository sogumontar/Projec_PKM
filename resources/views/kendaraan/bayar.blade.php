<br><br><link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
<?php 
$asd=Auth::user()->id;
		$DB=DB::SELECT("SELECT * FROM member where id_akun=$asd")
?>
@include('layouts.alerts')
@extends('layouts.template')
</div>
<br>
<h2 class="container">Bayar Pesanan</h2><br>	
<div class="container">
	@foreach($d as $a)
		
				<label>Jenis Kendaraan :</label>
			<div>
				<input type="" name=""value="{{$a->jenis_kendaraan}}" class="form-control" disabled=""></p>
			</div>

				<label>Merk Kendaraan:</label>
			<div>
				<input type="" name=""value="{{$a->Merk_kendaraan}}" class="form-control" disabled=""></p>
			</div>

				<label>Waktu ambil kendaraan :</label>
			<div>
				<input type="" name=""value="{{$a->date}}" class="form-control" disabled=""></p>
			</div>

				<label>Waktu pengembalian kendaraan :</label>
			<div>
				<input type="text" name="waktu_akhir"value="{{$a->date_akhir}}" class="form-control" disabled=""></p>
			</div>
				<label>Lama Pemesanan :</label>
			<div>
				<input type="int" name="lama" value="99873211417010" class="form-control"d disabled=""></p>
			</div>
				<label>Harga :</label>
			<div>
				<input type="number" name="harga" value="{{$a->harga}}" class="form-control" disabled=""></p>
			</div>
			<form method="post" action="{{route('member.bayarKendaraanProcess',$id)}}"  enctype="multipart/form-data">
			 {{csrf_field()}}
                    {{ method_field('PATCH') }}
				<label>Bukti Pengiriman/ Struk :</label>
			<div>
				<input type="file" name="gambar"value=""  class="form-control" required=""></p>
			</div>
			<div>
				<h2>Jumlah Poin: {{$DB[0]->poin}} / Rp.{{$DB[0]->poin *100}},00</h2>
			</div>
			<div class="row">
				<div class="col-md-1">
					<input type="submit" name="submit"value="Bayar"  class="btn btn-info" align="right">
				</div>
			</form>
				<div class="col-md-10">
					
				</div>
				
			</div>
		
		
	@endforeach
	
</div>