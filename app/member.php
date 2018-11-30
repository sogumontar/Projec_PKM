<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    protected $table='member';
    protected $fillable=['nama','id_akun'];
}
