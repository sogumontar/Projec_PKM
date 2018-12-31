@extends('layouts.owner')
@include('layouts.alerts')
<br>	<br>	
<div class="panel panel-primary filterable">

	<!-- panel heading starat -->
	<div class="panel-heading">
		<h3 class="panel-title">List request menjadi owner homestay</h3>
		<div class="pull-right">

		</div>
	</div>
	<!-- panel heading end -->

	<div class="panel-body">
		<!-- panel content start -->
		<!-- Table -->
		<table class="table table-hover table-bordered">

			<thead>
				<tr class="filters">
					<th><p>Nama</p></th>
					<th><p>Alamat</p></th> 
					<th><p>Tanggal Pemesanan</p></th>
					<th><p>Tanggal Pengiriman Uang</p></th>
					<th><p>Gambar Resi</p></th>
					<th><p>Terima Uang</p></th>
					
				</tr>
			</thead>
			@foreach($DB as $a)
			<?php $ss=DB::SELECT("SELECT * FROM record_pemesanan_homestay where id=$a->id_pemesanan");
			$test=$ss[0]->id_member;
			$s=DB::SELECT("SELECT * FROM users where id=$test");
			?>
			<div>
				<tr>
					<td>{{$s[0]->name}}</td>
					<td></td>
					<td>{{$ss[0]->created_at}}</td>
					<td>{{$a->created_at}}</td>
					<td align="center"><a href="/bayarPemilik/{{$a->gambar}}"><img style="width: 130px; height: 150px" src="/bayarPemilik/{{$a->gambar}}"></a></td>
					<form method="post" action="{{route('owner.terima',$a->id)}}">
						{{csrf_field()}}
						{{ method_field('PATCH') }}
						<td><a href="	"><button class="btn btn-success">Terima</button></a></td>
					</form>
				</tr>
			</div>
			@endforeach

		</table>
		<!-- panel content end -->
		<!-- panel end -->
	</div>
</div>
