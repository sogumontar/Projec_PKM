<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notifikasi extends Model
{
    protected $table='notifikasi';
    protected $fillable=['nama','isi','status','id_penerima'];
}
