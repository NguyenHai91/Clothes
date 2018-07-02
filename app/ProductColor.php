<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
	protected $table = 'product_color';
	public $timestamps = false;
	
	public function color()
	{
		return $this->belongTo('App\Color','id','color_id');
	}
}
