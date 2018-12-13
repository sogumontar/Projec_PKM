<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class objekWisata extends Model
{
    protected $table='objek_wisata';
    protected $fillable=['nama','keterangan','gambar','lokasi','daerah'];
}
