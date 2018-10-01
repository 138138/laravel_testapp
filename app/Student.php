<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
	use SoftDeletes;
	protected $table = 'students';
	protected $fillable = ['roll_no','name','marks'];

//	public function getRouteKeyName()
//	{
//		return 'marks';
//	}
}
