<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abctv extends Model
{
    //
    protected $table = 'abctvs';
    protected $primaryKey = 'id';

    protected $fillable = ['url','urlImagen','visto','descripcion','created_at'];

}
