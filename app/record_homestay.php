<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class record_homestay extends Model
{
    protected $table='record_pemesanan_homestay';
    protected $fillable=['id_member','id_member','id_homestay','date','jumlah_kamar','status','jumlah_pengunjung','nomor_kamar','gambar','harga','lama_menginap','date_akhir'];
}
