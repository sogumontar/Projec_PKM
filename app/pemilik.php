<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemilik extends Model
{
    protected $table='pemilik_homestay_kendaraan';
    protected $fillable=['nama','alamat'];
}
