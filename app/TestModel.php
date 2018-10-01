<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestModel extends Model
{
    use SoftDeletes;
	protected $table = 'test_table';
	protected $fillable = ['name','surname','roll_no'];

	// public function getRouteKeyName()
	// {
	// 	return 'city';
	// }
}
