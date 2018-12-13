<?php 
$asd=Auth::user()->id;
		$DB=DB::SELECT("SELECT * FROM member where id_akun=$asd");
		
?>
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@include('layouts.alerts')
@extends('layouts.template')
</div>
<br>
<h2 class="container">Bayar Pessansan</h2><br>	
<div class="container">
	@foreach($ddd as $a)
		
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
			<form method="post" action="{{route('member.bayarProcess',$a->id)}}" enctype="multipart/form-data">
				<label>Masukkan jumlah poin yang ingin di tukarkan</label>
				{{csrf_field()}}
                    {{ method_field('PATCH') }}
			<div>
				<?php
				$qqe=Auth::user()->id;
					$rrew=DB::SELECT("SELECT *  FROM member where id_akun=$qqe")
				 ?>
				<div class="form-group">

					<div class="col-lg-3">
						<input type="number" step="any" min="0" max="{{$rrew[0]->poin}}" value="" name="volume" id="volume" class="form-control"></div>
					</div>
					<label class="col-lg-3 control-label">Sisa Poin</label>
					<div class="col-lg-3">
						<input type="number"  min="0" max="" value="{{$rrew[0]->poin}}" name="sisa" id="sisa" class="form-control" disabled=""></div>
					<div class="form-group">
					</div>
					<div class="form-group">
					<label class="col-lg-3 control-label">Harga per poin</label>
					<div class="col-lg-3">
						<input type="number" min="0" value="100" name="harga" id="harga" class="form-control" disabled=""></div>
					</div>
					<div class="form-group">
					<label class="col-lg-3 control-label">Jumlah Total</label>
					<div class="col-lg-3">
						<input type="text" name="jumlah" id="jumlah" class="form-control" Readonly></div>
					</div>
					<div class="col-lg-3">
						<input type="number" min="0" value="{{$DB[0]->poin}}" name="test" id="test" class="form-control" disabled="" hidden=""></div>
					</div>
					<div>
						<input type="submit" class="btn btn-info" name="">
					</div>
			</div>
			
		</form>
		
		<script type="text/javascript">
 $("#volume").keyup(function(){
 total = $("#volume").val()* $("#harga").val();
 $("#jumlah").val(total);
 });


$("#harga").keyup(function(){
 total = $("#volume").val()* $("#harga").val();
 $("#jumlah").val(total);
 });
$("#volume").keyup(function(){
 total = $("#test").val()- $("#volume").val();
 $("#sisa").val(total);
 });

</script>
	@endforeach
	
</div>