<br><br><link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
<?php 
$asd=Auth::user()->id;
		$DB=DB::SELECT("SELECT * FROM member where id_akun=$asd")
?>
@include('layouts.alerts')
@extends('layouts.template')
</div>
<br><br><br>
 <div class="col-md-12 card container-fluid"  style="background-color: #dbdbdb">
                            <h7>Bayar Ke:99873211417010(MANDIRI)</h7> 
                            <h7>Atas Nama:Sogumontar Simangunsong</h7><br>  
                            <h7>Bayar Ke:99873211417030(BNI)</h7>
                            <h7>Atas Nama:Gita Nadapdap</h7><br>    
                            <h7>Bayar Ke:99873211417003(MANDIRI)</h7>   
                            <h7>Atas Nama:Kristopel Lumbantoruan</h7><br>   
                            <br>    <br>    
                          
 </div><br>
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
				<label hidden="">No Rek Tujuan :</label>
			<div>
				<input type="" name="" hidden="" value="99873211417010" class="form-control"></p>
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
				<h2>Jumlah Poin: {{$DB[0]->poin}}  = Rp.{{$DB[0]->poin *100}},00</h2>
			</div>
			<div class="row">
				<div class="col-md-1">
					<input type="submit" name="submit"value="Bayar"  class="btn btn-info" align="right">
				</div>
			</form>
				</div>
				
			
		
		<div class="col-md-1">
			
					<a style="margin-left: -15" href="{{route('member.poin',$a->id)}}"><button class="btn btn-success">Gunakan Poin</button></a>
				
				</div>
		</div>
		<br><br>
		
	@endforeach
	
</div>