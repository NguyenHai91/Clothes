<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
	protected $table = 'size';
	public $timestamps = false;
	
	public function productSize()
	{
		return $this->hasMany('App\ProductSize');
	}
}
