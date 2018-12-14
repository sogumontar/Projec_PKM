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
			<form method="post" action="{{route('member.bayarProcess',$a->id)}}" enctype="multipart/form-data">
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
		
		<div class="col-md-1">
				<!-- <p>{{$DB[0]->id}}</p> -->
					<a href="{{route('member.poin',$a->id)}}"><button class="btn btn-info">Gunakan Poin</button></a>
				
				</div>
		
		
	@endforeach
	
</div>