<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    //
    protected $table = 'ABCnoticias';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = ['Titular','entrada','Autor','Area','Contenido','Estado','Leido','referencia'];
}
