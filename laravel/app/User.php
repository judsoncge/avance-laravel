<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
	use SoftDeletes; 
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','institution_id','classroom_id','type','email','photo','username','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function classroom(){
		return $this->belongsTo(Classroom::class);
	}
	
	public function institution(){
		return $this->belongsTo(Institution::class);
	}
	
	public function disciplines(){
		return $this->belongsToMany(Discipline::class);
	}
}
