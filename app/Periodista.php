<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodista extends Model
{
    //
    protected $table = 'periodistas';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','imagen','tipo','estado'];
}
