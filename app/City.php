<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = 'cities';
    protected $primaryKey = 'id';

    protected $fillable = ['name'];


    public function empleos()
    {
    	return $this->hasMany(Empleo::class);
    }
    
}
