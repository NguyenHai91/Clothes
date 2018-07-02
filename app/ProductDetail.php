<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
	protected $table = 'product_detail';
	public $timestamps = false;

	public function product()
	{
		return $this->belongTo('App\Product','id','product_id');
	}
	public function size()
	{
		return $this->belongTo('App\Size','id','size_id');
	}
	public function color()
	{
		return $this->belongTo('App\Color','id','color_id');
	}
}
