<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'course_id',
    ];
	
	public function course(){
		return $this->belongsTo(Course::class);
	}
	
	public function users(){
		return $this->belongsToMany(User::class);
	}

}
