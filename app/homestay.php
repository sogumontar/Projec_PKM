<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class homestay extends Model
{
	protected $table='homestay'; 
     protected  $fillable=['nomor_kamar','id_pemilik','harga','keterangan','nama','gambar']; 
}
