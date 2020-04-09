<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nosotros extends Model
{
    //
    protected $table = "nosotros";
    protected $primaryKey = "id";
    protected $fillable = ['contenido'];
}
