<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Empleo extends Model
{
    //
    protected $table = 'empleos';
    protected $primaryKey = 'id';
    protected $fillable = ['cargo','descripcion','empleador','city_id','expiracion'];
   
}
