<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bayarPemilik extends Model
{
    protected $table='bayarpemilik';
    protected $fillable=['gambar','status','id_pemilik','id_pemesanan'];
}
