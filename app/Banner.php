<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $table = 'banners';
    protected $primaryKey = 'id';

    protected $fillable = ['link','posicion','expiracion','imagen'];
}
