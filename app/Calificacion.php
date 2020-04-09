<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    //
    protected $table = 'calificaciones';
    protected $primaryKey = 'id';
    protected $fillable = ['noticia_id','calificacion','cant'];
}
