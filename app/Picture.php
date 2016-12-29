<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
		protected $table = "pictures";

    protected $fillable = [
    	'image_name', 'description', 'type', 'image_extension'
    ];

    public function period()
    {
        return $this->belongsTo('App\Period', 'picture_period', 'picture_id','period_id');
    }

    public function block()
    {
        return $this->belongsTo('App\Block', 'picture_block', 'picture_id','block_id');
    }

    public function assignment()
    {
        return $this->belongsTo('App\Assignment', 'picture_assignment', 'picture_id','assignment_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Project', 'picture_project', 'picture_id','project_id');
    }

    public function course()
    {
        return $this->belongsTo('App\Course', 'picture_course', 'picture_id','course_id');
    }
}
