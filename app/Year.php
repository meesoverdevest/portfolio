<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = [
    	'year', 'description'
    ];

    public function periods(){
    	return $this->hasMany('App/Period', 'year_id');
    }
}
