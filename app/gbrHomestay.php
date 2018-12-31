<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gbrHomestay extends Model
{
    protected $table='gbrhomestay';
    protected $fillable=['nama','id_homestay','date'];
}
