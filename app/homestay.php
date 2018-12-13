<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class homestay extends Model
{
	protected $table='homestay'; 
     protected  $fillable=['nomor_kamar','id_pemilik','harga','keterangan','nama','gambar','jumlah_kamar_terbooking','kecamatan','alamat','rating','poin']; 
}
