<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class record_pemesanan_kendaraan extends Model
{
    protected $table='record_pemesanan_kendaraan';
    protected $fillable=['id_member','id_kendaraan','date','lama_pemesanan','date_akhir'];
}
