<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kendaraan extends Model
{
    protected $table = 'kendaraan';
    protected $fillable= ['jenis_kendaraan','Merk_kendaraan','id_pemilik','plat_nomor','harga'];
}
