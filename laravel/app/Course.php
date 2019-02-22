<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'institution_id',
    ];

	public function disciplines(){
		return $this->hasMany(Discipline::class);
	}
	
	public function classrooms(){
		return $this->hasMany(Classroom::class);
	}
	
	public function institution(){
		return $this->belongsTo(Institution::class);
	}


}
