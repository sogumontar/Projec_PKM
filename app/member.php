<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    protected $table='member';
    protected $fillable=['nama','alamat','no_telepon','id_akun'];
}
