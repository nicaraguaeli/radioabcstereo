<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table = 'countries';
    protected $primaryKey = 'id';

    protected $fillable = ['name'];

   
        public function cities()
    {
        return $this->hasMany(City::class);
    }
    
}
