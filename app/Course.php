<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
    	'course', 'description', 'completed', 'grade'
    ];

    public function period() {
    	return $this->belongsToMany('App\Period', 'period_course', 'course_id','period_id');
    }

    public function assignments() {
    	return $this->belongsToMany('App\Assignment', 'course_assignment', 'course_id','assignment_id');
    }

    public function getPeriod(){
    	return $this->period->first();
    }
}
