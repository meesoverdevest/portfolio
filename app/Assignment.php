<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
    	'assignment', 'description'
    ];

    public function blocks(){
    	return $this->hasMany('App\Block', 'assignment_block', 'assignment_id', 'block_id');
    }

    public function course() {
    	return $this->belongsTo('App\Course', 'course_assignment', 'assignment_id','course_id');
    }
}
