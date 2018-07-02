<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
	protected $table = 'product_size';
	public $timestamps = false;

	public function size()
	{
		return $this->belongTo('App\Size','id','size_id');
	}
}
