
<?php 
$idd=Auth::user()->id;
$GG=DB::SELECT("SELECT * FROM member where id_akun=$idd");
$dsa= $DB[0]->id_homestay;
$asd=DB::select("SELECT * FROM Homestay where id=$dsa");

?>
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
<html>
	<head>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/carousel.css') }}">\
    <title>KingStay</title>
	<style type="text/css">	
	body {
			padding-top: 20px;
			padding-bottom: 40px;
			font-size: 0.7em;
	}
</style>
	</head>
	<body>
		<div class='container-fluid'>
		<h2 style='text-align: center'>KingStay<br> <img src="/logokingstay.png" style="width: 120px"></h2>
        
		<hr>
		<table  class="table" >
		<thead>
            <th>
            Nama Pemesan 
            </th>
            <th>
            Nama Homestay 
            </th>
            <th>
            Tanggal Pemesanan 
            </th>
            
            <th>Jumlah Kamar</th>
        <th>Jumlah Penghuni</th>
        <th>Harga</th>
        <th>Lama Menginap</th>
<!--
            <th>
           Harga Menu 
            </th>
-->
		</thead>
		<tbody>
		<?php


            
    ?><tr>
    <td>{{$GG[0]->nama}}</td>
    <td>{{$asd[0]->nama}}</td>
	<td>{{$DB[0]->date}}</td>
	<td>{{$DB[0]->harga}}</td>
      <td>{{$DB[0]->jumlah_kamar}}</td>
        <td>{{$DB[0]->jumlah_pengunjung}}</td>
        
        <td>{{$DB[0]->lama_menginap}}</td>
    
 		
	</tr>

            <tr>
        
    </tr>
<!-- <button onClick="window.print();">Print</button> -->
    
    <tr>
      
    </tr>
	</tbody>
	</table>
	<p align='center'>

<!--
<a href="umr2013_cetak.php" cls='btn' onClick="window.print();return false">
	 <i class='icon-print'></i>Cetak </a>
-->
			</p>
		</div>
	</body>
</html>