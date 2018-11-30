<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemilik extends Model
{
    protected $table='pemilik_homestay/kendaraan';
    protected $fillable=['nama','alamat'];
}
