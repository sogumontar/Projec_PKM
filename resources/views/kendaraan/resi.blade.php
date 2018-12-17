
<?php 
$idd=Auth::user()->id;
$GG=DB::SELECT("SELECT * FROM member where id_akun=$idd");
$dsa= $DB[0]->id_kendaraan;
$asd=DB::select("SELECT * FROM kendaraan where id=$dsa");

?>
<link rel="icon" type="image/png" href="/logokingstay.png" style="width: 30px;">
<html>
	<head>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/carousel.css') }}">
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
		<div class='container'>
		<h2 style='text-align: center'><br> <img src="/logokingstay.png" style="width: 120px"></h2>
        
		<hr>
		<table  class="table" >
		<thead>
            <center>
            <th align="center">
            Nama Pemesan 
            </th>
            <th align="center">
            Jenis Kendaraan 
            </th>
            <th align="center">
            Merk Kendaraan
            </th>
            
            <th align="center">Lama Pemesanan</th>
        <th >Harga</th>
        <th align="center">Tanggal pengambilan</th>
        <th align="center">Tanggal pengembalian</th>
        </center>
<!--
            <th>
           Harga Menu 
            </th>
-->
		</thead>
		<tbody>
		<?php

        $harga=$DB[0]->harga;
            
    ?><tr>
    <td align="center">{{$GG[0]->nama}}</td>
	<td align="center">{{$asd[0]->jenis_kendaraan}}</td>
	<td align="center">{{$asd[0]->Merk_kendaraan}}</td>
      <td align="center">{{$DB[0]->lama_pemesanan}}</td>
        <td align="center"> Rp.<?php echo number_format($harga,2,',','.') ?> 
</td>
        
        <td align="center">{{$DB[0]->date}}</td>
        <td align="center">{{$DB[0]->date_akhir}}</td>
    
 		
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