<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengalaman extends Model
{
    protected $table='pengalaman';
    protected $fillable=['judul','keterangan','date','id_member','gambar'];
}
