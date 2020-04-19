<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Podscat extends Model
{
    //
    protected $table = 'podcasts';
    protected $primaryKey = 'id';

    protected $fillable = ['titulo','url','entrada','contenido','categoria','imagen','autor'];
}
