<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = [
    	'period', 'year_id'
    ];

    public function year(){
    	return $this->belongsTo('App/Year', 'id');
    }
}
