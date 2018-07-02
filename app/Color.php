<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
	protected $table = 'color';
	public $timestamps = false;
	
	public function productColor()
	{
		return $this->hasMany('App\ProductColor');
	}
}
