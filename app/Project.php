<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
    	'project', 'description'
    ];

    public function blocks(){
    	return $this->hasMany('App\Block', 'project_block', 'project_id', 'block_id');
    }
}
