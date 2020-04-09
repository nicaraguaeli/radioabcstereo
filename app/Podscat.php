<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Podscat extends Model
{
    //
    protected $table = 'podscats';
    protected $primaryKey = 'id';

    protected $fillable = ['titulo','url'];
}
