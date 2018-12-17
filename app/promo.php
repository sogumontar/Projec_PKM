<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class promo extends Model
{
    protected $table='promo';
    protected $fillable=['nama','harga','mulai','selesai','status','id_homestay','keterangan'];
}
