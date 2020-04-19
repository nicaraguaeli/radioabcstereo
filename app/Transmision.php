<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transmision extends Model
{
    //

    protected $table = 'transmisions';
    protected $primaryKey = 'id';

    protected $fillable = ['url','titulo'];
}
