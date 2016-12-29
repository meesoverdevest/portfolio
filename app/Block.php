<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = [
    	'block', 'description', 'html'
    ];

    public function assignment(){
    	return $this->belongsTo('App\Assignment', 'assignment_block', 'block_id', 'assignment_id');
    }

    public function project(){
    	return $this->belongsTo('App\Project', 'project_block', 'block_id', 'project_id');
    }
}
