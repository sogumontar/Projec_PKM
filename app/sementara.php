<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sementara extends Model
{
    protected $table='sementara';
    protected $fillable=['tipe','id_member','date','status'];
}
