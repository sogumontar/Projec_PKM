@extends('layouts.template')
@include('layouts.alerts')
<br>
<div>
	@foreach($record_homestay as $record)

	<div class="container">
		<label>Tanggal Pemesanan:</label>
		<input type="" name="date" id="id" class="form-control" value="{{$record->date}}">
		<label>Jumlah Kamar:</label>
		<input type="" name="jumlah_kamar" id="jumlah_kamar" class="form-control" value="{{$record->jumlah_kamar}}">
		<label>Status Pemesanan:</label>
		<input type="text" name="status" id="status" class="form-control" value="{{$record->status}}">
		<label>Jumlah Pemesanan:</label>
		<input type="text" name="jumlah_pengunjung" class="form-control" value="{{$record->jumlah_pengunjung}}">
	</div>
	<div class="container">
		<div class="container">
			<a href="{{route('homestay.kelola',$record->id)}}">Kelola</a>
		</div>
	</div>
	@endforeach
	<!-- <p>test</p> -->
</div>
